<?php

?>

@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div class="col-lg-6 m-auto">
            @foreach($postList as $post)
                <h3><a href={{ url("/post/{$post->id}") }}>{{$post->title}}</a></h3>
                <small>{{$post->user->name}}</small>
                <p>{{$post->description}}</p>
                <img class="img-fluid" src="{{ asset('/storage/'. $post->file_path) }}" alt="{{ $post->title }}">
                <hr>
            @endforeach
        </div>
    </div>
@endsection
