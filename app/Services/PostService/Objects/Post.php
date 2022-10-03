<?php

namespace App\Services\PostService\Objects;

class Post
{
    private string $title;
    private int $author;
    private string $content;

    public function __construct(string $title, int $author, string $content)
    {
        $this->title = $title;
        $this->author = $author;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getAuthor(): int
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
