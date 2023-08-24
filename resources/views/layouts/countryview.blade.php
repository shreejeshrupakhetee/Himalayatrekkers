<div class="package_item">
    <div data-background-image-set="url({{ Voyager::image($detail->image) }})) 1x, url({{ Voyager::image($detail->thumbnail('cropped')) }} 2x"
        class="package_item_top mb-0 rounded-none has-background-image h-64 md:h-80 lg:h-109 lozad-background"
        style="background-image: url({{ Voyager::image($detail->image) }})">
        <div class="centered">
            <div class="h-full font-semibold">
                <p class="text-white text-center text-3xl md:text-5xl ts">
                    <span class="text-base">Discover</span> <br>{{ $detail->title }}
                </p>
            </div>
        </div>
    </div>

</div>
<section class="px-2 md:px-8">
    <div class="mt-5 container mx-auto breadcrumbs">
        <div class="wrap">
            <div class="wrap_float text-light-gray">
                <a href="/">Home</a>
                <span class="separator">/</span>
                <p class="inline-block">{{ $detail->title }}</p>
            </div>
        </div>

    </div>

</section>




@if ($detail->template === 'template2')
    <section class="main md:mt-5 lg:px-24">
        <div class="container mx-auto">
            <div class="md:grid md:grid-cols-3 md:gap-2 lg:gap-14">


                <article class="col-span-2 p-4 mt-6">
                    <h1 class="font-semibold text-xl md:text-3xl text-regal-blue text-center md:text-left">
                        {{ $heading }}</h1>
                    <div class="mt-4 main_content">
                        <div class="readmore js-read-more" data-rm-words="180">
                            {!! $detail->content !!}
                        </div>

                    </div>

                </article>

                @include('layouts.countrygallery')
            </div>
        </div>
    </section>
@else
    
    <main class="bg-white main px-4 lg:px-48">
        <div class="container mx-auto">
            <article class="md:p-4 lg:p-2 mt-5">
                <h1 class="font-semibold text-xl md:text-3xl text-regal-blue text-center">{{ $heading }}</h1>
                <div class="mt-5 main_content">
                    {!! $detail->content !!}
                </div>

            </article>
        </div>
    </main>
    @include('layouts.topdestinations')
@endif
