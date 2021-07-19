<div>

    @if($hasla->count()>0)
<div class="border border-3 p-3 ">
        <div class="fw-bold mb-2">Hasła: </div>
        {{--@php
            dd($test)

        @endphp--}}

        {{-- {{$miejsca}}--}}
        @foreach($hasla as $haslo)

            <div class=""><a href="{{ route('hasloCale', $haslo->slug) }}" class="link-dark text-decoration-none" target="_blank">
                    {{
            Str::limit($haslo->haslo, 30)
             }}
                </a></div>
        @endforeach
        <div class="mt-3 text-center">
        {{ $hasla->links() }}
        </div>
</div>
    @endif



</div>