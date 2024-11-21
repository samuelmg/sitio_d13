<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $fillable = ['noticia_id', 'nombre_original', 'ruta'];

    public function noticia()
    {
        return $this->belongsTo(Noticia::class);
    }
}
