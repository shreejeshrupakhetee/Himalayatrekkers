@if ($detail->departures->count() > 0)

<section id="fd" class="mt-12 px-2 md:px-8">

    <h2 class="lg:hidden mt-2 mb-5 text-left font-semibold text-regal-blue text-2xl">Fixed Departures</h2>

    <div class="lg:grid lg:grid-cols-12 lg:gap-8">

        <div class="hidden lg:block lg:col-span-2">
            <h5 class="mt-3 pt-2 md:text-base xl:text-xl border-t-4 border-regal-green">Fixed Departures</h5>
        </div>
        <div class="lg:col-span-6 main_content">

                    <p class="mt-1">Himalayan Trekkers encourages single traveler to join a group and has fixed departures through out the year. Fixed departures are 100% guarenteed other that circumstances not under our control such as landslides, political unstability,earthquake,etc.</p>




<div class="flex flex-col">
    <div class="overflow-x-scroll xl:overflow-hidden">
      <div class="align-middle w-full overflow-x-scroll lg:overflow-hidden">
        <div class="shadow border-b border-gray-200 sm:rounded-lg">
          <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-2 py-3 text-left text-sm font-semibold whitespace-nowrap text-light-gray">
                  Start Date
                </th>
                <th scope="col" class="px-2 py-3 text-left text-sm font-semibold whitespace-nowrap text-light-gray">
                    End Date
                </th>

                <th scope="col" class="px-2 py-3 text-left text-sm font-semibold whitespace-nowrap text-light-gray">
                    Duration
                </th>
                <th scope="col" class="px-2 py-3 text-left text-sm font-semibold whitespace-nowrap text-light-gray">
                    Price
                </th>
                <th scope="col" class="px-2 py-3 text-left text-sm font-semibold whitespace-nowrap text-light-gray">
                    Availability
                </th>
                <th scope="col" class="px-2 py-3 text-left text-sm font-semibold whitespace-nowrap text-light-gray">
                    Book
                </th>




              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($detail->departures as $dep)
                @if (date('m d, Y', strtotime($dep->start_date)) > date('m d, Y'))
              <tr>
                <td class="px-2 py-3 text-left text-sm whitespace-nowrap text-light-gray">

                    {{ date("M d, Y", strtotime($dep->start_date)) }}

                </td>
                <td class="px-2 py-3 text-left text-sm whitespace-nowrap text-light-gray">
                    {{ date("M d, Y", strtotime($dep->start_date. ' + ' . $detail->duration.'days' )) }}
                </td>
                <td class="px-2 py-3 text-left text-sm whitespace-nowrap text-light-gray">
                 {{$detail->duration}} Days

                </td>
                <td class="px-2 py-3 text-left text-sm whitespace-nowrap text-light-gray">


                  {{$dep->price ? $dep->price : $detail->price }}
                </td>
                <td class="px-2 py-3 text-left text-sm font-semibold whitespace-nowrap text-light-gray">
                    Available
                </td>
                <td class="px-2 py-1 text-left text-sm whitespace-nowrap text-light-gray">
      <form target="_blank" method=GET action="{{ route('fixeddeparture')}}">

                            <input type="hidden" name="title" value="{{$detail->title}}">
                            <input type="hidden" name="date" value="{{$dep->start_date}}">
                            <input type="hidden" name="price" value="{{$dep->price ? $dep->price : $detail->price}}">
              <button class="focus:outline-none px-2 py-1 rounded-full bg-regal-blue border border-white font-semibodl text-white" type="submit">
                  <b>Inquire Now</b>

              </button>
            </form>

                </td>
              </tr>
              @endif
              @endforeach

              <!-- More items... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>



</div>

<div class="hidden lg:block lg:col-span-4" style="align-self: start;">

</div>






</div>

</section>
@endif



<section id="gearlist" class="mt-12 px-2 md:px-8">

    <h2 class="lg:hidden mt-2 mb-5 text-left font-semibold text-regal-blue text-2xl">Gear List</h2>
    <div class="lg:grid lg:grid-cols-12 lg:gap-8">

        <div class="hidden lg:block lg:col-span-2">
            <h5 class="mt-3 pt-2 md:text-base xl:text-xl border-t-4 border-regal-green">Gearlist</h5>
        </div>
        <div class="lg:col-span-6">

            <div class="gear_list">
                @if (!empty($detail->gearlist))
                    <div class="main_content mb-5">
                        {!! $detail->gearlist !!}

                    </div>
                @else
                    <div class="gear_list mb-5">
                        {!! setting('itinerary.gearlist') !!}

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



                    </div>
                @endif
            </div>
        </div>
        <div class="hidden lg:block lg:col-span-4" style="align-self: start;">
            <div>
                @if(!isMobile())
                @if (!empty($detail->relatedreads))


                @php
                $json_to_array3 = json_decode($detail->relatedreads, true);
                $rreads = \TCG\Voyager\Models\Post::whereIn('id', $json_to_array3)
                    ->select('title', 'slug', 'image')
                    ->get();
                @endphp
                @if(count($json_to_array3) >= 1)
                <div class="hidden lg:block">
                <h3 class="block_title text-black font-bold mb-6 text-2xl">Popular Reads</h3>
                @foreach ($rreads as $r)
               <a class="block" href="{{ route('blogSingle.index', $r->slug) }}">

                    <div class="grid grid-cols-3 gap-1 mb-5">
                        <div class="left col-span-1">

                            <figure class="relative">
                                <amp-img class="logo" src="{{Voyager::image((getThumbnail($r->image,'cropped')))}}" alt="{{ $r->title }}" width="112" height="75"
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
                @endif

            </div>
            </div>
    </div>

</section>

  {{--  <div class="table-responsive-sm lg:text-base">
                      <table class="table md-table-sm table-hover table-striped w-full">
                          <thead class="text-sm lg:text-base">
                              <tr>

                              <th scope="col">Duration</th>
                              <th scope="col">Start Date</th>
                              <th scope="col">End Date</th>
                              <th scope="col">Avaibility</th>
                              <th scope="col">Price</th>
                              <th scope="col">Inquire</th>
                              </tr>
                          </thead>
                          <tbody class="text-center">

                            @foreach ($detail->departures as $dep)
                              <tr>


                                    @if (date('m d, Y', strtotime($dep->start_date)) > date('m d, Y'))

                                    <td>{{ $detail->duration}} Days</td>
<td>
    {{ date("M d, Y", strtotime($dep->start_date)) }}
</td>
<td><span>{{ date("M d, Y", strtotime($dep->date. ' + ' . $detail->duration.'days' )) }}</span></td>
<td title="Limited Seats, First Come First Serve" class="inline-block">

    Available

</td>

<td> $ {{ $detail->price}}</td>
<td colspan="2">
    <form method="get" action="#">

        <input type="hidden" name="title" value="{{$detail->title}}">
        <input type="hidden" name="date" value="{{$dep->date}}">
        <button class="text-sm md:text-base text-white bg-red-900 p-1  w-auto rounded-lg" type="submit">
            <b>Book Now</b>

        </button>
    </form>
</td>
@endif
</tr>




@endforeach

</tbody>
</table>
</div> --}}
