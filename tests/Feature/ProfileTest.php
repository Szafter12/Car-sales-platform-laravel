<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/** @var \Illuminate\Testing\TestResponse $response */

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_not_be_able_to_access_profile_page_as_guest_user()
    {
        $response = $this->get(route("profile.index"));
        $response->assertRedirectToRoute("login");
        $response->assertFound();
    }

    public function test_should_be_able_to_access_profile_page_as_auth_user()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route("profile.index"));
        $response->assertOk();
    }
}
