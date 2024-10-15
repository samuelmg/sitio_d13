<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Noticia;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->withPersonalTeam()->create();

        User::factory()
            ->withPersonalTeam()
            ->has(Noticia::factory()->count(5))
            ->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);

        // Noticia::factory(10)
        //     ->has(Categoria::factory()->count(4))
        //     ->create();

        $this->call([
            CategoriaSeeder::class,
        ]);
    }
}
