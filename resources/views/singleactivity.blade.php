@extends('layouts.front')
@section('metatags')

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}

     <script defer async type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Activities",
        "item": "https://himalayantrekkers.com/activities"
      },{
        "@type": "ListItem",
        "position": 2,
        "name": "{{ $detail->title}}",
        "item": "https://himalayantrekkers.com/activities/{{ $detail->slug }}"
      }]
    }
    </script>
@stop
@section('css')
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">

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
        <section class="px-4 md:px-8">
            <div class="mt-5 container mx-auto breadcrumbs">
                <div class="wrap text-sm md:text-base">
                    <div class="wrap_float text-dark-gray">
                        <a class="mr-1" href="/">Home</a>
                        <span class="separator mr-1">/</span>
                        <a class="mr-1" href="/activities">Activites</a>
                        <span class="separator mr-1">/</span>
                        <a href="#">{{ $detail->title }}</a>
                    </div>
                </div>
            </div>

        </section>


        <main class="main px-4 lg:px-48">
            <div class="container mx-auto">
                <article class="md:p-4 lg:p-2 mt-5">

                    <div class="main_content">
                        {!! $detail->content !!}
                    </div>

                </article>
            </div>
        </main>



        <section class="py-12 px-4 md:px-8 bg-shuttle-gray">
            {{-- <h2 class="secondary-heading text-center text-xl text-light-gray px-4 lg:text-2xl uppercase font-semibold my-5">
                Featured Packages</h2> --}}
            <front-page :id="{{ json_encode($detail->id) }}"></front-page>
        </section>








        @include('layouts.footer')


    </div>




@endsection

@section('script')
    <script src="{{ asset('js/activity.js') }}"></script>

@endsection
