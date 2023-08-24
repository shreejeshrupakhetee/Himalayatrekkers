@extends('layouts.front')
@section('metatags')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}


@stop
@section('css')

@endsection
@section('content')
    <div id="app" class="bg-shuttle-gray">
        @include('layouts.newnavbar')


        <section class="px-4 md:px-6 lg:px-8">
            <div class="mt-5 container mx-auto">
                <div class="mt-3 text-center">
                    <h1 class="fint-bold text-2xl md:text-3xl uppercase">
                        Booking Inquiry for <br>
                        <span class="mt-4 text-regal-red font-bold">{{ $title }}</span>

                    </h1>



                </div>
            </div>

        </section>


        <section class="mt-5 px-4 md:px-6 lg:px-8">
            <div class="w-full md:w-1/2 lg:w-2/5 contacts-left mx-auto">
                <form id="form" action="{{ route('ampbooking') }}" method="POST" v-on:submit="loading = true">
                    @csrf


                <div class="mb-3">

                    <div class="relative">
                        <select
                            class="block mt-2 xl:mt-3 focus:outline-none w-full border border-regal-blue rounded-md text-black py-2 px-3 xl:py-2"
                            id="show-all-on-submit-user" name="user_title" required>

                            <option selected disabled value="">--Title--</option>
                            <option value="Mr">Mr</option>
                            <option value="Miss">Miss</option>
                            <option value="Mrs">Mrs</option>
                        </select>
@if ($errors->has('user_title'))
                            <div class="invalid-feedback italic text-sm text-regal-red">
                                <strong>{{ $errors->first('user_title') }}</strong>
                            </div>
                        @endif

                    </div>
                </div>


                    <div>

                        <input required
                            class="appearance-none w-full py-2 px-3 focus:border-regal-green rounded-md text-black border border-regal-blue  focus:outline-none focus:shadow-outline {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            name="name" value="{{ old('name') }}" id="username" type="text" placeholder="Name*">
                        <input type="hidden" name="cost" value="{{ $price }}">
                        <input type="hidden" name="trip_name" value="{{ $title }}">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback text-sm text-regal-red">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="mt-3">

                        <input required
                            class="appearance-none border border-regal-blue w-full focus:border-regal-green rounded-md text-black py-2 px-3 focus:outline-none {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            name="email" value="{{ old('email') }}" id="iemail" type="email" name="email"
                            placeholder="Email*">
                        @if ($errors->has('email'))
                            <div class="mt-1 italic invalid-feedback text-sm text-regal-red">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="mt-3">

                        <input required
                            class="appearance-none border border-regal-blue w-full py-2 px-3 focus:border-regal-green rounded-md text-black focus:outline-none {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                            name="phone" value="{{ old('phone') }}" name="phone" id="phone" type="text"
                            placeholder="Phone*">
                        @if ($errors->has('phone'))
                            <div class="invalid-feedback italic text-sm text-regal-red">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </div>
                        @endif

                    </div>
                <div class="my-3">

                    <div class="relative">
                        <select
                            class="block mt-2 xl:mt-3 px-6 focus:outline-none w-full border border-regal-blue rounded-md text-black py-1 xl:py-2"
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
                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern Territories</option>
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

                         @if ($errors->has('country'))
                            <div class="invalid-feedback italic text-sm text-regal-red">
                                <strong>{{ $errors->first('country') }}</strong>
                            </div>
                        @endif

                    </div>
                </div>
                    <div class="mt-3">

                        <textarea required
                            class="appearance-none border border-regal-blue block w-full py-3 px-4 mb-3 focus:border-regal-green rounded-md text-black focus:outline-none  {{ $errors->has('message') ? 'is-invalid' : '' }}"
                            id="user_message" rows="5" placeholder="Message*"
                            name="message">{{ old('message') }}</textarea>
                        @if ($errors->has('message'))
                            <div class="invalid-feedback italic text-sm text-regal-red">
                                <strong>{{ $errors->first('message') }}</strong>
                            </div>
                        @endif

                    </div>
                    <div class="flex flex-col md:flex-row items-center justify-between">



                        {{-- <div class="g-recaptcha mx-auto md:mx-0" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                    @if ($errors->has('g-recaptcha-response'))
                    <span class="invalid-feedback" style="display: block;">
                        <strong>{{ $errors->first('g-captcha-response')}}</strong>
                    </span>
                    @endif --}}
                        <div class="mb-3 mt-4 mx-auto md:mt-0 md:mx-0">
                            <button class="bg-regal-blue hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                type="submit" :class="loading ? 'loader' : ''" :disabled="loading">
                                Send
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </section>



        @include('layouts.footer')
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/region.js') }}"></script>
@endsection
