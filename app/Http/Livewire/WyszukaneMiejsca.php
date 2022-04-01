<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Miejsca;


class WyszukaneMiejsca extends Component
{

    public $szukane;

    use WithPagination;

    public function render()
    {

        $miejsca = Miejsca::search($this->szukane)->paginate(6);
        return view('livewire.wyszukane-miejsca', [
            'miejsca' => $miejsca,
        ]);
    }

}
