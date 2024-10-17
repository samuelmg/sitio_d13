<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Noticia;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoticiaControllerTest extends TestCase
{
    /** @test */
    public function listado_noticias(): void
    {
        $noticias = Noticia::factory()->count(3)->create();
        $ultimaNoticia = $noticias->last();

        $response = $this->get('/noticia');
        $response->assertSee('Noticias')
            ->assertSee($ultimaNoticia->titulo);

        $response->assertStatus(200);
    }

    public function test_crear_noticia(): void
    {
        $user = User::factory()->create();
        $categorias = Categoria::factory()->count(3)->create();

        // $this->withoutExceptionHandling();

        $noticia = Noticia::factory()->make(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->post(
                route('noticia.store'),
                $noticia->toArray() + ['categorias' => $categorias->pluck('id')->toArray()]
            );

        $response->assertRedirect('/noticia');

        $this->assertDatabaseHas('noticias', $noticia->toArray());
    }
}
