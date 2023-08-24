@extends('layouts.front')
@section('metatags')
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
                "description": "Tours and Treks in Nepal, Bhutan, Tibet and India. We specialize in trekking, peak climbing, mountain expedition, tours, mountain biking and adventure holidays.",
                "potentialAction": [{
                    "@type": "SearchAction",
                    "target": "https://himalayantrekkers.com/?s={search_term_string}",
                    "query-input": "required name=search_term_string"
                }],
                "inLanguage": "en-US"
            }, {
                "@type": "WebPage",
                "@id": "https://himalayantrekkers/blog/#webpage",
                "url": "https://himalayantrekkers.com/blog",
                "name": "Blog and News | Himalayan Trekkers",
                "isPartOf": {
                    "@id": "https://himalayantrekkers.com/#website"
                },
                "datePublished": "2009-09-25T09:57:22+00:00",
                "dateModified": "2021-06-21T07:30:39+00:00",
                "breadcrumb": {
                    "@id": "https://himalayantrekkers.com/blog/#breadcrumb"
                },
                "inLanguage": "en-US",
                "potentialAction": [{
                    "@type": "ReadAction",
                    "target": ["https://himalayantrekkers.com/blog"]
                }]
            }, {
                "@type": "BreadcrumbList",
                "@id": "https://himalayantrekkers.com/blog/#breadcrumb",
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
                        "@id": "https://himalayantrekkers.com/blog",
                        "url": "https://himalayantrekkers.com/blog",
                        "name": "Blog and News"
                    }
                }]
            }]
        }
    </script>
@endsection
@section('css')
    <style>
        .blog-bg {
            background: #FFFFFF;
            box-shadow: -13px 13px 16px rgba(0, 0, 0, 0.05);
            border-radius: 25px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pager,
        .pagination ul {
            margin-left: 0;
            *zoom: 1
        }

        .pagination ul {
            padding: 0;
            display: inline-block;

            margin-bottom: 0;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .05)
        }

        .pagination li {
            display: inline;
            text-align: center;
        }

        .pagination a {
            float: left;
            padding: 0 12px;
            line-height: 42px;
            text-decoration: none;
            color: #7a89bb;
            border-left-width: 0
        }

        .pagination .active a,
        .pagination a:hover {
            background-color: #f5f5f5;
            /* color: #94999E */
        }

        .pagination li.active {
            width: 42px;
            height: 42px;
            text-align: center;
            line-height: 42px;
            background: -moz-linear-gradient(-30deg, #c165dd 0%, #5c27fe 100%);
            background: -webkit-linear-gradient(-30deg, #c165dd 0%, #5c27fe 100%);
            background: -ms-linear-gradient(-30deg, #c165dd 0%, #5c27fe 100%);
            box-shadow: 0px 3px 7px 0px rgb(0 0 0 / 35%);
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            color: #ffffff;

        }

        .pagination .disabled a,
        .pagination .disabled a:hover,
        .pagination .disabled span {
            color: #94999E;
            background-color: transparent;
            cursor: default
        }



        .pagination-centered {
            text-align: center
        }

        .pagination-right {
            text-align: right
        }

        .pager {
            margin-bottom: 18px;
            text-align: center
        }

        .pager:after,
        .pager:before {
            display: table;
            content: ""
        }

        .pager li {
            display: inline;
            text-align: center;
        }

        .pager a {
            display: inline-block;
            padding: 5px 12px;
            background-color: #fff;
        }

        .pager a:hover {
            text-decoration: none;
            background-color: #38A169;
        }

        .pager .next a {
            float: right
        }

        .pager .previous a {
            float: left
        }

        .pager .disabled a,
        .pager .disabled a:hover {
            /* color: #999; */
            background-color: #fff;
            cursor: default
        }

        .pagination .prev.disabled span {
            float: left;
            padding: 0 12px;
            line-height: 42px;
            text-decoration: none;
            /* border: 1px solid #ddd; */
            /* border-left-width: 1 */
        }

        .pagination .next.disabled span {
            float: left;
            padding: 0 12px;
            line-height: 42px;
            text-decoration: none;
            border: 1px solid #ddd;
            border-left-width: 0
        }

        .pagination li.active,
        .pagination li.disabled {
            float: left;
            padding: 0 12px;
            line-height: 42px;
            text-decoration: none;
        }

        @media only screen and (max-width: 480px) {
            .pagination {
                font-size: 12px;
                display: block;
            }

            .pagination li {
                display: inline-block;
                margin: 0 0 10px;
            }
        }

        .blog_item_top .tags .tag.red {
            background: #D03000;
        }

        .blog_item_top .tags .tag.green {
            background: #2FB26B;
        }

        .blog_item_top .tags .tag.blue {
            background: #1140DE;
        }

        .blog_item_top .tags .tag.orange {
            background: purple;
        }

        .blog_item_top .tags .tag.black {
            background: #222;
        }

        /* .archive_block {
                background: #0030D0;
                padding: 40px 30px;
                border-radius: 7px;
            }

            .category_block {
                background: #F7F7F7;
                padding: 40px 30px;
                border-radius: 7px;
            }

            .category_block ul li a {
                width: 100%;
                display: block;
                float: left;
                font-size: 16px;
                position: relative;
            }

            .category_block ul li a .count {
                position: absolute;
                right: 0;
                color: #919193;
                top: 0;
            }

            .category_block ul li {
                margin-bottom: 15px;
            } */

    </style>

@endsection
@section('content')
    <div id="app" class="bg-shuttle-gray">
        @include('layouts.newnavbar')
        <section class="px-2 md:px-8">
            <div class="mt-5 container mx-auto breadcrumbs">
                <div class="wrap">
                    <div class="wrap_float text-dark-gray">
                        <a href="/">Home</a>
                        <span class="separator">/</span>
                        <a href="/blog">Blogs</a>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <h1 class="text-2xl md:text-4xl">
                        News & Blog Section
                    </h1>
                    <p class="mt-4 text-dark-gray subtitle">
                        Find your topic of interest.
                    </p>
                    <div class="my-5 md:hidden">
                        <blog-search></blog-search>
                    </div>
                </div>
            </div>
        </section>
        <section class="md:my-12 px-2 md:px-8">
            <div class="container mx-auto">
                <div class="md:grid md:grid-cols-10 md:gap-5">
                    <main class="relative col-span-7" id="blog">
                        <div class="grid grid-cols-2 gap-5 mb-4 blog_list">
                            @foreach ($blogs as $key => $blog)
                                @include('partials._blogpackages')
                            @endforeach
                        </div>


                        <nav class="clear-both flex justify-center mt-10" aria-label="Page navigation">
                            {{ $blogs->links() }}
                        </nav>


                    </main>
                    <aside class="col-span-3">

                        @include('partials._blogsidebar')
                        @include('partials._blogarchives')


                    </aside>
                </div>
            </div>

        </section>
        @include('layouts.footer')
    </div>
@endsection
@section('script')
    <script src="/js/blogs.js"></script>
@endsection
