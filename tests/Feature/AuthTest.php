<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_with_email_only(): void
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Email User',
            'email' => 'email@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('user.email', 'email@example.com')
            ->assertJsonPath('user.phone_number', null);

        $this->assertDatabaseHas('users', [
            'email' => 'email@example.com',
            'phone_number' => null,
        ]);
    }

    public function test_user_can_register_with_phone_only(): void
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Phone User',
            'phone_number' => '0812-3456-7890',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('user.email', null)
            ->assertJsonPath('user.phone_number', '081234567890');

        $this->assertDatabaseHas('users', [
            'email' => null,
            'phone_number' => '081234567890',
        ]);
    }

    public function test_register_requires_email_or_phone_number(): void
    {
        $response = $this->postJson('/api/register', [
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['email', 'phone_number']);
    }

    public function test_user_can_login_with_email(): void
    {
        User::factory()->create([
            'email' => 'email@example.com',
            'phone_number' => null,
            'password' => 'password',
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'email@example.com',
            'password' => 'password',
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('user.email', 'email@example.com');
    }

    public function test_user_can_login_with_phone_number(): void
    {
        User::factory()->create([
            'email' => null,
            'phone_number' => '+6281234567890',
            'password' => 'password',
        ]);

        $response = $this->postJson('/api/login', [
            'phone_number' => '+62 812-3456-7890',
            'password' => 'password',
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('user.phone_number', '+6281234567890');
    }
}
