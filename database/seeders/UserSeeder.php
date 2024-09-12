<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Иван Петров',
            'email' => 'ivan.petrov@example.com',
        ]);

        User::create([
            'name' => 'Анна Смирнова',
            'email' => 'anna.smirnova@example.com',
        ]);

        User::create([
            'name' => 'Сергей Иванов',
            'email' => 'sergey.ivanov@example.com',
        ]);

        User::create([
            'name' => 'Екатерина Кузнецова',
            'email' => 'ekaterina.kuznetsova@example.com',
        ]);

        User::create([
            'name' => 'Дмитрий Сидоров',
            'email' => 'dmitry.sidorov@example.com',
        ]);

        User::create([
            'name' => 'Ольга Васильева',
            'email' => 'olga.vasilieva@example.com',
        ]);

        User::create([
            'name' => 'Алексей Михайлов',
            'email' => 'alexey.mikhailov@example.com',
        ]);

        User::create([
            'name' => 'Мария Федорова',
            'email' => 'maria.fedorova@example.com',
        ]);

        User::create([
            'name' => 'Николай Орлов',
            'email' => 'nikolai.orlov@example.com',
        ]);

        User::create([
            'name' => 'Татьяна Николаева',
            'email' => 'tatiana.nikolaeva@example.com',
        ]);
    }
}
