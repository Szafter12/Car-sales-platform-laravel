<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/** @var \Illuminate\Testing\TestResponse $response */

class UserTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_should_redirect_guest_user_while_accessing_to_profile_page(): void
    {
        $response = $this->get(route('profile.index'));
        $response->assertRedirectToRoute('login');
        $response->assertFound();
    }
}
