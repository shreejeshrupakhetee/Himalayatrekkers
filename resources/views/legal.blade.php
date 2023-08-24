@extends('layouts.front')

@section('metatags')

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}

@endsection
@section('css')
    <style>
        .banner {
            background: linear-gradient(to bottom,
                    rgba(0, 0, 0, 0) 0%,
                    rgba(0, 0, 0, 0.75) 100%);
        }

        .locate {
            display: block;
            width: 100%;
            position: absolute;
            bottom: 0;
            text-shadow: 2px 2px #000;
            padding: 10px 20px;
            color: white;
            z-index: 8;
        }

    </style>

@endsection

@section('content')
    @include('layouts.newnavbar')

    <div id="app" class="bg-shuttle-gray">
        <section class="px-2 md:px-8">
            <div class="mt-5 container mx-auto breadcrumbs">
                <div class="wrap">
                    <div class="wrap_float text-dark-gray">
                        <a href="/">Home</a>
                        <span class="separator">/</span>
                        <a href="{{ route('legal.index') }}">Legal Documents</a>
                    </div>
                </div>

            </div>

        </section>

        <section class="mt-5">
            <div class="container mx-auto text-center px-2 md:px-48">
                <h2 class="secondary-heading">Legal Documents </h2>
            </div>

        </section>
        <div class="mt-6 container mx-auto flex">
            <main class="w-full md:w-3/4 mx-auto pr-2">
                <section class="py-5 main_content px-6 sm:px-2 xl:px-0 col-sm-3">

                    <div class="px-2">
                        <div class="flex flex-col md:flex-row items-stretch -mx-2">
                            <div class="w-full md:w-1/2 px-2 self-stretch">
                                <div class="bg-gray-400">

                                    <figure class="block w-full relative">
                                        <img class="object-fill w-full h-100" src="/images/legal/company.jpg" alt="Company Registration Himalayan Trekkers">
                                        <figcaption class="banner locate text-2xl">Company Registration</figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-2 mt-2 md:mt-0">
                                <div class="bg-gray-500">

                                    <figure class="block w-full relative">
                                        <img class="object-fill w-full h-100" src="/images/legal/tourism-licence.jpg"
                                            alt="Tourism Licence">
                                        <figcaption class="banner locate text-2xl">Tourism Licence</figcaption>
                                    </figure>

                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="mt-6 px-2">
                        <div class="flex flex-col md:flex-row items-stretch -mx-2">
                            <div class="w-full md:w-1/2 px-2 self-stretch">
                                <div class="bg-white">

                                    <figure class="block w-full relative">
                                        <img class="object-fill w-full h-100" src="/images/legal/gharelu.jpg" alt="Industry Registration">
                                        <figcaption class="banner locate text-2xl">Industry Registration</figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-2 mt-2 md:mt-0 self-stretch">
                                <div class="bg-gray-500">

                                    <figure class="block w-full relative">
                                        <img class="object-fill w-full h-100" src="/images/legal/pan.jpg" alt="PAN">
                                        <figcaption class="banner locate text-2xl">Pan</figcaption>
                                    </figure>

                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="mt-6 px-2">
                        <div class="flex flex-col md:flex-row items-stretch -mx-2">
                            <div class="w-full md:w-1/2 px-2 self-stretch">
                                <div class="bg-white">

                                    <figure class="block w-full relative">
                                        <img class="object-fill w-full h-64" src="/images/legal/nma-certificate.jpg" alt="">
                                        <figcaption class="banner locate text-2xl">Nepal Mountaineering Association
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-2 self-stretch mt-4 md:mt-0">
                                <div class="bg-gray-500">

                                    <figure class="block w-full relative">
                                        <img class="object-fill w-full h-64" src="/images/legal/taan.jpg" alt="">
                                        <figcaption class="banner locate text-2xl">Trekking Agencies Association of Nepal
                                        </figcaption>
                                    </figure>

                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="mt-6 px-2">
                        <div class="flex flex-col md:flex-row items-stretch -mx-2">
                            <div class="w-full px-2 self-stretch">
                                <div class="bg-white">

                                    <figure class="block w-full relative">
                                        <img class="object-fill w-full h-full rotateimg2"
                                            src="/images/legal/Vitof-Nepal.jpg" alt="">
                                        <figcaption class="banner locate text-2xl">Village Development Promotion Forum Nepal
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>


                        </div>


                    </div>
                    {{-- <div class="container mx-auto border text-center mt-12 w-full">
                    <figure class="block w-full p-2">
                        <img class="block object-fill w-full h-auto" src="/images/legal/nma-certificate.jpg" alt="">
                        <figcaption class="font-semibold text-lg">Nepal Mountaineering Assoc</figcaption>
                    </figure>
                </div> --}}


                </section>


            </main>

        </div>

    </div>

    @include('layouts.footer')






@endsection

@section('script')
    <script src="{{ asset('js/region.js?v=3.0') }}"></script>

@endsection
