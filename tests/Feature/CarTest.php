<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/** @var \Illuminate\Testing\TestResponse $response */

class CarTest extends TestCase
{
    use RefreshDatabase;
    public function test_should_not_be_able_to_access_car_create_page_as_guest_user(): void
    {
        $response = $this->get(route('car.create'));
        $response->assertRedirectToRoute('login');
        $response->assertFound();
    }

    public function test_should_be_able_to_access_car_create_page_as_authenticated_user(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get(route('car.create'));
        $response->assertOk()
            ->assertSee("Add new car");
    }

    public function test_should_not_be_able_to_access_my_cars_page_as_guest_user(): void
    {
        $response = $this->get(route('car.index'));
        $response->assertRedirectToRoute('login');
        $response->assertFound();
    }

    public function test_should_be_able_to_access_my_cars_page_as_authenticated_user(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get(route('car.index'));
        $response->assertOk();
    }
}
