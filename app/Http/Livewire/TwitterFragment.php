<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TwitterFragment extends Component
{

    public $fragment;
    public function render()
    {


        return view('livewire.twitter-fragment', [
            'fragment' => $this->fragment,
        ]);
    }
}
