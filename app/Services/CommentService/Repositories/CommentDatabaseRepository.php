<?php

namespace App\Services\CommentService\Repositories;

use App\Models\Comment;
use App\Services\CommentService\Objects\CommentDTO;
use Illuminate\Database\Eloquent\Collection;

class CommentDatabaseRepository implements CommentRepositoryInterface
{
    private Comment $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @param $postId
     * @return Collection
     */
    public function getCommentsByPostId($postId): Collection
    {
        return $this->comment::with('user')->where('post_id', $postId)->get();
    }

    /**
     * @param CommentDTO $commentDTO
     * @return Comment
     */
    public function create(CommentDTO $commentDTO): Comment
    {
        return $this->comment::create([
            'user_id' => $commentDTO->requestUserId,
            'post_id' => $commentDTO->postId,
            'comment_text' => $commentDTO->commentText,
        ]);
    }

    /**
     * @param CommentDTO $commentDTO
     * @return Comment
     */
    public function update(CommentDTO $commentDTO): Comment
    {
        $comment = $this->comment::find($commentDTO->id);
        $comment->comment_text = $commentDTO->commentText;
        $comment->save();

        return $comment;
    }

    public function delete($id): int
    {
        $comment = $this->comment::find($id);
        $postId = $comment->post_id;
        $comment->delete();

        return $postId;
    }
}
