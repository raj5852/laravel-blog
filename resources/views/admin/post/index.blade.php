@extends('layouts.master')
@section('title', 'Blog Dashboard')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }} </div>
            @endif
            <div class="card-header">
                <h4>View Posts
                    <a href="{{ url('admin/add-post') }}" class="btn btn-primary float-end">Add Post</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Post Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>{{$post->name}}</td>
                            <td>{{$post->status == '1'?'Hidden':'Show'}}</td>
                            <td>
                                <a href="" class="btn btn-success  btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
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
