<div>
    @if($propozycje_uwagi->count()>0)
        <div class="border border-3 p-3 ">
        <div class="fw-bold mb-2">Uwagi do propozycji tematów: </div>

        @foreach($propozycje_uwagi as $propozycja)

            <div class="">
                {{ Str::limit($propozycja->naglowek, 30)  }}
            </div>

        @endforeach


            <div class="mt-3 text-center">
                {{ $propozycje_uwagi->links() }}
            </div>
    @endif


</div>
</div>
