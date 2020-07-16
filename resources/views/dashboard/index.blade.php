@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row text-center">
            <div class="col-md-4"><div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">users</div>
                <div class="card-body">
                    {{$users_count}}
                </div></div></div>
            <div class="col-md-4">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">category</div>
                    <div class="card-body">
                        {{$categories_count}}
                    </div>
                  </div>
                  

            </div>
            <div class="col-md-4"> <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">posts</div>
                <div class="card-body">
                    {{$posts_count}}
                </div>
            </div>
            </div></div>
        </div>
    </div>
</div>
@endsection
