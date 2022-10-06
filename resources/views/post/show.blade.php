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
            <p>{{$post->description}}</p>
            <img class="img-fluid mb-3" src="{{ asset('/storage/'. $post->file_path) }}" alt="{{ $post->description }}">
            @if(request()->user()->id === $post->user_id)
                <form method="post" action="{{ route('post.destroy', $post->id) }}">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Delete post" class="btn btn-danger">
                </form>
            @endif
        </div>
    </div>
@endsection
