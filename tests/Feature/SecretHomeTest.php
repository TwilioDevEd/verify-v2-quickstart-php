<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SecretHomeTest extends TestCase
{
    /**
     * Anonymous user is redirected to login
     *
     * @return void
     */
    public function testAnonymousUserRedirectsToLogin()
    {
        $response = $this->get('/');

        $response->assertRedirect('/login');
    }

    /**
     * Logged in user is redirected to login
     *
     * @return void
     */
    public function testLoggedInNotVerifiedUserRedirectsToVerify()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/');

        $response->assertRedirect('/verify');
    }

    /**
     * Anonymous user is redirected to login
     *
     * @return void
     */
    public function testLoggedAndVerifiedUserReturnsHomeView()
    {
        $user = factory(User::class)->make();
        $user->markPhoneAsVerified();

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
        $response->assertSee("Secrets");
    }
}
