<?php

namespace App\Http\Middleware;
use App\category;
use Closure;

class checkCategory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $count = category::all()->count();
        if($count ==0)
        {
            session()->flash('error','first add categories');
        return redirect(route('categories.index'));
        }
        return $next($request);
    }
}
