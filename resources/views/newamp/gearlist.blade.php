@if (!empty($detail->gearlist))
<section class="mt-5 px-4 md:px-6 xl:px-8" id="gearlist">
    <div class="container mx-auto">
        <div class="lg:grid lg:grid-cols-12 lg:gap-5">
            <div class="col-span-8 bg-white">

                <h2 class="pl-5 pt-5 border-t-4 border-regal-red uppercase font-bold text-2xl ">GearList</h2>

                <article class="main_content p-4">
                    {{-- <h2 class="mt-5 uppercase font-bold"></h2> --}}

                    @if (!empty($detail->gearlist_content))
                        <div class="main_content mb-5">
                            {!! $detail->gearlist_content !!}

                        </div>
                    @endif
                     @if (!empty($detail->gearlist))
                    @if ($detail->gearlist == 'TREK')

                     <amp-img class="bg-white cursor-pointer" width="1366" height="768" layout="responsive"
                                    src="/images/trekking-and-walking-gearlist.jpg">
                    </amp-img>
                    @elseif($detail->gearlist == 'DAYTOURS')
                        <amp-img class="bg-white cursor-pointer" width="1366" height="768" layout="responsive"
                                    src="/images/daytours.jpg">
                        </amp-img>
                    @elseif($detail->gearlist == 'CLIMBING')
                    <amp-img class="bg-white cursor-pointer" width="1366" height="768" layout="responsive"
                            src="/images/mountain-peak-climbing-gearlist.jpg">
                    </amp-img>
                    @elseif($detail->gearlist == 'MOTORBIKE')
                    <amp-img class="bg-white cursor-pointer" width="1366" height="768" layout="responsive"
                            src="/images/mountain-peak-climbing-gearlist.jpg">
                    </amp-img>
                    @elseif($detail->gearlist == 'MOUNTAINBIKE')
                    <amp-img class="bg-white cursor-pointer" width="1366" height="768" layout="responsive"
                            src="/images/mountain-peak-climbing-gearlist.jpg">
                    </amp-img>
                    @endif
                    @endif

                        {{-- <div class="gear_list mb-5">


                            <div class="mt-5">
                                <select class="border border-regal-blue p-1" tabindex="0" aria-label="Select Gearlist"
                                    on="change:AMP.setState({ option: event.value })">
                                    <option value="0">Trekking & Hiking</option>
                                    <option value="1">Day Tours</option>
                                    <option value="2">Peak Climbing & Expedition</option>
                                </select>
                            </div>

                            <div class="treks mt-5 border border-regal-red" [hidden]="option != 0">
                                <amp-img class="bg-white cursor-pointer" width="1366" height="768" layout="responsive"
                                    src="/images/trekking-and-walking-gearlist.jpg">
                                </amp-img>
                            </div>

                            <div class="mt-5 border border-regal-blue tours" hidden [hidden]="option != 1">
                                <amp-img class="bg-white cursor-pointer" width="1366" height="768" layout="responsive"
                                    src="/images/daytours.jpg">
                                </amp-img>
                            </div>

                            <div class="mt-5 border border-regal-green mountain" hidden [hidden]="option != 2">
                                <amp-img class="bg-white cursor-pointer" width="1366" height="768" layout="responsive"
                                    src="/images/mountain-peak-climbing-gearlist.jpg">
                                </amp-img>
                            </div>



                        </div> --}}


                </article>
            </div>
            <div class="col-span-4 rounded-xl relative">
                <div class="bg-light-grayone rounded-l-xl sticky top-1">
                    <div class="">
                        @if (!isMobile())
                            @if (!empty($detail->relatedreads))


                                @php
                                    $json_to_array3 = json_decode($detail->relatedreads, true);
                                    $rreads = \TCG\Voyager\Models\Post::whereIn('id', $json_to_array3)
                                        ->select('title', 'slug', 'image')
                                        ->get();
                                @endphp
                                @if (count($json_to_array3) >= 1)
                                    <div class="p-5 hidden lg:block">
                                        <h3 class="block_title text-black font-bold mb-6 text-2xl">Popular Reads</h3>
                                        @foreach ($rreads as $r)
                                            <a class="block"
                                                href="{{ route('blogSingle.index', $r->slug) }}">

                                                <div class="grid grid-cols-3 gap-1 mb-5">
                                                    <div class="left col-span-1">

                                                        <figure class="relative">
                                                            <amp-img class="rounded-l-xl"
                                                                src="{{ Voyager::image(getThumbnail($r->image, 'cropped')) }}"
                                                                alt="{{ $r->title }}" width="112" height="75"
                                                                layout="intrinsic">
                                                            </amp-img>
                                                        </figure>

                                                    </div>
                                                    <div class="col-span-2 h-20 px-2 pb-2  text-regal-blue">
                                                        <p class="text-sm font-semibold">
                                                            {{ Str::limit($r->title, 90) }}
                                                        </p>
                                                    </div>

                                                </div>
                                            </a>

                                        @endforeach
                                    </div>
                                @endif
                            @endif
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
@endif                                                        
