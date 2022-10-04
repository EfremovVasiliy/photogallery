<?php

?>

@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div class="col-lg-6 m-auto">
            @foreach($postList as $post)
                <h3><a href={{ url("/post/{$post->id}") }}>{{$post->title}}</a></h3>
                <small>{{$post->user_id}}</small>
                <p>{{$post->content}}</p>
                <hr>
            @endforeach
        </div>
    </div>
@endsection
