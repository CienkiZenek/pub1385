@extends('szablon')
@section('title', 'Wszystkie działy')
@section('tresc')



<div class="row mt-4 mb-5">
    <div class="col-lg-6 col-md-12 fs-5 ">
        Działy:
    </div>

    </div>


@foreach($dzialy as $dzial)
<div class="list-group row mt-3">
    <a href="{{ route('dzial', $dzial->slug) }}" class="link-dark">{{$dzial->dzial}}
    </a>

</div>
@endforeach


@endsection