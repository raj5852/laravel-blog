@extends('layouts.master')
@section('title', 'Setting')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }} </div>
            @endif
            <div class="card-header">
                <h4>Setting </h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger"> {{ $error }} </li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ url('admin/setting') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">Website Name</label>
                        <input type="text" class="form-control"
                            @if ($setting) value="{{ $setting->website_name }}" @endif
                            name="website_name">
                    </div>
                    <div class="mb-3">
                        <label for="">Website Logo</label>
                        <input type="file" class="form-control" name="logo">
                        @if ($setting)
                            @if($setting->logo)
                            <img src="{{ asset($setting->logo) }}" style="width: 50px" alt="">
                            @endif
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">Website Favicom</label>
                        <input type="file" class="form-control" name="favicon">
                        @if ($setting)
                            @if($setting->favicon)
                            <img src="{{ asset($setting->favicon) }}" style="width: 50px" alt="">
                            @endif
                        @endif

                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">@if ($setting){{ $setting->description }}@endif</textarea>
                    </div>
                    <h4>SEO Meta Tags</h4>
                    <div class="mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title"
                            @if ($setting) value="{{ $setting->meta_title }}" @endif
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta keyword</label>
                        <textarea name="meta_keyword" rows="3" class="form-control">@if ($setting){{ $setting->meta_keyword }}@endif</textarea>

                    </div>
                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">@if ($setting){{ $setting->meta_description }}@endif</textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
