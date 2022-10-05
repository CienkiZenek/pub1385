@extends('szablon')
@section('title', 'PoradnikDyskutanta: Memy i komiksy')
@section('tresc')





    <div class="row mt-4 mb-5 border-bottom">

        <div class="col-lg-6 col-md-12 fs-5 ">
            <h4 class="pb-3 ">Memy i komiksy:</h4>
        </div>


    </div>

    <div class="list-group row">
        <div class="row">
            @foreach($Wyniki->chunk(3) as $porcja)

                @foreach($porcja as $mem)

                    <div class="col-md-6 col-sm-12 col-lg-4 mb-3">

                        <a href="{{route('memCale', $mem->id)}}">
                            <img src="{{$mem->Urlmem}}" class="img-thumbnail border-5" width="400px" alt="...">
                        </a>

                    </div>



                @endforeach


            @endforeach
        </div>
    </div>



{{--@foreach($Wyniki as $mem)
<div class="row ">
    <div class="col-md-3 col-sm-1"></div>
    <div class="col-8 mb-5">
    <a href="{{route('memCale', $mem->id)}}">
        <img src="{{$mem->Urlmem}}" class="img-thumbnail border-5" width="400px" alt="...">
    </a>
    </div>
</div>
@endforeach--}}




@include('dodatki.paginacja')


@endsection
