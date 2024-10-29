@extends('layouts.master')

@section('content')
<div class="main-content mt-5">
<div class="card border-dark">
    <div class="card-header d-flex flex-row">
        <div class="me-auto">
            All Posts
        </div>
        <div >       
            <a class="btn btn-success" href="{{route('posts.create')}}">Create</a>
            <a class="btn btn-warning" href="">Trashed</a>
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
              <tr>
                <th scope="row">1</th>
                <td>
                    <img src="https://picsum.photos/200" alt="" width="80px">
                </td>
                <td>Lorem</td>
                <td>Lorem ipsum sit amet</td>
                <td>News</td>
                <td>29-10-2024</td>
                <td>
                    <a class="btn btn-sm btn-info" href="">Show</a>
                    <a class="btn btn-sm btn-primary" href="">Edit</a>
                    <a class="btn btn-sm btn-danger" href="">Delete</a>
                </td>
              </tr>
             
            </tbody>
          </table>
    </div>
</div>
</div>
@endsection