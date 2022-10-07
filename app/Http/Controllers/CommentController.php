<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CreateCommentRequest;
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
        $this->commentService->create($request);
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $this->commentService->update($request, 1);
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $this->commentService->delete($request);
        return redirect()->back();
    }
}
