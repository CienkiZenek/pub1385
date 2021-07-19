@extends('szablon')
@section('title', 'Hasło: ')
@section('tresc')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">{{$haslo -> dzialy->dzial}}</a></li>
            <li class="breadcrumb-item"><a href="#">{{$haslo ->kategorie->kategoria}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$haslo -> haslo}}</li>
        </ol>
    </nav>
    <div class="row">

        <div>{{$haslo -> haslo}}</div>
        <div id="tresc" >{{$haslo -> tresc}}
            <div id="dodaj" style="color: white; font-size: 1px"> ({{Request::url()}})</div>
        </div>



       {{-- <button id="copyBlock">Click to copy</button> <span id="copyAnswer"></span>--}}
        <div>{{--<i class="bi bi-file-earmark-text fs-3" style="color: #0d6efd59"></i>--}}

            <i class="bi bi-clipboard fs-3" onClick="kopiujCalaTresc()" id="wszystko" title="Zaznacz wszystko"></i>
           {{-- <i class="bi bi-clipboard-plus fs-3" id="fragment" onClick="kopiujZaznaczonyFragment()" style="color: #0d6efd59" title="Zaznacz wybrany fragment"></i>--}}
            <div id="komunikatKopiowanie"></div>
        </div>



        @if(Str::length($haslo->linkSlownikPdf)>2)


        <div class="mt-3"><a href="http://slownik1894.test/{{$haslo ->linkSlownikPdf}}" target="_blank">Hasło w słowniku 1894 (pdf)</a></div>
        @endif
        @if($haslo->bibliografia->count()>0)
        <div class="mt-3">Bibliografia</div>
        <div class="">

            @foreach($haslo->bibliografia as $bibl)
                <div class="ms-2 mt-2">

                    {{$bibl->tresc}}
                </div>

            @endforeach
        </div>
        @endif
        @if($haslo->linki->count()>0)
        <div class="mt-3">Linki</div>
        <div>

            @foreach($haslo->linki as $link)
                <div class="ms-2 mt-2">

                    <a href="{{$link->link}}" target="_blank" class="link-dark">{{$link->tresc}}</a>

                </div>

            @endforeach

        </div>
        @endif
        @if($haslo->pliki->count()>0)
        <div class="mt-3">Pliki</div>
        <div>
            @foreach($haslo->pliki as $plik)
                <div class="ms-2 mt-2">

                    <a href=" {{$plik->urlplik}}" target="_blank" class="link-dark">{{$plik->plik_nazwa}}</a>


                </div>

            @endforeach
        </div>
        @endif

            @if($haslo->tagi->count()>0)
        <div class="mt-3">Tagi</div>
    <div>
        @foreach($haslo->tagi as $tag)
            <div class="ms-2 mt-2">
                <a href="{{ route('tagCale', $tag['id']) }}" class="link-dark">{{$tag->nazwa}}</a>
            </div>
        @endforeach
    </div>
        @endif
        <div class="mt-3">Ostatnia modyfikacja: {{$haslo->created_at->format('Y-m-d')}}</div>

    </div>






    @if($haslo->zagadnienia->count()>0)
    <div class="row mt-3">
        <div>
            Zagadnienia wchodzące w skład tego hasła:
        </div>

        @foreach($haslo->zagadnienia as $zagadnienie)
            <div class="ms-2 mt-2">

                <a href="{{ route('zagadnienieCale', $zagadnienie->slug) }}" class="link-dark">{{$zagadnienie->zagadnienie}}
                </a>

            </div>

        @endforeach
    </div>
@endif


    @auth
        @if($haslo->uwagi->count()>0)
        <div class="mb-3 mt-3">
            <div>Uwagi do tego hasła:</div>
            @foreach($haslo->uwagi as $uwaga)
                <div class="ms-2 mt-2">

                    <a href="{{ route('uwagaTematPodglad', $uwaga->id) }}" class="link-dark">{{Str::limit($uwaga->naglowek, 50) }}
                    </a>

                </div>

            @endforeach
        </div>
@endif
        @if(Auth::user()->mozeKomentowac())
            <div>Moja nowa uwaga do tego hasła:</div>

            <form action="{{route('uwagiZapisNowe')}}" method="POST">
                @csrf
                <input type="text" hidden name="do" value="haslo">
                <input type="text" hidden name="haslo_id" value="{{$haslo ->id}}">
                <input type="text" hidden name="slug" value="{{$haslo ->slug}}">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Naglowek:</span>
                            </div>
                            <textarea class="form-control{{ $errors->has('naglowek') ? ' is-invalid' : '' }}"
                                      name="naglowek" id="naglowek" rows="2">
                        {{ old('naglowek') }}</textarea>
                        </div>

                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Tresc:</span>
                            </div>
                            <textarea class="form-control{{ $errors->has('tresc') ? ' is-invalid' : '' }}"
                                      name="tresc" id="tresc" rows="10">
                        {{ old('tresc') }}</textarea>
                        </div>

                    </div>
                </div>

                <div class="row mb-5 mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Zapisz</button>
                    </div>

                </div>


            </form>
        @endif
    @endauth
    <script src="{{ URL::asset('/js/kopiowanie.js')}}"></script>
@endsection
