<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'noticia', 'fecha', 'categoria'];
    //protected $guarded = ['id', 'created_at', 'updated_at'];
}
