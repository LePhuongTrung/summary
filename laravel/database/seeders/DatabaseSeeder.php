<?php

namespace Database\Seeders;

use App\Infrastructure\Eloquent\EloquentUser;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        EloquentUser::factory(10)->create();

        EloquentUser::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
