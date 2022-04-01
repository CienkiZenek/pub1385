@extends('szablon')
@section('title', 'Do użytkownika')
@section('tresc')

    <div class="row">
        <div class="col-4 offset-2">List do użytkownika: {{$odbiorca->name}}</div></div>
    <form action="{{route('WyslijUserWy', $odbiorca)}}" method="POST">
        @csrf

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Treść listu:</span>
                    </div>
                    <textarea class="form-control"  name="tresc" id="tresc"
                              value="{{ old('nazwa') }}" rows="7"></textarea>
                </div>


            </div>
        </div>




        <div class="row mt-3 mb-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Wyślij</button>
            </div>

        </div>


    </form>


@endsection