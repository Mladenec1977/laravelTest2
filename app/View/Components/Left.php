<?php

namespace App\View\Components;

use App\Models\Genre;
use Illuminate\View\Component;

class Left extends Component
{

    public $arrayGenre;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->arrayGenre = Genre::select('id', 'title')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.left');
    }
}
