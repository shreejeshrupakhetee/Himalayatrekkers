@if(!empty($detail->album->photos))
<section id="gallery" class="mt-12 px-2 md:px-8">
    <h2 class="lg:hidden mt-2 mb-5 text-left font-semibold text-regal-blue text-2xl">Gallery</h2>

    <div class="lg:grid lg:grid-cols-12 lg:gap-8">

        <div class="hidden lg:block lg:col-span-2">
            <h4 class="mt-3 pt-2 md:text-base xl:text-xl border-t-4 border-regal-green">Gallery</h4>
        </div>
        <div class="lg:col-span-6">

            @if( !empty($detail->album->video))
            @php
            $videos = json_decode($detail->album->video);
            @endphp
            @foreach ($videos as $key => $vid)
            <div class="bg-white carda mb-6 md:mb-2">

                <amp-youtube width="486" height="270" layout="responsive"
                    data-videoid="{{ $vid }}">
                </amp-youtube>
            </div>
            @endforeach


            @endif

            @if(!empty($detail->album->photos))
            <div class="photo-gallery">

              {{-- <amp-carousel
              lightbox
              width="auto"
              height="400"
              layout="fixed-height"
              type="carousel"
            >
            @foreach ($detail->photos as $item)
          <amp-img class="cursor-pointer"
          src="/uploads/trekking/{{ $item->file }}"
           alt="{{$detail->caption ? $detail->caption : ($detail->title . 'Images') }}"
           width="150" height=150></amp-img>
            @endforeach
            </amp-carousel> --}}
            <amp-state id="product">
                <script type="application/json">
                  {
                    "selectedSlide": 0
                  }
                </script>
              </amp-state>
            <div>
                {{-- <amp-carousel
                  width="1280"
                  height="720"
                  layout="responsive"
                  type="slides"
                  [slide]="product.selectedSlide"
                  on="slideChange: AMP.setState({product: {selectedSlide: event.index}})"
                > --}}
                <amp-carousel class="cursor-pointer" id="carousel-with-lightbox"
                width="1366"
                height="768"
                layout="responsive"
                type="slides"
                >


        @php
            $pics = json_decode($detail->album->photos);
        @endphp
                @foreach ($pics as $item)
                {{-- <div class="relative" style="position:relative;">
                  <amp-img
                    class="cursor-pointer focus:outline-none"
                    src="{{ Voyager::image($item->name) }}"
                    width="750"
                    height="400"

                    alt="{{$item->alt}}"
                    layout="responsive"
                  >
                    </amp-img>
                  <div style="position: absolute;bottom:0;" class="caption text-white bg-black opacity-25">
                    <p>{{$item->title}}</p>
                  </div>
                </div> --}}


                    <figure class="relative">


                    <amp-img lightbox src="{{ Voyager::image($item->original_name) }}"
                      layout="fill"
                      aria-describedby="{{ $item->title }}"
                      alt="Border Collie"></amp-img>
                      <figcaption class="caption text-white">
                        {{ $item->title }}
                      </figcaption>
                    </figure>
                    {{-- <div class="caption text-white">
                     <div class="paragraph">
                         <p>{{$item->title}}</p>
                     </div>
                    </div> --}}

                  @endforeach


                </amp-carousel>

                {{-- <amp-selector
                  class="text-center"
                  [selected]="product.selectedSlide"
                  on="select:AMP.setState({product: {selectedSlide: event.targetOption}})"
                >
                  <ul class="inline-block">
                    @foreach ($detail->photos as $key =>$item)
                    <li class="inline-block commerce-product-thumb">
                      <amp-img
                        option="{{ $key }}"
                        layout="responsive"
                        selected="selected"
                        [src]="/uploads/trekking/{{ $item->file }}"
                        src="/uploads/trekking/{{ $item->file }}"
                        width="320"
                        height="180"
                        alt="thumbnail"
                      ></amp-img>
                    </li>
                    @endforeach

                  </ul>
                </amp-selector> --}}
              </div>

            </div>

            @endif


        </div>



        <div class="hidden md:block mt-3 md:mt-0 lg:col-span-4" style="align-self: start;">

        </div>
    </div>
</section>
@endif
