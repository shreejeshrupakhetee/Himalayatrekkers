@extends('layouts.front')
@section('metatags')
    <meta name="title" content="reviews of himlayan trekkers">
    <meta name="keywords" content="reviews, client reviews of himalayan trekkers">
    <meta name="description"
        content="Yes, we get reviews from our clients either good or sometimes bad. Your reviews encourages us to make us better everyday. ">
    <title>Reviews from Customers | Himalayan Trekkers</title>
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
                "@id": "https://himalayantrekkers/reviews/#webpage",
                "url": "https://himalayantrekkers.com/reviews",
                "name": "Reviews From Customers | Himalayan Trekkers",
                "isPartOf": {
                    "@id": "https://himalayantrekkers.com/#website"
                },
                "datePublished": "2009-09-25T09:57:22+00:00",
                "dateModified": "2021-02-25T07:30:39+00:00",
                "breadcrumb": {
                    "@id": "https://himalayantrekkers.com/reviews/#breadcrumb"
                },
                "inLanguage": "en-US",
                "potentialAction": [{
                    "@type": "ReadAction",
                    "target": ["https://himalayantrekkers.com/reviews"]
                }]
            }, {
                "@type": "BreadcrumbList",
                "@id": "https://himalayantrekkers.com/reviews/#breadcrumb",
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
                        "@id": "https://himalayantrekkers.com/reviews",
                        "url": "https://himalayantrekkers.com/reviews",
                        "name": "Reviews"
                    }
                }]
            }]
        }
    </script>
@endsection
@section('css')
    <style>
        #CDSWIDSSP {
            width: 100% !important;
        }

    </style>

@endsection


@section('content')



    <div id="app" class="bg-shuttle-gray">

        @include('layouts.newnavbar')

        <section class="mt-5">
            <div class="container mx-auto text-center">
                <h1 class="secondary-heading">Client Reviews</h1>
                <p class="mt-2 italic">Yours Words As Is</p>
            </div>

        </section>

        <section class="my-12 px-2 md:px-8">
            <div class="container mx-auto">
                <div class="flex flex-col md:flex-row">

                    <main class="w-full md:w-2/3 md:mr-4">
                        <article>


                            <review :title="true" :reviews="{{ json_encode($allreviews) }}">

                            </review>



                        </article>
                    </main>
                    <aside class="w-full md:w-1/3 px-2 h-110" style="align-self: start;">


                        @include('layouts.tripadvisor')


                    </aside>


                </div>
            </div>
        </section>





        @include('layouts.footer')

    </div>
@endsection

@section('script')
    <script src="{{ asset('js/reviews.js') }}"></script>
    <script async
        src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=48&amp;locationId=6123130&amp;lang=en_US&amp;rating=true&amp;nreviews=5&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=false&amp;border=true&amp;display_version=2"
        data-loadtrk onload="this.loadtrk=true"></script>

@endsection
