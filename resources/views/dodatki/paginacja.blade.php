<ul class="pagination pagination-lg justify-content-center">
    @if($Wyniki->Total()>$Wyniki->perPage()) {{-- wyświetla jeśli paginacja ma się pojawić--}}

    @if($Wyniki->currentPage()!=1)
        <li class="page-item">
            <a class="page-link" href="{{ $Wyniki->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">{{ __('previous') }}</span>
            </a>
        </li>
    @endif

    <li class="page-item"><a class="page-link" href="#">{{$Wyniki->currentPage()}}/{{$Wyniki->lastPage()}}</a></li>

    @if($Wyniki->hasMorepages())
        <li class="page-item">
            <a class="page-link" href="{{ $Wyniki->nextPageUrl() }}" aria-label="Next">
                <span class="sr-only">{{ __('next') }}</span>
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>

    @endif
    @endif
</ul>
