<section class="container mx-auto px-2">
    <h2 class="md:hidden my-4 text-3xl font-semibold text-red-700 text-center">OverView</h2>


    <div role="article" id="overview"  class="mt-2 tabcontent">
        <div class="flex flex-col md:flex-row">


            <div class="w-full md:w-2/3 md:pr-3">


                    <div class="flex flex-col carda border border-gray-400 mb-2">
                        <div class="flex flex-col sm:flex-row text-red-800">
                            <div
                                class="flex w-full sm:w-1/2 justify-between items-center border-b border-r border-gray-400 p-2 lg:p-3">
                                <div class="flex items-center w-1/2">
                                    <i class="fa fa-clock-o md:fa-2x mr-4" aria-hidden="true"></i>
                                    <span class="text-sm md:text-base lg:text-lg font-semibold">Duration:
                                    </span>
                                </div>
                                <div class="w-1/2 text-sm md:text-base lg:text-lg text-gray-700 font-semibold">
                                    <p> {{ $itin->tripdays}} Days</p>
                                </div>

                            </div>
                            <div
                                class="flex w-full sm:w-1/2 justify-between items-center border-b border-gray-400 p-2 lg:p-3">
                                <div class="flex items-center w-1/2">
                                    <i class="fa fa-globe mr-4 md:fa-2x" aria-hidden="true"></i>
                                    <span class="text-sm md:text-base lg:text-lg font-semibold">Country: </span>
                                </div>
                                <div class="w-1/2 text-sm md:text-base lg:text-lg text-gray-700 font-semibold">
                                    <p><a class="underline hover:text-indigo-500" href="/{{$itin->country->slug}}">
                                            {{ $itin->country->title }}</a></p>
                                </div>

                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row text-red-800">
                            <div
                                class="flex w-full sm:w-1/2 justify-between items-center border-b border-r border-gray-400 p-2 lg:p-3">
                                <div class="flex items-center w-1/2">
                                    <i class="fa fa-area-chart md:fa-2x mr-4" aria-hidden="true"></i>
                                    <span class="text-sm md:text-base lg:text-lg font-semibold">Max Altitude:
                                    </span>
                                </div>
                                <div class="w-1/2 text-sm md:text-base lg:text-lg text-gray-700 font-semibold">
                                    <p> {{ $itin->highest_point}}</p>
                                </div>

                            </div>
                            <div
                                class="flex w-full sm:w-1/2 justify-between items-center border-b border-gray-400 p-2 md:p-3">
                                <div class="flex items-center w-1/2">
                                    <i class="fa fa-users mr-4 md:fa-2x" aria-hidden="true"></i>
                                    <span class="text-sm md:text-base lg:text-lg font-semibold">Group Size
                                    </span>
                                </div>
                                <div class="w-1/2 text-sm md:text-base lg:text-lg text-gray-700 font-semibold">
                                    <p> {{ $itin->group_size}}</p>
                                </div>

                            </div>
                        </div>
                        <div class="flex text-red-800">
                            <div class="flex w-full justify-between items-center border-b border-gray-400">
                                <div class="flex items-center w-1/4 p-2 lg:p-3">
                                    <i class="fa fa-telegram md:fa-2x mr-4" aria-hidden="true"></i>
                                    <span class="text-sm md:text-base lg:text-lg font-semibold">Trial Access:
                                    </span>
                                </div>
                                <div
                                    class="w-3/4 text-center text-sm md:text-base lg:text-lg text-gray-700 font-semibold py-2">
                                    <p> {{ $itin->trialaccess}}
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="flex text-red-800">
                            <div class="flex w-full justify-between items-center border-b border-gray-400">
                                <div class="flex items-center w-1/4 p-2 lg:p-3">
                                    <i class="fa fa-cloud md:fa-2x mr-4" aria-hidden="true"></i>
                                    <span class="text-sm md:text-base lg:text-lg font-semibold">Best Season:
                                    </span>
                                </div>
                                <div
                                    class="w-3/4 text-center text-sm md:text-base lg:text-lg text-gray-700 font-semibold py-2">
                                    <p> {{ $itin->season}}</p>
                                </div>

                            </div>
                        </div>
                    </div>

                    @if( !empty($itin->overview_note))
                        <div class="color-box" role="alert">
                            <div class="shadowc">
                                <div class="info-tab note-icon" title="Important Notes"><i></i></div>
                                <div class="note-box">
                                    {!!$itin->overview_note!!}
                                </div>
                            </div>
                        </div>

                    @endif
                    <div role="article" class="pt-2 carda main_content mb-5 px-2">
                        {!! $itin->main_content !!}

                    </div>
  @if( !empty($itin->video_url))
                    <p class="py-2 text-3xl font-semibold text-red-700">Watch Video</p>
<div class="bg-white carda mb-6 md:mb-2">

    <amp-youtube
    width = "480"
    height = "270"
    layout ="responsive"
    autoplay = "true"
    data-videoid="{{ $itin->video_url }}">
 </amp-youtube>
</div>
@endif




            </div>

            <div class="sm:w-full md:w-1/3 container border bg-gray-100 px-2" style="align-self: start;">


                <div class="py-4 bg-white px-2 carda">


                    <div class="price px-2">
                        <div class="flex justify-between">
                            <div>
                                    <p class="text-sm font-semibold pt-2">
                                            <i class="fa fa-money mr-1 text-green-700" aria-hidden="true"></i>
                                            Starting Price</p>

                            </div>

{{-- <select tabindex="0" aria-label="Select Price" on="change:AMP.setState({ option: event.value })">
    <option value="0">USD</option>
    <option value="1">GBP</option>
    <option value="2">AUD</option>
  </select> --}}
  {{$itin->price1}}

                        </div>


                        {{-- <div class="flex justify-between">


                                <div class="text-orange-700">

                                    <p>

                                    <span
                                    [hidden]="option != 0"                                             class="text-4xl leading-loose font-bold mr-1">
                                    <small class="text-xl font-semibold mr-1">USD
                                    </small>
                                        {{ $itin->price1 }}


                                    </span>
                                        <span class="text-4xl leading-loose font-bold mr-1" hidden
                                        [hidden]="option != 1">
                                        <small class="text-xl font-semibold mr-1">GBP
                                        </small>
                                            {{ $euro  ? $euro : 'Ask for price'}}


                                        </span>
                                        <span class="text-4xl leading-loose font-bold mr-1" hidden
                                        [hidden]="option != 2">
                                        <small class="text-xl font-semibold mr-1">AUD
                                        </small>
                                            {{ $aud  ? $aud : 'Ask for price'}}


                                        </span>

                                        <span class="inline-block mt-2 text-xl font-semibold">per person</span>
                                    </p>




                                </div>



                        </div> --}}
                        <div class="p-2 group-discount">
                            <p class="block text-center text-lg text-gray-700" id="group">Group Discount :
                                <span class="font-bold text-xl">Available</span> </p>

                        </div>
                    </div>

                    <div class="mt-4">
                        <div
                        class="py-2"

                      >
  <button
                        on="tap:book.show,book.scrollTo(duration=200)"
                        role="button"
                        tabindex="0"
                          class="py-2 w-full bg-green-400 text-black text-xl font-bold uppercase mt-5"

                        >Send Inquiry</button>
                      </div>

                </div>

                    <div class="not-satisfied mt-5 border-b border-t">



                        <div class="rounded-sm">

                                @if ($itin->country->slug)
                                <a aria-label="Read {{$itin->country->title}} FAQs" href="/{{$itin->country->slug}}/faq/" target="_blank"
                                    class="block p-2 w-full text-xl uppercase font-semibold bg-red-100 text-center">
                                    {{$itin->country->title}} FAQ'S
                                </a>

                                @endif

                        </div>
                        @if(!empty($itin->pdf))
                        <div class="mt-5 rounded-sm">

                            <a href="/uploads/pdf/{{ $itin->pdf}}" style="color:#002366;"
                                class="block p-2 w-full bg-gray-300 text-base font-semibold text-center">
                                <span><i class="fa fa-file-pdf-o mr-1 text-yellow-600"
                                        aria-hidden="true"></i></span>
                                Download Brochure

                            </a>
                        </div>
                        @endif



                    </div>
                    <div class="mt-5 bg-white border border-red-900 text-gray-800 text-base pb-6">
                            <div class="px-6 py-4">
                                <p class="font-bold text-base lg:text-2xl text-center">Have any Questions?</p>
                                {{-- <h4 class="pt-6 text-base sm:text-2xl font-bold text-red-700">We are here to help</h4>
                                <p>See our faq to most common questions</p> --}}
                                <div class="color-box" role="alert">
                                    <div class="shadowc">
                                        <div class="info-tab tip-icon" title="Call Us for Questions"><i></i></div>
                                        <div class="tip-box">
                                           <p>We are here to help</p>
                                           <p>See our faq to most common questions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-1 flex px-2 lg:px-6">
                                <div class="phone mr-6">
                                    <svg class="svg-icon text-red-900 w-8 h-8" viewBox="0 0 20 20">
                                        <path fill="red" d="M10,15.654c-0.417,0-0.754,0.338-0.754,0.754S9.583,17.162,10,17.162s0.754-0.338,0.754-0.754S10.417,15.654,10,15.654z M14.523,1.33H5.477c-0.833,0-1.508,0.675-1.508,1.508v14.324c0,0.833,0.675,1.508,1.508,1.508h9.047c0.833,0,1.508-0.675,1.508-1.508V2.838C16.031,2.005,15.356,1.33,14.523,1.33z M15.277,17.162c0,0.416-0.338,0.754-0.754,0.754H5.477c-0.417,0-0.754-0.338-0.754-0.754V2.838c0-0.417,0.337-0.754,0.754-0.754h9.047c0.416,0,0.754,0.337,0.754,0.754V17.162zM13.77,2.838H6.23c-0.417,0-0.754,0.337-0.754,0.754v10.555c0,0.416,0.337,0.754,0.754,0.754h7.539c0.416,0,0.754-0.338,0.754-0.754V3.592C14.523,3.175,14.186,2.838,13.77,2.838z M13.77,13.77c0,0.208-0.169,0.377-0.377,0.377H6.607c-0.208,0-0.377-0.169-0.377-0.377V3.969c0-0.208,0.169-0.377,0.377-0.377h6.785c0.208,0,0.377,0.169,0.377,0.377V13.77z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm leading-tight">Call us on</p>

                                    <a href="tel:+9779851042334" class="text-sm lg:text-2xl font-bold inline-block">+977 98510 42334</a>
                                    <div class="mt-2 flex items-baseline">
                                        <a class="bgcinquiry rounded py-2 px-4 text-gray-900 font-semibold"
                                            href="/contact-us">Contact us</a>
                                    </div>
                                </div>

                            </div>
                        </div>


                </div>

            </div>

        </div>
    </div>

            </section>
