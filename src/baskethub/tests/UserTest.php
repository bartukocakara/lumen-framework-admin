<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    private const API_PREFIX = "api";

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_jwt_login() : void
    {
        $payload = [
            "email" => "test@gmail.com",
            "password" => "123456"
        ];
        $headers = [
            "Accept" => "application/json",
        ];
        $test = $this->call('POST', self::API_PREFIX."/v1/auth/login", $payload, $headers);
        $test->assertJson(json_decode($test->getContent(), true));
        $test->assertStatus(200);
    }

    public function test_register() : void
    {
        $payload = [
            "email" => "deneme-bartu@gmail.com",
            "password" => "123456",
            "first_name" => "bartu",
            "last_name" => "kocakara",
            "birthday" => "06/06/1993",
        ];
        $headers = [
            "Accept" => "application/json",
        ];
        $test = $this->call('POST', self::API_PREFIX."/v1/auth/register", $payload, $headers);
        $test->assertJson(json_decode($test->getContent(), true));
        $test->assertStatus(201);
    }
}
