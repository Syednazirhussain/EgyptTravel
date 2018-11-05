@if ($paginator->hasPages())
<div class="pagination-inner">
    <ul class="pager">
        @if (!$paginator->onFirstPage())
            <li class="previous"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a></li>
        @endif

        @if ($paginator->hasMorePages())
            <li class="next"><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
        @endif
    </ul>
    <ul class="pagination">
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
</div>
@endif

                <!-- pagination -->
<!--                 <div class="pagination-inner"> -->
                    <!-- pager -->
<!--                     <ul class="pager">
                        <li class="previous"><a href="#">Previous</a></li>
                        <li class="next"><a href="#">Next</a></li>
                    </ul> -->
                    <!-- pagination -->
<!--                     <ul class="pagination">
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">15</a></li>
                    </ul> -->
<!--                 </div> -->