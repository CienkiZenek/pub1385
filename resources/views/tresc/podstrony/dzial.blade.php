@extends('szablon')
@section('title', 'Dział: '.$dzial->dzial)
@section('tresc')


<div class="row mt-4 mb-3">
    <div class="col-lg-6 col-md-12 fs-5 ">
        Dział: {{$dzial->dzial}}.
    </div>
</div>
<div class="row ">

    <div class="col-lg-6 col-md-12 fs-6 ms-1">
        Kategorie w tym dziale:
    </div>
</div>
@foreach($dzial->kategorie as $kategoria)

    <div class="list-group ms-2">
        <a href="{{ route('kategoria', $kategoria->slug) }}" class="link-dark">{{$kategoria->kategoria}}

    </div>
@endforeach




@endsection