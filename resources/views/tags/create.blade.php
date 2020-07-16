@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header text-center">
    {{isset($tag)? "update tag":" create tag"
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
    <form action="{{isset($tag)?route('tags.update',$tag->id):route('tags.store')}}" method="POST">
        @csrf
        @isset($tag)
        @method('PUT')
            
        @endisset
        <div class="form-group">
          <label for="tags">tag Name:</label>
        <input type="text" class="form-control" placeholder="tags" name="name" value="{{isset($tag)?$tag->name:""}}">
        </div>
        <div class="form-group">
        <button class="btn btn-success">{{isset($tag)?"update":"add"}}</button>
        </div>
  </div>
</div>
@endsection