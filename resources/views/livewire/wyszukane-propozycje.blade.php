<div>
    @if($propozycje->count()>0)
        <div class="border border-3 p-3 ">
        <div class="fw-bold mb-2">Propozycje tematów: </div>

        @foreach($propozycje as $propozycja)

            <div class="">


                <a href="{{ route('edycjaPropozycji', $propozycja->id) }}" class="link-dark text-decoration-none" target="_blank">{{ Str::limit($propozycja->tytul, 30) }}   </a>
            </div>

        @endforeach


            <div class="mt-3 text-center">
                {{ $propozycje->links() }}
            </div>
    @endif


</div>
</div>
