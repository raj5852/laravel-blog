@extends('layouts.app')
@section('title',"{$categoryPost->posts[0]->meta_title}")
@section('meta_description',"{$categoryPost->posts[0]->meta_description}")
@section('meta_keyword',"{$categoryPost->posts[0]->meta_keyword}")

@section('content')

    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="category-heading">
                        <h4>{!!$categoryPost->posts[0]->name!!} </h4>
                    </div>
                    <div class="mt-3">
                        <h6><a href="{{ url('tutorial/'.$categoryPost->slug) }}">{{ $categoryPost->name }}</a> /  {{ $categoryPost->posts[0]->name }}  </h6>
                    </div>
                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                            {!! $categoryPost->posts[0]->description!!}
                        </div>
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
                            <a href="{{ url('tutorial/'.$latestPost->category->slug.'/'.$latestPost->slug) }}" class="text-decoration-none">
                                <h6> > {{$latestPost->name}} </h6>
                            </a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
