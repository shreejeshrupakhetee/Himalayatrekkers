@if ($reviews->count() > 0)

    <section id="reviews" class="mt-5 px-4 md:px-6 xl:px-8">
        @if (in_array($detail->id, $trips))
            <div class="container mx-auto bg-white">
                <h2 class="pl-5 pt-5 border-t-4 border-red-500 uppercase font-bold text-2xl mb-4">Reviews</h2>

                {{-- {{dd($reviews)}} --}}

                <div class="lg:grid lg:grid-cols-12 lg:gap-5">
                    @foreach ($reviews as $review)
                        {{-- <div class="col-span-6"> --}}
                        <div
                            class="col-span-6 pb-5 p-4 bg-light-graytwo border-b border-dotted last:border-b-0 border-black mt-2 md:mt-0">
                            <div class="flex justify-between items-center">
                                <div class="reviewer flex items-center">
                                    <div class="mr-2">
                                        @if (!empty($review->image))
                                            <amp-img class="mt-2 object-fill rounded-full"
                                                alt="Review by {{ $review->person_name }} " width="60"
                                                height="60" layout="fixed" src="{{ $review->image }}">
                                            </amp-img>
                                        @else
                                            <amp-img class="mt-2 object-fill rounded-full"
                                                alt="Review by {{ $review->person_name }} " width="60"
                                                height="60" layout="fixed" src="/images/noimage.png">
                                            </amp-img>
                                        @endif

                                    </div>
                                    <div>
                                        <p>{{ $review->person_name }}</p>
                                        <p class="text-sm text-light-300">{{ $review->country }}</p>
                                    </div>
                                </div>
                                <div>
                                    @include('layouts.star', ['rate' => (int) $review->rating])
                                </div>

                            </div>
                            <blockquote class="mt-2 main_content">
                                {!! $review->description !!}
                            </blockquote>
                        </div>
                        {{-- </div> --}}
                    @endforeach

                    {{-- <div class="col-span-4"></div> --}}
                </div>
            </div>
        @else
            <div class="container mx-auto">
                <div class="lg:grid lg:grid-cols-12 lg:gap-5">
                    <div class="col-span-8 bg-white">

                        <h2 class="pl-5 pt-5 border-t-4 border-red-500 uppercase font-bold text-2xl ">Reviews</h2>

                        {{-- {{dd($reviews)}} --}}

                        @foreach ($reviews as $review)
                            <div
                                class="pb-5 p-4 odd:bg-light-graytwo border-b border-dotted last:border-b-0 border-black">

                                <div class="flex justify-between items-center">
                                    <div class="reviewer flex items-center">
                                        <div class="mr-2">
                                            @if (!empty($review->image))
                                                <amp-img class="mt-2 object-fill rounded-full"
                                                    alt="Review by {{ $review->person_name }} " width="60"
                                                    height="60" layout="fixed" src="{{ $review->image }}">
                                                </amp-img>
                                            @else
                                                <amp-img class="mt-2 object-fill rounded-full"
                                                    alt="Review by {{ $review->person_name }} " width="60"
                                                    height="60" layout="fixed" src="/images/noimage.png">
                                                </amp-img>
                                            @endif

                                        </div>
                                        <div>
                                            <p>{{ $review->person_name }}</p>
                                            <p class="text-sm text-light-300">{{ $review->country }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        @include('layouts.star', ['rate' => (int) $review->rating])
                                    </div>

                                </div>
                                <blockquote class="mt-2 main_content">
                                    {!! $review->description !!}
                                </blockquote>
                            </div>
                        @endforeach

                    </div>
                    <div class="col-span-4"></div>
                </div>
            </div>

        @endif

        <div class="pb-5 container mx-auto mt-5">
            <a aria-label="Read Reviews on Facebook" href="https://www.facebook.com/himalayantrekkersofficial/reviews" target="_blank"
                class="text-base inline-block font-bold border border-regal-blue text-white bg-new-blue px-4 py-2">Reviews
                on Facebook</a>
            <a aria-label="Read Reviews on Google" href="https://www.google.com/search?q=himalayan+trekkers&sxsrf=ALiCzsZT-uI9jIqJfAhzwEOKvboHK62Z7A%3A1672152948259&ei=dAerY_SpD4egseMPnbix0Aw&oq=himalayan+trekkers+re&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAxgAMgUIABCABDIGCAAQFhAeMgYIABAWEB4yBggAEBYQHjIGCAAQFhAeMgYIABAWEB4yCQgAEBYQHhDxBDIGCAAQFhAeMgYIABAWEB4yAggmOgoIABBHENYEELADOgcIABCwAxBDOhIILhDHARCvARDIAxCwAxBDGAE6DAguEMgDELADEEMYAUoECEEYAEoECEYYAVA2WPcEYP8MaAFwAHgAgAGdAYgBwAOSAQMwLjOYAQCgAQHIARHAAQHaAQYIARABGAg&sclient=gws-wiz-serp" target="_blank"
                class="text-base inline-block font-bold border border-regal-blue text-white bg-new-blue px-4 py-2 md:ml-2 mt-4 md:mt-0">Reviews
                on Google</a>
            <a aria-label="Read Reviews on Trip Advisor" href="https://www.tripadvisor.com/Attraction_Review-g293890-d6123130-Reviews-Himalayan_Trekkers-Kathmandu_Kathmandu_Valley_Bagmati_Zone_Central_Region.html"
                target="_blank"
                class="text-base inline-block font-bold border border-regal-blue text-white bg-new-blue px-4 py-2 md:ml-2 mt-4 md:mt-0">Reviews
                on Trip Advisor</a>
        </div>
    </section>
@endif
