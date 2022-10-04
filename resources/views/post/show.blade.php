<?php
/**
 * @var $post object
 */
?>

@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div class="col-lg-6 m-auto">
            <h2>{{$post->title}}</h2>
            <small>{{$post->user_id}}</small>
            <p>{{$post->content}}</p>
            <form method="post" action="{{ route('post.destroy', $post->id) }}">
                @method('DELETE')
                @csrf
                <input type="submit" value="Delete post" class="btn btn-danger">
            </form>
        </div>
    </div>
@endsection
