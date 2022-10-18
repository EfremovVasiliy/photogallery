<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CreateCommentRequest;
use App\Http\Requests\Comment\DeleteCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Services\CommentService\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private CommentService $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function create(CreateCommentRequest $request)
    {
        $comment = $this->commentService->create($request);
        return response()->json($this->commentService->getCommentsByPostId($request, $comment->post_id));
    }

    public function update(UpdateCommentRequest $request)
    {
        $comment = $this->commentService->update($request);
        return response()->json($this->commentService->getCommentsByPostId($request, $comment->post_id));
    }

    public function delete(DeleteCommentRequest $request)
    {
        return response()->json($this->commentService->delete($request));
    }
}
