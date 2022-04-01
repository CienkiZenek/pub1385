@extends('szablon')
@section('title', 'Rejestracja nowego użytkownika')
@section('tresc')
    {{--<div class="container">--}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row mb-2 ">
                                <label for="name" class="col-md-4 col-form-label ">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}"
                                           required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="email"
                                       class="col-md-4 col-form-label ">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2 ">
                                <label for="password"
                                       class="col-md-4 col-form-label ">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label ">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password_confirmation" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row mb-2 ">
                                <label for="name" class="col-md-4 col-form-label ">Akceptuję <a href="{{route('regulamin')}}" class="link-dark" target="_blank">regulamin</a></label>

                                <div class=" col-md-6">
                                   {{-- <input type="hidden" name="zgoda_regulamin" value="0"/>--}}
                                    <input class="form-check-input @error('zgoda_regulamin') is-invalid @enderror" name="zgoda_regulamin"
                                            type="checkbox" id="zgoda_regulamin"
                                           @if(old('zgoda_regulamin')==='on' || old('zgoda_regulamin')==='yes' || old('zgoda_regulamin')===1 || old('zgoda_regulamin')===true) checked @else @endif      >

                                </div>
                                {{-- required  --}}
                                @error('zgoda_regulamin')
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



                           {{-- <div class="form-group mb-4">
                                <input id="captcha" type="text" class="form-control" placeholder="Wpisz odpowiedź!" name="captcha">
                            </div>--}}



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   {{-- </div>--}}

    {{--<script type="text/javascript">
        $(document).ready(function () {
             //console.log("Tag usunięty!");
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: 'refresh_captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
        });
    </script>--}}

@endsection
