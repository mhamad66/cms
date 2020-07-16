@extends('layouts.app')
@section('content')

@if ($users->count()>0)

<div class="card ">
    <div class="card-header">
        all users
    </div>
    <table class="table">
      <thead class="text-center">
        <tr>
          <td>image</td>
          <td>name</td>
          <td>email</td>
          <td>Role</td>
        </tr>
      </thead>
        @foreach ($users as $user)
        <tbody>
          <tr class="text-center">
          <td> <img src="{{$user->hasImage()?asset('storage/'.$user->getImage()):$user->getAvatar()}}" alt="" width="50px" height="50px" style="border-radius: 50%"></td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          @if (!$user->hasAdmin())              
          <td> <form action="{{route('makeAdmin',$user->id)}}" method="POST">
          @csrf
            <button type="submit" class="btn btn-success">make admin</button></td>
        </form>
          @else
          <td>{{$user->role}}</td>
              
          @endif
 
@endforeach

          </tr>
        </tbody>
      </table>  
  </div>    
@else
<div class="card ">
    <div class="card-header">
        all users
    </div>
      <table class="table">
<h1 class="text-center">no user</h1>
@endif
@endsection
