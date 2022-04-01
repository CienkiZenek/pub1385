<div>
    @if($znalezione->count()>0)
        <div class="border border-3 p-3 ">
        <div class="fw-bold mb-2">Znalezione w sieci: </div>

        @foreach($znalezione as $znal)

            <div class="">
                <a href="{{$znal->link}}" class="link-dark text-decoration-none" target="_blank"

                >{{ Str::limit($znal->nazwa, 30) }}</a>
            </div>

        @endforeach


            <div class="mt-3 text-center">
                {{ $znalezione->links() }}
            </div>
    @endif


</div>
</div>
