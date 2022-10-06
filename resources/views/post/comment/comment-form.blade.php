@extends('post.show')

@section('comment-form')
    <div>
        <form action="{{ route('comment.create') }}" method="post">
            @csrf
            <label>
                <input type="text" name="comment" class="form-control">
            </label>
            <input type="submit" value="Send" class="btn btn-default">
        </form>
    </div>
@endsection

