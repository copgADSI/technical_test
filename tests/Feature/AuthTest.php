<?php

namespace Tests\Feature;

use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Test that a user can register
     */
    public function testRegisterUserIsSuccessful(): void
    {
        $randomPassword = \Str::random(10);

        $user = User::factory()->make([
            'terms' => true
        ])->toArray();

        $form = [
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => $randomPassword,
            'password_confirmation' => $randomPassword,
            'terms' => true
        ];

        $response = $this->post(route('auth.register', $form));
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'name' => $user['name'],
            'email' => $user['email'],
        ]);
    }


    /**
     * Test that a user can't register
     */
    public function testRegisterUserFail(): void
    {

        $randomPassword = \Str::random(10);

        $user = User::factory()->make([
            'terms' => false
        ])->toArray();

        $form = [
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => $randomPassword,
            'password_confirmation' => $randomPassword,
            'terms' => false
        ];

        $response = $this->post(route('auth.register', $form));
        $this->assertDatabaseMissing('users', [
            'name' => $user['name'],
            'email' => $user['email'],
        ]);
    }
}
