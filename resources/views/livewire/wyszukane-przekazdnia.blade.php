<div>
    @if($przekazy->count()>0)
        <div class="border border-3 p-3 ">
            <div class="fw-bold mb-2">Przekazy dnia: </div>

            @foreach($przekazy as $przekaz)

                <div class="">

                    <a href="{{ route('przekazCale', $przekaz->id) }}" class="link-dark text-decoration-none"  target="_blank"> {{ Str::limit($przekaz->tytul, 30)  }} </a>

                </div>

            @endforeach


            <div class="mt-3 text-center">
                {{ $przekazy->links() }}
            </div>
        </div>
    @endif
</div>
