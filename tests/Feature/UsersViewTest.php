<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class UsersViewTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUsersReturnsUsersList()
    {
        User::create([
            'name' => 'username',
            'email' => '',
            'password' => 'the password',
            'phone_number' => '+1234567890',
        ]);

        $response = $this->get('/users');

        $response->assertStatus(200);
        $response->assertSee('username');
        $response->assertSee('+1234567890');
    }
}
