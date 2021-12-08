<?php

namespace Tests\Feature\Api;

use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoTest extends TestCase
{
    public function test_get_all()
    {
        $response = $this->getJson('/todos');

        $response->assertStatus(200);
    }

    public function test_get_all_with_total()
    {
        Todo::factory()->count(10)->create();

        $response = $this->getJson('/todos');

        $response->assertStatus(200)
                    ->assertJsonCount(10, 'data');
    }

    public function test_get_todo()
    {
        $todo = Todo::factory()->create();

        $response = $this->getJson("/todos/{$todo->id}");

        $response->assertStatus(200);
    }

    public function test_get_todo_not_found()
    {
        $response = $this->getJson('/todos/fake_value');

        $response->assertStatus(404);
    }

    public function test_validations_create()
    {
        $data = [];

        $response = $this->postJson('/todos', $data);

        $response->assertStatus(422);
    }

    public function test_create()
    {
        $data = [
            'name' => 'New Task',
            'description' => 'Description ---- test',
            'completed' => true,
        ];

        $response = $this->postJson('/todos', $data);

        $response->assertStatus(201);
    }

    public function test_update()
    {
        $todo = Todo::factory()->create();

        $data = [
            'name' => 'New Task',
            'description' => 'Description ---- test',
            'completed' => true,
        ];

        $response = $this->putJson("/todos/{$todo->id}", $data);

        $response->assertStatus(200);
    }

    public function test_update_invalid_identify()
    {
        $data = [
            'name' => 'New Task',
            'description' => 'Description ---- test',
            'completed' => true,
        ];

        $response = $this->putJson('/todos/fake_value', $data);

        $response->assertStatus(404);
    }

    public function test_update_validations()
    {
        $todo = Todo::factory()->create();

        $data = [];

        $response = $this->putJson("/todos/{$todo->id}", $data);

        $response->assertStatus(422);
    }

    public function test_delete()
    {
        $todo = Todo::factory()->create();

        $response = $this->deleteJson("/todos/{$todo->id}");

        $response->assertStatus(204);
    }
}
