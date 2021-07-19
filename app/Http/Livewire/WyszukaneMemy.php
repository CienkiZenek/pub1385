<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Memy;

class WyszukaneMemy extends Component
{
    public $szukane;
    use WithPagination;

    public function render()
    {
        $memy = Memy::search($this->szukane)->paginate(6);
        return view('livewire.wyszukane-memy', [
            'memy' => $memy,
        ]);
    }
}
