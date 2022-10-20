<?php

namespace App\Services\PostService\Objects;

class PostDTO
{
    public function __construct(
        public int|null $id = null,
        public string|null $title = null,
        public int|null $userId = null,
        public string|null $description = null,
        public string|null $file_path = null
    ) {}
}
