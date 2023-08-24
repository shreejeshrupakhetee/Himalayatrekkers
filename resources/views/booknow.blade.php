@extends('layouts.front')
@section('metatags')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}


@stop
@section('css')
    <style>
        html {
            scroll-behavior: smooth;
        }

        .contacts-page .page_body {
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-top: 46px;
        }

        .contacts-page .contacts-left {
            background: #F7F7F7;
            border-radius: 12px;
            min-height: 455px;
            /* width: 42%; */
            padding: 48px;
        }

        .contacts-page .contacts-left .tel {
            width: 50%;
        }

        .contacts-page .contacts-left .tel a {
            font-size: 26px;
            font-weight: 600;
            color: #222;
            line-height: 36px;
        }

        .contacts-page .contacts-left p:not([class]) {
            color: rgba(34, 34, 34, 0.37);
            font-size: 18px;
        }

        .contacts-page .contacts-left .email {
            width: 50%;
        }

        .contacts-page .contacts-left .email a {
            font-size: 22px;
            color: #FF3B00;
            line-height: 36px;
        }

        .contacts-page .contacts-left .address {
            font-size: 18px;
            color: #222;
            position: relative;
            padding-left: 25px;
            margin-top: 36px;
        }

        .contacts-page .contacts-left .address:before {
            width: 16px;
            height: 22px;
            background: url(/images/geo-red.svg) center center no-repeat;
            background-size: contain;
            position: absolute;
            content: '';
            left: 0;
            top: 5px;
        }

        .contacts-page .contacts-left .social-links {
            margin-top: 34px;
        }

        .contacts-page .contacts-left .btn {
            height: 48px;
            background: #D03000;
            border-radius: 8px;
            font-size: 21px;
            color: #fff;
            text-align: center;
            padding: 0 20px;
            display: block;
            float: left;
            line-height: 48px;
            width: auto;
            margin-top: 70px;
        }

        .contacts-page .contacts-right {
            background: #eee;
            min-height: 455px;
            border-radius: 12px;
            /* width: 56%; */
            overflow: hidden;
            position: relative;
            /* margin-left: 2%; */
        }

        .contacts-page .contacts-right .map {
            border-radius: 12px;
        }

        .contacts-page .contacts-right .map iframe {
            border-radius: 12px;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        /*----------------------------------------------------------------------------------
    10.2. Media queries
    -----------------------------------------------------------------------------------*/
        @media screen and (max-width: 1520px) {
            .contacts-page .contacts-left .tel a {
                font-size: 24px;
            }
        }

        @media screen and (max-width: 1300px) {
            .contacts-page .contacts-left .tel {
                width: 100%;
                margin-bottom: 10px;
            }

            .contacts-page .contacts-left .email {
                width: 100%;
            }

            .contacts-page .contacts-left .address {
                margin-top: 25px;
            }

            .contacts-page .contacts-left .btn {
                margin-top: 45px;
            }
        }

        @media screen and (max-width: 1200px) {
            .contacts-page .contacts-left {
                width: 100%;
                min-height: inherit;
            }

            .contacts-page .contacts-right {
                width: 100%;
                margin-left: 0;
                margin-top: 20px;
            }

            .contacts-page .contacts-left .tel {
                width: 50%;
            }

            .contacts-page .contacts-left .email {
                width: 50%;
            }

            .contacts-page .page_body {
                display: block;
            }

            .contacts-page .contacts-right {
                min-height: inherit;
                height: 450px;
            }
        }

        @media screen and (max-width: 640px) {
            .contacts-page .contacts-left {
                padding: 26px;
            }

            .contacts-page .contacts-left .email {
                clear: both;
                width: 100%;
            }

            .contacts-page .contacts-left .tel {
                width: 100%;
            }

            .contacts-page .contacts-right {
                height: 360px;
            }
        }

        @media screen and (max-width: 400px) {
            .contacts-page .contacts-left {
                padding: 26px 20px;
            }

            .contacts-page .contacts-left .address {
                font-size: 16px;
            }

            .contacts-page .contacts-left .social-links {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }
        }

        .social-links .link {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: block;
            float: left;
            position: relative;
            margin-right: 23px;
        }

        .social-links .link:last-child {
            margin-right: 0;
        }

        .social-links .link span {
            display: block;
            position: relative;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            z-index: 1;
            background: inherit;
        }

        .social-links .link span:before {
            position: absolute;
            top: 50%;
            left: 50%;
            content: '';
            background-position: center center;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .social-links .link:after {
            background: inherit;
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border-radius: 50%;
            content: '';
            filter: blur(6px);
            -webkit-filter: blur(6px);
            -moz-filter: blur(6px);
            opacity: 0;
            transition: all .1s linear;
            will-change: opacity;
        }

        .social-links .link:hover:after {
            opacity: 1;
            transition: all .1s linear;
        }

        .social-links .link.facebook {
            background: #33589E;
        }

        .social-links .link.facebook span:before {
            width: 13px;
            height: 25px;
            background-image: url(/images/facebook-logo.svg);
            margin-top: -13px;
            margin-left: -7px;
        }

        .social-links .link.instagram {
            background: #4c5ad1;
            /* Old browsers */
            background: -moz-linear-gradient(-45deg, #4c5ad1 0%, #ff3756 42%, #ff3e37 60%, #ffd42b 100%);
            /* FF3.6-15 */
            background: -webkit-linear-gradient(-45deg, #4c5ad1 0%, #ff3756 42%, #ff3e37 60%, #ffd42b 100%);
            /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(135deg, #4c5ad1 0%, #ff3756 42%, #ff3e37 60%, #ffd42b 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#4c5ad1', endColorstr='#ffd42b', GradientType=1);
            /* IE6-9 fallback on horizontal gradient */
        }

        .social-links .link.instagram span:before {
            width: 22px;
            height: 22px;
            background-image: url(/images/instagram-logo.svg);
            margin-top: -11px;
            margin-left: -11px;
        }

        .social-links .link.pinterest {
            background: #C8232C;
        }

        .social-links .link.pinterest span:before {
            width: 20px;
            height: 24px;
            background-image: url(/images/pinterest.svg);
            margin-top: -12px;
            margin-left: -10px;
        }

        .social-links .link.twitter {
            background: #4BA0EB;
        }

        .social-links .link.twitter span:before {
            width: 26px;
            height: 20px;
            background-image: url(/images/twitter-logo.svg);
            margin-top: -10px;
            margin-left: -13px;
        }

        .social-links .link.youtube {
            background: #FF000E;
        }

        .social-links .link.youtube span:before {
            width: 23px;
            height: 16px;
            background-image: url(/images/youtube-logo.svg);
            margin-top: -8px;
            margin-left: -12px;
        }
    </style>
@endsection
@section('content')
    <div id="app" class="bg-shuttle-gray">
        @include('layouts.newnavbar')
        <section class="px-2 md:px-8">
            <div class="mt-5 container mx-auto breadcrumbs">
                <div class="mt-5 container mx-auto">
                    <div class="mt-3 text-center">
                        <h1 class="fint-bold text-2xl md:text-3xl uppercase">
                            Booking Inquiry for <br>
                            <span class="mt-4 text-regal-red font-bold">{{ $departure->trip->title }}</span>
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5 px-4 md:px-6 lg:px-8">
            <div class="w-full md:w-1/2 lg:w-2/5 contacts-left mx-auto">

                <form id="form" action="{{ route('departureinquiry.post') }}" method="POST"
                    v-on:submit="loading = true">
                    @csrf
                    <div class="mb-3">

                        <div class="relative">
                            <select
                                class="block mt-2 xl:mt-3 focus:outline-none w-full border border-regal-blue rounded-md text-black py-2 px-3 xl:py-2"
                                id="show-all-on-submit-user" name="user_title">

                                <option selected disabled value="">--Title--</option>
                                <option value="Mr">Mr</option>
                                <option value="Miss">Miss</option>
                                <option value="Mrs">Mrs</option>
                            </select>
                            @if ($errors->has('user_title'))
                                <div class="invalid-feedback text-sm text-regal-red">
                                    {{ $errors->first('user_title') }}
                                </div>
                            @endif

                        </div>
                    </div>

                    <div>

                        <input
                            class="appearance-none w-full py-2 px-3 focus:border-regal-green rounded-md text-black border border-regal-blue  focus:outline-none focus:shadow-outline {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            name="name" value="{{ old('name') }}" id="username" type="text" placeholder="Name*">
                        <input type="hidden" name="cost"
                            value="{{ $departure->price ? $departure->price : round($detail->price - ($detail->discount * $detail->price) / 100) }}">
                        <input type="hidden" name="trip_name" value="{{ $departure->trip->title }}">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback text-sm text-regal-red">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="mt-3">

                        <input
                            class="appearance-none border border-regal-blue w-full focus:border-regal-green rounded-md text-black py-2 px-3 focus:outline-none {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            name="email" value="{{ old('email') }}" id="iemail" type="email" name="email"
                            placeholder="Email*">
                        @if ($errors->has('email'))
                            <div class="mt-1 invalid-feedback text-sm text-regal-red">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="mt-3">

                        <input
                            class="appearance-none border border-regal-blue w-full py-2 px-3 focus:border-regal-green rounded-md text-black focus:outline-none {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                            name="phone" value="{{ old('phone') }}" name="phone" id="phone" type="text"
                            placeholder="Phone*">
                        @if ($errors->has('phone'))
                            <div class="invalid-feedback text-sm text-regal-red">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div>
                    <div class="mt-3">

                        <input
                            class="appearance-none border border-regal-blue w-full py-2 px-3 focus:border-regal-green rounded-md text-black focus:outline-none {{ $errors->has('persons') ? 'is-invalid' : '' }}"
                            type="number" value="{{ old('persons') }}" name="persons" id="persons" type="text"
                            placeholder="Number of Person*">
                        @if ($errors->has('persons'))
                            <div class="invalid-feedback text-sm text-regal-red">
                                {{ $errors->first('persons') }}
                            </div>
                        @endif

                    </div>
                    <div class="my-3">

                        <div class="relative">
                            <input type="hidden" name="departure_date" value="{{ $departure->start_date }}">
                            <input type="hidden" name="arrival_date"
                                value="{{ date('Y-m-d', strtotime($departure->start_date . ' + ' . $departure->trip->duration . 'days')) }}">
                            <select
                                class="block mt-2 xl:mt-3 px-6 focus:outline-none w-full border border-regal-blue rounded-md text-black py-1 xl:py-2"
                                id="show-all-on-submit-country" name="country" value="{{ old('persons') }}">

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
                                <div class="invalid-feedback text-sm text-regal-red">
                                    {{ $errors->first('country') }}
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="mt-3">

                        <textarea
                            class="appearance-none border border-regal-blue block w-full py-3 px-4 mb-3 focus:border-regal-green rounded-md text-black focus:outline-none  {{ $errors->has('message') ? 'is-invalid' : '' }}"
                            id="user_message" rows="5" placeholder="Message*" name="message">{{ old('message') }}</textarea>
                        @if ($errors->has('message'))
                            <div class="invalid-feedback text-sm text-regal-red">
                                {{ $errors->first('message') }}
                            </div>
                        @endif

                    </div>
                    <div class="flex flex-col md:flex-row items-center justify-between">

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
