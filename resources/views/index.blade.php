@extends('layouts.master')

@section('content')
<div class="main-content mt-2">
<div class="card border-dark">
    <div class="card-header d-flex flex-row">
        <div class="me-auto">
            All Posts
        </div>
        <div >       
            <a class="btn btn-success" href="{{route('posts.create')}}">Create</a>
            <a class="btn btn-warning" href="{{route('posts.trashed')}}">Trashed</a>
        </div> 
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered border-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col" style="width: 10%">Image</th>
                <th scope="col" style="width: 20%">Title</th>
                <th scope="col" style="width: 30%">Description</th>
                <th scope="col" style="width: 10%">Category</th>
                <th scope="col" style="width: 12%">Publish Date</th>
                <th scope="col" style="width: 20%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
                <tr>
                  <th scope="row">{{$post->id}}</th>
                  <td>
                      <img src="{{asset($post->image)}}" alt="" width="80px">
                  </td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->description}}</td>
                  <td>{{$post->category->name}}</td>
                  <td>{{date('d-m-Y',strtotime($post->created_at))}}</td>
                  <td>
                    <div class="d-flex">
                      {{-- anchor tag usuallly behaves as a get request --}}
                      <a class="btn btn-sm btn-info mx-1" href="{{route('posts.show',$post->id)}}">Show</a>
                      <a class="btn btn-sm btn-primary mx-2" href="{{route('posts.edit',$post->id)}}">Edit</a>
                      {{-- <a class="btn btn-sm btn-danger" href="">Delete</a> --}}
                      <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{$posts->links()}}
    </div>
</div>
</div>
@endsection