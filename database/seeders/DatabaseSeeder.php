<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Subscriber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([SubscriberStateSeeder::class]);

        Subscriber::factory(10)->create();

        $this->call([FieldTypeSeeder::class]);

        Field::factory(100)->create();
    }
}
