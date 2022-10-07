<?php

namespace App\Services\CommentService\Repositories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CommentDatabaseRepository implements CommentRepositoryInterface
{
    private Comment $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function getCommentsByPostId($id): Collection
    {
        return $this->comment::all()->where('post_id', $id);
    }

    public function create(Request $request): void
    {
        $this->comment::create([
            'user_id' => $request->user()->id,
            'post_id' => $request->input('post_id'),
            'comment_text' => $request->input('comment')
        ]);
    }

    public function update(Request $request, int $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        $comment = $this->comment::find($id);
        $comment->delete();
    }
}
