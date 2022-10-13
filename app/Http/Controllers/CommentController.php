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
        return response()->json($this->commentService->create($request));
    }

    public function update(UpdateCommentRequest $request)
    {
        return response()->json($this->commentService->update($request));
    }

    public function delete(DeleteCommentRequest $request)
    {
        return response()->json($this->commentService->delete($request));
    }
}
