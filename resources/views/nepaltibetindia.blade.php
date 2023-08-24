@extends('layouts.front')
@include('layouts.countrymeta')


@section('content')

    <div id="app" v-cloak>

        @include('layouts.newnavbar')
        <div class="hero-image">
            <div class="row">

                <div class="wrapper padded-container {{ $detail->blend ? $detail->blend : '' }}">
                    <img class="img centered" src="{{ Voyager::image($detail->image) }}" alt="{{ $detail->title }}">
                    <div class="hero-slider__content-wrapper relative z-10 ts">
                        <div class="container mx-auto">



                            <div class="hero-slider__content hero-slider__content--center">
                                <h1 class="text-white font-semibold text-3xl md:text-5xl ts">
                                    <span class="text-base">Discover</span> <br>{{ $detail->title }}
                                </h1>


                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($detail->template === 'template2')
            <section class="main md:mt-5 lg:px-24">
                <div class="container mx-auto">
                    <div class="md:grid md:grid-cols-3 md:gap-2 lg:gap-14">


                        <article class="col-span-2 px-2  md:p-4 mt-6">
                            <h2 class="font-semibold text-xl md:text-3xl text-regal-blue text-center md:text-left">Nepal
                                Tibet
                                India Tours
                            </h2>
                            <div class="mt-4 main_content">
                                <div class="readmore js-read-more" data-rm-words="180">
                                    {!! $detail->content !!}
                                </div>

                            </div>

                        </article>

                        @php
                            $data['gallery'] = json_decode($detail->gallery);
                        @endphp
                        @if (!empty($data['gallery']))
                            <div class="pt-20 mt-4 md:mt-24 px-2">
                                <div class="composition h-110">
                                    @foreach ($data['gallery'] as $key => $image)
                                        <a href="{{ Voyager::image($image) }}" v-lightbox>
                                            <img src="{{ Voyager::image($image) }}"
                                                alt="{{ $detail->title }} Image {{ $key + 1 }}"
                                                class="object-cover h-36 composition__photo composition__photo--p{{ $key + 1 }}">
                                        </a>
                                    @endforeach
                                </div>
                                <lightbox></lightbox>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @else
            <section class="main md:mt-4 lg:mt-16 lg:px-24">
                <div class="container mx-auto">
                    <div class="px-2 md:px-32">


                        <article class="col-span-2 px-2  md:p-4 mt-6">
                            <h2 class="font-semibold text-xl md:text-3xl text-regal-blue text-center">Nepal Tibet India
                                Tours</h2>
                            <div class="mt-4 main_content">
                                <div class="readmore js-read-more" data-rm-words="180">
                                    {!! $detail->content !!}
                                </div>

                            </div>

                        </article>




                    </div>
                </div>
            </section>
            @include('layouts.topdestinations')
        @endif



        <section class="py-10 px-4 md:px-6 lg:px-8 bg-shuttle-gray">
            <front-page :id="{{ json_encode($detail->id) }}"></front-page>
        </section>


        @include('layouts.footer')

    </div>
@endsection

@section('script')
    <script src="{{ asset('js/frontcountry.js') }}"></script>


@endsection
