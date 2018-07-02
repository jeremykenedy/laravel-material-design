<ul class="pager">
  {{-- Reverse direction --}}
  @if ($reverse_direction)
    @if ($pages->currentPage() > 1)
      <li class="previous">
        <a href="{!! $pages->url($pages->currentPage() - 1) !!}">
          <i class="fa fa-long-arrow-left fa-lg"></i>
          Previous {{ $tag->tag }} Posts
        </a>
      </li>
    @endif
    @if ($pages->hasMorePages())
      <li class="next">
        <a href="{!! $pages->nextPageUrl() !!}">
          Next {{ $tag->tag }} Posts
          <i class="fa fa-long-arrow-right"></i>
        </a>
      </li>
    @endif
  @else
    @if ($pages->currentPage() > 1)
      <li class="previous">
        <a href="{!! $pages->url($pages->currentPage() - 1) !!}">
          <i class="fa fa-long-arrow-left fa-lg"></i>
          Newer {{ $tag ? $tag->tag : '' }} Posts
        </a>
      </li>
    @endif
    @if ($pages->hasMorePages())
      <li class="next">
        <a href="{!! $pages->nextPageUrl() !!}">
          Older {{ $tag ? $tag->tag : '' }} Posts
          <i class="fa fa-long-arrow-right"></i>
        </a>
      </li>
    @endif
  @endif
</ul>
