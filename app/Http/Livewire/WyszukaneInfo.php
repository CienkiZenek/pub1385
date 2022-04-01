<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Info;

class WyszukaneInfo extends Component
{
    public $szukane;
    use WithPagination;

    public function render()
    {
        $info = Info::search($this->szukane)->paginate(6);

        return view('livewire.wyszukane-info', [
            'info' => $info,
        ]);
    }
}
