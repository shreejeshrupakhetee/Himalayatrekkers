@if (!empty($faqs))
    <section id="faqs" class="mt-5 px-4 md:px-6 xl:px-8">
        <div class="container mx-auto">
            <div class="lg:grid lg:grid-cols-12 lg:gap-5">
                <div class="col-span-8 bg-white">
                    <h2 class="pl-5 pt-5 border-t-4 border-regal-red uppercase font-bold text-2xl ">FAQ'S</h2>
                    <amp-accordion class="px-4" disable-session-states id="acc" animate>
                        @foreach ($faqs as $key => $value)
                            <section class="faq-section my-2" expanded>
                                {{-- <section class="px-4 pt-4 odd:bg-light-graytwo border-b border-dotted last:border-b-0 border-black"> --}}
                                <header class="z-0 px-2 py-4 text-lg bg-light-graytwo text-regal-blue font-bold">
                                    <div class="flex justify-between items-center">
                                        <span>Q. {{ $value->question }}</span>
                                        <span class="amp-icon">
                                        </span>
                                </header>
                                <div class="main_content md:pl-4 md:ml-2 mt-2">
                                    {!! $value->answer !!}

                                </div>
                            </section>
                        @endforeach
                    </amp-accordion>
                </div>
                <div class="hidden lg:block lg:col-span-4 relative">
                    <div class="sticky top-20 text-center shadow-xl">
                        {{-- <div class="media-content p-5">
                            <strong class="inline mb-2">Get Deals directly in your inbox<br> with our bi-weekly
                                newsletter.</strong>
                            <br>
                            <form role="form" method="POST" action-xhr="{{ route('ampsubscribe') }}" target="_top"
                                custom-validation-reporting="show-all-on-submit">
                                <div class="flex flex-col">
                                    <input type="email"
                                        class="block w-full border outline-none focus:outline-none py-1 px-2 border-regal-red text-gray-900 focus:border-regal-blue mt-2"
                                        name="email" value="{{ old('email') }}" placeholder="Your Email*"
                                        id="show-all-on-submit-semail" required>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <span visible-when-invalid="valueMissing"
                                        validation-for="show-all-on-submit-semail"></span>
                                    <span visible-when-invalid="typeMismatch"
                                        validation-for="show-all-on-submit-semail"></span>

                                </div>
                                <button class="mt-2 px-3 py-1 bg-regal-red text-white rounded-md">
                                    » Subscribe «
                                </button>
                                <div submitting class="text-black">
                                    <template type="amp-mustache">
                                        <p>Processing, Please wait...</p>
                                    </template>
                                </div>
                                <div submit-success>
                                    <template type="amp-mustache">

                                        @{{ #message }}
                                        <p>@{{ message }}</p>
                                        @{{ /message }}



                                    </template>
                            </form>
                        </div> --}}
                        <section class="hidden lg:block mt-5 px-2">
                            {{-- <div class="container mx-auto"> --}}
                            {{-- <div class="grid grid-cols-12  gap-5">
                                    <div class="col-span-8 bg-white"> --}}

                            {{-- <div class="mt-10"> --}}

                            <div class="bg-new-blue py-4" id="d-wrapper">
                                <h4 class="text-white text-xl text-center font-bold uppercase">Have Any Questions?</h4>

                                <div id="questionform" class="mt-5 quick-enquiry px-4">
                                    <form id="questionform" role="form" method="POST"
                                        action-xhr="{{ route('ampbookinglg') }}" target="_top"
                                        custom-validation-reporting="show-all-on-submit">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        {{-- <div class="hidden lg:flex lg:justify-between"> --}}
                                        <div class="flex flex-col w-full mt-2">
                                            <input type="text" id="show-all-on-submit-qname"
                                                aria-label="Your Full Name"
                                                class="px-6 focus:outline-none w-full focus:border-regal-red text-black py-2"
                                                value="{{ old('fullname') }}" name="name" placeholder="Full Name*"
                                                required>
                                            <span visible-when-invalid="valueMissing"
                                                validation-for="show-all-on-submit-qname"></span>

                                        </div>
                                        <div class="flex flex-col w-full mt-2">
                                            <input type="email" aria-label="Your Email"
                                                class="px-6 focus:outline-none w-full focus:border-regal-red text-black py-2"
                                                name="email" value="{{ old('email') }}" placeholder="Email*"
                                                id="show-all-on-submit-qemail" required>
                                            <span visible-when-invalid="valueMissing"
                                                validation-for="show-all-on-submit-qemail"></span>
                                            <span visible-when-invalid="typeMismatch"
                                                validation-for="show-all-on-submit-qemail"></span>
                                        </div>
                                        {{-- </div> --}}
                                        <div class="mt-2 lg:flex lg:justify-between">
                                            <div class="flex flex-col w-full">
                                                <input type="text" aria-label="Enter Phone"
                                                    class="px-6 focus:outline-none  focus:border-regal-red text-black py-2"
                                                    name="phone" value="{{ old('phone') }}" placeholder="Phone*"
                                                    id="show-all-on-submit-qphone" required>
                                                <span visible-when-invalid="valueMissing"
                                                    validation-for="show-all-on-submit-qphone"></span>
                                                <span visible-when-invalid="typeMismatch"
                                                    validation-for="show-all-on-submit-qphone"></span>
                                            </div>
                                        </div>

                                        <div class="w-full">
                                            <textarea aria-label="Enter Message" class="mt-2 px-6 focus:outline-none w-full text-black py-2" name="message"
                                                placeholder="Question?*" cols="20" rows="3" id="show-all-on-submit-qmessage" required>{{ old('message') }}</textarea>
                                            <span visible-when-invalid="valueMissing"
                                                validation-for="show-all-on-submit-qmessage"></span>
                                            <span visible-when-invalid="typeMismatch"
                                                validation-for="show-all-on-submit-qmessage"></span>
                                        </div>

                                        <input type="hidden" name="trip_name" value="{{ $detail->title }}">
                                        <input type="hidden" name="cost"
                                            value="{{ $detail->discount ? round($detail->price - ($detail->discount * $detail->price) / 100) : $detail->price }}">

                                        <div class="mt-8 text-center">
                                            <input type="submit" tabindex="0" role="button"
                                                on="tap:questionform.clear"
                                                class="click-track inline-block w-max bg-regal-red rounded-full text-white text-sm md:text-base uppercase font-semibold px-4 cursor-pointer btns hover:bg-hover-yellow hover:text-black py-2"
                                                value="Submit">
                                        </div>
                                        <div submitting class="text-white mx-5">
                                            <template type="amp-mustache">
                                                <p>Processing, Please wait...</p>
                                            </template>
                                        </div>

                                    </form>
                                </div>
                            </div>

                            {{-- </div>
                                    </div>
                                </div>
                            </div> --}}
                        </section>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endif
