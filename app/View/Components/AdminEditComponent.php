<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminEditComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $tabelaa;
    public $korisnik;
    public $kol;
    public $ddl1;
    public $ddl2;
    public $ddl3;
    public $ddl4;
    public $ddl5;
    public function __construct($tabelaa,$korisnik,$kol,$ddl1=null,$ddl2=null,$ddl3=null,$ddl4=null,$ddl5=null)
    {
        $this->tabelaa=$tabelaa;
        $this->korisnik=$korisnik;
        $this->kol=$kol;
        $this->ddl1=$ddl1;
        $this->ddl2=$ddl2;
        $this->ddl3=$ddl3;
        $this->ddl4=$ddl4;
        $this->ddl5=$ddl5;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-edit-component');
    }
}
