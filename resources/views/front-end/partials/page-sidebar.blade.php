<span class="meta">


  Posted on {{ $page->published_at }}







  @if ($page->tags->count())
    <ul>
        <li>{!! join('</li><li>', $page->tagLinks()) !!}</li>
    </ul>
  @endif



</span>
