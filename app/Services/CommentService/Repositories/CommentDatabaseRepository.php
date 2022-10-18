<?php

namespace App\Services\CommentService\Repositories;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

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

    public function create(Request $request): Comment
    {
        return $this->comment::create([
            'user_id' => $request->user()->id,
            'post_id' => $request->json('postId'),
            'comment_text' => $request->json('commentText'),
        ]);
    }

    public function update(Request $request, int $id): Comment
    {
        $comment = $this->comment::find($id);
        $postId = $comment->post_id;
        $comment->comment_text = $request->json('commentText');
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
