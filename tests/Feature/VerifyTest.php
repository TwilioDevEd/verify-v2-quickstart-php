<?php

namespace Tests\Feature;

use App\User;
use App\Verify\Result;
use Tests\TestCase;

class VerifyTest extends TestCase
{
    /**
     * Test redirect to login when anonymous user.
     *
     * @return void
     */
    public function testGetWithAnonymousUserRedirectsToLogin()
    {
        $response = $this->get('/verify');

        $response->assertRedirect('/login');
    }

    /**
     * Test show the verify form is user logged in.
     *
     * @return void
     */
    public function testGetWithLoggedInUserShowVerifyFrom()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/verify');

        $response->assertStatus(200);
        $response->assertSee('Verify');
    }


    public function testPostValidDataReturnsRedirectToHome()
    {
        $user = factory(User::class)->make();
        $user->fill([
            'phone_number' => '+1234567890',
        ])->save();

        $this->mock(\App\Verify\Service::class, function ($mock) {
            $mock->shouldReceive('checkVerification')->with('+1234567890', '123456')
                ->once()->andReturn(new Result('sid'));
        });

        $response = $this->actingAs($user)->post('/verify', [
            'code' => '123456',
        ]);

        $response->assertRedirect('/');
    }

    public function testPostAndCheckVerificationFailsReturnsVerifyView()
    {
        $user = factory(User::class)->make();
        $user->fill([
            'phone_number' => '+1234567890',
        ])->save();

        $this->mock(\App\Verify\Service::class, function ($mock) {
            $mock->shouldReceive('checkVerification')->with('+1234567890', '123456')
                ->once()->andReturn(new Result(['Failed']));
        });

        $response = $this->actingAs($user)->post('/verify', [
            'code' => '123456',
        ]);

        $response->assertStatus(200);
        $response->assertSee("Verify");
    }
}
