@extends('layouts.master')

@section('content')
<div class="main-content mt-5">
<div class="card border-dark">
    <div class="card-header d-flex flex-row">
        <div class="me-auto">
            Show Post Details
        </div>
        <div >       
            <a class="btn btn-success" href="{{route('posts.index')}}">Back</a>
        </div> 
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered border-dark">
            
            <tbody>
                <tr>
                    <td>ID</td>
                    <td>{{$post->id}}</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><img src="{{asset($post->image)}}" width="100" alt=""></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>{{$post->title}}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{$post->description}}</td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>{{$post->category_id}}</td>
                </tr>
                <tr>
                    <td>Publish date</td>
                    <td>{{date('d-m-Y',strtotime($post->created_at))}}</td>
                </tr>
            </tbody>
          </table>
    </div>
</div>
</div>
@endsection