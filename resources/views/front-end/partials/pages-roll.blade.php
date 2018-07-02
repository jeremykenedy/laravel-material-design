<section class="post-roll">
  @foreach ($pages as $page)
    <div class="post-preview">
      <a href="{{ $page->url($tag) }}">
        <h2 class="post-title">{{ $page->title }}</h2>
        @if ($page->subtitle)
          <h4 class=""><em>{{ $page->subtitle }}</em></h4>
        @endif
      </a>
      <p class="post-meta">
        Posted on {{ $page->published_at }}
      </p>
      @if ($page->tags->count())
        <div class="tags-area">
          <small class="text-muted">Tags: </small>
          <span class="badge">
          {!! join('</span> <span class="badge">', $page->tagLinks()) !!}
          </span>
        </div>
      @endif
    </div>
    <hr>
  @endforeach
</section>
