{{-- Wyświetlanie błędów--}}
@if($errors->count())
    <div class="">
        @foreach($errors->all() as $error)
            <div class="alert-danger p-1 fw-bold col-6 rounded-1 mt-1">    {{ $error }}</div>
        @endforeach
    </div>
@endif

{{-- Wyświetlanie komunikatów--}}

@if(session('komunikat'))
<div class="alert alert-primary">{{ session('komunikat') }}</div>
    @endif
@if(session('verified'))
    <div class="alert alert-primary">Twój e-mail został zweryfikowany!</div>
@endif
@if(session('resent'))
    <div class="alert alert-primary">Na Twój adres został wysłany e-mail z linkiem do weryfikacji adresu!</div>
@endif
