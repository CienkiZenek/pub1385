<div class="row">
    <div class="col-6 offset-3">


{{--{{$zagadnienia_karuzela->count()}}--}}
<div id="karuzela" class="carousel slide carousel-fade" data-bs-ride="karuzela">
    <div class="carousel-indicators">

        @foreach($zagadnienia_karuzela as $karuzela)
            <button type="button" data-bs-target="#karuzela" data-bs-slide-to="{{$loop->index}}"
                    @if ($loop->index==1) class="active" aria-current="true" @else  @endif
                     aria-label="Slide {{$loop->index+1}}"></button>

        @endforeach

    </div>
    <div class="carousel-inner">


        @foreach($zagadnienia_karuzela as $karuzela)
            <div class="carousel-item @if ($loop->index==1) active @else  @endif " style="max-height: 300px">
                <img src="{{$karuzela->Urlobrazek1}}" class="d-block w-100" alt="..." style="object-fit: scale-down;">
                {{--<img src="{{$karuzela->Urlobrazek1}}" class="d-block w-100" alt="...">--}}

                <div class="carousel-caption ">
                    <a href="{{route('zagadnienieCale',$karuzela->slug )}}" class="text-white text-decoration-none">
                        {{--<h5 class="tlo-karuzela p-1 rounded-3">{{$karuzela->zajawka_tytul}}</h5>--}}
                    <p class="tlo-karuzela p-1  rounded-3">{{Str::limit($karuzela->zajawka, 240)}}</p></a>
                </div>
            </div>

        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#karuzela" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#karuzela" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


    </div>
</div>
