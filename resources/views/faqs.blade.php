@extends('layouts.front')
@section('metatags')
    <html itemscope itemtype="https://schema.org/FAQPage">
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
                "description": "Tours and Treks in Nepal, Bhutan, Tibet and India. We specialize in trekking, climbing, expedition, tours, treks, mountain biking and adventure holidays.",
                "potentialAction": [{
                    "@type": "SearchAction",
                    "target": "https://himalayantrekkers.com/?s={search_term_string}",
                    "query-input": "required name=search_term_string"
                }],
                "inLanguage": "en-US"
            }, {
                "@type": "WebPage",
                "@id": "https://himalayantrekkers/faqs/#webpage",
                "url": "https://himalayantrekkers.com/faqs",
                "name": "Nepal Bhutan Tibet India FAQ's | Himalayan Trekkers",
                "isPartOf": {
                    "@id": "https://himalayantrekkers.com/#website"
                },
                "datePublished": "2009-09-25T09:57:22+00:00",
                "dateModified": "2021-02-25T07:30:39+00:00",
                "breadcrumb": {
                    "@id": "https://himalayantrekkers.com/faqs/#breadcrumb"
                },
                "inLanguage": "en-US",
                "potentialAction": [{
                    "@type": "ReadAction",
                    "target": ["https://himalayantrekkers.com/faqs"]
                }]
            }, {
                "@type": "BreadcrumbList",
                "@id": "https://himalayantrekkers.com/faqs/#breadcrumb",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "item": {
                        "@type": "WebPage",
                        "@id": "https://himalayantrekkers.com",
                        "url": "https://himalayantrekkers.com",
                        "name": "Home"
                    }
                }, {
                    "@type": "ListItem",
                    "position": 2,
                    "item": {
                        "@type": "WebPage",
                        "@id": "https://himalayantrekkers.com/faqs",
                        "url": "https://himalayantrekkers.com/faqs",
                        "name": "FAQ's"
                    }
                }]
            }]
        }
    </script>

    <style>
        @media (min-width: 768px) {
            .md\:w-2\/3 {
                width: 80%;
            }
        }

    </style>

@stop

@section('content')

    <div id="app" class="bg-shuttle-gray">

        @include('layouts.newnavbar')
        <section class="px-2 md:px-8">
            <div class="mt-5 container mx-auto breadcrumbs">
                <div class="wrap">
                    <div class="wrap_float text-light-gray">
                        <a href="/">Home</a>
                        <span class="separator">/</span>
                        <a href="{{ route('faqs.index') }}">FAQ'S</a>
                    </div>
                </div>
                <div class="mt-12 text-center page_head">
                    <h1 class="title text-2xl md:text-4xl">
                        FAQ’S
                    </h1>
                    <p class="mt-4 text-light-gray">
                        Here are some of the topics you might be interested in. Please dont hesisate to contact us if you
                        dont find your question.

                    </p>



                </div>
            </div>

        </section>




        {{-- {{dd($tags)}} --}}

        {{-- <section class="mt-12 px-2 md:px-8 mb-10">
        <div class="navtab"></div>
        <div class="lg:grid lg:grid-cols-6 lg:gap-8">

            <div class="col-span-4">
                <tabs inline-template class="block">
                    <div class="container mx-auto">
                        <div id="faqnav"
                            class="flex items-start md:justify-start lg:justify-between overflow-x-scroll lg:overflow-hidden"
                            @click.self="parent">


                            @foreach ($tags as $key => $tag)
                            <a class="outline-none focus:bg-regal-green mr-2 py-1 px-4 border border-regal-blue rounded-full inline-block whitespace-nowrap"
                                v-on:click.prevent="setActive('{{ $tag->title }}')"
                                :class="{ active: isActive('{{ $tag->title }}') }" href="#tab{{ $key + 1 }}"><span
                                    class="text">{{ $tag->title }}</span></a>
                            @endforeach
                        </div>



                        <div class="main">
                            <div class="mt-12 tab-content">
                                @foreach ($tags as $key => $tag)



                                <div class="tab-pane fade" :class="{ 'active show': isActive('{{ $tag->title }}') }"
                                    id="tab{{ $key + 1 }}">
                                    @foreach ($tag->faq as $faq)
                                    <article class="faq-tab__single-content-wrapper shadow-lg mb-3">
                                        <div class="info-tab tip-icon" title="Important
                                                        Notes"><i></i></div>
                                        <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                                            <h3 itemprop="name"
                                                class="note-box text-regal-blue font-semibold text-lg px-10 ml-5 py-2 ">
                                                {{ $faq->question }}</h3>

                                            <div itemscope itemprop="acceptedAnswer"
                                                itemtype="https://schema.org/Answer"
                                                class="main_content px-10 py-2 ml-5">
                                                <div itemprop="text">
                                                    {!! $faq->answer !!}
                                                </div>

                                            </div>


                                    </article>
                                    @endforeach
                                </div>

                                @endforeach
                            </div>
                        </div>



                    </div>

                </tabs>
            </div>
            <div class="col-span-2">
                <div class="sidebar h-106">
                    <div class="mt-10 offer-sidebar" style="background-image:
            url('background-image: url('/uploads/trips/March2021/annapurna-base-camp-trek-cropped.jpg')">
                        <h3><span class="offer-sidebar__price">6%</span><!-- /.offer-sidebar__price --> Off <br>
                            On <span>
                                <a href="https://himalayantrekkers.com/itinerary/annapurna-base-camp-trek">Annapurna
                                    Base Camp Trek</a>
                                <br>
                            </span></h3>
                    </div><!-- /.offer-sidebar -->
                </div>
            </div>
        </div>

    </section>

    <div class="clearfix"></div> --}}

        <section class="px-2 md:px-6 lg:px-8">

            <vue-tabs v-bind:width="'md:w-3/4'">
                @foreach ($tags as $key => $tag)
                    <vue-tab class="relative" id="{{ $key + 1 }}" :active="true" label="{{ $tag->title }}">

                        <div class="w-full md:w-3/4 container mx-auto mt-5 bg-light-graytwo rounded-t-xl odd:bg-white">
                            <div class="tab-pane fade mb-5" id="tab{{ $key + 1 }}">
                                @foreach ($tag->faq as $key => $faq)
                                    <article class="border-b border-dotted last:border-b-0 border-black main_content">

                                        <div class="py-2 px-4" itemscope itemprop="mainEntity"
                                            itemtype="https://schema.org/Question">
                                            <h3 itemprop="name" class="bg-one text-regal-blue font-semibold text-lg py-2 ">
                                                <span>{{ $key + 1 }}.</span> {{ $faq->question }}
                                            </h3>

                                            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"
                                                class="mt-2 main_content pl-5">
                                                <div itemprop="text">
                                                    {!! $faq->answer !!}
                                                </div>

                                            </div>
                                        </div>

                                    </article>
                                @endforeach
                            </div>

                        </div>

                    </vue-tab>
                @endforeach

            </vue-tabs>

        </section>






        @include('layouts.footer')

    </div>
@endsection

@section('script')
    <script src="{{ asset('js/faqs.js') }}"></script>
@endsection
