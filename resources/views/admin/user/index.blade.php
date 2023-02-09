@extends('layouts.master')
@section('title', 'View users')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }} </div>
            @endif
            <div class="card-header">
                <h4>View Users
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}} </td>
                            <td>{{$user->name}} </td>
                            <td>{{$user->email}} </td>
                            <td>{{$user->role_as == '1' ?'Admin':'User' }} </td>
                            <td>
                                <a href="{{ url('admin/user/'.$user->id.'/edit') }}" class="btn btn-success">Edit</a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>

                </table>
                {{$users->links()}}
            </div>
        </div>

    </div>
@endsection
