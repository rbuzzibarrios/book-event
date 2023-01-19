<?php

namespace Tests\Feature;

use App\Models\Activity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingStoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_booking_store_can_validate_data()
    {
        $activity = Activity::factory()->create();

        $this->postJson('/book', [])->assertUnprocessable();

        $this->postJson('/book', ['activity' => 5678])->assertUnprocessable();

        $this->postJson('/book', ['activity' => $activity->id, 'date' => '34sdf34'])->assertUnprocessable();
    }

    public function test_booking_store_can_be_created_successfully()
    {
        $activity = Activity::factory()->create(['price' => 400]);

        $this->postJson('/book', [
            'activity'        => $activity->id,
            'date'            => $activity->start_date->format('Y-m-d'),
            'quantity_people' => 45,
        ])->assertStatus(201);

        $this->assertDatabaseHas('bookings', [
            'activity_id'     => $activity->id,
            'quantity_people' => 45,
            'completion_date' => $activity->start_date->format('Y-m-d'),
            'price'           => 400 * 45,
        ]);
    }
}