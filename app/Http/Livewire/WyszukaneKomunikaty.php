<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Komunikaty;

class WyszukaneKomunikaty extends Component
{
    public $szukane;
    use WithPagination;

    public function render()
    {

        $komunikaty = Komunikaty::search($this->szukane)->paginate(6);
        return view('livewire.wyszukane-komunikaty', [
            'komunikaty' => $komunikaty,
        ]);
    }
}
