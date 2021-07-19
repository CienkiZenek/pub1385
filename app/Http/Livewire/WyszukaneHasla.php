<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Hasla;
use App\Tagi;
use App\Miejsca;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;



class WyszukaneHasla extends Component
{

public $szukane;

    use WithPagination;
       public function render()
    {

        $hasla = Hasla::search($this->szukane)->paginate(6);
        return view('livewire.wyszukane-hasla', [
            'hasla' => $hasla,
        ]);
    }

}
