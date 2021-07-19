@extends('szablon')
@section('title', 'Uwaga do zagadnienia: ')
@section('tresc')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">

        </ol>
    </nav>
    <div class="row">


        <div>Ostatnia modyfikacja: {{$zagadnienie_uwaga->created_at->format('Y-m-d H:i:s')}}</div>

    </div>

@endsection