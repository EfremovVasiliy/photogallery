<?php

namespace App\Services\CommentService;

use App\Models\Comment;
use App\Services\CommentService\Objects\CommentDTO;
use App\Services\CommentService\Repositories\CommentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CommentService
{
    private CommentRepositoryInterface $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param Request $request
     * @param int $postId
     * @return Collection
     */
    public function getCommentsByPostId(Request $request, int $postId): Collection
    {
        $collection = $this->commentRepository->getCommentsByPostId($postId);
        return $this->generateCommentDTOCollection($request, $collection);
    }

    /**
     * @param Request $request
     * @return Comment
     */
    public function create(Request $request): Comment
    {
        return $this->commentRepository->create($request);
    }

    /**
     * @param Request $request
     * @return Comment
     */
    public function update(Request $request): Comment
    {
        $id = $request->json('commentId');
        return $this->commentRepository->update($request, $id);
    }

    /**
     * @param Request $request
     * @return Collection
     */
    public function delete(Request $request): Collection
    {
        $postId = $this->commentRepository->delete($request->json('commentId'));
        return $this->getCommentsByPostId($request, $postId);
    }

    /**
     * @param Request $request
     * @param Collection $collection
     * @return Collection
     */
    private function generateCommentDTOCollection(Request $request, Collection $collection): Collection
    {
        $comments = collect();
        foreach ($collection as $item) {
            $comment = new CommentDTO(
                $item->id,
                $request->user()->id,
                $item->comment_text,
                $item->user->name,
                $item->user->id,
                $item->created_at
            );
            $comments->push($comment);
        }
        return $comments;
    }
}
