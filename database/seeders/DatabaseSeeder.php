<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Se crean 10 usuarios para las pruebas
        User::factory(10)->create();

        // Usuario para realizar prubas
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Se crearan 50 tareas pertenecientes a los usuarios anteriores de no mas de 3 meses de vencimiento
        Task::factory(50)->create();
    }
}
