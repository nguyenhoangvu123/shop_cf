@if ($paginator->lastPage() > 1)
    <div class="paging">
        <ul class='pagination'>
            <li class='page_info'>Trang {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}</li>
            @if ($paginator->currentPage() > 1)
                <li><a href="{{ $paginator->url($paginator->currentPage() + 1) }}">Trang
                        tiếp &rsaquo;</a></li>
            @endif
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                @if ($i >= $paginator->currentPage() - 5 && $i <= $paginator->currentPage() + 5)
                    <li><a class="{{ $paginator->currentPage() == $i ? 'current' : '' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor
            @if ($paginator->lastPage() - $paginator->currentPage() >= 1)
                <li><a href="{{ $paginator->url($paginator->lastPage()) }}">Trang
                        cuối &rsaquo;&rsaquo;</a></li>
            @endif

        </ul>
    </div>
@endif
