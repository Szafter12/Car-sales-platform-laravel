<?php

namespace Tests\Feature;

use App\Models\User;
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

    public function test_sholud_not_login_with_wrong_credentials(): void {
        $user = User::factory()->create([
            'email' => 'essa@essa.com',
            'password' => bcrypt('password')
        ]);
        /** @var \Illuminate\Testing\TestResponse $response */
        $response = $this->post(route('login.store'), [
            'email'=> $user->email,
            'password'=> '123422'
        ]);

        $response->assertStatus(302)
        ->assertSessionHasErrors(['email']);
        // lub ->assertInvalid(['email'])
    }

     public function test_sholud_login_with_correct_credentials(): void {
        $user = User::factory()->create([
            'email' => 'essa@essa.com',
            'password' => bcrypt('password')
        ]);
        /** @var \Illuminate\Testing\TestResponse $response */
        $response = $this->post(route('login.store'), [
            'email'=> $user->email,
            'password'=> 'password'
        ]);

        $response->assertStatus(302)
        ->assertRedirectToRoute('home')
        ->assertSessionHas(['success']);
    }

    public function test_sholud_not_register_with_wrong_credentials(): void {
        $user = User::factory()->create([
            'email' => 'essa@essa.com',
            'password' => bcrypt('password')
        ]);
        /** @var \Illuminate\Testing\TestResponse $response */
        $response = $this->post(route('login.store'), [
            'email'=> $user->email,
            'password'=> '123422'
        ]);

        $response->assertStatus(302)
        ->assertSessionHasErrors(['email']);
        // lub ->assertInvalid(['email'])
    }

     public function test_sholud_login_with_correct_credentials(): void {
        $user = User::factory()->create([
            'email' => 'essa@essa.com',
            'password' => bcrypt('password')
        ]);
        /** @var \Illuminate\Testing\TestResponse $response */
        $response = $this->post(route('login.store'), [
            'email'=> $user->email,
            'password'=> 'password'
        ]);

        $response->assertStatus(302)
        ->assertRedirectToRoute('home')
        ->assertSessionHas(['success']);
    }
    
}


