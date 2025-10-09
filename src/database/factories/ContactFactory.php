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
    public function definition()
    {
        return [
            'category_id' =>Category::inRandomOrder()->first()->id,
            'first_name' => $this->faker->firstName(),     // 名（例：太郎）
            'last_name' => $this->faker->lastName(),       // 姓（例：山田）
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'email' => $this->faker->unique()->safeEmail(),
            'tel' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'building' => $this->faker->optional()->secondaryAddress(), // 建物名は空でもOK
            'detail' => $this->faker->realText(120),       // 問い合わせ内容
            'created_at' => now(),
            'updated_at' => now(),//
        ];
    }
}
