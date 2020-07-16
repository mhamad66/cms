@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header text-center">
    {{isset($category)? "update category":" create category"
    }}
    </div>
<div class="card-body">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{isset($category)?route('categories.update',$category->id):route('categories.store')}}" method="POST">
        @csrf
        @isset($category)
        @method('PUT')
            
        @endisset
        <div class="form-group">
          <label for="categories">category Name:</label>
        <input type="text" class="form-control" placeholder="categories" name="name" value="{{isset($category)?$category->name:""}}">
        </div>
        <div class="form-group">
        <button class="btn btn-success">{{isset($category)?"update":"add"}}</button>
        </div>
  </div>
</div>
@endsection