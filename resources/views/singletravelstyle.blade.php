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
        "name": "Travel Styles",
        "item": "https://himalayantrekkers.com/travelstyle"
      },{
        "@type": "ListItem",
        "position": 2,
        "name": "{{ $detail->title}}",
        "item": "https://himalayantrekkers.com/travelstyle/{{ $detail->slug }}"
      }]
    }
    </script>

@stop
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
                        <a class="mr-1" href="/travelstyle">Travel Styles</a>
                        <span class="separator mr-1">/</span>
                        <a href="#">{{ $detail->title }}</a>
                    </div>
                </div>

            </div>

        </section>

        <main class="bg-white main px-4 lg:px-48">
            <div class="container mx-auto">
                <article class="md:p-4 lg:p-2 mt-5">

                    <div class="main_content">
                        {!! $detail->content !!}
                    </div>

                </article>
            </div>
        </main>

        {{-- <section class="mt-12 image-slider px-2 md:px-8">
    <h2 class="secondary-heading">Image Slider Section</h2>
</section> --}}


        @if (count($trips) > 0)


            <section class="py-10 px-4 md:px-6 lg:px-8 bg-shuttle-gray">
                <div class="container mx-auto">

                    @include('partials._packages',['trips'=>$trips])


                </div>



            </section>
        @endempty
        @include('layouts.footer')

</div>








@endsection

@section('script')
<script src="{{ asset('js/region.js') }}"></script>


@endsection
