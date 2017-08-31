<?php

namespace Tests\Feature;

use App\Tag;
use App\Post;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RedirectsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetPost()
    {
        $user = factory(User::class)->create();

        $post = $user->posts()->save(factory(Post::class)->make());

        $response = $this->get("/post/{$post->slug}");

        $response->assertRedirect("/posts/{$post->slug}");
    }

    public function testGetTag()
    {
        $tag = factory(Tag::class)->create();

        $response = $this->get("/tag/{$tag->slug}");

        $response->assertRedirect("/tags/{$tag->slug}");
    }
}
