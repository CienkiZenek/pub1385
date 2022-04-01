<div>

    @if($miejsca->count()>0)
        <div class="border border-3 p-3 ">
        <div class="fw-bold mb-2">Miejsca do dyskusji: </div>
            {{--@php
                dd($test)

            @endphp--}}

            {{-- {{$miejsca}}--}}
            @foreach($miejsca as $miejsce)

                <div class="">
                    {{--<a href="{{ route('hasloCale', $haslo->id) }}" class="link-dark">{{ $haslo->haslo }}
                    </a>--}}

                        <a href="{{$miejsce->link}}" class="link-dark text-decoration-none" target="_blank"

                        >{{ Str::limit($miejsce->tytul, 30) }}</a>
                </div>
            @endforeach
        <div class="mt-3 text-center">
            {{ $miejsca->links() }}
        </div>
</div>
    @endif

</div>
