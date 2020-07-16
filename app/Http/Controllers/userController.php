<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users', $users);
    }
    public function makeAdmin(user $user)
    {
        $user->role = 'admin';
        $user->save();
        return redirect(route('users.index'));
    }
    public function edit(User $user)
    {
        $profile = $user->profile;
        return view('users.profile')->with(['user' => $user, 'profile' => $profile]);
    }
    public function update(user $user, Request $request)
    {
        $profile = $user->profile;
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->image->store('profilesImage', 'public');
            $data['image'] = $image;
        }
        $profile->update($data);
        return redirect(route('home'));
    }
}
