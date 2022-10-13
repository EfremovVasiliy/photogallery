<?php

?>

@extends('layouts.app')
@section('content')
    <div class="p-3">
        <div class="col-lg-10 m-auto">
            <p>{{ $posts->user->name }}</p>
            <div class="d-flex justify-content-between flex-wrap">
                @foreach($posts->posts as $post)
                    <div class="w-25">
                        <a class="text-decoration-none" href="{{ route('post.show', $post->id) }}">
                            <div>
                                <h6>{{ $post->title }}</h6>
                                <p>{{ mb_substr($post->description, 0, 10) }}</p>
                                <img class="img-fluid" src="{{ asset('/storage/'. $post->file_path) }}"
                                     alt="{{ $post->title }}">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
