<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Memy;
use Illuminate\Support\Facades\Storage;
use File;
use Response;
use DB;
class MemyController extends Controller
{
    public function index(){

        $memy=Memy::orderBy('tytul', 'asc')->paginate(10);
        return view('tresc.podstrony.memy', ['Wyniki'=>$memy]);
    }

    public function memCale($id){

        $mem = Memy::findOrFail($id);

        return view('tresc.cale.mem-cale', ['mem'=>$mem]);

    }

    public function pobierzObrazek(){
/*todo sprawdzić w kolejnych wersjach!!! */
        /*$file=Storage::disk('public')->get($mem);

        return (new Response($file, 200))
              ->header('Content-Type', 'image/jpeg');*/


        $filepath = public_path('memy/koty.jpg');
        return Response::download($filepath);

       // return $mem;
    }

}
