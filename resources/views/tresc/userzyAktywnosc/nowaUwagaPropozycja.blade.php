@extends('szablon')
@section('title', 'Nowa uwaga do propozycji tematu')
@section('tresc')

    <div class="row">

    </div>
    <form action="{{route('nowaUwagaPropozycjaZapisz')}}" class="" method="POST">
        @csrf

        <input type="text" hidden name="propozycja_id" value="{{$id}}">
 {{--{{$id}}--}}
        {{--<div class="col-12 text-center fs-5">
            Uwaga do propozycji tematu:  <a href="{{route('edycjaPropozycji', $uwaga->propozycja->id)}}">{{Str::limit($uwaga->propozycja->tytul, 40)}}</a>
        </div>--}}

        <div class="col-12 text-center fs-5">
            Dodaj uwagę do propozycji tematu:  <a href="{{route('edycjaPropozycji', $id)}}">{{Str::limit($tytulPropozycji, 40)}}</a>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł/Nagłowek:</span>
                    </div>
                    <textarea
                            @if(count($errors->all())>0)
                            class="form-control {{$errors->has('naglowek') ? ' is-invalid' : ' is-valid'}}"
                            @else
                            class="form-control"
                            @endif

                            name="naglowek" id="naglowek" rows="1"
                              placeholder="" required
                    >{{ old('naglowek') }}
                    </textarea>
                    <div class="invalid-feedback">
                        Wprowadź tytuł (min. 20, max. 300 znaków)
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tresc:</span>
                    </div>
                    <textarea

                            @if(count($errors->all())>0)
                            class="form-control {{$errors->has('tresc') ? ' is-invalid' : ' is-valid'}}"
                             @else
                            class="form-control"
                            @endif


                              name="tresc" id="tresc" rows="10">{{ old('tresc')           }}</textarea>
                    <div class="invalid-feedback">
                        Wprowadź treść (min. 100, max. 4500 znaków)
                    </div>
                </div>

            </div>
        </div>


        <div class="row mb-5 mt-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>

        </div>


    </form>

    </div>
    </div>






@endsection