<div>
    @if($memy->count()>0)
        <div class="border border-3 p-3 ">
        <div class="fw-bold mb-2">Memy: </div>

        @foreach($memy as $mem)

            <div class="">
                {{ Str::limit($mem->tytul, 30)  }}

                <a href="{{ route('memy', $mem->id) }}" class="link-dark text-decoration-none" target="_blank">
                    {{
            Str::limit($haslo->haslo, 30)
             }}
                </a>
            </div>

        @endforeach


            <div class="mt-3 text-center">
                {{ $memy->links() }}
            </div>

    @endif


</div>
</div>
