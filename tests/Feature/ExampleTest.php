<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Task;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_only_user_can_save_task(): void
    {
        // ----------------- Test Create a task -------------
        $this->actingAs($user = User::factory()->create());

        $response = $this->post('/tasks', [
            'Name' => 'test',
            'Detail' => 'test test',
            'Deadline' => '2023-06-06',
            'Completed' => 0,
        ]);

        $response->assertSessionHasNoErrors();
        $lastTask = Task::where('User_id', $user->id)->orderBy('id', 'DESC')->first();
        $this->assertEquals('test', $lastTask->Name);


        // Test update a task
        $updateTask = [
            'Name' => 'test changed',
            'Detail' => 'test test',
            'Deadline' => '2023-06-06',
            'Completed' => 0,
        ];

        $this->put('/tasks/'.$lastTask->id, $updateTask);
        $lastTask = Task::where('User_id', $user->id)->orderBy('id', 'DESC')->first();
        $this->assertEquals('test changed', $lastTask->Name);

        // Test another user can't update this task
        $this->actingAs($user2 = User::factory()->create());
        $updateTask['name'] = 'na should not change';
        $this->put('/tasks/'.$lastTask->id, $updateTask);

        $lastTask = Task::where('User_id', $user->id)->orderBy('id', 'DESC')->first();
        $this->assertEquals('test changed', $lastTask->Name);
    }
}
