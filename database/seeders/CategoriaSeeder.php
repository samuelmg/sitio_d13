<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['tag' => 'Nacional'],
            ['tag' => 'Internacional'],
            ['tag' => 'Deportes'],
            ['tag' => 'Espectáculos'],
            ['tag' => 'Clima'],
        ]);

        // Categoria::create(['tag' => 'Nacional',]);
        // Categoria::create(['tag' => 'Internacional',]);
        
        // Categoria::create([
        //     ['tag' => 'Nacional'],
        //     ['tag' => 'Internacional'],
        // ]);

    }
}
