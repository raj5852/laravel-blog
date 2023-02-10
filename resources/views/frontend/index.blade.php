@extends('layouts.app')
@section('title', 'Blogging')
@section('meta_description', 'DEscription')
@section('meta_keyword', 'keyword')

@section('content')

    <div class="bg-danger py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="owl-carousel category-carousel owl-theme">
                        @foreach ($categories as $categoryItm)
                            <div class="item">
                                <a href="{{ url('tutorial/' . $categoryItm->slug) }}" class="text-decoration-none">
                                    <div class="card">
                                        <img style="height: 170px"
                                            src="{{ asset('uploads/category/' . $categoryItm->image) }}" alt="">
                                        <div class="card-body">
                                            <h4>{{ $categoryItm->name }}</h4>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        @endforeach


                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="py-1 bg-gray">
        <div class="container">
            <div class="border text-center p-3">
                <h3>Advertise</h3>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Funda of web it</h4>
                    <div class="underline"> </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, deleniti mollitia, saepe quibusdam
                        expedita, blanditiis quod dolor magni error fugit consequuntur praesentium ipsa laudantium quos
                        numquam nesciunt provident dolorum alias!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, deleniti mollitia, saepe quibusdam
                        expedita, blanditiis quod dolor magni error fugit consequuntur praesentium ipsa laudantium quos
                        numquam nesciunt provident dolorum alias!
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="py-5 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>All Categories List</h4>
                    <div class="underline"> </div>
                </div>
                @foreach ($categories as $category)
                    <div class="col-md-3">
                        <div class="card card-body mb-3">
                            <a href="{{ url('tutorial/' . $category->slug) }}" class="text-decoration-none">
                                <h5 class="text-dark mb-0">{{ $category->name }} </h5>

                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Latest Posts</h4>
                    <div class="underline"> </div>
                </div>
                <div class="col-md-8">
                    @foreach ($posts as $post)
                            <div class="card card-body bg-gray shodow mb-3">
                                <a href="{{ url('tutorial/' . $post->category->slug . '/' . $post->slug) }}"
                                    class="text-decoration-none">
                                    <h5 class="text-dark mb-0">{{ $post->name }} </h5>
                                </a>
                                <h6>Posted on: {{ $post->created_at->format('d-m-Y') }} </h6>
                            </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="border text-center p-3">
                        <h3>Advertise</h3>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
