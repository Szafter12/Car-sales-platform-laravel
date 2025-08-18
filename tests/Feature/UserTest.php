<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_redirect_guest_user_while_accessing_to_profile_page(): void
    {
        /**
         * @var \Illuminate\Testing\TestResponse $response
         */

        $response = $this->get(route('profile.index'));
        $response->assertRedirectToRoute('login');
        $response->assertStatus(302);
    }
}
