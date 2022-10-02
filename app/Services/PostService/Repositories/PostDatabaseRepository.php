<?php

namespace App\Services\PostService\Repositories;

use App\Models\Post;
use App\Services\PostService\Repositories\PostRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PostDatabaseRepository implements PostRepositoryInterface
{
    public function find(int $id)
    {
        $post = DB::table('posts')->where('id', $id)->first();

        return $post;
    }

    public function getPosts(): string
    {
        return DB::table('posts')->get();
    }
}
