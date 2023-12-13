@if ($paginator->hasPages())
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-5">
        <ul class="pagination">
            <li>
                <a class="pagination__link" {{ $paginator->onFirstPage() ? '' : 'href=' . $paginator->url(1)  }}> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left w-4 h-4"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg> </a>
            </li>

        @foreach ($elements as $element)

            @if( is_array($element))
                @foreach ($element as $page => $url)

                    @if ($paginator->currentPage() > 4 && $page === 2)
                        <li> <a class="pagination__link">...</a> </li>
                    @endif

                    @if ($page == $paginator->currentPage())
                        <li><a class="pagination__link pagination__link--active">{{ $page }}</a></li>
                    @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() + 3 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2 || $page === $paginator->currentPage() - 3 || $page === $paginator->lastPage() || $page === 1)
                        <li><a class="pagination__link" href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
                    @endif

                    @if ($paginator->currentPage() < $paginator->lastPage() - 3 && $page === $paginator->lastPage() - 1)
                        <li> <a class="pagination__link">...</a> </li>
                    @endif

                @endforeach
            @endif

        @endforeach

            <li>
                <a class="pagination__link" href="{{ $paginator->url($paginator->lastPage()) }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right w-4 h-4"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> </a>
            </li>


    </div>
@endif
