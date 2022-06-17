<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriberStateSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SubscriberState::create([
            'name' => 'active'
        ]);
        \App\Models\SubscriberState::create([
            'name' => 'unsubscribed'
        ]);
        \App\Models\SubscriberState::create([
            'name' => 'junk'
        ]);
        \App\Models\SubscriberState::create([
            'name' => 'bounced'
        ]);
        \App\Models\SubscriberState::create([
            'name' => 'unconfirmed'
        ]);
    }
}
