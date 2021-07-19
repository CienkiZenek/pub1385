<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Propozycje_uwagi;

class WyszukanePropozycjeUwagi extends Component
{
    public $szukane;
    use WithPagination;

    public function render()
    {

        $propozycje_uwagi = Propozycje_uwagi::search($this->szukane)->paginate(6);
        return view('livewire.wyszukane-propozycje-uwagi', [
            'propozycje_uwagi' => $propozycje_uwagi,
        ]);
    }
}
