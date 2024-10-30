@extends('layouts.master')

@section('content')
<div class="main-content mt-3">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
    @endif
<div class="card border-dark">
    <div class="card-header d-flex flex-row">
        <div class="me-auto">
            Edit Post
        </div>
        <div >       
            <a class="btn btn-success" href="{{route('posts.index')}}">Back</a>
        </div> 
    </div>
    <div class="card-body">
        <form action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div>
                    <img src="{{asset($post->image)}}" style="width:200px" alt="">
                </div>
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control"  name="image" id="" >
            </div>
            <div class="form-group">
                <label for="" class="form-label">Title</label>
                <input type="text" name="title" id="" class="form-control" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Category</label>
                <select name="category_id" id="" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option {{$category->id == $post->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Description</label>
                <textarea name="description" id="" cols="30" rows="4" class="form-control">{{$post->description}}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary mt-3">Submit</button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection