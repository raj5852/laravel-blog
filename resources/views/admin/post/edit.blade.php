@extends('layouts.master')
@section('title', 'Edit Post')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div> {{ $error }} </div>
                    @endforeach
                </div>
            @endif
            <div class="card-header">
                <h4>Edit Post
                    <a href="{{ url('admin/posts') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/upate-post/'.$post->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control" id="">
                            @foreach ($categories as $category)
                                <option {{$post->category_id == $category->id ? 'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Post Name</label>
                        <input type="text" name="name" value="{{$post->name}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{$post->slug}}" name="slug" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea id="my_summernote" name="description" class="form-control"  rows="3">{!!$post->description!!}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="">Youtube Iframe Link</label>
                        <input value="{{$post->yt_iframe}}" type="text" name="yt_iframe" class="form-control">
                    </div>
                    <h4>SEO Tags</h4>
                    <div class="mb-3">
                        <label for="">Meta Title</label>
                        <input value="{{$post->meta_title}}" type="text" name="meta_title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" class="form-control" id="" rows="3">{{$post->meta_description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keyword" class="form-control" id="" rows="3">{{$post->meta_keyword}}</textarea>
                    </div>

                    <h4>Status</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Status</label>
                                <input {{ $post->status == 1 ? 'checked':''}} type="checkbox" name="status">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary float-end">Update Post</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
