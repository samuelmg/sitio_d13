<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alerta extends Component
{
    public $titulo;
    public $tipo;

    /**
     * Create a new component instance.
     */
    public function __construct($titulo, $tipo = 'info')
    {
        $this->titulo = $titulo;
        $this->tipo = $tipo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alerta');
    }
}
