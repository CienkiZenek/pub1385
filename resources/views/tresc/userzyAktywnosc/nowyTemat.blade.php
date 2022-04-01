@extends('szablon')
@section('title', 'PoradnikDyskutanta: Nowy temat')
@section('tresc')

    <div class="row">

    </div>
    <form action="{{route('nowyTematZapisz')}}" class="" method="POST">
        @csrf




        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł:</span>
                    </div>
                    <textarea
                            @if(count($errors->all())>0)
                            class="form-control {{$errors->has('tytul') ? ' is-invalid' : ' is-valid'}}"
                            @else
                            class="form-control"
                            @endif

                            name="tytul" id="tytul" rows="1"
                              placeholder="" required
                    >{{ old('tytul') }}
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
                        Wprowadź treść (min. 500, max. 4500 znaków)
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