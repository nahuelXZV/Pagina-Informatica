<?php

namespace App\View\Components;

use App\Models\Pagina;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{

    public $type = 'nav-back';

    public function __construct($type = 'nav-back')
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app', [
            'type' => $this->type,
            'pagina' => Pagina::find(1)
        ]);
    }
}
