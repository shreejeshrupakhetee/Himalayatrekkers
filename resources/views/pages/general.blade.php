@extends('layouts.front')
@section('metatags')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
@endsection
@section('css')

@endsection


@section('content')

    <div id="app" v-cloak>

        @include('layouts.newnavbar')


        <section class="px-4 md:px-8">
            <div class="mt-5 container mx-auto breadcrumbs">
                <div class="wrap">
                    <div class="wrap_float text-dark-gray">
                        <a href="/">Home</a>
                        <span class="separator">/</span>
                        <a href="/{{ $slug }}">{{ $title }}</a>
                    </div>
                </div>
                <div class="mt-3 page_head text-center">
                    <h1 class="title text-2xl md:text-4xl">
                        {{ $title }}
                    </h1>
                    @if (!empty($excerpt))
                        <p class="mt-4 text-dark-gray subtitle">
                            {{ $excerpt }}
                        </p>
                    @endif

                </div>
            </div>

        </section>


        <section class="mt-2 md:mt-12 mb-10">
            <div class="container mx-auto px-4 md:px-48">
                @if (!empty($body))
                    <div class="main_content">
                        {!! $body !!}
                    </div>
                    <lightbox></lightbox>
                @endif


            </div>

        </section>







        @include('layouts.footer')

    </div>
@endsection
@section('script')
    <script src="{{ asset('js/blogs.js') }}"></script>
@endsection
