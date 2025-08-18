<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{

    use RefreshDatabase;

    public function test_return_success_on_login_page(): void
    {
        $response = $this->get(route("login"));

        $response->assertStatus(200);
    }

    public function test_return_success_on_signup_page(): void
    {
        $response = $this->get(route("signup"));

        $response->assertStatus(200);
    }

    public function test_return_success_on_forgot_password_page(): void
    {
        $response = $this->get(route("password.request"));

        $response->assertStatus(200);
    }

    public function test_redirect_to_login_page_while_accessing_car_create_as_guest_user(): void {
        /**
         * @var \Illuminate\Testing\TestResponse $response
         */
        $response = $this->get(route('car.create'));
        $response->assertRedirectToRoute('login');
        $response->assertStatus(302);
    }
}
