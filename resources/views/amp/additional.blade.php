@if( !empty($detail->itinerary->morecontent))

@php
$contents = json_decode($detail->itinerary->morecontent);
@endphp
@foreach ($contents as $key => $content)
<article class="mt-12 md:mt-8 px-2 md:px-8">
    <h2 class="lg:hidden mt-2 mb-5 text-left font-semibold text-regal-blue text-2xl">{{ $content->key}}</h2>
    <div class="lg:grid lg:grid-cols-12 lg:gap-8">
        <div class="hidden lg:block lg:col-span-2">

                <h3 class="mt-3 pt-2 md:text-base xl:text-xl border-t-4 border-regal-green ">{{ $content->key}}</h3>

        </div>
        <article class="lg:col-span-6 main_content">
            {!! $content->content !!}
        </article>
    </div>
    <div class="hidden md:block col-span-4" style="align-self: start;">

    </div>
</article>
@endforeach

@endif
