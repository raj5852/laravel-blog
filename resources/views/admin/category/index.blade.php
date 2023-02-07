@extends('layouts.master')
@section('title', 'Category')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="mt-4">View Category
                    <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end">View Category</a>
                </h4>

            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }} </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($categories as $category)
                       <tr>
                        <td>{{$category->id}} </td>
                        <td>{{$category->name}} </td>
                        <td>
                            <img src="{{ asset('uploads/category/'.$category->image) }}" width="50px" alt="">
                        </td>
                        <td>{{$category->status == '1' ? 'Hidden':'Show' }} </td>
                        <td>
                            <a href="{{ url('admin/edit-category/'.$category->id) }}" class="btn btn-success">Edit</a>
                            <a href="{{ url('admin/delete-category/'.$category->id) }}" onclick="return confirm('Are you want to delete it?')" class="btn btn-danger">Delete</a>
                        </td>
                       </tr>

                       @endforeach

                    </tbody>

                </table>

            </div>
        </div>


    </div>
@endsection
