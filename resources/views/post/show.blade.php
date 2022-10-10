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
            <div class="comment-field">
                @if($comments)
                    @foreach($comments as $comment)
                        <div class="comment-item">
                            <div class="d-flex justify-content-between">
                                <small>{{ $comment->authorName }}</small>
                                @if($comment->userId === $comment->authorId)
                                    <div class="actions d-flex justify-content-between mb-1">
                                        <small class="me-1">
                                            <form id="comment-update-form"  action="{{ route('comment.update')  }}">
                                                @method('PUT')
                                                @csrf
                                                <input data-comment-id="{{ $comment->id }}" type="hidden" name="id">
                                                <input type="submit" value="Update" class="btn btn-sm btn-primary">
                                            </form>
                                        </small>
                                        <small class="">
                                            <form class="comment-delete-form" action="{{ route('comment.delete')  }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <input data-comment-id="{{ $comment->id }}" type="hidden" name="id">
                                                <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                            </form>
                                        </small>
                                    </div>
                                @endif
                            </div>
                            <p>{{ $comment->commentText }}</p>
                        </div>
                        <hr>
                    @endforeach
                @endif

            </div>
            <div>
                <form class="comment-form" action="{{ route('comment.create') }}" method="post">
                    @csrf
                    <div class="w-100">
                        <textarea id="comment_textarea" placeholder="Your comment" name="comment" rows="2" class="form-control"></textarea>
                        <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}"><br>
                    </div>

                    <input type="submit" value="Send comment" class="btn btn-primary">
                    <input type="reset" value="Clear comment" class="btn btn-dark">
                </form>
            </div>
        </div>
    </div>
@endsection

