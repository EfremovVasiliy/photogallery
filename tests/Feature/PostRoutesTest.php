<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostRoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_root()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_post_index():void
    {
        $response = $this->get('/post');

        $response->assertStatus(302);
    }

    public function test_post_show(): void
    {
        $response = $this->get('/post/1');

        $response->assertStatus(302);
    }
}
