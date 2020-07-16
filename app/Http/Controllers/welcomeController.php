<?php

namespace App\Http\Controllers;
use App\post;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index(){
return view('welcome')->with([
    'posts'=> post::all()
    ]);
    }//end index
}
