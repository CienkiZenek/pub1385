@extends('szablon')
@section('title', 'Miejsce: ')
@section('tresc')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">

        </ol>
    </nav>
    <div class="row">


        <div>Ostatnia modyfikacja: {{$miejsce->created_at->format('Y-m-d H:i:s')}}</div>

    </div>

@endsection