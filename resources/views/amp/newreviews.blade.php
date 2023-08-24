@if( $detail->reviews->count() > 0)
<section id="reviews" class="mt-12 px-2 md:px-8">

    <h2 class="lg:hidden my-2 text-left font-semibold text-regal-blue text-2xl">Reviews</h2>
    <div class="lg:grid lg:grid-cols-12 lg:gap-8">

        <div class="hidden lg:block lg:col-span-2">
            <div class="mt-2 py-2">
                <p class="md:text-base xl:text-xl border-t-4 border-regal-green py-2">Reviews</p>
            </div>
        </div>
        <div class="lg:col-span-6">
        <amp-list width="auto" height="350" layout="fixed-height" src="/api/reviews/{{$detail->id}}"
                binding="refresh" load-more="manual" load-more-bookmark="next_page_url">
                <template type="amp-mustache">
                    <div class="list-item">

                        <div class="my-4 pb-2 carda border">

                            <div class="flex justify-between items-center p-4">
                                <div class="reviewer flex items-center">
                                    <div class="mr-2">
                                    @{{#image}}




                                       <amp-img class="mt-2 object-fill rounded-full" alt="Review by @{{person_name}} "
                                        width="60" height="60" layout="fixed" src="@{{image}}">
                                    </amp-img>



                                    @{{/image}}
                                    @{{^image}}

                                    <amp-img class="mt-2 object-fill rounded-full" alt="Review by @{{person_name}} "
                                        width="60" height="60" layout="fixed" src="/images/noimage.png">
                                    </amp-img>
@{{/image}}
</div>

                                    <div>
                                        <p>@{{person_name}}</p>
                                        <p class="text-sm text-gray-300">@{{country}}</p>
                                    </div>

                                </div>

                                <div class="review bgitin">
                                    @{{rating}} out of 5
                                </div>
                            </div>
                            <blockquote class="mt-1 px-4 main_content">
                                @{{{description}}}
                            </blockquote>
                            <div class="flex justify-end">
                                <p class="text-light-gray mr-3">@{{date}}</p>
                                </div>

                        </div>

                    </div>
                </template>
                <div fallback>
                    <div class="flex font-semibold text-regal-red justify-center">
                        <p>Oops, something went wrong. Please check your internet connection.</p>
                    </div>
                </div>
                <div placeholder>
                    <div class="flex font-semibold text-regal-red justify-center">
                        <p>Loading...</p>
                    </div>
                </div>
                <amp-list-load-more load-more-failed>
                    ERROR
                </amp-list-load-more>
                <amp-list-load-more load-more-end>
                    <div class="flex font-semibold text-regal-blue justify-center">
                        <p class="mt-5">End of Reviews</p>
                    </div>
                </amp-list-load-more>
            </amp-list>







    </div>



    <div class="mt-4 lg:col-span-4" style="align-self: start;">
        {{--   <div class="carda p-2 lg:p-5 md:max-w-sm md:mx-auto">
            <h2 class="text-regal-green font-semibold mb-2 text-lg">Trips You Might Like</h2>
            @foreach ($related_trips as $r)


            <div class="grid grid-cols-3 gap-1 mb-5">
                <div class="left col-span-1">
                    <a href="{{route('itinerary.index',$r->slug)}}">
                        <figure class="relative">
                            <amp-img class="logo" src="{{Voyager::image((getThumbnail($r->image,'cropped')))}}" alt="{{ $r->title }}" width="112" height="75"
                        layout="intrinsic">
                    </amp-img>
                        </figure>
                    </a>
                </div>
                <div class="col-span-2 flex flex-col justify-between h-20 px-2 pb-2  text-regal-blue">
                    <h3 class="font-semibold line-clamp-3">
                        {{ Str::limit($r->title,50) }}
                    </h3>
                    <div class="flex justify-between items-center w-full text-sm">
                        <p>{{ $r->duration}} Days</p>
                        <p>$ {{ $r->price}}</p>

                    </div>

                </div>

            </div>

            @endforeach
        </div>
      <div class="p-8 w-full h-full lg:col-span-2 bgtrip-info">
            <div class="rating mx-auto lg:mx-0 bg-regal-green rounded-lg text-center lg:text-left w-32">
                <h2 class="leading-5 p-8 text-center text-white font-semibold text-3xl">
                    {{ $detail->averageRating()}} <br><span class="text-xs">Out of {{$detail->reviews->count()}}</span>
                </h2>
            </div>
            <div class="pl-1 mt-2 flex text-sm w-32 mx-auto lg:mx-0">

                @include('layouts.star', ['rate' => (int) $detail->reviews->avg('rating')])
            </div>

            <div class="mt-4 review-sumary">
                <div class="item">
                    <div class="label">
                        Excellent
                    </div>
                    <div class="progress">
                        <div class="percent green"
                        style="width:{{(int)($detail->reviews->count('rating',5)) * 50}}%">
                        </div>
                    </div>
                    <div class="number">
                        <span>{{$detail->reviews->count('rating',5)}}</span></div>
                </div>
                <div class="item">
                    <div class="label">
                        Very Good
                    </div>
                    <div class="progress">
                        <div class="percent green" style="width:20%"></div>
                    </div>
                    <div class="number"><span>0</div>
                </div>
                <div class="item">
                    <div class="label">
                        Average
                    </div>
                    <div class="progress">
                        <div class="percent green" style="width: 0%"></div>
                    </div>
                    <div class="number">2</div>
                </div>
                <div class="item">
                    <div class="label">
                        Poor
                    </div>
                    <div class="progress">
                        <div class="percent green" style="width: 0%"></div>
                    </div>
                    <div class="number">0</div>
                </div>
                <div class="item">
                    <div class="label">
                        Terrible
                    </div>
                    <div class="progress">
                        <div class="percent green" style="width: 0%"></div>
                    </div>
                    <div class="number">0</div>
                </div>
            </div>

            <div class="mt-4 flex justify-center px-16">
                <a class="block uppercase border border-regal-green text-regal-green text-center rounded-full w-full py-1"
                    href="">Read All Reviews</a>
            </div>


        </div> --}}

    </div>
    </div>
</section>

@endif
