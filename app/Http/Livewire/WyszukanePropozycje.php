<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Propozycje;

class WyszukanePropozycje extends Component
{
    public $szukane;
    use WithPagination;

    public function render()
    {
        $propozycje = Propozycje::search($this->szukane)->paginate(6);
        return view('livewire.wyszukane-propozycje', [
            'propozycje' => $propozycje,
        ]);
    }
}
