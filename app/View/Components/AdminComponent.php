<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $columns;
    public $datas;
    public $table;
    public function __construct($columns,$datas,$table)
    {
        $this->columns=$columns;
        $this->datas=$datas;
        $this->table=$table;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-component');
    }
}
