<?php

namespace Tests\Feature;

use App\Models\Activity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ActivityListTest extends TestCase
{
    use RefreshDatabase;

    public function test_activity_list_can_validate_filters()
    {
        $this->postJson('/events', ['date' => null])
            ->assertUnprocessable();
    }

    public function test_activity_list_view_can_be_rendered()
    {
        Activity::factory(3)->create(['rating' => 4]);
        Activity::factory(3)->create(['price' => 500]);
        Activity::factory(4)->create();

        $response = $this->get('/');

        $response->assertStatus(200);

        $response->inertiaPage();

        $response->assertInertia(fn(Assert $page) => $page
            ->component('WelcomeBookEvent')
            ->has('events', 10)
            ->has('events.0', fn(Assert $page) => $page
                ->where('rating', 4)
                ->etc()
                ->missing('name')
            )
            ->has('events.3', fn(Assert $page) => $page
                ->where('price', 500)
                ->etc()
            )
        );
    }

    public function test_activity_list_can_be_filtered_by_date()
    {
        DB::table('activities')->delete();

        Activity::factory(3)->create([
            'rating'     => 4,
            'start_date' => today()->addDays(20),
            'end_date'   => today()->addDays(22),
        ]);
        Activity::factory(3)->create([
            'price'      => 499.15,
            'start_date' => today()->addDays(19),
            'end_date'   => today()->addDays(22),
        ]);

        $this->post('/events',
            [
                'date' => today()->addDays(20)->format('Y-m-d'),
            ])
            ->assertOk()
            ->assertJsonCount(6, 'events');
    }
}