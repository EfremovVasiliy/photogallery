<?php

namespace App\Services\CommentService\Objects;

class CommentDTO
{
    public function __construct(
        public int|null $id = null,
        public int|null $requestUserId = null,
        public int|null $postId = null,
        public string|null $commentText = null,
        public string|null $authorName = null,
        public int|null $authorId = null,
        public string|null $date = null
    ) {}
}
