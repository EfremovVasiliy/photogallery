<?php

namespace App\Services\PostService\Objects;

use App\Models\User;
use Illuminate\Support\Collection;

class UsersPostsDTO
{
    public function __construct(
        public User $user,
        public Collection $posts
    ) {}
}
