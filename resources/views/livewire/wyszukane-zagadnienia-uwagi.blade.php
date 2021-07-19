<div>
    @if($zagadnienia_uwagi->count()>0)

        <div class="border border-3 p-3 ">
        <div class="fw-bold mb-2">Uwagi do Zagadnień: </div>

        @foreach($zagadnienia_uwagi as $zagadnienie)

            <div class="">
                {{ Str::limit($zagadnienie->naglowek, 30)  }}
            </div>

        @endforeach


            <div class="mt-3 text-center">
                {{ $zagadnienia_uwagi->links() }}
            </div>
   @endif


</div>
</div>
