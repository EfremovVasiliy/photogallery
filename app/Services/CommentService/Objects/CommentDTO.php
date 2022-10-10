<?php

namespace App\Services\CommentService\Objects;

class CommentDTO
{
    public function __construct(
        public int $id,
        public int $userId,
        public string $commentText,
        public string $authorName,
        public int $authorId,
        public string $date
    ) {}
}
