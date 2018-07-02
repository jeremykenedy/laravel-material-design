<header class="intro-header parallax-window" data-parallax="scroll" data-image-src="{{ page_image($page->page_image) }}" >
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <div class="post-heading">
          <h1>{{ $page->title }}</h1>
          <h2 class="subheading">{{ $page->subtitle }}</h2>
          <span class="meta">
            Posted on {{ $page->published_at }}
          </span>
          @if ($page->tags->count())
            <div class="tags-area inverse">
              <small>Tags: </small>
              <span class="badge">
              {!! join('</span> <span class="badge">', $page->tagLinks()) !!}
              </span>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</header>
