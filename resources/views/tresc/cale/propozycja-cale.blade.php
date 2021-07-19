@extends('szablon')
@section('title', 'Propozycja: ')
@section('tresc')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">

        </ol>
    </nav>
    <div class="row">


        <div>Ostatnia modyfikacja: {{$propozycja->created_at->format('Y-m-d H:i:s')}}</div>

    </div>

@endsection