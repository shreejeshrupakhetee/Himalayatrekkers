@if (count($departures) > 0)
    <section id="departures" class="mt-5 px-4 md:px-6 xl:px-8">
        <div class="container mx-auto">
            <div class="lg:grid lg:grid-cols-12  lg:gap-5">
                <div class="col-span-8 bg-white">
                    <h3 class="pl-5 pt-5 border-t-4 border-regal-red uppercase font-bold text-2xl ">Fixed Departures</h3>
                    <div class="main_content p-4 included">

                        <p class="mt-1">Himalayan Trekkers encourages single traveler to join a group and has fixed
                            departures through out the year. Fixed departures are 100% guarenteed other that
                            circumstances not under our control such as landslides, political
                            unstability,earthquake,etc.</p>
                        <div class="flex flex-col">
                            <div class="overflow-x-scroll xl:overflow-hidden">
                                <div class="align-middle w-full overflow-x-scroll lg:overflow-hidden">
                                    <div class="shadow border-b border-gray-200 sm:rounded-lg">
                                        <table class="w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-2 py-3 text-left text-sm font-semibold whitespace-nowrap text-light-gray">
                                                        Start Date
                                                    </th>
                                                    <th scope="col"
                                                        class="px-2 py-3 text-left text-sm font-semibold whitespace-nowrap text-light-gray">
                                                        End Date
                                                    </th>

                                                    <th scope="col"
                                                        class="px-2 py-3 text-left text-sm font-semibold whitespace-nowrap text-light-gray">
                                                        Duration
                                                    </th>
                                                    <th scope="col"
                                                        class="px-2 py-3 text-left text-sm font-semibold whitespace-nowrap text-light-gray">
                                                        Price
                                                    </th>
                                                    <th scope="col"
                                                        class="px-2 py-3 text-left text-sm font-semibold whitespace-nowrap text-light-gray">
                                                        Availability
                                                    </th>
                                                    <th scope="col"
                                                        class="px-2 py-3 text-left text-sm font-semibold whitespace-nowrap text-light-gray">
                                                        Book
                                                    </th>




                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach ($detail->departures as $dep)
                                                    {{-- @if (date('m d, Y', strtotime($dep->start_date)) > date('m d, Y')) --}}
                                                    <tr>
                                                        <td
                                                            class="px-2 py-3 text-left text-sm whitespace-nowrap text-light-gray">

                                                            {{ date('M d, Y', strtotime($dep->start_date)) }}

                                                        </td>
                                                        <td
                                                            class="px-2 py-3 text-left text-sm whitespace-nowrap text-light-gray">
                                                            {{ date('M d, Y', strtotime($dep->start_date . ' + ' . $detail->duration . 'days')) }}
                                                        </td>
                                                        <td
                                                            class="px-2 py-3 text-left text-sm whitespace-nowrap text-light-gray">
                                                            {{ $detail->duration }} Days

                                                        </td>
                                                        <td
                                                            class="px-2 py-3 text-left text-sm whitespace-nowrap text-light-gray">


                                                            {{ $dep->price ? $dep->price : $detail->price }}
                                                        </td>
                                                        <td
                                                            class="px-2 py-3 text-left text-sm font-semibold whitespace-nowrap text-light-gray">
                                                            Available
                                                        </td>
                                                        <td
                                                            class="px-2 py-1 text-left text-sm whitespace-nowrap text-light-gray">
                                                            <form target="_blank" method=GET
                                                                action="{{ route('fixeddeparture') }}">
                                                                <input type="hidden" name="trip"
                                                                    value="{{ Crypt::encrypt($dep->id) }}">
                                                                <button
                                                                    class="focus:outline-none px-2 py-1 rounded-full bg-regal-blue border border-white font-semibodl text-white"
                                                                    type="submit">
                                                                    <b>Book Now</b>

                                                                </button>
                                                            </form>

                                                        </td>
                                                    </tr>
                                                    {{-- @endif --}}
                                                @endforeach

                                                <!-- More items... -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>

    </section>
@endif
