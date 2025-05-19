<?php

namespace Tests\Unit;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_automatically_generates_slug_from_title_on_creation()
    {
        $post = Post::create([
            'title' => 'Test Post Title',
            'content' => 'Test content',
            'is_featured' => false,
            'is_published' => true,
        ]);

        $this->assertEquals('test-post-title', $post->slug);
    }

    /** @test */
    public function it_updates_slug_when_title_changes()
    {
        $post = Post::create([
            'title' => 'Original Title',
            'content' => 'Test content',
            'is_featured' => false,
            'is_published' => true,
        ]);

        $this->assertEquals('original-title', $post->slug);

        $post->update([
            'title' => 'Updated Title',
        ]);

        $this->assertEquals('updated-title', $post->slug);
    }
}