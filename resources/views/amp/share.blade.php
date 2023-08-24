<div class="mt-2 container mx-auto bg-white">
    <div class="px-2">

        <div class="flex flex-col lg:flex-row">

            <div class="w-full md:w-1/2 border">

                    {{-- <light-box :images="{{ $itin->photos }}"></light-box> --}}

                    <amp-carousel
                    lightbox
                    width="auto"
                    height="150"
                    layout="fixed-height"
                    type="carousel"
                  >
                  @foreach ($itin->photos as $item)
                <amp-img class="cursor-pointer" src="/uploads/trekking/{{ $item->file }}" alt="{{$itin->caption ? $itin->caption : ($itin->title . 'Images') }}" width="150" height=150></amp-img>
                  @endforeach




                  </amp-carousel>


            </div>

          <div class="w-full md:w-1/2 md:flex md:justify-between md:items-center lg:w-full">
          <div class="w-full lg:w-full">
            <div class="bg-white">
                <div class="border-t border-b border-gray-400 p-3 md:p-0 md:border-none">
                    <div class="flex flex-col justify-center items-center">
                            @if($itin->reviews->count() > 0)
                            <div
                                class="reviews-count flex justify-center bg-white items-center border sm:border-none sm:bg-transparent py-1 px-1">



                                <div class="mr-4">
                                    <p class="font-bold text-3xl text-red-600">
                                          {{ (int)($itin->approvedReviews->avg('review_rating')) * 20}}%</p>
                                </div>


                                <div class="flex flex-col">
                                    <div>
                                        @for ($star = 1; $star <= 5; $star++) @if ($itin->
                                            approvedReviews->avg('review_rating') >=
                                            $star)
                                            <i class="fa fa-star text-yellow-600" aria-hidden="true"></i>
                                            @else
                                            <i class="fa fa-star text-gray-400" aria-hidden="true"></i>

                                            @endif
                                            @endfor
                                    </div>

                                    <span class="text-sm">base on {{ $itin->reviews->count()}} Reviews</span>
                                </div>
                            </div>
                            @endif
                        <div class="mt-2 mr-4 lg:mr-0 align-middle">

                             <amp-img width="100" height="100" layout="fixed" src="{{asset('images/tripgrade/')}}/{{$itin->activity_level . '.svg' }}"
                                class="h-12 sm:h-16" alt="Trip Grade"></amp-img>
                        </div>
                        <div class="lg:mt-2 relative cursor-help text-indogo-600 z">
                            <span class="inline-block">


                                <span class="font-semibold">TripGrade: </span>{{ $itin->tripgrade->title }}</span>
                            <div class="tool shadow font-bold">
                                {!! $itin->tripgrade->content !!}
                            </div>


                        </div>
                    </div>

                </div>
            </div>
          </div>
          <div class="w-full">
            <div class="bg-white">

                <div class="m-2 flex justify-center ">



                                  <amp-social-share class="rounded m-1"
                                  aria-label="Facebook"
                    type="facebook"
                    width="44"
                    height="44"
                    data-param-app_id="1239482626251780"

                  ></amp-social-share>
                                  <amp-social-share class="rounded m-1"
                                  aria-label="Facebook"
                    type="twitter"
                    width="44"
                    height="44"
                    data-param-app_id="12345678"

                  >
                  </amp-social-share>
                                  <amp-social-share class="rounded m-1"
                                  aria-label="Pinterest"
                    type="pinterest"
                    width="44"
                    height="44"

                  >
                  </amp-social-share>
                  <amp-social-share class="rounded m-1"
                  aria-label="LinkedIn"
                  type="linkedin"
                  width="44"
                  height="44"
                  data-param-text="Hello world"
                  data-param-url="https://example.com/"

                ></amp-social-share>
                                  <amp-social-share class="rounded m-1"
                                  aria-label="WhatsApp"
                    type="whatsapp"
                    width="44"
                    height="44"


                  >
                  </amp-social-share>
                    </div>
            <div class="mt-4 px-2 py-4 lg:py-2 bg-white sm:px-3 lg:px-0 lg:bg-gray-100">
                <p class="text-sm text-red-700 font-semibold lg:text-base">

                    <span><i class="fa fa-check mr-2" aria-hidden="true"></i></span>
                    100% Client Satisfaction

                </p>
                <p class="mt-1 text-sm text-red-700 font-semibold lg:text-base">

                    <span><i class="fa fa-check mr-2" aria-hidden="true"></i></span>Experience of a
                    Decade
                    into Action
                </p>
                <p class="mt-1 text-sm text-red-700 font-semibold lg:text-base">

                    <span><i class="fa fa-check mr-2" aria-hidden="true"></i></span>Personal Touch &
                    Professional Service
                </p>

            </div>
        </div>
          </div>
        </div>
    </div>

      </div>
    </div>

