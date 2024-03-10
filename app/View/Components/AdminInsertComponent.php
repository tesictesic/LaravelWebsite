<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminInsertComponent extends Component
{
    /**
     * Create a new component instance.
     */
     public $tabela;

     public $kolone;
     public $lista1;
     public $lista2;
     public $lista3;
     public $lista4;
     public $lista5;
    public function __construct($kolone,$tabela,$listic1=null,$listic2=null,$listic3=null,$listic4=null,$listic5=null)
    {
        $this->kolone=$kolone;
        $this->tabela=$tabela;
        $this->lista1=$listic1;
        $this->lista2=$listic2;
        $this->lista3=$listic3;
        $this->lista4=$listic4;
        $this->lista5=$listic5;


    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-insert-component');
    }
}
