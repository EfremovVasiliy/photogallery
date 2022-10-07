<?php

namespace App\Services\CommentService;

use App\Services\CommentService\Repositories\CommentRepositoryInterface;
use Illuminate\Http\Request;

class CommentService
{
    private CommentRepositoryInterface $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function getCommentsByPostId(int $id)
    {
        return $this->commentRepository->getCommentsByPostId($id);
    }

    public function create(Request $request): void
    {
        $this->commentRepository->create($request);
    }

    public function update(Request $request, int $id): void
    {
        $this->commentRepository->update($request, $id);
    }

    public function delete(Request $request): void
    {
        $this->commentRepository->delete($request->input('id'));
    }
}
