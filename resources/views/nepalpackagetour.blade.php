@extends('layouts.front')

@section('metatags')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    <link rel="canonical" href="https://himalayantrekkers.com/trekking-in-nepal/nepal-package-tours">
@stop
@section('css')
@endsection

@section('content')
    <div id="app">
        @include('layouts.newnavbar')
        <div class="package_item">
            <div data-src="{{ Voyager::image($detail->image) }}"
                class="package_item_top mb-0 rounded-none has-background-image h-64 md:h-80 lg:h-109"
                style="background-image: url({{ Voyager::image($detail->image) }})">
                <div class="centered">
                    <div class="h-full font-semibold">
                        <h1 class="text-white text-center text-3xl md:text-5xl ts">
                            <span class="text-base">Discover</span> <br>{{ $detail->title }}
                        </h1>
                    </div>
                </div>
            </div>

        </div>
        <section class="main px-2 lg:px-48">
            <div class="container mx-auto">
                <article class="md:p-4 lg:p-2 mt-4">
                    <h2 class="font-semibold text-xl md:text-3xl text-regal-blue text-center">
                        {{ $detail->title }}</h2>
                    <div class="mt-4 main_content">
                        <div class="readmore js-read-more" data-rm-words="1000">
                            {!! $detail->content !!}
                        </div>
                    </div>
                </article>
            </div>
        </section>
        @empty(!$detail->trips)
            <section class="py-12 px-2 md:px-8">
                <h2 class="secondary-heading">Featured Packages</h2>
                @include('partials._packages',['trips'=>$detail->trips])
            </section>
        @endempty
        @include('layouts.footer')
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/region.js') }}"></script>
@endsection
