@extends('layouts.master')
@section('title', 'Add Category')
@section('content')
    <div class="container-fluid px-4">

        <div class="row">
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="">Edit Category</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div> {{ $error }} </div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/update-category/' . $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="">Category Name</label>
                            <input type="text" value="{{ $category->name }}" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Slug</label>
                            <input type="text" value="{{ $category->slug }}" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="5">{{ $category->description }}</textarea>
                        </div>
                        <div class="mb-3">

                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <h6>SEO Tags</h6>
                        <div class="mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" value="{{  $category->meta_title }}" name="meta_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Meta Description</label>
                            <textarea class="form-control"  name="meta_description" rows="5">{{  $category->meta_description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Meta Keywords</label>
                            <textarea class="form-control" name="meta_keyword" rows="5">{{  $category->meta_keyword }}</textarea>
                        </div>

                        <h6>Status Mode</h6>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="">Navbar Status</label>
                                <input type="checkbox" {{  $category->navbar_status == '1'?'checked':'' }} name="navbar_status">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" {{  $category->status == '1'?'checked':'' }} name="status">
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
