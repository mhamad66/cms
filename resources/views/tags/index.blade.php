@extends('layouts.app')
@section('content')
@if (session()->has('error'))
<div class="alert alert-danger"> {{session()->get('error')}}</div>
@endif
<div class=" clearfix" > <a href=" tags/create " class=" btn btn-success float-right" style="margin-bottom:10px">create tag</a></div>
<div class="card ">
    <div class="card-header">
        all tag
    </div>
    <table class="table">
        @foreach ($tags as $tag)
        <tbody>
          <tr>
<td>{{$tag  ->name}}<span class="badge badge-primary ml-2">{{$tag->posts->count()}}</span>
</td>
<td>
  <form action="tags/{{$tag->id}}" method="POST" class="float-right">
  @csrf
  @method('delete')
  <button href="" class="btn btn-danger btn-sm">delete</button>
</form>
  <a  href="tags/{{$tag->id}}/edit" class="btn btn-primary float-right btn-sm">edit</a>
</td>
 
@endforeach

          </tr>
        </tbody>
      </table>  
  </div>


@endsection