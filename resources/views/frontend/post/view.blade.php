@extends('layouts.app')
@section('title', "{$categoryPost->posts[0]->meta_title}")
@section('meta_description', "{$categoryPost->posts[0]->meta_description}")
@section('meta_keyword', "{$categoryPost->posts[0]->meta_keyword}")

@section('content')

    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="category-heading">
                        <h4>{!! $categoryPost->posts[0]->name !!} </h4>
                    </div>
                    <div class="mt-3">
                        <h6><a href="{{ url('tutorial/' . $categoryPost->slug) }}">{{ $categoryPost->name }}</a> /
                            {{ $categoryPost->posts[0]->name }} </h6>
                    </div>
                    <div class="card card-shadow mt-4">
                        <div class="card-body post-description">
                            {!! $categoryPost->posts[0]->description !!}
                        </div>
                    </div>
                    <div class="comment-area mt-4">
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }} </li>
                                @endforeach
                            </ul>
                        @endif
                        @if (session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif

                        <div class="card card-body">
                            <h6 class="card-title">Leave a comment</h6>
                            <form action="{{ url('comments') }}" method="POST">
                                @csrf
                                <input type="hidden" name="post_slug" value="{{ $categoryPost->posts[0]->slug }}">
                                <textarea name="comment_body" rows="3" class="form-control"></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>

                        @forelse ($comments as $comment)
                            <div class="card card-body shadow-sm mt-3">
                                <div class="detail-area">
                                    <h6 class="user-name mb-1">
                                        {{ $comment->user->name }}
                                        <small class="ms-3 text-primary">Comment on:
                                            {{ $comment->created_at->format('d-m-Y') }} </small>
                                    </h6>
                                    <div class="user-comment mb-1">
                                        {{ $comment->comment_body }}
                                    </div>
                                </div>
                                @auth
                                    @if (Auth::user()->id == $comment->user_id)
                                        <div>
                                            {{-- <a href="" class="btn btn-primary btn-sm me-2">Edit</a> --}}
                                            <a onclick="return confirm('Are you sure you want to delete it?')" href="{{ url('comment/'.$comment->id.'/delete') }}" class="btn btn-danger btn-sm me-2">Delete</a>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        @empty
                            <div class="card card-body shodow-sm mt-3">
                                <h6>No Comments</h6>

                            </div>
                        @endforelse



                    </div>
                </div>

                <div class="col-md-4">
                    <div class="border p-2 my-2">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="border p-2 my-2">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="border p-2 my-2">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($latestPosts as $latestPost)
                                <a href="{{ url('tutorial/' . $latestPost->category->slug . '/' . $latestPost->slug) }}"
                                    class="text-decoration-none">
                                    <h6> > {{ $latestPost->name }} </h6>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
