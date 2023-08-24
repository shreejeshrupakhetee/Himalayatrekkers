{{-- itinerary goes here --}}
<section id="itinerary" class="mt-5 px-4 md:px-6 xl:px-8">
    <div class="container mx-auto">
        <div class="lg:grid lg:grid-cols-12 lg:gap-5">
            <div class="col-span-8">
                <div class="bg-white rounded-xl">
                    <div class="flex justify-between items-center border-t-4 border-regal-red">
                        <h2 class="pl-5 py-3 uppercase font-bold text-2xl ">Itinerary in Details
                        </h2>
                        @if (!empty($abc))
                        <div>
                            <button class="p-2 pr-5 text-red-700 font-bold focus:outline-none"
                                on="tap:acc.collapse,AMP.setState({data: data == 'OPEN ALL'?'CLOSE ALL':'OPEN ALL'})">
                                <p [text]="data == 'OPEN ALL' ? '':'CLOSE ALL'">
                                    CLOSE ALL
                                </p>
                            </button>
                            <button [class]="data == 'OPEN ALL' ? 'p-2 pr-5 text-red-700 font-bold focus:outline-none' : ''"
                                on="tap:acc.expand,AMP.setState({data: data == 'OPEN ALL'?'CLOSE ALL':'OPEN ALL'})">
                                <p [text]="data == 'OPEN ALL' ? 'OPEN ALL':''">
                                </p>
                            </button>

                        </div>
                        @endif
                    </div>
                    @if (!empty($abc))
                        <amp-accordion class="" disable-session-states id="acc" animate >
                            @foreach ($abc as $k => $v)
                                <section expanded
                                    class="amp-section border-b border-dotted last:border-b-0 border-black odd:bg-white p-4">

                                    <header class="heading px-4 z-0 amp-accordion__header">
                                        <div class="flex justify-between items-center">
                                            <h3 class="mt-2 font-bold text-lg md:text-xl text-regal-blue">
                                                <span class="font-semibold text-black">{!! $v->day !!}:
                                                </span> {{ $v->title }}
                                            </h3>
                                            <span class="amp-icon">
                                            </span>
                                        </div>
                                        <div class="mt-4 flex flex-col md:flex-row md:justify-between md:items-center">
                                            @empty(!$v->time)
                                                <p class="mr-3 text-base font-semibold"> <span
                                                        class="text-sm mr-1">&#128337;</span> {{ $v->time }}</p>
                                            @endempty
                                            @empty(!$v->altitude)
                                                <p class="mt-1 md:mt-0 font-semibold"><span class="mr-2">Max Altitude:
                                                    </span>
                                                    {{ $v->altitude }}</p>
                                            @endempty
                                        </div>
                                    </header>
                                    <div>
                                        <div class="content py-4 relative">
                                            <div class="main_content fixed-height-container">

                                                @php
                                                    echo img_to_amp($v->content);
                                                    // echo ampify($v->content);
                                                @endphp
                                            </div>
                                        </div>

                                        <div class="flex flex-col md:flex-row md:justify-between md:items-center">

                                            @empty(!$v->meal)
                                                <p class="text-new-blue font-semibold text-base md:text-sm py-1 px-2 bg-light-graytwo rounded-lg">Meals:
                                                    {{ $v->meal }}</p>
                                            @endempty
                                            @empty(!$v->acco)
                                                <p class="text-new-blue font-semibold text-base md:text-sm mt-1 md:mt-0  py-1 px-2 bg-light-graytwo rounded-lg">
                                                    Accommodation: {{ $v->acco }}</p>
                                            @endempty



                                        </div>
                                    </div>
                                </section>
                            @endforeach
                        </amp-accordion>
                    @else
                        <article class="pb-5 border-b border-dotted last:border-b-0 border-black odd:bg-white p-4">

                            <div class="main_content">
                                {!! $detail->singleitinerary !!}
                            </div>

                        </article>
                    @endif











                    @if (!empty($detail->itinerarynotes))
                        <div class="mt-5 p-4 bg-light-grayone border-l-4 rounded-l-xl border-regal-blue" role="alert">
                            <div class="flex items-center text-regal-blue font-bold px-4 py-3" role="alert">
                                <svg class="fill-current w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                                </svg>
                                <p class="text-lg">Itinerary Notes:</p>
                            </div>
                            <div class="mt-2 main_content">
                                {!! $detail->itinerarynotes !!}
                            </div>



                        </div>
                    @endif

                </div>

            </div>

            <div class="col-span-4">


                @if (!empty($detail->map) && $detail->destinationId->id <= 4)
                    <div class="mt-5 lg:mt-0 bg-white p-5 rounded-l-xl">

                        <div class="w-full h-auto text-center">
                            <amp-img src="{{ Voyager::image($detail->map) }}" alt="{{ $detail->title }} Map"
                                width="400" class="object-fill" aria-label="Map" height="550"
                                on="tap:map-lightbox.open" role="button" layout="responsive" tabindex="0">
                            </amp-img>
                            <h3 id="trekmap" class="mt-2 font-semibold text-regal-red text-sm">{{ $detail->title }}
                                Map</h3>
                        </div>
                        <amp-lightbox scrollable id="map-lightbox"
                            class="block bg-white w-full h-full text-center px-8 md:px-2" layout="nodisplay">
                            <div class="lightbox-content mt-2">
                                <button
                                    class="relative click-track ml-auto inline-block z-10 text-white bg-black px-4 py-3"
                                    role="button" data-vars-event-id="2" on="tap:map-lightbox.close">X</button>

                                <div class="map md:w-1/2 md:mx-auto">
                                    <amp-img id="img4" src="{{ Voyager::image($detail->map) }}"
                                        alt="{{ $detail->title }} Map" width="400" height="600"
                                        layout="responsive" tabindex="1"></amp-img>
                                </div>
                            </div>
                        </amp-lightbox>

                    </div>
                @endif

                @if ($result2)

                    <div class="hidden lg:block bg-light-grayone rounded-l-xl">

                        <div class="p-5">



                            <div class="hidden lg:block">
                                <h3 class="block_title text-regal-blue font-bold mb-6 text-2xl">Similar Itinerary</h3>
                                @foreach ($result2 as $r)
                                    <a class="block" href="{{ route('itinerary.index', $r->slug) }}/">

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
                                            {{-- <div class="col-span-2 h-20 px-2 pb-2  text-regal-blue">
                                        <p class="text-sm font-semibold">
                                            {{ Str::limit($r->title, 90) }}
                                        </p>
                                    </div> --}}
                                            <div
                                                class="col-span-2 h-20 px-2 pb-2  text-regal-blue flex flex-col text-sm font-semibold">
                                                <p>
                                                    {{ Str::limit($r->title, 90) }}

                                                    {{-- <span class="font-bold text-gray-900"> ({{ $r->duration }}
                                                {{ Str::plural('Day', $r->duration) }})
                                            </span> --}}
                                                </p>
                                                <p class="xl:mt-auto">
                                                    <span class="text-sm xl:font-bold text-gray-900">
                                                        {{ $r->duration }}
                                                        {{ Str::plural('Day', $r->duration) }}
                                                    </span>

                                                </p>
                                            </div>

                                        </div>
                                    </a>
                                @endforeach
                            </div>






                        </div>




                    </div>
                @endif

                <div class="hidden lg:block bg-white px-5 py-3 rounded-l-xl mt-5 sticky top-20">
                    <h4 class="text-lg font-semibold uppercase">Quick Enquiry</h4>
                    <div id="forma" class="mt-2 quick-enquiry">
                        <form id="forms" class="hidden lg:block  xl:flex xl:flex-col xl:justify-between"
                            role="form" method="POST" action-xhr="{{ route('ampbookinglg') }}" target="_top"
                            custom-validation-reporting="show-all-on-submit">
                            <input type="hidden" name="_token" id="token2" value="{{ csrf_token() }}">
                            <div class="mb-2">
                                <div class="relative">
                                    <select
                                        class="block mt-2 px-6 focus:outline-none w-full border border-regal-blue rounded-md text-black py-1"
                                        id="show-all-on-submit-user" name="user_title" required>

                                        <option selected disabled value="">--Title--</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Ms">Ms</option>
                                    </select>
                                    <span visible-when-invalid="valueMissing"
                                        validation-for="show-all-on-submit-user"></span>

                                </div>
                            </div>


                            <input type="text" id="show-all-on-submit-name" aria-label="Your Full Name"
                                class="px-6 focus:outline-none w-full border border-regal-blue focus:border-regal-red rounded-md text-black py-1"
                                value="{{ old('fullname') }}" name="name" placeholder="Full Name*" required>
                            <span visible-when-invalid="valueMissing" validation-for="show-all-on-submit-name"></span>

                            <input type="email" aria-label="Your Email"
                                class="mt-2 px-6 focus:outline-none w-full border border-regal-blue rounded-md text-black py-1"
                                name="email" value="{{ old('email') }}" placeholder="Email*"
                                id="show-all-on-submit-email" required>
                            <span visible-when-invalid="valueMissing"
                                validation-for="show-all-on-submit-email"></span>
                            <span visible-when-invalid="typeMismatch"
                                validation-for="show-all-on-submit-email"></span>
                            <input type="text" aria-label="Enter Phone"
                                class="mt-2 px-6 focus:outline-none w-full border border-regal-blue rounded-md text-black py-1"
                                name="phone" value="{{ old('phone') }}" placeholder="Phone*"
                                id="show-all-on-submit-phone" required>
                            <span visible-when-invalid="valueMissing"
                                validation-for="show-all-on-submit-phone"></span>
                            <span visible-when-invalid="typeMismatch"
                                validation-for="show-all-on-submit-phone"></span>
                            <input type="number" aria-label="No. of Traveller"
                                class="mt-2 px-6 focus:outline-none w-full border border-regal-blue rounded-md text-black py-1"
                                name="persons" value="{{ old('phone') }}" placeholder="Number of Traveller*"
                                id="show-all-on-submit-traveller" required>
                            <span visible-when-invalid="valueMissing"
                                validation-for="show-all-on-submit-traveller"></span>
                            <span visible-when-invalid="typeMismatch"
                                validation-for="show-all-on-submit-traveller"></span>

                            <div class="my-1">

                                <div class="relative">
                                    <select
                                        class="block mt-2 px-6 focus:outline-none w-full border border-regal-blue rounded-md text-black py-1"
                                        id="show-all-on-submit-country" name="country" required>

                                        <option selected disabled value="">--Country*--</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua And Barbuda">Antigua And Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia And Herzegovina">Bosnia And Herzegovina</option>

                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory
                                        </option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo - The Democratic Republic Of The">Congo - The Democratic
                                            Republic Of
                                            The</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
                                        </option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories
                                        </option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guernsey">Guernsey</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard Island And Mcdonald Islands">Heard Island And Mcdonald
                                            Islands
                                        </option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City
                                            State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran - Islamic Republic Of">Iran - Islamic Republic Of</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle Of Man">Isle Of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jersey">Jersey</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea - Democratic People'S Republic Of">Korea - Democratic
                                            People'S
                                            Republic Of</option>
                                        <option value="Korea - Republic Of">Korea - Republic Of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People'S Democratic Republic">Lao People'S Democratic
                                            Republic
                                        </option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="Macedonia - The Former Yugoslav Republic Of">Macedonia - The
                                            Former Yugoslav
                                            Republic Of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia - Federated States Of">Micronesia - Federated States
                                            Of
                                        </option>
                                        <option value="Moldova - Republic Of">Moldova - Republic Of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory - Occupied">Palestinian Territory -
                                            Occupied
                                        </option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts And Nevis">Saint Kitts And Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Pierre And Miquelon">Saint Pierre And Miquelon</option>
                                        <option value="Saint Vincent And The Grenadines">Saint Vincent And The
                                            Grenadines
                                        </option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome And Principe">Sao Tome And Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia And Montenegro">Serbia And Montenegro</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia And The South Sandwich Islands">South Georgia And
                                            The South
                                            Sandwich Islands</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard And Jan Mayen">Svalbard And Jan Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Province Of China">Province Of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania - United Republic Of">Tanzania - United Republic
                                            Of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-Leste">Timor-Leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad And Tobago">Trinidad And Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks And Caicos Islands">Turks And Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor
                                            Outlying
                                            Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands - British">Virgin Islands - British</option>
                                        <option value="Virgin Islands - U.S.">Virgin Islands - U.S.</option>
                                        <option value="Wallis And Futuna">Wallis And Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>

                                    <span visible-when-invalid="valueMissing"
                                        validation-for="show-all-on-submit-country"></span>

                                </div>
                            </div>
                            <textarea aria-label="Enter Message"
                                class="mt-2 px-6 focus:outline-none w-full border border-regal-blue rounded-lg text-black py-1"
                                name="message" placeholder="Message*" rows="3" id="show-all-on-submit-message" required>{{ old('message') }}</textarea>
                            <input type="hidden" name="trip_name" value="{{ $detail->title }}">
                            <input type="hidden" name="cost"
                                value="{{ $detail->discount ? $detail->price - ($detail->discount *$detail->price / 100) : $detail->price }}">
                            <span visible-when-invalid="valueMissing"
                                validation-for="show-all-on-submit-message"></span>
                            <span visible-when-invalid="typeMismatch"
                                validation-for="show-all-on-submit-message"></span>
                            <p class="mt-2 text-xs">* Your personal information is always secured with us.
                            </p>
                            <div submit-error class="text-red-600 text-xs">
                                There was some issue posting your inquiry                              
                            </div>
                            <div class="mt-2 xl:mt-4 text-right">
                                <input type="submit"
                                    class="click-track inline-block w-max bg-regal-red rounded-md text-white text-sm md:text-base uppercase font-semibold px-4 cursor-pointer btns hover:bg-hover-yellow hover:text-black py-2"
                                    value="Quick Inquiry">
                            </div>
                            <div submitting class="text-black mx-5">
                                <template type="amp-mustache">
                                    <p>Please wait...</p>
                                </template>
                            </div>
                            {{-- <div submit-success>
                        <template type="amp-mustache">
                            Success! A representative from Himalayan Trekkers will contact you as soon as possible.
                        </template>
                    </div>
                    <div submit-error>
                        <template type="amp-mustache">
                            Oops!, We apologies something went wrong. Please try again later.
                        </template>
                    </div> --}}

                        </form>
                    </div>

                </div>


            </div>
        </div>
</section>
