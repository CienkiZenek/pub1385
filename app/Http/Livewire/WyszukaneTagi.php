<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Tagi;

class WyszukaneTagi extends Component
{
    public $szukane;
    use WithPagination;

    public function render()
    {

        $tagi = Tagi::search($this->szukane)->paginate(6);
        return view('livewire.wyszukane-tagi', [
            'tagi' => $tagi,
        ]);
    }
}
