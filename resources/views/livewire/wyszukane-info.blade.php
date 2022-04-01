<div>
  @if($info->count()>0)

    <div class="border border-3 p-3 ">
        <div class="fw-bold mb-2">Info: </div>

        @foreach($info as $inf)

            <div class="">

                <a href="{{ route('infoCale', $inf->id) }}" class="link-dark text-decoration-none" target="_blank">{{ Str::limit($inf->tytul, 30) }}</a>

            </div>

        @endforeach

        {{--<div class="mt-3 text-center">
            {{ $info->links() }}
        </div>--}}


    </div>
   @endif

</div>
