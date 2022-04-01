@extends('szablon')
@section('title', 'PoradnikDyskutanta: Hasła')
@section('tresc')

    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header">
                    Hasła
                </div>
                <div class="card-body">
                    @foreach($Wyniki as $haslo)
                        <p class=""><a href="{{ route('hasloCale', $haslo->id) }}" class="link-dark">{{ $haslo->haslo }}
                            </a></p>
                    @endforeach


                </div>
            </div>

        </div>




    </div>


    @include('dodatki.paginacja')

@endsection