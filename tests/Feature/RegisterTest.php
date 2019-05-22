<?php

namespace Tests\Feature;

use App\Verify\Result;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * Test register view shows the resiter form.
     *
     * @return void
     */
    public function testGetReturns200()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSee('Register');
    }

    public function testPostValidDataReturnsRedirectToVerify()
    {
        $this->mock(\App\Verify\Service::class, function ($mock) {
            $mock->shouldReceive('startVerification')->with('+1234567890', 'sms')
                ->once()->andReturn(new Result('sid'));
        });

        $response = $this->post('/register', [
            'name' => 'username',
            'password' => 'the password',
            'full_phone' => '+1234567890',
            'channel' => 'sms',
        ]);

        $response->assertRedirect('/verify');
    }

    public function testPostAndStartVerificationFailsReturnsRegisterView()
    {
        $this->mock(\App\Verify\Service::class, function ($mock) {
            $mock->shouldReceive('startVerification')->with('+1234567890', 'sms')
                ->once()->andReturn(new Result(['Failed']));
        });

        $response = $this->post('/register', [
            'name' => 'username',
            'password' => 'the password',
            'full_phone' => '+1234567890',
            'channel' => 'sms',
        ]);

        $response->assertStatus(200);
        $response->assertSee("Register");
    }
}
