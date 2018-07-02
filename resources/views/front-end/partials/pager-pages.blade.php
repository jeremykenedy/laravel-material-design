<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <ul class="pagination pagination-lg pager">
        @if ($tag && $tag->reverse_direction)
          @if ($page->olderFrontEndPage($tag))
            <li class="previous">
              <a href="{!! $page->olderFrontEndPage($tag)->url($tag) !!}" aria-label="Previous">
                <span aria-hidden="true">
                  <i class="fa fa-hand-o-left "></i>
                  Previous {{ $tag->tag }} Post
                </span>
              </a>
            </li>
          @endif
          @if ($page->newerFrontEndPage($tag))
            <li class="next">
              <a href="{!! $page->newerFrontEndPage($tag)->url($tag) !!}">
                Next {{ $tag->tag }} Post
                <i class="fa fa-hand-o-right "></i>
              </a>
            </li>
          @endif
        @else
          @if ($page->newerFrontEndPage($tag))
            <li class="previous">
              <a href="{!! $page->newerFrontEndPage($tag)->url($tag) !!}" aria-label="Previous">
                <span aria-hidden="true">
                  <i class="fa fa-hand-o-left "></i>
                  Next Newer {{ $tag ? $tag->tag : '' }} Post
                </span>
              </a>
            </li>
          @endif
          @if ($page->olderFrontEndPage($tag))
            <li class="next">
              <a href="{!! $page->olderFrontEndPage($tag)->url($tag) !!}" aria-label="Next">
                <span aria-hidden="true">
                  Next Older {{ $tag ? $tag->tag : '' }} Post
                  <i class="fa fa-hand-o-right "></i>
                </span>
              </a>
            </li>
          @endif
        @endif
      </ul>
    </div>
  </div>
</div>

