<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_display_no_cars_on_home_page(): void {
        $response = $this->get(route("home"));
        $response->assertOk()
        ->assertSee("There are no published cars");
    }

    public function test_should_display_30_cars_on_home_page(): void {
        $this->seed();
        $response = $this->get(route("home"));

        $response->assertOk()
        ->assertDontSee("There are no published cars")
        ->assertViewHas('cars', function ($collection) {
            return $collection->count() === 30;
        });
    }
}
