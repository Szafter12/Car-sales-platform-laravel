<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

/** @var \Illuminate\Testing\TestResponse $response */

class WatchlistTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_not_be_able_to_access_watchlist_page_as_guest_user(): void
    {
        $response = $this->get(route('watchlist.index'));
        $response->assertRedirectToRoute('login');
        $response->assertFound();
    }

    public function test_should_be_able_to_access_watchlist_page_as_auth_user(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('watchlist.index'));
        $response->assertOk();
    }
}
