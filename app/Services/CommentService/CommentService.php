<?php

namespace App\Services\CommentService;

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
     * @param int $id
     * @return Collection
     */
    public function getCommentsByPostId(int $id): Collection
    {
        $collection = $this->commentRepository->getCommentsByPostId($id);
        return $this->generateCommentDTOCollection($collection);
    }

    /**
     * @param Request $request
     * @return Collection
     */
    public function create(Request $request): Collection
    {
        $postId = $this->commentRepository->create($request);
        return $this->getCommentsByPostId($postId);
    }

    /**
     * @param Request $request
     * @return Collection
     */
    public function update(Request $request): Collection
    {
        $id = $request->json('commentId');
        $postId = $this->commentRepository->update($request, $id);

        return $this->getCommentsByPostId($postId);
    }

    /**
     * @param Request $request
     * @return Collection
     */
    public function delete(Request $request): Collection
    {
        $postId = $this->commentRepository->delete($request->json('commentId'));
        return $this->getCommentsByPostId($postId);
    }

    /**
     * @param Collection $collection
     * @return Collection
     */
    private function generateCommentDTOCollection(Collection $collection): Collection
    {
        $comments = collect();
        foreach ($collection as $item) {
            $comment = new CommentDTO(
                $item->id,
                request()->user()->id,
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
