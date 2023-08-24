@auth
    <section class="hidden lg:block top-nav bg-black px-4 md:px-8">
        <div class="container mx-auto">
            <div class="flex justify-between py-2 text-white">
                <div>
                    Welcome back: <span> {{ Auth::user()->name }}</span>
                </div>
                <div>
                    {{-- <a class="inline-block mr-2 border border-white px-5 py-1 bg-black rounded-md"
                        href="{{ route('cache') }}">Cache </a> --}}
                    <a class="inline-block mr-2 border border-white px-5 py-1 bg-black rounded-md"
                        href="{{ route('clear') }}">Clear
                        Cache</a>
                </div>
            </div>
        </div>
    </section>
@endauth

<section class="hidden lg:block top-nav bg-black px-4 md:px-6 xl:px-8">
    <div class="container mx-auto">
        <div class="flex justify-between py-2">
            <div class="phone cta flex items-center text-white">
                <p>
                    <a href="tel:+9779851042334">
                        <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 20 20">
                            <path fill="#ffffff"
                                d="M160.559 164.652l1.75-.556a4.51 4.51 0 1 0-2.048-3.771 4.471 4.471 0 0 0 .867 2.649zm2.077-6.616a.49.49 0 0 1 .354-.165c.089 0 .177.011.255.011s.188-.044.3.22.376.912.409.978a.241.241 0 0 1 .011.231.9.9 0 0 1-.133.22c-.066.077-.14.171-.2.231s-.136.137-.058.269a3.969 3.969 0 0 0 .739.912 3.624 3.624 0 0 0 1.068.654c.133.066.21.055.288-.033s.332-.384.42-.516.177-.11.3-.066.774.363.907.428.221.1.254.153a1.093 1.093 0 0 1-.078.626 1.341 1.341 0 0 1-.9.626c-.243.022-.243.2-1.593-.329a5.421 5.421 0 0 1-2.268-1.989 2.55 2.55 0 0 1-.542-1.362 1.472 1.472 0 0 1 .467-1.099z"
                                transform="translate(-154.713 -150.467)" />
                            <path fill="#ffffff"
                                d="M51 61a10 10 0 1 0-10-10 10 10 0 0 0 10 10zm-5.316-10.142a5.4 5.4 0 1 1 2.8 4.705l-3 .953.977-2.883a5.319 5.319 0 0 1-.777-2.775z"
                                transform="translate(-41 -41)" />
                        </svg>
                        <span class="inline-block ml-2 text-sm"> For quick Inquiry: +977 98510 42334
                        </span> </a>
                </p>
            </div>
            <div class="social phone cta flex items-center text-white">
                <p>
                    <a aria-label="Facebook Page" target="_blank" href="{{ setting('site.fb') }}"> <svg class="inline-block"
                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                            <path fill="#ffffff"
                                d="M41 31a10 10 0 1 0 10 10 10 10 0 0 0-10-10zm2.871 6.271s-1.058-.009-1.324-.009a.683.683 0 0 0-.667.7v1.471h1.991l-.227 2h-1.786v5.12h-2.022v-5.091h-1.707v-2.053h1.733v-1.938A2.285 2.285 0 0 1 41.9 35.44c.124 0 1.973.018 1.973.018z"
                                transform="translate(-31 -31)" />
                        </svg>
                        <span class="inline-block ml-2 text-sm"> Follow us on Facebook
                        </span>
                    </a>
                </p>
                <p class="ml-5">
                    <a aria-label="Instagram Page" target="_blank" href="{{ setting('site.insta') }}">
                        <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 20 20">
                            <path fill="#ffffff"
                                d="M165.34 158.9h-4.24a2.2 2.2 0 0 0-2.2 2.2v4.244a2.2 2.2 0 0 0 2.2 2.2h4.244a2.2 2.2 0 0 0 2.2-2.2V161.1a2.2 2.2 0 0 0-2.204-2.2zm-2.124 7.156a2.84 2.84 0 1 1 2.84-2.84 2.845 2.845 0 0 1-2.84 2.839zm2.982-5.364a.48.48 0 1 1 .48-.48.478.478 0 0 1-.478.479z"
                                transform="translate(-153.216 -153.216)" />
                            <circle fill="#ffffff" cx="1.724" cy="1.724" r="1.724"
                                transform="rotate(-89.312 10.051 1.674)" />
                            <path fill="#ffffff"
                                d="M41 31a10 10 0 1 0 10 10 10 10 0 0 0-10-10zm5.556 12.124a3.433 3.433 0 0 1-3.431 3.431H38.88a3.433 3.433 0 0 1-3.431-3.431V38.88a3.433 3.433 0 0 1 3.431-3.431h4.244a3.433 3.433 0 0 1 3.431 3.431z"
                                transform="translate(-31 -31)" />
                        </svg> <span class="inline-block ml-2 text-sm"> Follow us on Instagram
                        </span>
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>
<section class="lg:hidden top-nav bg-black px-6"> {{-- sano screen --}}
    <div class="container mx-auto">
        <div class="flex justify-between py-2">
            <div class="social phone cta flex items-center text-white">
                <p>
                    <a aria-label="Facebook Page" target="_blank" href="{{ setting('site.fb') }}"> <svg class="inline-block"
                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                            <path fill="#ffffff"
                                d="M41 31a10 10 0 1 0 10 10 10 10 0 0 0-10-10zm2.871 6.271s-1.058-.009-1.324-.009a.683.683 0 0 0-.667.7v1.471h1.991l-.227 2h-1.786v5.12h-2.022v-5.091h-1.707v-2.053h1.733v-1.938A2.285 2.285 0 0 1 41.9 35.44c.124 0 1.973.018 1.973.018z"
                                transform="translate(-31 -31)" />
                        </svg>
                    </a>
                </p>
                <p class="ml-3">
                    <a aria-label="Instagram Page" target="_blank" href="{{ setting('site.insta') }}">
                        <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 20 20">
                            <path fill="#ffffff"
                                d="M165.34 158.9h-4.24a2.2 2.2 0 0 0-2.2 2.2v4.244a2.2 2.2 0 0 0 2.2 2.2h4.244a2.2 2.2 0 0 0 2.2-2.2V161.1a2.2 2.2 0 0 0-2.204-2.2zm-2.124 7.156a2.84 2.84 0 1 1 2.84-2.84 2.845 2.845 0 0 1-2.84 2.839zm2.982-5.364a.48.48 0 1 1 .48-.48.478.478 0 0 1-.478.479z"
                                transform="translate(-153.216 -153.216)" />
                            <circle fill="#ffffff" cx="1.724" cy="1.724" r="1.724"
                                transform="rotate(-89.312 10.051 1.674)" />
                            <path fill="#ffffff"
                                d="M41 31a10 10 0 1 0 10 10 10 10 0 0 0-10-10zm5.556 12.124a3.433 3.433 0 0 1-3.431 3.431H38.88a3.433 3.433 0 0 1-3.431-3.431V38.88a3.433 3.433 0 0 1 3.431-3.431h4.244a3.433 3.433 0 0 1 3.431 3.431z"
                                transform="translate(-31 -31)" />
                        </svg> </a>
                </p>
            </div>
            <div class="phone cta flex items-center text-white">
                <p>
                    <a href="tel:+9779851042334">
                        <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 20 20">
                            <path fill="#ffffff"
                                d="M160.559 164.652l1.75-.556a4.51 4.51 0 1 0-2.048-3.771 4.471 4.471 0 0 0 .867 2.649zm2.077-6.616a.49.49 0 0 1 .354-.165c.089 0 .177.011.255.011s.188-.044.3.22.376.912.409.978a.241.241 0 0 1 .011.231.9.9 0 0 1-.133.22c-.066.077-.14.171-.2.231s-.136.137-.058.269a3.969 3.969 0 0 0 .739.912 3.624 3.624 0 0 0 1.068.654c.133.066.21.055.288-.033s.332-.384.42-.516.177-.11.3-.066.774.363.907.428.221.1.254.153a1.093 1.093 0 0 1-.078.626 1.341 1.341 0 0 1-.9.626c-.243.022-.243.2-1.593-.329a5.421 5.421 0 0 1-2.268-1.989 2.55 2.55 0 0 1-.542-1.362 1.472 1.472 0 0 1 .467-1.099z"
                                transform="translate(-154.713 -150.467)" />
                            <path fill="#ffffff"
                                d="M51 61a10 10 0 1 0-10-10 10 10 0 0 0 10 10zm-5.316-10.142a5.4 5.4 0 1 1 2.8 4.705l-3 .953.977-2.883a5.319 5.319 0 0 1-.777-2.775z"
                                transform="translate(-41 -41)" />
                        </svg>
                        <span class="inline-block ml-2 text-sm"> +977 98510 42334
                        </span> </a>
                </p>
            </div>
        </div>
    </div>
</section>
<header class="mega-menu bg-white sticky top-0">
    <div class="header px-2 md:px-6 xl:px-8 ">
        <div class="container mx-auto">
            <div class="lg:flex lg:justify-between lg:items-center">
                <a href="/">
                    <amp-img alt="Himalayan Trekkers Logo" title="Himalayan Trekkers" src="/images/logo_new.svg"
                        width="160" height="64" class="hidden lg:block">
                    </amp-img>
                </a>
                <nav class="main-menu" id="main-menu">
                    <!-- Mobile -->
                    <label for="mobile" id="mobile-menu">
                        <a href="/" target="_top" title="Himalayan Trekkers Logo" class="inline-block">
                            <amp-img alt="Himalayan Trekkers Logo" title="Himalayan Trekkers Logo"
                                src="/images/logo_new.svg" width="140" height="50" class="">
                            </amp-img>
                            {{-- <span class="logo">Himalayan Trekkers --}}
                        </a>
                        <div class="ml-auto inline-block lg:hidden mr-12 float-right mt-3"> <a href="#"
                                on="tap:search-lightbox.open" role="menuitem"
                                class="inline-block h-8 w-8 p-2 rounded-xl shadow-none bg-regal-blue hover:text-black hover:bg-hover-yellow text-white btns"><svg
                                    class="h-4 font-semibold" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </a> </div> <span class="main-menu-dropdown-icon"> <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 hamburger" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </span>
                    </label> <input type="checkbox" id="mobile"> <!-- Main-menu -->
                    <ul class="main-menu">
                        <li class="main-menu-dropdown">
                            <a class="hover:text-regal-red">
                                Best Trekking
                                <span class="main-menu-dropdown-icon">
                                    <i class="arrow-down"></i>
                                </span>
                            </a> <label class="main-menu-dropdown-icon" for="main-menu-dropdown-list-5">
                                <i class="arrow-down arrow-down-mobile"></i>
                            </label>
                            <input type="checkbox" id="main-menu-dropdown-list-5">
                            <ul class="main-menu-dropdown-list">
                                @foreach (__('navbar.trips') as $t)
                                    @php
                                        $t = json_decode(json_encode($t));
                                    @endphp
                                    <li>
                                        <a href="{{ route('itinerary.index', ['slug' => $t->slug]) }}/">
                                            {{ $t->title }} </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <!-- Multiple level main-menu-dropdown -->
                        <li class="main-menu-dropdown">
                            <a class="hover:text-regal-red" href="/nepal">
                                Nepal
                                <span class="main-menu-dropdown-icon">
                                    <i class="arrow-down"></i>
                                </span>
                            </a> <label class="main-menu-dropdown-icon" for="main-menu-dropdown-list-2">
                                <i class="arrow-down arrow-down-mobile"></i>
                            </label>
                            <input type="checkbox" id="main-menu-dropdown-list-2">
                            <ul class="main-menu-dropdown-list">
                                @foreach ($regions as $t)
                                    <li class="hover:text-regal-red">
                                        <a href="{{ route('singleregion.index', ['slug' => $t->slug]) }}"
                                            target="_top" title="Back to index">{{ $t->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="/bhutan" target="_top" title="Back to index">Bhutan</a>
                        </li>
                        <li>
                            <a href="/tibet" target="_top" title="Back to index">Tibet</a>
                        </li>
                        <li>
                            <a href="/india" target="_top" title="Back to index">India</a>
                        </li>
                        <li class="main-menu-dropdown">
                            <a href="/multicountry-tours-and-treks">
                                MultiCountry
                                <span class="main-menu-dropdown-icon">
                                    <i class="arrow-down"></i>
                                </span>
                            </a> <label class="main-menu-dropdown-icon" for="main-menu-dropdown-list-3">
                                <i class="arrow-down arrow-down-mobile"></i>
                            </label>
                            <input type="checkbox" id="main-menu-dropdown-list-3">
                            <ul class="main-menu-dropdown-list">
                                <li>
                                    <a href="/nepal-bhutan-tours">Nepal Bhutan Tours </a>
                                </li>
                                <li>
                                    <a href="/nepal-tibet-tours">Nepal Tibet Tours</a>
                                </li>
                                <li>
                                    <a href="/nepal-india-tours">Nepal India Tours</a>
                                </li>
                                <li>
                                    <a href="/nepal-bhutan-india-tours">Nepal Bhutan India Tours</a>
                                </li>
                                <li>
                                    <a href="/nepal-bhutan-tibet-tours">Nepal Bhutan Tibet Tours</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Multiple level main-menu-dropdown -->
                        <li class="main-menu-dropdown">
                            <a>
                                Activities
                                <span class="main-menu-dropdown-icon">
                                    <i class="arrow-down"></i>
                                </span>
                            </a> <label class="main-menu-dropdown-icon" for="main-menu-dropdown-list-4">
                                <i class="arrow-down arrow-down-mobile"></i>
                            </label>
                            <input type="checkbox" id="main-menu-dropdown-list-4">
                            <ul class="main-menu-dropdown-list">
                                @foreach ($activities as $t)
                                    <li>
                                        <a href="{{ route('singleactivity.index', ['slug' => $t->slug]) }}">
                                            {{ $t->title }} </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <!-- Multiple level main-menu-dropdown -->
                        {{-- <li class="main-menu-dropdown">
                            <a>
                                Travel Style
                                <span class="main-menu-dropdown-icon">
                                    <i class="arrow-down"></i>
                                </span>
                            </a>                            <label class="main-menu-dropdown-icon" for="main-menu-dropdown-list-5">
                                <i class="arrow-down arrow-down-mobile"></i>
                            </label>
                            <input type="checkbox" id="main-menu-dropdown-list-5">                            <ul class="main-menu-dropdown-list">
                                @foreach ($travelstyles as $t)
                                    <li>
                                        <a href="{{ route('singletravel.index', ['slug' => $t->slug]) }}">
                                            {{ $t->title }}                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li> --}}
                        <li class="main-menu-dropdown">
                            <a>
                                More
                                <span class="main-menu-dropdown-icon">
                                    <i class="arrow-down"></i>
                                </span>
                            </a> <label class="main-menu-dropdown-icon" for="main-menu-dropdown-list-6">
                                <i class="arrow-down arrow-down-mobile"></i>
                            </label>
                            <input type="checkbox" id="main-menu-dropdown-list-6">
                            <ul class="main-menu-dropdown-list last-list">
                                <li>
                                    <a href="/blog">Blogs </a>
                                </li>
                                <li>
                                    <a href="/about-us">About Us </a>
                                </li>
                                <li>
                                    <a href="/faqs">FAQ'S </a>
                                </li>
                                <li>
                                    <a href="/reviews">Reviews </a>
                                </li>
                                <li>
                                    <a href="/contact-us">Contact Us </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- /main-menu -->
                </nav>
                <div class="hidden lg:block"> <a href="#" on="tap:search-lightbox.open"
                        class="inline-block h-8 w-8 p-2 rounded-xl shadow-none bg-regal-blue hover:text-black hover:bg-hover-yellow text-white btns"><svg
                            class="h-4 font-semibold" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<amp-lightbox id="search-lightbox" layout="nodisplay" class="popup-lightbox relative" scrollable>
    <div class="mt-5 popup-content">
        <div class="popup-content-header px-8 py-2">
            <button type="button" on="tap:search-lightbox.close"
                class="popup-close outline-none focus:outline-none">×</button>
            <h4 class="popup-header-title">Search</h4>
        </div>
        <div class="popup-content-body">
            <form method="POST" action-xhr="/search" target="_blank" id="search-form"
                class="p-4 bg-white rounded-t-xl shadow-inner" autocomplete="off">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="relative px-2">
                    <input id="s" name="s" type="search" placeholder="Find Your Destination"
                        class="block w-full pl-10 pr-3 py-2 truncate leading-5 border border-reggal-red rounded-full focus:outline-none focus:border-regal-blue relative"
                        on="input-debounced:AMP.setState({
                        query: event.value,
                        autosuggest: event.value
                      }),
                      autosuggest-list.show"
                        [value]="query || ''" />
                </div>
                <amp-list credentials="include" class="autosuggest-box text-black text-base overflow-y-scroll"
                    width="auto" height="400" layout="fixed-height" src="/ampsearch"
                    [src]="'/ampsearch?q=' + (autosuggest || '')" id="autosuggest-list">
                    @verbatim
                        <template type="amp-mustache" id="amp-template-customa">
                            <div data-value="{{ name }}">
                                <div class="bg-white flex items-start px-2 mt-2">
                                    <div class="mr-5 w-16 flex-shrink-0">
                                        <amp-img class="rounded-xl h-16 w-16 object-cover" alt="{{ name }}"
                                            width="84" height="68" layout="fixed" src="{{ image }}">
                                        </amp-img>
                                    </div>
                                    <div class="md:w-max pl-5 flex flex-col text-sm flex-wrap md:flex-nowrap">
                                        <button class="outline-none"
                                            on="tap:AMP.navigateTo(url=/itinerary/{{ slug }}/)">
                                            <p class="font-semibold hover:text-regal-red">{{ name }}</p>
                                        </button>
                                        <p class="text-light-gray">{{ duration }} Days</p>
                                    </div>
                                </div>
                            </div>
                        </template>
                    @endverbatim
                </amp-list>
            </form>
        </div>
    </div>
</amp-lightbox>