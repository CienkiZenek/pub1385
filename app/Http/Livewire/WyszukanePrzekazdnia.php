<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Przekazdnia;

class WyszukanePrzekazdnia extends Component
{
    public $szukane;
    use WithPagination;

    public function render()
    {
        $przekazy = Przekazdnia::search($this->szukane)->paginate(6);
        return view('livewire.wyszukane-przekazdnia', [
            'przekazy' => $przekazy,
        ]);
    }
}
