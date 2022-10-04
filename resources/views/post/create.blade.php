<?php

use Collective\Html\FormFacade as Form;

?>

@extends('layouts.app')
@section('content')
    <div class="m-md-4">
    <h1>create post</h1>

    {!! Form::open(['route' => 'post.store']) !!}
    @csrf

        <div class="col-lg-4">
            <div class="form-group mb-3">
                {!! Form::label('Title', null, ['class' => 'form-label']) !!}
                {!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group mb-3">
                {!! Form::label('Content') !!}
                {!! Form::input('text', 'content', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group mb-3">
                {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

    {!! Form::close() !!}

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    </div>
@endsection
