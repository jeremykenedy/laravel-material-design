@extends('front-end.layouts.app-front')

@section('page-header')
    @include('front-end.partials.header-general')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                {{-- The Pages --}}
                @include('front-end.partials.pages-roll')

                {{-- The Pager --}}
                @include('front-end.partials.pager-general')

            </div>
        </div>
    </div>


@endsection
