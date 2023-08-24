<section id="top" class="mt-4 px-2 md:px-8">



    <div id="overview" class="mt-2 lg:grid lg:grid-cols-9 lg:gap-4">

        <div class="hidden lg:block lg:col-span-1">
            <h2 class="mt-3 pt-2 md:text-base xl:text-xl border-t-4 border-regal-green">Overview</h2>

        </div>

        {{-- @if (isMobile()) --}}






        {{-- @endif --}}

        <div class="lg:col-span-5">
            <article class="pt-2 main_content mb-5">
                {!! $detail->description !!}
            </article>
        </div>

        <div class="lg:col-span-3" style="align-self: start;">
            @if (!isMobile())
                <div class="hidden lg:block carda p-5">
                    <h4 class="font-semibold mb-6 text-2xl">Trip Info</h4>
                    <ul>
                        <li class="flex items-center border-b py-2">
                            <p class="w-28 font-semibold text-regal-blue">Price:</p>
                            <p>US $ {{ number_format($detail->discount ? $detail->discount : $detail->price) }}
                            </p>
                        </li>
                        @if (!empty($detail->duration))
                            <li class="flex items-center border-b py-2">
                                <p class="w-28 font-semibold text-regal-blue">Duration:</p>
                                <p> {{ $detail->duration }}
                                    {{ Str::plural('Day', $detail->duration) }}</p>
                            </li>
                        @endif
                        @if ($detail->reviews->count() > 0)
                            <li class="flex items-center border-b py-2">
                                <p class="w-28 font-semibold text-regal-blue">Trip Rating:</p>


                                <p>
                                    {{ (int) $detail->reviews->avg('rating') }}/5 Out of
                                    {{ $detail->reviews->count() }}
                                    Reviews

                                </p>
                            </li>
                        @endif

                        <li class="flex items-center border-b py-2">
                            <p class="w-28 font-semibold text-regal-blue">Trip Grade:</p>
                            @if ($detail->tripgrade >= 0 && $detail->tripgrade <= 5)

                                @php
                                    if ($detail->tripgrade == 1) {
                                        $tripgrade = 'easy';
                                    } elseif ($detail->tripgrade == 2) {
                                        $tripgrade = 'moderate';
                                    } elseif ($detail->tripgrade == 3) {
                                        $tripgrade = 'difficult';
                                    } elseif ($detail->tripgrade == 4) {
                                        $tripgrade = 'strenous';
                                    } else {
                                        $tripgrade = 'very strenous';
                                    }
                                @endphp
                                <div class="flex items-center h-8">
                                    <amp-img class="object-fill" alt="{{ $tripgrade }}" width="35" height="35"
                                        layout="fixed" src="/images/tripgrade/{{ $detail->tripgrade . '.svg' }}">
                                    </amp-img>
                                    <p class="ml-2 md:mt-2 text-sm font-semibold text-regal-blue uppercase">

                                        {{ $tripgrade }}
                                    </p>
                                </div>
                            @endif
                        </li>
                        @if ($detail->region_id > 1)
                            <li class="flex items-center border-b py-2">
                                <p class="w-28 font-semibold text-regal-blue"> Region/Type:</p>
                                <a class="underline"
                                    href="/trekking-in-nepal/{{ $detail->regionId->slug }}">{{ $detail->regionId->title }}</a>
                            </li>
                        @endif
                        @if (!empty($detail->arrival))

                            <li class="flex items-center border-b py-2">
                                <p class="w-28 font-semibold text-regal-blue"><span
                                        class="icon-plane text-xs text-regal-green text-center"
                                        aria-hidden="true"></span>
                                    Arrival:</p>
                                <p>{{ $detail->arrival }}</p>
                            </li>
                        @endif
                        @if (!empty($detail->departure_from))

                            <li class="flex items-center border-b py-2">
                                <p class="w-28 font-semibold text-regal-blue"><span
                                        class="icon-plane text-xs text-regal-green text-center"
                                        aria-hidden="true"></span>
                                    Departure:</p>
                                <p>{{ $detail->departure_from }}</p>
                            </li>
                        @endif

                        @if (!empty($detail->transport))
                            <li class="flex items-center border-b py-2">
                                <p class="w-28 flex-shrink-0 font-semibold text-regal-blue">
                                    <span class="icon-car text-xs text-brand-blue text-center mr-1"
                                        aria-hidden="true"></span>Transport:
                                </p>
                                <p> {{ $detail->transport }}</p>
                            </li>
                        @endif
                        @if (!empty($detail->altitude))
                            <li class="flex items-center border-b py-2">
                                <p class="w-32 font-semibold text-regal-blue">
                                    <span class="icon-chart-line text-xs text-brand-blue text-center mr-1"
                                        aria-hidden="true"></span>Highest Point:
                                </p>
                                <p> {{ $detail->altitude }} m</p>

                            </li>
                        @endif

                        @empty(!$detail->season)
                            <li class="flex items-center pt-2">
                                <p class="w-32 flex-shrink-0 font-semibold text-regal-blue">
                                    <span class="icon-cloud-sun-rain text-xs text-brand-blue text-center mr-1"
                                        aria-hidden="true"></span>Best Season:
                                </p>
                                <ul>
                                    @foreach (json_decode($detail->season, true) as $key => $item)

                                        @if (count(json_decode($detail->season, true)) >= 1)

                                            <li>{{ $item }}</li>

                                        @endif

                                    @endforeach


                                </ul>



                            </li>
                        @endempty
                    </ul>

                </div>
            @endif

            <div class="mt-5 carda p-5">
                <h5 class="mt-2 text-xl md:text-2xl leading-loose font-bold mr-1 lg:font-semibold">
                    Why Himalayan Trekkers?</h5>
                <ul class="mt-5 included text-light-gray md:text-center lg:text-left text-base">

                    <li>100% Client Satisfaction</li>
                    <li>Simple, Transparent Price, No hidden fees</li>
                    <li>Experience of a Decade into Action</li>
                    <li>Personal Touch & Professional Service</li>


                </ul>
                <button on="tap:forma.scrollTo(duration=200)" role="button" tabindex="0"
                    class="hidden lg:block py-2 px-6 focus:outline-none w-3/4 mx-auto bg-booking-yellow font-semibold text-black mt-5 hover:bg-brand-blue hover:text-white">Inquire
                    This Trip
                    Now</button>

            </div>

            @if (!empty($detail->overviewnotes))
                <div class="mt-5 p-5 bg-regal-blue text-lg text-white">

                    <div class="flex">
                        <svg class="inline-block flex-shrink-0 mr-2" width="36" height="36" viewBox="0 0 36 36"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M36 18C36 27.9433 27.9404 36 18 36C8.05957 36 0 27.9433 0 18C0 8.06248 8.05957 0 18 0C27.9404 0 36 8.06248 36 18ZM18 21.629C16.1561 21.629 14.6613 23.1238 14.6613 24.9677C14.6613 26.8117 16.1561 28.3064 18 28.3064C19.8439 28.3064 21.3387 26.8117 21.3387 24.9677C21.3387 23.1238 19.8439 21.629 18 21.629ZM14.8302 9.62811L15.3686 19.4991C15.3938 19.961 15.7757 20.3226 16.2383 20.3226H19.7617C20.2243 20.3226 20.6062 19.961 20.6314 19.4991L21.1698 9.62811C21.197 9.12919 20.7998 8.70968 20.3002 8.70968H15.6998C15.2001 8.70968 14.803 9.12919 14.8302 9.62811Z"
                                fill="#FA641E" />
                        </svg>
                        <div>
                            {!! $detail->overviewnotes !!}
                        </div>




                    </div>
                </div>
            @endif

            @if (!isMobile())
                <div class="mt-8">

                    @if (!empty($detail->relatedtreks))


                        @php
                            $json_to_array = json_decode($detail->relatedtreks, true);
                            $rtreks = \App\Trip::whereIn('id', $json_to_array)
                                ->select('title', 'slug', 'image')
                                ->get();
                        @endphp
                        @if (count($json_to_array) >= 1)
                            <div class="hidden lg:block">
                                <h3 class="block_title text-black font-bold mb-6 text-2xl">Similar Trips</h3>
                                @foreach ($rtreks as $r)
                                    <a class="block" href="{{ route('itinerary.index', $r->slug) }}">

                                        <div class="grid grid-cols-3 gap-1 mb-5">
                                            <div class="left col-span-1">

                                                <figure class="relative">
                                                    <amp-img class="logo"
                                                        src="{{ Voyager::image(getThumbnail($r->image, 'cropped')) }}"
                                                        alt="{{ $r->title }}" width="112" height="75"
                                                        layout="intrinsic">
                                                    </amp-img>
                                                </figure>

                                            </div>
                                            <div class="col-span-2 h-20 px-2 pb-2  text-regal-blue">
                                                <p class="text-base">
                                                    {{ Str::limit($r->title, 90) }}
                                                </p>
                                            </div>

                                        </div>
                                    </a>

                                @endforeach
                            </div>
                        @endif
                    @endif


                </div>
            @endif





            <div class="lg:hidden mt-5 text-sm md:text-base flex justify-center items-center share">

                <amp-social-share class="rounded-full m-1 text-sm md:text-base" aria-label="Facebook" type="facebook"
                    width="34" height="34" data-param-app_id="1239482626251780"></amp-social-share>
                <amp-social-share class="rounded-full m-1" aria-label="Twitter" type="twitter" width="38" height="38"
                    data-param-app_id="12345678">
                </amp-social-share>
                <amp-social-share class="rounded-full m-1" aria-label="Pinterest" type="pinterest" width="34"
                    height="34">
                </amp-social-share>
                <amp-social-share class="rounded-full m-1" aria-label="LinkedIn" type="linkedin" width="34" height="34"
                    data-param-text="Hello world" data-param-url="https://himalayantrekkers.com">
                </amp-social-share>
                <amp-social-share class="rounded-full m-1" aria-label="WhatsApp" type="whatsapp" width="34" height="34">
                </amp-social-share>
            </div>



        </div>







</section>
@include('amp.additional')
