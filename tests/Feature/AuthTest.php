<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/** @var \Illuminate\Testing\TestResponse $response */

class AuthTest extends TestCase
{

    use RefreshDatabase;

    public function test_should_return_success_on_login_page(): void
    {
        $response = $this->get(route("login"));

        $response->assertOk()
            ->assertSee("Login")
            ->assertSee("Forgot password?")
            ->assertSee("Signup for free")
            ->assertSee("Facebook")
            ->assertSee("Google")
            ->assertSee('<a href="'.route('password.request').'"', false)
            ->assertSee('<a href="'.route('login.oauth', 'google').'"', false)
            ->assertSee('<a href="'.route('login.oauth', 'facebook').'"', false)
            ->assertSee('<a href="'.route('signup').'"', false);
    }

    public function test_should_return_success_on_signup_page(): void
    {
        $response = $this->get(route("signup"));

        $response->assertOk()
            ->assertSee("Sign up")
            ->assertSee("Click here to login")
            ->assertSee("Facebook")
            ->assertSee("Google")
            ->assertSee('<a href="'.route('login.oauth', 'google').'"', false)
            ->assertSee('<a href="'.route('login.oauth', 'facebook').'"', false)
            ->assertSee('<a href="'.route('login').'"', false);
    }

    public function test_should_return_success_on_forgot_password_page(): void
    {
        $response = $this->get(route("password.request"));

        $response->assertOk();
    }
}
