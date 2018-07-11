@extends('front-end.layouts.app-front', [
    'title' => $page->title,
    'meta_description' => $page->meta_description ?: config('pages.description'),
])


@section('page-header')
    @include('front-end.partials.header-page')
@endsection

@section('content')

    {{-- @include('front-end.partials.page-sidebar') --}}

    {{-- The Page --}}
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {!! $page->content_html !!}
                </div>
            </div>
        </div>
    </article>

  {{-- The Pager --}}
  {{-- @include('front-end.partials.pager-pages') --}}

@endsection
