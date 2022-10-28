<?php

?>

@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div class="col-lg-6 m-auto">
            @foreach($postList as $post)
                <h3><a href={{ url("/post/{$post->id}") }}>{{$post->title}}</a></h3>
                <small><a class="text-decoration-none" href="{{ route('user.show', $post->user_id) }}">{{$post->user->name}}</a></small>
                <p>{{$post->description}}</p>
                <img class="img-fluid" src="{{ asset('/storage/'. $post->file_path) }}" alt="{{ $post->title }}">
                <div class="pt-2 d-flex justify-content-between">
                    <small >Likes: {{ $post->likes_count }}</small>
                    <small >Comments: {{ $post->comments_count }}</small>
                </div>

                <hr>
            @endforeach
        </div>
    </div>
@endsection
