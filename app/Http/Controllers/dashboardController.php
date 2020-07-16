<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\User;
use App\post;
class dashboardController extends Controller
{
public function index(){

    return view('dashboard.index')->with([
        'users_count'=> user::all()->count(),
        'categories_count'=> category::all()->count(),
        'posts_count'=> post::all()->count()

    ]);
}// end index 



} // end dashboardController
