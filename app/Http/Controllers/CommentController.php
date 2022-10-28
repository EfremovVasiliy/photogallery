<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CreateCommentRequest;
use App\Http\Requests\Comment\DeleteCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Services\CommentService\CommentService;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    private CommentService $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * @param CreateCommentRequest $request
     * @return JsonResponse
     */
    public function create(CreateCommentRequest $request): JsonResponse
    {
        $comment = $this->commentService->create($request);
        return response()->json($this->commentService->getCommentsByPostId($request, $comment->post_id));
    }

    /**
     * @param UpdateCommentRequest $request
     * @return JsonResponse
     */
    public function update(UpdateCommentRequest $request): JsonResponse
    {
        $comment = $this->commentService->update($request);
        return response()->json($this->commentService->getCommentsByPostId($request, $comment->post_id));
    }

    /**
     * @param DeleteCommentRequest $request
     * @return JsonResponse
     */
    public function delete(DeleteCommentRequest $request): JsonResponse
    {
        return response()->json($this->commentService->delete($request));
    }
}
