<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
Use App\Zagadnienia_uwagi;

class WyszukaneZagadnieniaUwagi extends Component
{
    public $szukane;
    use WithPagination;

    public function render()
    {
        $zagadnienia_uwagi = Zagadnienia_uwagi::search($this->szukane)->paginate(6);
        return view('livewire.wyszukane-zagadnienia-uwagi', [
            'zagadnienia_uwagi' => $zagadnienia_uwagi,
        ]);


    }
}
