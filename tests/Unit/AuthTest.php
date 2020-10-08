<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Config;
use Tests\TestCase as TestCase; //Good ol' unit and feature tests framework
use PHPUnit\Framework\TestCase as IDontHaveTheTimeForThisFancyDistinctionNow;


class AuthTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testLogin()
    {
        $baseUrl = Config::get('app.url') . '/api/auth/login';
        $email = Config::get('api.apiEmail');
        $password = Config::get('api.apiPassword');

        $response = $this->json('POST', $baseUrl . '/', [
            'email' => $email,
            'password' => $password
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'access_token', 'token_type', 'expires_in'
            ]);
    }


}
