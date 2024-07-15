<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;
use App\Models\Category;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Contact::class;

    public function definition()
    {
        return [
            'category_id' =>Category::factory(),
            'first_name' => $this->faker->lastName,
            'last_name' => $this->faker->firstName,
            'gender' => $this->faker->numberBetween(1, 3),
            'email' => $this->faker->safeEmail,
            'tell' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'building' => $this->faker->buildingNumber(),
            'detail' => $this->faker->sentence(5),
        ];
    }
}
