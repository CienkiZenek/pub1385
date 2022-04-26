@extends('szablon')
@section('title', 'PoradnikDyskutanta: Memy i komiksy')
@section('tresc')



    <div class="col-lg-6 col-md-12 fs-5 mb-5">
        Memy i komiksy
    </div>

@foreach($Wyniki as $mem)


<div class="row ">
    <div class="col-md-3 col-sm-1"></div>
    <div class="col-8 mb-5">
    <a href="{{route('memCale', $mem->id)}}">


        <img src="{{$mem->Urlmem}}" class="img-thumbnail border-5" width="400px" alt="...">

    </a>
    </div>
</div>
    {{-- <a href="{{route('memCale', $mem->id)}}" class="link-dark text-decoration-none">{{ $mem->tytul }}</a>--}}



    {{--
            <figure class="figure">
                <img src="{{$mem->Urlmem}}" class="figure-img img-fluid rounded" alt="...">
                <figcaption class="figure-caption">{{ $mem->tytul }}</figcaption>
            </figure>--}}


@endforeach

    {{-- <div class="list-group row mt-3">
   {-- @foreach($Wyniki as $mem)



            <img src="{{$mem->Urlmem}}" class="" width="30px" height="50px" alt="...">

               --}}{{-- <a href="{{route('memCale', $mem->id)}}" class="link-dark text-decoration-none">{{ $mem->tytul }}</a>--}}{{--



    --}}{{--
            <figure class="figure">
                <img src="{{$mem->Urlmem}}" class="figure-img img-fluid rounded" alt="...">
                <figcaption class="figure-caption">{{ $mem->tytul }}</figcaption>
            </figure>--}}{{--


        @endforeach
</div>--}}
@include('dodatki.paginacja')


@endsection