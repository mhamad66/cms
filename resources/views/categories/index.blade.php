@extends('layouts.app')
@section('content')
@if (session()->has('error'))
<div class="alert alert-danger"> {{session()->get('error')}}</div>
@endif
<div class=" clearfix" > <a href=" categories/create " class=" btn btn-success float-right" style="margin-bottom:10px">create category</a></div>
<div class="card ">
    <div class="card-header">
        all category
    </div>
    <table class="table">
        @foreach ($categories as $cat)
        <tbody>
          <tr>
<td>{{$cat->name}}</td>
<td>
  <form action="categories/{{$cat->id}}" method="POST" class="float-right">
  @csrf
  @method('delete')
  <button href="" class="btn btn-danger btn-sm">delete</button>
</form>
  <a  href="categories/{{$cat->id}}/edit" class="btn btn-primary float-right btn-sm">edit</a>
</td>
 
@endforeach

          </tr>
        </tbody>
      </table>  
  </div>


@endsection