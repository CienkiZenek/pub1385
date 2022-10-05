@extends('szablon')
@section('title', 'Kategoria: '.$kategoria->kategoria)
@section('tresc')



<div class="row mt-4 mb-3">
    <div class="col-lg-6 col-md-12 fs-5 ">
        Kategoria: {{$kategoria->kategoria}}
    </div>
    </div>
<div class="row ">

    <div class="col-lg-6 col-md-12 fs-6 ms-1">
        Hasła w tej kategorii:
    </div>
</div>
    @foreach($kategoria->hasla as $haslo)

        <div class="list-group ms-2">
            <a href="{{ route('hasloCale', $haslo->slug) }}" class="link-dark">{{$haslo->haslo}}
            </a>

        </div>
    @endforeach




@endsection