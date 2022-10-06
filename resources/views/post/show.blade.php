<?php

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
                <div class="mb-3">
                    <form method="post" action="{{ route('post.destroy', $post->id) }}">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Delete post" class="btn btn-danger">
                    </form>
                </div>
            @endif
            <div>
                <form action="{{ route('comment.create') }}" method="post">
                    @csrf
                    <label>
                        <input type="text" name="comment" class="form-control">
                    </label>
                    <input type="submit" value="Send" class="btn btn-outline-primary">
                </form>
            </div>
        </div>
    </div>
@endsection

