<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ListarPost extends Component
{
    public $posts;
    public $emptyMessage;
 
    public function __construct($posts, $emptyMessage)
    {
        $this->posts = $posts;
        $this->emptyMessage = $emptyMessage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.listar-post');
    }
}
