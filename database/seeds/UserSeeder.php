<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\profile;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('email', 'mhamadaboasle@gmail.com')->first();
        if(!$user){
        $user = user::create([
            'name'=>'mhamad',
            'email'=>'mhamadaboasale@gmail.com',
            'password'=>Hash::make('mhamad6868'),
            'role'=>'admin'
        ]);
        
    
        $profile =  profile::create([
            'user_id' => $user->id,
            'image'=>$user->getAvatar()
            ]);
    }
    }
}
