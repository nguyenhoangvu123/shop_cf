@if ($paginator->lastPage() > 1)
    <div class="demo-inline-spacing" style="margin-left:20px">
        <nav aria-label="Page navigation" class="mt-5">
            <ul class="pagination">
                <li class="page-item first">
                    @if ($paginator->currentPage() > 1)
                        <a class="page-link" onclick="{{ $name }}.list(1)" href="javascript:void(0);"><i
                                class="tf-icon bx bx-chevrons-left"></i></a>
                    @endif

                </li>
                @if ($paginator->currentPage() > 1)
                    <li class="page-item prev">
                        <a class="page-link" onclick="{{ $name }}.list('{{ $paginator->currentPage() - 1 }}')"
                            href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
                    </li>
                @endif
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    @if ( $i >= $paginator->currentPage() - 3 && $i <= $paginator->currentPage() + 3)
                        <li class="page-item {{ $paginator->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" onclick="{{ $name }}.list('{{ $i }}')"
                                href="javascript:void(0);">{{ $i }}</a>
                        </li>
                    @endif
                @endfor
                @if ($paginator->lastPage() - $paginator->currentPage() > 0)
                    <li class="page-item next">
                        <a class="page-link" onclick="{{ $name }}.list('{{ $paginator->currentPage() + 1 }}')"
                            href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
                    </li>
                @endif
                @if ($paginator->lastPage() - $paginator->currentPage() >= 1)
                    <li class="page-item last">
                        <a class="page-link" onclick="{{ $name }}.list('{{ $paginator->lastPage() }}')"
                            href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
