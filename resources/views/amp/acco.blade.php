<section id="acco" class="mt-12 px-2 md:px-8">
    <h2 class="lg:hidden mt-2 mb-5 text-left font-semibold text-regal-blue text-2xl">Accommodation</h2>

        <div class="lg:grid lg:grid-cols-12 lg:gap-8">

            <div class="hidden lg:block lg:col-span-2">
                <h4 class="mt-3 pt-2 md:text-base xl:text-xl border-t-4 border-regal-green">Accommodation</h4>
            </div>
            <div class="lg:col-span-6 main_content">

            @if( !empty($detail->accommodation))

                {!! $detail->accommodation !!}


            @else

                {!! setting('itinerary.acco') !!}
                {{-- <p>No Acco yet</p> --}}

            @endif


        </div>



    <div class="hidden md:block mt-3 md:mt-0 lg:col-span-4" style="align-self: start;">

    </div>
        </div>
</section>



{{-- @if( !empty($detail->itinerary->morecontent))

@php
$contents = json_decode($detail->itinerary->morecontent);
@endphp
@foreach ($contents as $key => $content)
<section class="mt-12 container mx-auto px-2 md:px-8">
    <h2 class="md:hidden my-2 font-semibold text-green-500 text-center">{{ $content->key}}</h2>
    <div role="article" class="flex flex-col md:flex-row">
        <div class="hidden lg:block lg:w-1/6 px-4">
            <div class="py-2">
                <p class="border-t-4 border-green-500 py-2 ">{{ $content->key}}</p>
            </div>
        </div>
        <div class="w-full md:w-2/3 lg:w-1/2 md:px-2">


            <div class="main_content">
                {!! $content->content !!}

            </div>



        </div>
    </div>
    <div class="hidden md:block mt-3 md:mt-0 w-full md:w-1/3 p-2" style="align-self: start;">

    </div>
</section>
@endforeach

@endif --}}
