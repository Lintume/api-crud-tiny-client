<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldTypeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\FieldType::create([
            'name' => 'date'
        ]);
        \App\Models\FieldType::create([
            'name' => 'number'
        ]);
        \App\Models\FieldType::create([
            'name' => 'string'
        ]);
        \App\Models\FieldType::create([
            'name' => 'boolean'
        ]);
    }
}
