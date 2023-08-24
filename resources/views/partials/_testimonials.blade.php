<section class="px-4 md:px-8 py-4 md:py-8 bg-shuttle-gray">
    <div class="container mx-auto">
		<h2 class="secondary-heading">Why Choose Himalayan Trekkers?</h2>
        <div class="md:mt-5 md:grid md:grid-cols-12 md:gap-6">

            <div class="col-span-4">
                @include('layouts.tripadvisor')
            </div>
            <div class="hidden md:block mt-5 md:mt-0 col-span-8 text-base pr-5 main_content">
{!! setting('home.review_content') !!}
            </div>

        </div>
    </div>
</section>
<div class="w-full bg-cover bg-center h-106 bg-fixed" style="background-image: url(/images/reviewbg.jpg);">
    <div class="container mx-auto">

        <div class="grid grid-cols-12 gap-5 h-106 w-full bg-gray-900 bg-opacity-50 px-2 md:px-8 pt-8 pb-8">
            <div class="md:px-2 lg:mt-0 slider w-full col-span-12 h-full lg:h-72 text-white">


                <div class="stories reviews overflow-hidden">
                    <div class="wrap">
                        <div class="wrap_float">

                            <div class="relative">
                                <h4 class="secondary-heading text-white text-left md:text-center">
                                    What Clients Say About Us</h4>
                                <div class="controls">
                                    <div class="flex arrows items-center">
                                        <div class="arrow prev slick-arrow" style=""></div>
                                        <div class="arrow next slick-arrow" style=""></div>
                                    </div>
                                </div>
                            </div>


                            <div class="mt-12 stries_slider" id="s_slider">

                                @foreach ($testimonials as $testimonial)
                                    <div
                                        class="mt-2 w-80 md:w-96 h-full flex items-center justify-center relative float-left m-5 md:m-0 md:mr-5">
                                        <div
                                            class="relative w-80 md:w-full h-auto bg-white md:rounded-xl pt-24 pb-8 pr-4 md:px-2 flex flex-col items-center md:mr-12 ">
                                            <div class="absolute rounded-full bg-white w-28 h-28 p-2 z-10 -top-8">
                                                <div class="rounded-full bg-black w-full h-full overflow-auto">
                                                    <img width="192" height="192"
                                                        class="h-full w-full object-cover lozad"
                                                        data-src="{{ Voyager::image($testimonial->image) }}"
                                                        alt="{{ $testimonial->name }}">
                                                </div>
                                            </div>
                                            <label class="font-bold text- text-lg text-gray-900">
                                                {{ $testimonial->name }}

                                            </label>
                                            <span
                                                class="inline-block mt-1 text-center text-black text-sm">{{ $testimonial->country }}</span>
                                            <div class="text-base text-center text-gray-900 mt-2 px-4 py-1 relative">
                                                <div class="absolute -top-12 left-0 pl-4 ">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="text-royal-blue fill-current w-12 h-12"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M6.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L9.758 4.03c0 0-.218.052-.597.144C8.97 4.222 8.737 4.278 8.472 4.345c-.271.05-.56.187-.882.312C7.272 4.799 6.904 4.895 6.562 5.123c-.344.218-.741.4-1.091.692C5.132 6.116 4.723 6.377 4.421 6.76c-.33.358-.656.734-.909 1.162C3.219 8.33 3.02 8.778 2.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C2.535 17.474 4.338 19 6.5 19c2.485 0 4.5-2.015 4.5-4.5S8.985 10 6.5 10zM17.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L20.758 4.03c0 0-.218.052-.597.144-.191.048-.424.104-.689.171-.271.05-.56.187-.882.312-.317.143-.686.238-1.028.467-.344.218-.741.4-1.091.692-.339.301-.748.562-1.05.944-.33.358-.656.734-.909 1.162C14.219 8.33 14.02 8.778 13.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C13.535 17.474 15.338 19 17.5 19c2.485 0 4.5-2.015 4.5-4.5S19.985 10 17.5 10z" />
                                                    </svg>
                                                </div>

                                                {!! $testimonial->content !!}
                                            </div>

                                        </div>

                                    </div>
                                @endforeach






                            </div>

                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
</div>





{{-- <div class="h-72 w-80 relative mr-12 float-left">
                                    <div class="h-72 bg-white rounded-2xl w-full">
                                        <div class="flex justify-between items-center text-sm">
                                            <div class="reviewer flex items-center py-1 px-4">
                                                <div class="mr-2 h-16">
                                                    <img class="mt-2 object-fill rounded-full lozad"
                                                        alt="Customer Image" width="60" height="60"
                                                        data-src="/images/noimage.png">

                                                </div>
                                                <div>
                                                    <p class="text-regal-blue">MD Bash </p>
                                                    <p class="text-light-gray">Paris</p>
                                                </div>
                                            </div>
                                            <div class="px-2 mt-2 flex text-regal-blue">
                                                <svg v-for="i in 5" class="i-star fill-current" viewBox="0 0 32 32"
                                                    width="16" height="16" fill="blue" stroke="currentcolor"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path
                                                        d="M16 2 L20 12 30 12 22 19 25 30 16 23 7 30 10 19 2 12 12 12 Z">
                                                    </path>
                                                </svg>

                                            </div>
                                        </div>

                                        <div class="px-4 pb-1 text-sm">
                                            <h3 class="text-regal-green mt-1 font-semibold">Wonderful</h3>
                                            <div class="text-light-gray mt-2">
                                                <p> I really appreciate Mr Raj for introducing his family to me. You'll
                                                    be
                                                    amazed to see Nepal and people. Thank You Himalayan Trekkers, thank
                                                    you so
                                                    much!!</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="h-72 w-80 relative mr-12 float-left">
                                    <div class="h-72 bg-white rounded-2xl w-full">
                                        <div class="flex justify-between items-center text-sm">
                                            <div class="reviewer flex items-center py-1 px-4">
                                                <div class="mr-2 h-16">
                                                    <img class="mt-2 object-fill rounded-full lozad"
                                                        alt="Customer Image" width="60" height="60"
                                                        data-src="/images/noimage.png">

                                                </div>
                                                <div>
                                                    <p class="text-regal-blue">Kate Branson</p>
                                                    <p class="text-light-gray">UK</p>
                                                </div>

                                            </div>
                                            <div class="px-2 mt-2 flex text-regal-blue">
                                                <svg v-for="i in 5" class="i-star fill-current" viewBox="0 0 32 32"
                                                    width="16" height="16" fill="blue" stroke="currentcolor"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path
                                                        d="M16 2 L20 12 30 12 22 19 25 30 16 23 7 30 10 19 2 12 12 12 Z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>

                                        <div class="px-4 pb-1 text-sm">
                                            <h3 class="text-regal-green mt-1 font-semibold">Wonderful</h3>
                                            <div class="text-light-gray mt-2">
                                                <p> The arrangement of the trek was perfect. Himalayan Trekkers provided
                                                    us
                                                    sleeping bag and down Jacket on request. Very organized and helpful.
                                                    Many
                                                    thanks to the company. We are very much satisfied. </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="h-72 w-80 relative mr-12 float-left">
                                    <div class="h-72 bg-white rounded-2xl w-full">
                                        <div class="flex justify-between items-center text-sm">
                                            <div class="reviewer flex items-center py-1 px-4">
                                                <div class="mr-2 h-16 w-16">
                                                    <img class="mt-2 object-fill rounded-full h-16 w-16 lozad"
                                                        alt="Customer Image" width="60" height="60"
                                                        data-src="/images/noimage.png">

                                                </div>
                                                <div>
                                                    <p class="text-regal-blue">Pretty Singh</p>
                                                    <p class="text-light-gray">India</p>
                                                </div>

                                            </div>
                                            <div class="px-2 mt-2 flex">
                                                <div class="px-2 mt-2 flex text-regal-blue">
                                                    <svg v-for="i in 5" class="i-star fill-current" viewBox="0 0 32 32"
                                                        width="16" height="16" fill="blue" stroke="currentcolor"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                        <path
                                                            d="M16 2 L20 12 30 12 22 19 25 30 16 23 7 30 10 19 2 12 12 12 Z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-4 pb-1 text-sm">
                                            <h3 class="text-regal-green mt-1 font-semibold">Wonderful</h3>
                                            <div class="text-light-gray mt-2">
                                                <p>Kathmandu is really awesome. Bhaktapur, Patan and monkey temple are
                                                    one of
                                                    its kind. I thank Himalayan Trekkers and would surely recommed.</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="h-72 w-80 relative mr-12 float-left">
                                    <div class="h-72 bg-white rounded-2xl w-full">
                                        <div class="flex justify-between items-center text-sm">
                                            <div class="reviewer flex items-center py-1 px-4">
                                                <div class="mr-2">
                                                    <img class="mt-2 object-fill rounded-full lozad"
                                                        alt="Customer Image" width="60" height="60"
                                                        data-src="/images/noimage.png">

                                                </div>
                                                <div>
                                                    <p class="text-regal-blue">Tracy White</p>
                                                    <p class="text-light-gray">Australia</p>
                                                </div>

                                            </div>
                                            <div class="px-2 mt-2 flex">
                                                <div class="px-2 mt-2 flex text-regal-blue">
                                                    <svg v-for="i in 5" class="i-star fill-current" viewBox="0 0 32 32"
                                                        width="16" height="16" fill="blue" stroke="currentcolor"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                        <path
                                                            d="M16 2 L20 12 30 12 22 19 25 30 16 23 7 30 10 19 2 12 12 12 Z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-4 pb-1 text-sm">
                                            <h3 class="text-regal-green mt-1 font-semibold">An unforgettable Trip</h3>
                                            <div class="text-light-gray mt-2">
                                                <p>My friends and I had an ABC trek with guide - Bal. It would highly
                                                    recommend
                                                    Himalayan Trekkers. 5 Stars from me.</p>
                                            </div>
                                        </div>

                                    </div>
                                </div> --}}
