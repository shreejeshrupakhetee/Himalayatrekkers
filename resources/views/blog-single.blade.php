@extends('layouts.front')
@section('metatags')
    <link rel="canonical" href="https://himalayantrekkers.com/blog/{{ $detail->slug }}">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@graph": [{
                "@type": "WebSite",
                "@id": "https://himalayantrekkers.com/#website",
                "url": "https://himalayantrekkers.com",
                "name": "Himalayan Trekkers",
                "description": "{{$detail->metadisc}}",
                "potentialAction": [{
                    "@type": "SearchAction",
                    "target": "https://himalayantrekkers.com/?s={search_term_string}",
                    "query-input": "required name=search_term_string"
                }],
                "inLanguage": "en-US"
            }, {
                "@type": "Article",
                "@id": "https://himalayantrekkers/blog/{{ $detail->slug }}/#webpage",
                "url": "https://himalayantrekkers.com/blog/{{ $detail->slug }}",
            
                "name": "{{ $detail->title }} | Himalayan Trekkers",
                "isPartOf": {
                    "@id": "https://himalayantrekkers.com/#website"
                },
                "datePublished": "{{ $detail->created_at }}",

                "breadcrumb": {
                    "@id": "https://himalayantrekkers.com/blog/{{ $detail->slug }}#breadcrumb"
                },
                "inLanguage": "en-US",
                "potentialAction": [{
                    "@type": "ReadAction",
                    "target": ["https://himalayantrekkers.com/blog/{{ $detail->slug }}"]
                }]
            }, {
                "@type": "BreadcrumbList",
                "@id": "https://himalayantrekkers.com/blog/{{ $detail->slug }}/#breadcrumb",
                "itemListElement": [{
                        "@type": "ListItem",
                        "position": 1,
                        "item": {
                            "@type": "WebPage",
                            "@id": "https://himalayantrekkers.com",
                            "url": "https://himalayantrekkers.com",
                            "name": "Home"
                        }
                    },
                    {
                        "@type": "ListItem",
                        "position": 2,
                        "item": {
                            "@type": "WebPage",
                            "@id": "https://himalayantrekkers.com/blog",
                            "url": "https://himalayantrekkers.com/blog",
                            "name": "Blog and News"
                        }
                    },
                    {
                        "@type": "ListItem",
                        "position": 3,
                        "item": {
                            "@type": "WebPage",
                            "@id": "https://himalayantrekkers.com/blog/{{ $detail->slug }}",
                            "url": "https://himalayantrekkers.com/blog/{{ $detail->slug }}",
                            "name": "{{ $detail->title }}"
                        }
                    }
                ]
            }]
        }
    </script>

@stop
@section('css')

    <link rel="stylesheet" href="{{ asset('vendor/laraberg/css/laraberg.css') }}">


@endsection


@section('content')

    <div id="app" class="bg-shuttle-gray">

        @include('layouts.newnavbar')

        @php
            
            Str::macro('readDuration', function (...$text) {
                $totalWords = str_word_count(implode(' ', $text));
                $minutesToRead = round($totalWords / 250);
            
                return (int) max(1, $minutesToRead);
            });
            
        @endphp


        <section class="px-4 md:px-8">
            <div class="mt-5 container mx-auto breadcrumbs">
                <div class="wrap">
                    <div class="wrap_float text-dark-gray">
                        <a href="/">Home</a>
                        <span class="separator">/</span>
                        <a href="{{ route('blog.index') }}">Blog</a>
                        <span class="separator">/</span>
                        <a href="#">{{ $detail->title }}</a>
                    </div>
                </div>
                <div class="mt-3 page_head">
                    <div class="my-5 md:hidden">
                        <blog-search></blog-search>
                    </div>
                </div>
            </div>

        </section>
        <section class="mt-2 md:my-12 px-4 md:px-8">

            <div class="container mx-auto">
                <div class="md:grid md:grid-cols-10 md:gap-5">

                    <div class="relative col-span-7" id="blog">

                        <div class="rouded-l-xl">
                            <a href="{{ Voyager::image($detail->image) }}" v-lightbox>
                                <amp-img width="1366" height="768" class="rounded-l-xl"
                                    src="{{ Voyager::image($detail->image) }}" layout="responsive"
                                    alt="{{ $detail->alt_text ? $detail->alt_text : $detail->title }}">
                                </amp-img>
                            </a>
                            @if (!empty($detail->caption))
                                <p class="mt-2 text-center text-sm">{{ $detail->caption }}</p>
                            @endif

                        </div>
                        <div class="">

                            <div class="mt-8">
                                <h1 class="font-semibold text-left capitalize text-regal-blue text-lg md:text-4xl">
                                    {{ $detail->title }}
                                </h1>

                                <div class="mt-5 flex flex-col md:flex-row justify-between items-center">
                                    <p class="font-bold text-gray-900">Approx. Read Time:
                                        <span>
                                            {{ Str::readDuration($detail->body) . ' Minutes' }}
                                        </span>

                                    </p>
                                    <p class="my-2 md:my-0 text-regal-blue italic font-semibold">
                                        <span>Publised at </span>{{ $detail->created_at->toFormattedDateString() }}
                                    </p>
                                    <social-networking url="http://google.com"></social-networking>
                                </div>





                            </div>
                            <div class="sblog px-2 md:px-0">


                                @if (!empty($toc))
                                    <toc :article-toc="{{ json_encode($toc) }}"></toc>
                                @endif


                                <article class="mt-5 main_content t_content">
                                    {!! $detail->body !!}
                                </article>
                                @if ($detail->authorId)
                                    <div
                                        class="p-2 md:p-4 author bg-white border-t border-gray-200 border-dotted shadow-lg hover:shadow-xl transition rounded-lg">
                                        {{-- {{$detail->author}} --}}
                                        <div class="flex items-center">
                                            <div
                                                class="rounded-full bg-gray-100 w-20 h-20 p-2 z-0 shadow-lg hover:shadow-xl transition mr-4">
                                                <img class="h-full rounded-full w-full object-cover"
                                                    src="{{ Voyager::image($detail->authorId->image) }}"
                                                    alt="{{ $detail->authorId->name }}" />
                                            </div>

                                            <div>
                                                <p class="text-sm text-light-gray">
                                                    About the author
                                                </p>
                                                <label class="font-bold text-black text-lg">
                                                    {{ $detail->authorId->name }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="text-black mt-4 leading-relaxed">
                                            {!! $detail->authorId->content !!}
                                        </div>





                                        {{-- <div class="mt-5 h-full flex items-center justify-center relative">
                                                <div
                                                    class="relative h-auto bg-white rounded-md pt-24 pb-8 px-2 shadow-md hover:shadow-lg transition flex flex-col items-center">
                                                    <div
                                                        class="absolute rounded-full bg-gray-100 w-28 h-28 p-2 z-0 -top-8 shadow-lg hover:shadow-xl transition">
                                                        <div class="rounded-full bg-black w-full h-full overflow-auto">
                                                            <img class="h-full w-full object-cover"
                                                                src="{{ Voyager::image($detail->authorId->image) }}"
                                                                alt="{{ $detail->authorId->name }}">
                                                        </div>
                                                    </div>
                                                    <p class="text-sm text-light-gray">
                                                        About the author
                                                    </p>
                                                    <label class="font-bold text-black text-lg">
                                                        {{ $detail->authorId->name }}
                                                    </label>
                                                    <div class="text-center text-black mt-4 leading-relaxed px-4 md:px-12">
                                                        {!! $detail->authorId->content !!}
                                                    </div>

                                                </div>

                                            </div> --}}




                                    </div>
                                @endif




                                <lightbox></lightbox>
                                <div class="pt-10 grid grid-cols-2 gap-10 justify-between">
                                    @if (isset($previous))
                                        <div>
                                            <a href="{{ url('blog/' . $previous->slug) }}/">
                                                <div
                                                    class="text-sm max-w-max capitalize font-semibold p-2 text-white hover:text-black bg-regal-red btns hover:bg-hover-yellow trans5 rounded-sm">

                                                    <div class="flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                                                        </svg>
                                                        <p>{{ Str::limit($previous->title, 25) }}</p>

                                                    </div>

                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                    @if (isset($next))
                                        <div>
                                            <a href="{{ url('blog/' . $next->slug) }}/">
                                                <div
                                                    class="ml-auto text-sm max-w-max capitalize font-semibold p-2 text-white hover:text-black bg-regal-red btns hover:bg-hover-yellow trans5 rounded-sm">

                                                    <div class="flex justify-between items-center">
                                                        <p>{{ Str::limit($next->title, 25) }}</p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-3"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>

                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                </div>


                                <blog-subscribe></blog-subscribe>

                            </div>


                        </div>


                    </div>
                    <div class="col-span-3">

                        @include('partials._blogsidebar')


                        @if ($result1)

                            <div class="mt-5 bg-light-grayone rounded-l-xl">

                                <div class="p-5">



                                    <h3 class="block_title text-regal-blue font-bold  text-2xl">Popular Tours</h3>
                                    @foreach ($result1 as $r)
                                        <a class="block mt-6" href="{{ route('itinerary.index', $r->slug) }}/">

                                            <div class="grid grid-cols-3 gap-1 mb-5">
                                                <div class="left col-span-1">

                                                    <figure class="relative">
                                                        <amp-img v-pre class="rounded-l-xl"
                                                            src="{{ Voyager::image(getThumbnail($r->image, 'cropped')) }}"
                                                            alt="{{ $r->title }}" width="112" height="80"
                                                            layout="intrinsic">
                                                        </amp-img>
                                                    </figure>

                                                </div>

                                                <div
                                                    class="col-span-2 h-20 px-2 pb-2  text-regal-blue flex flex-col text-sm font-semibold">
                                                    <p>
                                                        {{ Str::limit($r->title, 90) }}

                                                    </p>
                                                    <p class="xl:mt-auto">
                                                        <span class="text-sm xl:font-bold text-gray-900">
                                                            {{ $r->duration }}
                                                            {{ Str::plural('Day', $r->duration) }}
                                                        </span>

                                                    </p>
                                                </div>

                                            </div>
                                        </a>
                                    @endforeach

                                </div>
                            </div>
                        @endif



                        @if ($result2)


                            <div class="mt-5 bg-light-grayone rounded-l-xl">

                                <div class="p-5">



                                    <h3 class="block_title text-regal-blue font-bold  text-2xl">Popular Treks</h3>
                                    @foreach ($result2 as $r)
                                        <a class="block mt-6" href="{{ route('itinerary.index', $r->slug) }}/">

                                            <div class="grid grid-cols-3 gap-1 mb-5">
                                                <div class="left col-span-1">

                                                    <figure class="relative">
                                                        <amp-img v-pre class="rounded-l-xl"
                                                            src="{{ Voyager::image(getThumbnail($r->image, 'cropped')) }}"
                                                            alt="{{ $r->title }}" width="112" height="80"
                                                            layout="intrinsic">
                                                        </amp-img>
                                                    </figure>

                                                </div>

                                                <div
                                                    class="col-span-2 h-20 px-2 pb-2  text-regal-blue flex flex-col text-sm font-semibold">
                                                    <p>
                                                        {{ Str::limit($r->title, 90) }}

                                                    </p>
                                                    <p class="xl:mt-auto">
                                                        <span class="text-sm xl:font-bold text-gray-900">
                                                            {{ $r->duration }}
                                                            {{ Str::plural('Day', $r->duration) }}
                                                        </span>

                                                    </p>
                                                </div>

                                            </div>
                                        </a>
                                    @endforeach

                                </div>
                            </div>

                        @endif

                        @if ($result3)


                            <div class="mt-5 bg-light-grayone rounded-l-xl ">

                                <div class="p-5">



                                    <h3 class="block_title text-regal-blue font-bold  text-2xl">Popular Reads</h3>
                                    @foreach ($result3 as $r)
                                        <a class="mt-6 block" href="{{ route('blogSingle.index', $r->slug) }}">

                                            <div class="grid grid-cols-3 gap-1 mb-5">
                                                <div class="left col-span-1">

                                                    <figure class="relative">
                                                        <amp-img v-pre class="rounded-l-xl"
                                                            src="{{ Voyager::image(getThumbnail($r->image, 'cropped')) }}"
                                                            alt="{{ $r->title }}" width="112" height="80"
                                                            layout="intrinsic">
                                                        </amp-img>
                                                    </figure>

                                                </div>
                                                <div class="col-span-2 h-20 px-2 pb-2  text-regal-blue flex flex-col">
                                                    <p class="text-sm font-semibold">
                                                        {{ Str::limit($r->title, 90) }}
                                                    </p>


                                                    <p class="xl:mt-auto">
                                                        <span class="text-sm xl:font-bold text-gray-900">
                                                            {{ Str::readDuration($r->body) . ' Min Read' }}
                                                        </span>

                                                    </p>
                                                </div>

                                            </div>
                                        </a>
                                    @endforeach

                                </div>
                            </div>

                        @endif

                        {{-- <div class="mt-5 p-5 bg-light-grayone rounded-l-xl">
                                    <h3 class="block_title text-black font-bold mb-6 text-3xl">Popular Reads</h3>
                                    @foreach ($result3 as $r)
                                        <a class="block" href="{{ route('blogSingle.index', $r->slug) }}">

                                            <div class="grid grid-cols-3 gap-1 mb-5">
                                                <div class="left col-span-1">

                                                    <figure class="relative">
                                                        <img class="rounded-l-xl"
                                                            src="{{ Voyager::image(getThumbnail($r->image, 'cropped')) }}"
                                                            alt="{{ $r->title }}" width="112" height="75">
                                                    </figure>

                                                </div>
                                                <div
                                                    class="col-span-2 h-20 px-2 pb-2  text-regal-blue flex flex-col text-sm font-semibold">
                                                    <p>
                                                        {{ Str::limit($r->title, 90) }}
                                                    </p>
                                                    <p class="mt-auto">
                                                    Read Time
                                                </p>
                                                </div>

                                            </div>
                                        </a>
                                    @endforeach
                                </div> --}}

                    </div>
                </div>
            </div>


        </section>







        @include('layouts.footer')

    </div>




@endsection

@section('script')
    <script src="{{ asset('js/blogs.js') }}"></script>


@endsection
