<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [  
            // Se creara una migracion con tareas de usuarios registrador en la DB
            // Las tareas son generadas de un mes antes a 3 meses despues
            'Name'        => $this->faker->sentence(),
            'Detail'      => $this->faker->paragraph(1),
            'Deadline'    => $this->faker->dateTimeBetween($startDate = '-1 month', $endDate = '+3 months'),
            'Completed'   => $this->faker->boolean(),
            'User_id'     => $this->faker->randomElement(User::all())['id'],
            
        ];
    }
}
