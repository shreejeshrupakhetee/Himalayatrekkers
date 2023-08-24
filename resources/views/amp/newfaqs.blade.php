@if (!empty($faqs))
    <section id="faqs" class="mt-12 px-2 md:px-8">
        <h2 class="lg:hidden mt-2 mb-5 text-left font-semibold text-regal-blue text-2xl">Trip FAQ'S</h2>
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">

            <div class="hidden lg:block lg:col-span-2">
                <h5 class="mt-3 pt-2 md:text-base xl:text-xl border-t-4 border-regal-green">Trip FAQ's</h5>
            </div>
            <div class="lg:col-span-6">


                <div class="flex justify-end items-center">
                    <button
                        class="px-8 py-1 text-sm font-semibold text-regal-green border border-regal-green rounded-full focus:text-white focus:bg-regal-green focus:outline-none"
                        on="tap:faqqs.toggle()">Open All</button>
                </div>
                <amp-accordion class="iti-dwn" disable-session-states id="faqqs" animate>
                    @foreach ($faqs as $key => $value)
                        <section class="mt-3 border-none carda rounded-md" id="{{ $key + 1 }}">
                            <header
                                class="focus:outline-none text-light-gray focus:text-regal-green border-none bg-white rounded-lg p-4 ">
                                <div class="title  flex justify-between items-start sm:items-center pr-10">
                                    <div class="cursor-pointer font-semibold md:py-1">

                                        <h4>{{ $value->question }}</h4>


                                    </div>
                                </div>



                            </header>
                            <div class="content main_content p-4">
                                {!! $value->answer !!}

                            </div>
                        </section>
                    @endforeach
                </amp-accordion>



            </div>
            <div class="mt-3 md:mt-0 lg:col-span-4" style="align-self: start;">

            </div>
        </div>

    </section>
@endif
