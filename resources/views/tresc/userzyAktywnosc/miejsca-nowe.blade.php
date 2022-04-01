@extends('szablon')
@section('title', 'Nowe miejsce dyskusji')
@section('tresc')

    <div class="row">

    </div>
    <form action="{{route('noweMiejscaDyskusjZapis')}}" method="POST">
        @csrf
        <input type="text" name="status" value="Aktywne" hidden />
        <div class="row mt-3">
            <div class="col-lg-4 col-12">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj1">Rodzaj:</span>
                    </div>
                    <select class="form-control" id="rodzaj" name="rodzaj" aria-label="rodzaj" aria-describedby="rodzaj1">
                        <option value="Forum" >Forum</option>
                        <option value="Wiadomość" >Wiadomość</option>
                        <option value="Inny" >Inny</option>
                    </select>
                </div>

            </div>
            <div class="col-lg-4 col-12 mt-3 mt-lg-0">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="dzial1">Medium:</span>
                    </div>

                    <select class="form-control{{ $errors->has('media_id') ? ' is-invalid' : ' ' }}" id="media_id" name="media_id" aria-label="dzial_id" aria-describedby="dzial1">
                        <option value="0" disabled selected>Wybierz medium:</option>
                        @foreach($Media as $medium)

                            <option value="{{$medium->id}}" {{ old('media_id') == $medium->id ? 'selected' : ''}} >{{$medium->nazwa}}</option>

                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-4 col-12">
                <a href="{{route('noweMedium')}}" class="btn btn-primary me-2" role="button" aria-pressed="true">
                    <i class="bi bi-plus-lg"></i> Dodaj nowe medium</a>

            </div>

        </div>


        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł  miejsca:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : '' }}" name="tytul" id="tytul" value="{{ old('tytul') }}" placeholder="Tytuł miejsca..." >
                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" value="{{ old('link') }}">Link:</span>
                    </div>
                    <input type="url" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" id="link" placeholder="Link..." >
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Opis:</span>
                    </div>
                    <textarea class="form-control" name="opis" id="opis" aria-label="Opis:">{{ old('opis') }}</textarea>
                </div>

            </div>
        </div>



        <div class="row mt-3 mb-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary"> <i class="bi bi-save"></i> Zapisz</button>
            </div>

        </div>


    </form>

    </div>
    </div>




@endsection