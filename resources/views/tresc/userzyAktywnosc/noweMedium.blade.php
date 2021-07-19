@extends('szablon')
@section('title', 'Nowe medium')
@section('tresc')

    <div class="row">
        <div class="col-12 fs-4 text-center">Dodawanie nowego medium:</div>

    </div>
    <div class="row">


    <form action="{{route('noweMediumZapis')}}" method="POST">
        @csrf
        <input type="text" name="status" value="Aktywne" hidden />
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nazwa medium:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('nazwa') ? ' is-invalid' : '' }}" value="{{ old('nazwa') }}" name="nazwa" id="nazwa" placeholder="Nazwa medium..." >
                    <div class="invalid-feedback">
                        Wprowadź nazwę medium (min. 3, max. 100 znaków)
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Link:</span>
                    </div>
                    <input type="url" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" id="link" value="{{ old('link') }}" placeholder="Link..." >
                    <div class="invalid-feedback">
                        Wprowadź poprawny link do medium!
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <button type="submit" class="btn btn-primary"> <i class="bi bi-save"></i> Zapisz</button>
            </div>
        </div>
    </form>

    </div>



@endsection