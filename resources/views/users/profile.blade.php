@extends('layouts.app')
@section('content')
<form  action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
 @csrf
  <h2 class='p-2' >profile</h2>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Name</label>
    <input type="text" class="form-control" name="name" value="{{$user->name}}">
    </div>
    <div class="form-group col-md-6">
      <label for="email">Email</label>
    <input type="email" class="form-control" name="email" value="{{$user->email}}">
    </div>
  </div>
  <div class="form-group">
    <label for="about">about</label><br>
  <textarea name="text" id="" cols="100" rows="4" placeholder=>{{$profile->about}}</textarea>
  </div>
  <div class="form-group">
    <label for="facebook">facebook</label>
    <input type="text" class="form-control" name="facebook" placeholder="facebook" value={{$profile->facebook}}>
  </div>
  <div class="form-group">
    <label for="twiteer">twiteer</label>
    <input type="text" class="form-control" name="twiteer" placeholder="twiteer" value={{$profile->facebook}}> 
  </div>
  <div class="form-group">
    <label for="image">image</label>
     <br>
  <img src="{{$user->hasImage()?asset('storage/'.$user->getImage()):$user->getAvatar()}}" alt="" class="mb-2" style="width: 100px">
  <input type="file" class="form-control" name="image" placeholder="imag">
  
</div>
  <button type="submit" class="btn btn-success">update profile</button>
</form>
@endsection