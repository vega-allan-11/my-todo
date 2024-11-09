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
            /*
            'title' => $this->faker->sentence, // Genera un título de tarea aleatorio
            'description' => $this->faker->paragraph, // Genera una descripción aleatoria
            'is_completed' => $this->faker->boolean(20), // 20% de probabilidad de que esté completada
            'due_date' => $this->faker->optional()->dateTimeBetween('now', '+1 year')?->format('Y-m-d'),
            'user_id' => User::inRandomOrder()->first()->id, // Asignar un usuario existente aleatoriamente
*/
        ];
    }
}
