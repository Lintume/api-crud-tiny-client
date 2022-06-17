<?php

namespace Database\Factories;

use App\Models\Field;
use App\Models\FieldType;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Field>
 */
class FieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'field_type_id' => FieldType::inRandomOrder()->first()->id,
            'subscriber_id' => Subscriber::inRandomOrder()->first()->id
        ];
    }
}
