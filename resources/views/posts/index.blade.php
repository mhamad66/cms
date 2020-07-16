@extends('layouts.app')
@section('content')

@if ($posts->count()>0)
<div class=" clearfix" > <a href=" posts/create " class=" btn btn-success float-right" style="margin-bottom:10px">create post</a></div>
<div class="card ">
    <div class="card-header">
        all posts
    </div>
    <table class="table">
      <thead class="text-center">
        <tr>
          <td>image</td>
          <td>title</td>
          <td>action</td>
        </tr>
      </thead>
        @foreach ($posts as $post)
        <tbody>
          <tr>
          <td> <img src="{{asset('storage/'.$post->image)}}" alt="" width="100px" height="50px"> </td>
<td>{{$post->title}}</td>
<td>
  <form action="{{route('posts.destroy',$post->id)}}" method="POST" class="float-right">
  @csrf
  @method('delete')
  <button href="" class="btn btn-danger btn-sm">{{$post->trashed()?'delete':'trash'}}</button>
</form>
@if (!$post->trashed())
<a  href="posts/{{$post->id}}/edit" class="btn btn-primary float-right btn-sm mr-2">edit</a>
@else
<a  href="{{route('index.restore',$post->id)}}" class="btn btn-success float-right btn-sm mr-2">restore</a>

@endif

</td>
 
@endforeach

          </tr>
        </tbody>
      </table>  
  </div>    
@else
<div class=" clearfix" > <a href=" posts/create " class=" btn btn-success float-right" style="margin-bottom:10px">create post</a></div>
<div class="card ">
    <div class="card-header">
        all posts
    </div>
      <table class="table">
<h1 class="text-center">no post</h1>
@endif
@endsection
