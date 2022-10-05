@extends('szablon')
@section('title', 'PoradnikDyskutanta: Przekaz dnia')
@section('tresc')

<div class="row mt-4 mb-5 border-bottom">

    <div class="col-lg-6 col-md-12 fs-5 ">
        <h4 class="pb-3 ">Przekaz dnia:</h4>
    </div>
</div>

<div class="list-group row">
    <div class="row">
        @foreach($Wyniki->chunk(3) as $porcja)

            @foreach($porcja as $przekaz)

                <div class="col-md-6 col-sm-12 col-lg-4 mb-3">

                    <div class="feature-icon bg-primary bg-gradient mt-4">
                        <svg class="bi" width="1em" height="1em" ><use xlink:href="#{{\App\Services\Ikony::ikonaStala($przekaz->tytul)}}"></use></svg>
                    </div>

                    <h4><a href="{{ route('przekazCale', $przekaz->id) }}" class="link-dark text-decoration-none">{{ $przekaz->tytul }} ({{$przekaz->created_at->format('Y-m-d')}})</a></h4>

                                        <a href="{{ route('przekazCale', $przekaz->id) }}" class="link-dark text-decoration-none ">{{ $przekaz->naglowek }}</a>



                </div>



            @endforeach


        @endforeach
    </div>
</div>


@include('dodatki.paginacja')
@endsection
