<div>
    @if($zagadnienia->count()>0)
        <div class="border border-3 p-3 ">
        <div class="fw-bold mb-2">Zagadnienia: </div>

        @foreach($zagadnienia as $zagadnienie)

            <div class="">

                <div class=""><a href="{{ route('zagadnienieCale', $zagadnienie->slug) }}" class="link-dark text-decoration-none" target="_blank">
                        {{
                Str::limit($zagadnienie->zagadnienie, 30)
                 }}
                    </a></div>
            </div>

        @endforeach


            <div class="mt-3 text-center">
                {{ $zagadnienia->links() }}
            </div>
        </div>
    @endif


</div>
