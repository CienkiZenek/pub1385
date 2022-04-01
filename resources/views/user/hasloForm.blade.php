@extends('szablon')
@section('title', 'Poradnik dyskutanta - zaloguj się!')
@section('tresc')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{ route('zmienHaslo') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Zapisz hasło
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
