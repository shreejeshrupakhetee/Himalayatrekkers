@extends('layouts.front')
@section('metatags')
    <meta name="title" content="Blogs and News | Himalayan Trekkers">
    <meta name="keywords" content="travel blogs, tour blogs, trek blogs, himalayan trekkers blogs">
    <meta name="description"
        content="Scroll through the acrhived blog topics of our blogs section according to month and current year.">
    <title>Archived Blogs and News | Himalayan Trekkers</title>
    <link rel="canonical" href="{{ route('blog.index') }}">
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
            *display: inline;
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
            /* border: 1px solid #ddd; */
            /* border-left-width: 0 */
        }

        .pagination li.active {
            /* background: #364E63; */
            /* color: #fff; */
        }

        .pagination li:first-child {
            /* border-left-width: 1px; */
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

        .archive_block {
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
        }

    </style>

@endsection



@section('content')

    <div id="app" class="bg-shuttle-gray">

        @include('layouts.newnavbar')




        <section class="px-4 md:px-8">
            <div class="mt-5 container mx-auto breadcrumbs">
                <div class="wrap">
                    <div class="wrap_float">
                        <a href="/">Home</a>
                        <span class="separator">/</span>
                        <a href="/blog">Blogs</a>
                    </div>
                </div>

                <div class="mt-3 page_head text-center">
                    <h1 class="title text-2xl md:text-4xl">
                        Archived Posts of {{ $slug }}
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

        <section class="mt-2 md:my-12 px-4 md:px-8">

            <div class="container mx-auto">
                <div class="md:grid md:grid-cols-10 md:gap-5">

                    <main class="relative col-span-7" id="blog">
                        <div class="grid grid-cols-2 gap-5 mb-4 blog_list">
                            @foreach ($archive_posts as $key => $blog)

                                @include('partials._blogpackages')

                            @endforeach
                        </div>


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
