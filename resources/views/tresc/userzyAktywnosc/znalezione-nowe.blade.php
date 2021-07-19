@extends('szablon')
@section('title', 'Nowe znalezione w sieci')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('noweZnalezioneZapis')}}" method="POST">
        @csrf
        <input type="text" name="status" value="Aktywne" hidden />
        <div class="row mt-4">
<div class="col-4">

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="rodzaj1">Rodzaj:</span>
        </div>
        <select class="form-control" id="rodzaj" name="rodzaj" aria-label="rodzaj" aria-describedby="rodzaj1">
            <option value="Przeczytaj koniecznie" >Przeczytaj koniecznie</option>
            <option value="Warto wiedzieć" >Warto wiedzieć</option>
            <option value="Można odnotować" >Można odnotować</option>
            <option value="Tak myślą wrogowie" >Tak myślą wrogowie</option>
            <option value="Ciekawostka" >Ciekawostka</option>
            <option value="Skandal i zgroza" >Skandal i zgroza</option>
        </select>
    </div>

</div>
            <div class="col-4">
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

            <div class="col-4">
                <a href="{{route('noweMedium')}}" class="btn btn-primary me-2" role="button" aria-pressed="true">
                    <i class="bi bi-plus-lg"></i> Dodaj nowe medium</a>

            </div>
        </div>


        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nazwa linku:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('nazwa') ? ' is-invalid' : '' }}" value="{{ old('nazwa') }}" name="nazwa" id="nazwa" placeholder="Nazwa linku..." >
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
                </div>

            </div>
        </div>




        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Komentarz:</span>
                    </div>
                    <textarea class="form-control{{ $errors->has('komentarz') ? ' is-invalid' : '' }}" name="komentarz" id="komentarz" placeholder="Komentarz...">{{ old('komentarz') }}</textarea>
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
</div>




@endsection