<?php

namespace Tests\Feature\Blog;

use App\Models\Blog;
use Tests\TestCase;

class BlogTest extends TestCase
{
    /**
     * Тестирование получения всех записей
     */
    public function testGetList()
    {
        $response = $this->get('/api/blogs');

        $response->assertStatus(200);
    }

    /**
     * Тестирование добавления записи
     */
    public function testBlogCreate()
    {
        $response = $this->post('/api/blogs', [
            'title'=> 'title-123',
            'date' => '2000-10-10',
            'content' => 'content-123',
        ]);

        $response->assertJsonPath('data.title', "title-123");

        $this->assertDatabaseHas('blogs', [
            'title' => 'title-123',
        ]);
    }

    /**
     * Тестирование редактирования записи
     */
    public function testUpdateBlog()
    {
        $factory =  Blog::factory()->create();

        $blog = $factory->getAttributes();

        $id = $blog['id'];

        $response = $this->put("/api/blogs/$id", [
            'title'=> 'title-456',
            'date' => '2011-11-11',
            'content' => 'content-456',
        ]);

        $response->assertJsonPath('data.title', "title-456");

        $this->assertDatabaseHas('blogs', [
            'title' => 'title-456',
        ]);
    }

    /**
     * Тестирование удаления записи
     */
    public function testDeleteBlog()
    {
        $factory =  Blog::factory()->create();

        $blog = $factory->getAttributes();

        $id = $blog['id'];

        $response = $this->delete("/api/blogs/$id");

        $response->assertJsonMissing([
                'id' => $id,
            ]);
    }
}
