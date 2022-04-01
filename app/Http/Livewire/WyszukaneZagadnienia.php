<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Zagadnienia;

class WyszukaneZagadnienia extends Component
{
    public $szukane;
    use WithPagination;

    public function render()
    {
        $zagadnienia = Zagadnienia::search($this->szukane)->paginate(6);
        return view('livewire.wyszukane-zagadnienia', [
            'zagadnienia' => $zagadnienia,
        ]);
    }
}
