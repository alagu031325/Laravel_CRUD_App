@extends('layouts.master')

@section('content')
<div class="main-content mt-3">
<div class="card border-dark">
    <div class="card-header d-flex flex-row">
        <div class="me-auto">
            Edit Post
        </div>
        <div >       
            <a class="btn btn-success" href="">Back</a>
        </div> 
    </div>
    <div class="card-body">
        <form action="">
            <div class="form-group">
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control"  name="" id="" >
            </div>
            <div class="form-group">
                <label for="" class="form-label">Title</label>
                <input type="text" name="" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Category</label>
                <select name="" id="" class="form-control">
                    <option disabled selected> -- select category -- </option>
                    <option value="">test1</option>
                    <option value="">test2</option>
                    <option value="">test3</option>
                    <option value="">test4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Description</label>
                <textarea name="" id="" cols="30" rows="4" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary mt-3">Submit</button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection