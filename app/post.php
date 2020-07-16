<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\category;
use App\tag;
class post extends Model
{
    use SoftDeletes;
    protected $fillable  =['title','description','content','image','category_id']; 


    public function category(){
        return $this->belongsTo(category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(tag::class);

    }

public function hasTag($tagID){
    return in_array($tagID, $this->tags->pluck('id')->toArray());
}

}
