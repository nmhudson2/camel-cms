<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /**
     * Test that Users can be created from other users
     */
    public function test_users_can_be_created()
    {
        $response = $this->actingAs($this->user)
            ->post('/new-user', ['new_email' => 'testuser@email.com', 'new_password' => '7890']);

        $response->assertStatus(201); // Assuming you return a status of 201 upon successful user creation
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']); // Check if the user is actually stored in the database
    }
}
