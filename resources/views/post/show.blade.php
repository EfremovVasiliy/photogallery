<?php

?>

@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div class="col-lg-6 m-auto">
            <h2>{{$post->title}}</h2>
            <small>{{$post->user->name}}</small>
            <p>{{$post->description}}</p>
            <img class="img-fluid mb-3" src="{{ asset('/storage/'. $post->file_path) }}" alt="{{ $post->description }}">
            @if(request()->user()->id === $post->user->id)
                <div class="mb-3">
                    <form method="post" action="{{ route('post.destroy', $post->id) }}">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Delete post" class="btn btn-danger">
                    </form>
                </div>
            @endif
            <div>
                @if($comments)
                    @foreach($comments as $comment)
                        <div class="comment-item">
                            <div class="d-flex justify-content-between">
                                <small>{{ $comment->user->name }}</small>
                                @if(request()->user()->id === $comment->user_id)
                                    <div class="actions d-flex justify-content-between mb-1">
                                        <small class="me-1">
                                            <form action="{{ route('comment.update')  }}">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $comment->id }}">
                                                <input type="submit" value="Update" class="btn btn-sm btn-primary">
                                            </form>
                                        </small>
                                        <small class="">
                                            <form action="{{ route('comment.delete')  }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $comment->id }}">
                                                <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                            </form>
                                        </small>
                                    </div>
                                @endif
                            </div>
                            <p>{{ $comment->comment_text }}</p>
                        </div>
                        <hr>
                    @endforeach
                @endif

            </div>
            <div>
                <form action="{{ route('comment.create') }}" method="post">
                    @csrf
                    <label>
                        <input type="text" name="comment" class="form-control">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                    </label>
                    <input type="submit" value="Send" class="btn btn-outline-primary">
                </form>
            </div>
        </div>
    </div>
@endsection

