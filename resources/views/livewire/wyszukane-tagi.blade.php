<div>
    @if($tagi->count()>0)
        <div class="border border-3 p-3 ">
        <div class="fw-bold mb-2">Tagi: </div>

        @foreach($tagi as $tag)

            <div class="">

                <a href="{{ route('tagCale', $tag['id']) }}" class="link-dark text-decoration-none"  target="_blank">{{ Str::limit($tag->nazwa, 30)  }}</a>

            </div>

        @endforeach

        <div class="mt-3 text-center">
            {{ $tagi->links() }}
        </div>
</div>
    @endif


</div>
