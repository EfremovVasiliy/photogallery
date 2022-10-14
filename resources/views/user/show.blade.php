<?php

?>

@extends('layouts.app')
@section('content')
    <div class="p-3">
        <div class="col-lg-8 m-auto">
            <p>{{ $user->name }}</p>
            <div class="d-flex justify-content-between flex-wrap">
                @foreach($user->posts as $post)
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
