<?php

namespace Tests\Unit;

use App\Models\Subscriber;
use Database\Seeders\SubscriberStateSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class SubscriberTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_index()
    {
        $this->seed(SubscriberStateSeeder::class);

        Subscriber::factory(3)->create();

        $response = $this->getJson('/api/subscribers');

        $response->assertJson(fn(AssertableJson $json) => $json->has('data', 3));
    }
}
