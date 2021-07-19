<div>
    @if($komunikaty->count()>0)
        <div class="border border-3 p-3 ">
        <div class="fw-bold mb-2">Komunikaty: </div>

        @foreach($komunikaty as $komunikat)

            <div class="">

                <a href="{{ route('komunikatCale', $komunikat->id) }}" class="link-dark text-decoration-none"  target="_blank">{{ Str::limit($komunikat->tytul, 30)  }}</a>
            </div>

        @endforeach


            <div class="mt-3 text-center">
                {{ $komunikaty->links() }}
            </div>
    @endif


</div>
</div>
