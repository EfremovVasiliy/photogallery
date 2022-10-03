<?php

?>

<div>
    @foreach($postList as $post)
        <h3>{{$post->title}}</h3>
        <small>{{$post->user_id}}</small>
        <p>{{$post->content}}</p>
        <hr>
    @endforeach
</div>
