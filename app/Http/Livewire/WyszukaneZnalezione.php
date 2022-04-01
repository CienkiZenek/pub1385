<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Znalezione;
use Livewire\WithPagination;

class WyszukaneZnalezione extends Component
{
    public $szukane;
    use WithPagination;

    public function render()
    {
        $znalezione = Znalezione::search($this->szukane)->paginate(6);
        return view('livewire.wyszukane-znalezione', [
            'znalezione' => $znalezione,
        ]);
    }
}
