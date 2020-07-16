@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
<div class="card">
    <div class="card-header text-center">
    {{isset($post)? "update post":" create post"
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
    <form action="{{ isset($post) ?  route('posts.update',$post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($post)
        @method('PUT')
        @endisset
        <div class="form-group">
          <label for="posts title">post title:</label>
        <input type="text" class="form-control" placeholder="title" name="title" value="{{isset($post)? $post->title:''}}">
        </div>

        <div class="form-group">
            <label for="posts description">post description:</label>
          <textarea name="description" id="" cols="80" rows="3">{{isset($post)? $post->description:''}}</textarea>
          </div>

          <div class="form-group">
            <label for="posts">post content:</label><br>
        {{-- <textarea name="content" id="" cols="80" rows="10" placeholder="content"></textarea>   --}}
        <input id="x" type="hidden" name="content" value="{{isset($post)? $post->content:''}}">
  <trix-editor input="x"></trix-editor> 
  @if (isset($post))
  <img class="mt-2" src="{{asset('storage/'.$post->image)}}" alt="" width='400px' height="300px">
  @endif
</div>
        <div class="form-group">
          <label for="posts image">post image:</label>
        <input type="file" class="form-control" name="image" value="{{isset($post)?$post->image:''}}">
        </div>
        <div class="form-group">
          <label for="selectCategory">select a category</label>
          <select name="categoryID" class="form-control form-control-sm">
           @foreach ($categories as $category)
           <option value="{{$category->id}}">{{$category->name}}</option>   
           @endforeach
          </select>
        </div>
        @if (!$tags->count()<=0 )
          <div class="form-group">
            <label for="selecttag">select a tags</label>
            <select name="tags[]" class="form-control form-control-sm js-example-basic-multiple" multiple>
             @foreach ($tags as $tag)
             <option value="{{$tag->id}}"
              
          
             >{{$tag->name}}</option> 
             @endforeach
            </select>
            
          </div>
    
@endif

        <div class="form-group">
        <button class="btn btn-success">@if (isset($post))
            update
        @else
            add
        @endif</button>
        </div>
  </div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
  $('.js-example-basic-multiple').select2();
});
</script>
@endsection