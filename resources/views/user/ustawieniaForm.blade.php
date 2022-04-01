@extends('szablon')
@section('title', 'Poradnik dyskutanta - ustawienia')
@section('tresc')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Zmień ustawienia</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('ustawieniaZapis') }}">
                        @csrf


                        <div class="input-group mb-2">

                            <span class="input-group-text" id="">{{ __('E-Mail Address') }}</span>


                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ Auth::user()->email }}" required autocomplete="new-email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>



                        <div class="input-group mb-3">
                            <label class="input-group-text" for="zgoda_listy_innych">Zgadzam się na otrzymywanie
                                wiadomości od innych użytkowników</label>
                            <select class="form-select" id="zgoda_listy_innych" name="zgoda_listy_innych">
                                <option value="1" @if(Auth::user()->zgoda_listy_innych==1) selected @endif>Tak</option>
                                <option value="0" @if(Auth::user()->zgoda_listy_innych==0) selected @endif>Nie</option>

                            </select>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Zapisz zmiany
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
