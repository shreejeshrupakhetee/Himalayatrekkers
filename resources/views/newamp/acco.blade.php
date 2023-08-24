<section id="accommodation" class="mt-10 px-4 md:px-6 xl:px-8">
    <div class="container mx-auto">
        <div class="lg:grid lg:grid-cols-12 lg:gap-5">
            <div class="col-span-8 bg-white">

                <h2 class="pl-5 pt-5 border-t-4 border-regal-red uppercase font-bold text-2xl ">Accommodation</h2>
                <article class="main_content p-4">
                    {{-- <h2 class="mt-5 uppercase font-bold"></h2> --}}

                    @if (!empty($detail->accommodation))
                        {!! $detail->accommodation !!}
                    @else
                        {!! setting('itinerary.acco') !!}
                    @endif

                </article>
            </div>
            <div class="col-span-4">
                @if ($result1)

                    <div class="hidden lg:block mt-5 bg-light-grayone rounded-l-xl sticky top-20">
                        <div class="px-5 py-2">
                            <div class="hidden lg:block">
                                <h3 class="block_title text-regal-blue font-bold mb-4 text-2xl">Similar Trips</h3>
                                @foreach ($result1 as $r)
                                    <a class="block" href="{{ route('itinerary.index', $r->slug) }}/">

                                        <div class="grid grid-cols-3 gap-1 mb-2">
                                            <div class="left col-span-1">

                                                <figure class="relative">
                                                    <amp-img class="rounded-l-xl"
                                                        src="{{ Voyager::image(getThumbnail($r->image, 'cropped')) }}"
                                                        alt="{{ $r->title }}" width="112" height="75"
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
                    </div>
                @endif
            </div>
        </div>
    </div>


</section>
