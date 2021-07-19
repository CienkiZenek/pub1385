@extends('szablon')
@section('title', 'PoradnikDyskutanta: Kontakt')
@section('tresc')


{{--TODO  dorobić: jeśli użytkownik jest zalogowany i zweryfikowany to nie musi używać captchy --}}
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Kontakt</div>

            <div class="card-body">
                <form method="POST" action="{{ route('listDoRedakcji') }}">
                    @csrf


                    <div class="input-group mb-3">
                        <span class="input-group-text">Wiadomość do redakcji:</span>
                        <textarea class="form-control @error('tresc') is-invalid @enderror"
                                  aria-label="Wiadomość do redakcji:" name="tresc"
                                  required autocomplete="tresc" autofocus
                        >{{ old('tresc') }}
                        </textarea>
                        @error('tresc')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror




                    </div>


                    <div class="form-group row mb-2  ">
                        <label for="cap"
                               class="col-md-4 col-form-label">Nie jestem robotem</label>
                        <div class="captcha col-md-6 " id="cap" style="height: 55px">
                            <span id="cap">{!! captcha_img() !!}</span>
                        </div>
                    </div>
                    <div class="form-group row mb-2  ">
                        <label for="ods"
                               class="col-md-4 col-form-label"></label>
                        <div class="captcha col-md-6 " id="ods" >
                            {{--<button type="button" class="btn btn-danger" class="reload" id="reload" title="Nowy obrazek">
                                ↻
                            </button>--}}
                            <button type="button" class="btn btn-danger reload"  id="reload" title="Nowy obrazek">
                                <i class="bi bi-arrow-clockwise size20"></i> Nowy obrazek
                            </button>

                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <input id="captcha" type="text" class="form-control mb-2 @error('captcha') is-invalid @enderror"
                                   placeholder="Przepisz tekst z obrazka" name="captcha">
                        </div>
                    </div>
                    @error('captcha')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror



                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Wyślij wiadomość
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection