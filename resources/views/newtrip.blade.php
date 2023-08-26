<!doctype html>
<html amp lang="en">
  <head>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <link as=script href=https://cdn.ampproject.org/v0.js rel=preload>
    <meta name="viewport" content="width=device-width">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    <link rel="canonical" href="https://himalayantrekkers.com/itinerary/{{ $detail->slug }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    <link rel="manifest" href="/images/site.webmanifest">
    <link rel="mask-icon" href="/images/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/images/favicon.ico">



    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet">



    <script async custom-element="amp-fx-collection" src="https://cdn.ampproject.org/v0/amp-fx-collection-0.1.js">
    </script>
    <script custom-element="amp-selector" src="https://cdn.ampproject.org/v0/amp-selector-0.1.js" async></script>
    <script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js">
    </script>


    <script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
    <script custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js" async></script>

    <script custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js" async></script>
    <script custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js" async></script>
    <script custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js" async></script>
    <script custom-element="amp-anim" src="https://cdn.ampproject.org/v0/amp-anim-0.1.js" async></script>
    <script custom-element="amp-animation" src="https://cdn.ampproject.org/v0/amp-animation-0.1.js" async></script>
    <script custom-element="amp-position-observer" src="https://cdn.ampproject.org/v0/amp-position-observer-0.1.js" async>
    </script>
    <script custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js" async></script>
    @if (!empty($detail->album->video))
        <script custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js" async></script>
    @endif
    <script custom-element="amp-fx-flying-carpet" src="https://cdn.ampproject.org/v0/amp-fx-flying-carpet-0.1.js" async>
    </script>
    <script async custom-element="amp-image-lightbox" src="https://cdn.ampproject.org/v0/amp-image-lightbox-0.1.js">
    </script>
    <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
    <script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
    <script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>


    <link rel="preload" as="image" href="{{ Voyager::image(getThumbnail($detail->image, 'cropped')) }}">
    <link rel="preload" as="image" href="{{ Voyager::image($detail->image) }}">




    <style amp-boilerplate>
        body {
            -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            animation: -amp-start 8s steps(1, end) 0s 1 normal both
        }

        @-webkit-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-moz-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-ms-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-o-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

    </style><noscript>
        <style amp-boilerplate>
            body {
                -webkit-animation: none;
                -moz-animation: none;
                -ms-animation: none;
                animation: none
            }

        </style>
    </noscript>

    <style amp-custom>
:root{-moz-tab-size:4;-o-tab-size:4;tab-size:4}html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0;font-family:system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji}hr{height:0;color:inherit}abbr[title]{-webkit-text-decoration:underline dotted;text-decoration:underline dotted}b,strong{font-weight:bolder}code,pre{font-family:ui-monospace,SFMono-Regular,Consolas,Liberation Mono,Menlo,monospace;font-size:1em}small{font-size:80%}sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline;top:-.5em}table{text-indent:0;border-color:inherit}button,input,select,textarea{font-family:inherit;font-size:100%;line-height:1.15;margin:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button}legend{padding:0}progress{vertical-align:baseline}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}button{background-color:transparent;background-image:none}button:focus{outline:1px dotted;outline:5px auto -webkit-focus-ring-color}ol,ul{list-style:none;margin:0;padding:0}html{font-family:ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}body{font-family:inherit;line-height:inherit}*,:after,:before{-webkit-box-sizing:border-box;box-sizing:border-box;border:0 solid #e5e7eb}hr{border-top-width:1px}img{border-style:solid}textarea{resize:vertical}input::-webkit-input-placeholder,textarea::-webkit-input-placeholder{opacity:1;color:#9ca3af}input::-moz-placeholder,textarea::-moz-placeholder{opacity:1;color:#9ca3af}input:-ms-input-placeholder,textarea:-ms-input-placeholder{opacity:1;color:#9ca3af}input::-ms-input-placeholder,textarea::-ms-input-placeholder{opacity:1;color:#9ca3af}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}table{border-collapse:collapse}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}button,input,select,textarea{padding:0;line-height:inherit;color:inherit}code,pre{font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}.container{width:100%;margin-right:auto;margin-left:auto}@media (min-width:640px){.container{max-width:640px}}@media (min-width:768px){.container{max-width:768px}}@media (min-width:1024px){.container{max-width:1024px}}@media (min-width:1280px){.container{max-width:1280px}}@media (min-width:1536px){.container{max-width:1536px}}body,html{font-family:Open Sans,Helvetica,sans-serif}[tabindex="-1"]:focus:not(:focus-visible){outline:0}amp-img,img{border:0}amp-img[class^=-amp]{height:auto;max-width:100%}::-webkit-scrollbar{width:0}header{width:100%;z-index:9;top:0}@media (prefers-color-scheme:light){header.full-width{background:#fff}}.mega-menu .header{-webkit-box-flex:0;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%;-webkit-box-shadow:0 .25rem 1rem rgba(0,0,0,.15);box-shadow:0 .25rem 1rem rgba(0,0,0,.15)}.mega-menu li,.mega-menu ol,.mega-menu ul{padding:0}.mega-menu #mobile:checked+.main-menu{display:block}.mega-menu #mobile-menu{position:relative;display:block;padding:8px;cursor:pointer}.mega-menu #mobile-menu span.main-menu-dropdown-icon{bottom:0;width:50px;cursor:pointer}.mega-menu #mobile-menu .main-menu-dropdown-icon,.mega-menu #mobile-menu span.main-menu-dropdown-icon{position:absolute;top:0;right:0}.mega-menu .main-menu:after,.mega-menu .main-menu:before{content:"";display:table;clear:both}.mega-menu .main-menu a{text-decoration:none}.mega-menu .main-menu li{position:relative;display:block}.mega-menu .main-menu .main-menu{display:none;max-height:100%}.mega-menu .main-menu .main-menu-dropdown-list{display:none}.mega-menu .main-menu .main-menu-dropdown-list:not(.main-menu-dropdown-megamenu) a,.mega-menu .main-menu .main-menu-dropdown-list:not(.main-menu-dropdown-shop) a{-webkit-transition:-webkit-transform .25s ease-out;transition:-webkit-transform .25s ease-out;transition:transform .25s ease-out;transition:transform .25s ease-out,-webkit-transform .25s ease-out;-webkit-transform:translateZ(0);transform:translateZ(0)}.mega-menu .main-menu .main-menu-dropdown-list:not(.main-menu-dropdown-megamenu) a:hover,.mega-menu .main-menu .main-menu-dropdown-list:not(.main-menu-dropdown-shop) a:hover{-webkit-transform:translate3d(3px,0,0);transform:translate3d(3px,0,0)}.mega-menu .main-menu .main-menu-dropdown-item-subtitle{font-size:.75rem;text-indent:10px;margin-left:10px}.mega-menu .main-menu input[type=checkbox]:checked+.main-menu-dropdown-list{display:block}.mega-menu .main-menu input[type=checkbox],.mega-menu .main-menu ul span.main-menu-dropdown-icon{display:none}.mega-menu .main-menu label{margin-bottom:0}.mega-menu .main-menu label.main-menu-dropdown-icon{width:100%;height:30px;cursor:pointer;z-index:10}.mega-menu .main-menu label.main-menu-dropdown-icon,.mega-menu .main-menu li label.main-menu-dropdown-icon{position:absolute;top:0;right:0}.mega-menu .main-menu>ul>li{cursor:pointer}@media (max-width:1199.98px){.header .main-menu .logo{top:3px}.header .main-menu span.logo{top:1px}.header .main-menu .fa{min-width:25px}}@media (max-width:1199.98px){.header .main-menu .active{color:#212529;background:#fff}}@media (max-width:1199.98px){.header .main-menu .main-menu-dropdown .main-menu-dropdown-list{background:#fff}}@media (max-width:1199.98px){.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li .main-menu-dropdown-item-subtitle{text-indent:30px;margin-left:30px}}@media (max-width:1199.98px){.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li a,.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li a li a{color:#212529}}@media (max-width:1199.98px){.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li a li a:hover{background:#fff}}@media (max-width:1199.98px){.header .main-menu .main-menu-dropdown-list li{text-indent:15px}.header .main-menu .main-menu-dropdown-list li ul li{text-indent:30px}.header .main-menu .main-menu-dropdown-list li ul li ul li{text-indent:45px}}@media (min-width:992px){.header .main-menu{background:#fff;border-top:1px solid #fff;border-bottom:1px solid #fff}}@media (min-width:992px){.header .main-menu i{color:#212529}}@media (min-width:992px){.header .main-menu .active{color:#ff3c00}}@media (min-width:992px){.header .main-menu .active>i i,.header .main-menu .active i{color:#000}}@media (min-width:768px){.header .main-menu .main-menu-dropdown .main-menu-dropdown-list{margin-top:-3px;border-top:3px solid #0084b4}}@media (min-width:992px){.header .main-menu .main-menu-dropdown .main-menu-dropdown-list{background:#fff}}@media (min-width:992px){.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li a,.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li a li a,.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li a li i,.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li i,.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li i li a,.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li i li i{color:#212529}}@media (min-width:992px){.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li a li a,.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li a li i,.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li i li a,.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li i li i{color:#f8f9fa}}@media (min-width:992px){.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li a li a:hover,.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li a li i:hover,.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li i li a:hover,.header .main-menu .main-menu-dropdown .main-menu-dropdown-list li i li i:hover{background:#fff;background:#212529}}@media (min-width:992px){.header .main-menu li:active,.header .main-menu li:active a,.header .main-menu li:active i,.header .main-menu li:hover,.header .main-menu li:hover a,.header .main-menu li:hover i{color:#ff3c00}}@media (min-width:992px){.header .main-menu li ul li:active a,.header .main-menu li ul li:active i,.header .main-menu li ul li:hover a,.header .main-menu li ul li:hover i{color:#fff}}@media (min-width:992px){.header .main-menu .main-menu{display:block}.header .main-menu .main-menu-dropdown-item-subtitle{text-indent:10px;margin-left:0}.header #mobile-menu,.header .main-menu label.main-menu-dropdown-icon{display:none}.header .main-menu ul span.main-menu-dropdown-icon{display:inline-block}.header .main-menu li{float:left}.header .main-menu .main-menu-dropdown-list .last-list{right:0;min-width:200px}.header .main-menu .main-menu-dropdown-list,.header .main-menu .main-menu-dropdown-list .last-list{border-width:0;margin:0;position:absolute;top:100%;z-index:100;display:none;-webkit-box-shadow:0 .25rem 1rem rgba(0,0,0,.15);box-shadow:0 .25rem 1rem rgba(0,0,0,.15)}.header .main-menu .main-menu-dropdown-list{left:0;min-width:250px}.header .main-menu .main-menu-dropdown-list a{padding:7px 15px}.header .main-menu .main-menu-dropdown-list li{float:none;border-width:1px 0 0}.header .main-menu .main-menu-dropdown-list .main-menu-dropdown-icon{position:absolute;top:0;right:0;padding:1em}.header .main-menu input[type=checkbox]:checked+.main-menu-dropdown-list{display:none}.header .main-menu li:hover>input[type=checkbox]+.main-menu-dropdown-list{display:block}}.header .arrow-down:before,.header .arrow-right:before{content:"";border-color:#000;border-style:solid;border-width:0 1px 1px 0;display:inline-block;padding:3px;position:absolute;top:50%}.header .arrow-down{padding-right:16px}.header .arrow-down:before{right:16px;-webkit-transform:translate(-50%,-50%) rotate(45deg);transform:translate(-50%,-50%) rotate(45deg);margin-top:-1px}.header .arrow-right:before{right:16px;-webkit-transform:rotate(-45deg);transform:rotate(-45deg);margin-top:2px}.header .main-menu .hamburger{position:absolute;left:50%;top:50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%);width:32px;height:32px}.ch{font-family:Carter One,cursive}.mega-menu .main-menu>ul>li a{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding:26px 15px;cursor:pointer;position:relative;font-weight:700;text-transform:uppercase;font-size:13px;display:block}@media screen and (max-width:1024px){.mega-menu .main-menu>ul>li a{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding:26px 10px;cursor:pointer;position:relative;font-weight:600;text-transform:uppercase;font-size:11px;display:block}}@media screen and (max-width:1266px){.mega-menu .main-menu>ul>li a{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding:20px 10px;cursor:pointer;position:relative;font-weight:600;text-transform:uppercase;font-size:13px;display:block}}@media screen and (max-width:768px){.mega-menu .main-menu>ul>li a{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding:6px 10px;cursor:pointer;position:relative;font-weight:700;text-transform:uppercase;font-size:13px;display:block}}.header .main-menu .hamburger:after,.header .main-menu .hamburger:before{position:absolute;left:50%;top:50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%);width:20px;height:1px}.header .main-menu .hamburger:before{content:"";top:-5px}.header .main-menu .hamburger:after{content:"";top:7px}.parallax-section h1{bottom:0;left:0;position:absolute;z-index:1}.main_content p{margin-bottom:1.25rem}@media (min-width:1280px){.main_content p{font-size:1.125rem;line-height:1.75rem}}@media (min-width:1536px){.main_content p{font-size:1.25rem;line-height:1.75rem}}@media (min-width:1280px){.main_content ul li{font-size:1rem;line-height:1.5rem}}@media (min-width:1536px){.main_content ul li{font-size:1.125rem;line-height:1.5rem}}.main_content h2,.main_content h3,.main_content h4{font-size:1.5rem;line-height:2rem;margin-top:1.25rem;margin-bottom:1.25rem}.main_content h2,.main_content h3,.main_content h4,.main_content p a{font-weight:600;--tw-text-opacity:1;color:rgba(9,31,38,var(--tw-text-opacity))}.aside ul{margin-top:1.25rem}.aside ul li p{font-size:.875rem;line-height:1.25rem}.fixed-container{position:relative;width:100%;min-width:100%;height:462px}@media only screen and (max-width:1024px){.fixed-container{position:relative;width:265px;min-width:100%;height:160px;min-height:100%}}.image{margin-bottom:20px}#d-wrapper .zig-zag-top:before{background-position:0 0;background-repeat:repeat-x;background-size:22px 32px;content:" ";display:block;height:32px;width:100%;position:relative;bottom:32px;left:0}#d-wrapper .zig-zag-bottom{margin:0 0 16px;background:#1ba1e2}#d-wrapper .zig-zag-top{margin:16px 0 0;background:#1ba1e2}#d-wrapper .zig-zag-bottom,#d-wrapper .zig-zag-top{padding:1px 0}#d-wrapper .zig-zag-bottom:after{background-repeat:repeat-x;background-position:0 100%;background-size:22px 32px;content:"";display:block;width:100%;height:32px;position:relative;top:12px;left:0}#d-wrapper p:not(:last-child){margin-bottom:20px}.bubble li:nth-child(odd){background:#fcf8f7;border-top:1px solid red;border-bottom:1px solid red}.bubble li:first-child{border-top:none}.season li:nth-child(odd){background:none;border-top:none;border-bottom:none}.btns{-webkit-box-shadow:0 10px 6px rgba(0,0,0,.10196078431372549);box-shadow:0 10px 6px rgba(0,0,0,.10196078431372549)}.btns:hover{-webkit-transition:background-color .3s ease,-webkit-filter .2s ease;transition:background-color .3s ease,-webkit-filter .2s ease;transition:filter .2s ease,background-color .3s ease;transition:filter .2s ease,background-color .3s ease,-webkit-filter .2s ease}.ts{text-shadow:3px 3px 4px #000}.boxed{background-color:#fff;border:1px solid #e3e3d0;padding:1rem}.newsletter-box{padding:.5rem;background:repeating-linear-gradient(-45deg,#6cc3eb,#6cc3eb 10px,#fffef2 0,#fffef2 0,#fffef2 20px,#cf6468 0,#cf6468 30px)}.media-content{-ms-flex-preferred-size:auto;flex-basis:auto;-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;-ms-flex-negative:1;flex-shrink:1;text-align:inherit}.newsletter-box .media-content{background-color:#fff;text-align:center}.w3-modal{padding-top:80px;position:fixed;left:0;top:0;width:100%;height:100%;overflow:auto;z-index:999999;background-color:#000;background-color:rgba(0,0,0,.4)}@media (max-width:600px){.w3-modal{padding-top:30px}}@media (max-width:768px){.w3-modal{padding-top:60px}}.w3-modal-content{margin:auto;outline:0;width:500px}@media (max-width:600px){.w3-modal-content{margin:0 10px;width:auto}}@media (max-width:768px){.w3-modal-content{width:500px}}.affiliated{display:inline-block;border:1px solid #f5f5f5;-webkit-transition:all .6s ease;transition:all .6s ease;border-radius:0;background:#fff;padding:5px;margin-bottom:10px}.scrollToTop{color:#000;font-size:1.4em;-webkit-box-shadow:0 1px 1px 0 rgba(0,0,0,.14),0 1px 1px -1px rgba(0,0,0,.14),0 1px 5px 0 rgba(0,0,0,.12);box-shadow:0 1px 1px 0 rgba(0,0,0,.14),0 1px 1px -1px rgba(0,0,0,.14),0 1px 5px 0 rgba(0,0,0,.12);width:50px;height:50px;border-radius:50%;border:none;outline:none;background:#000;z-index:9999;bottom:3.5rem;right:30px;position:fixed;opacity:0;visibility:hidden}.target-anchor{position:absolute;top:-72px;left:0}.main_content ul{margin-left:3.25rem;padding-left:0}.main_content>ul>li{list-style-type:none;position:relative}.main_content li{margin-bottom:.25rem}.main_content:not(.included, .excluded) ul li:before {content:"";margin-left:-1.5rem;margin-top: 10px;width: 7px;height: 7px;background: #2ebe7e;border-radius: 2px 2px 2px 0;position: absolute;text-align: center;font-size: .875rem;}.included ul li:before{content:"+";margin-left:-1.5rem;color:#2ebe7e;border-radius:2px 2px 2px 0;position:absolute;text-align:center;font-size:1.25rem;font-weight:900}.excluded ul li:before{content:"-";margin-left:-1.5rem;color:red;border-radius:2px 2px 2px 0;position:absolute;text-align:center;font-size:1.25rem;font-weight:900}#inqdiv{position:fixed;bottom:0;height:40px;width:100%;z-index:100000000}.popup-lightbox{background:rgba(0,0,0,.8)}.popup-content{background-color:#fff;border-radius:2px;position:absolute;top:50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%);left:50%;width:90%;max-width:420px;max-height:100%;overflow:auto}.popup-close{border:none;background-color:transparent;color:#000;cursor:pointer;font-size:1.5em;float:right;padding:0;margin:-4px 0 0;text-decoration:none}.popup-close:hover{color:red}.divide-y>:not([hidden])~:not([hidden]){--tw-divide-y-reverse:0;border-top-width:calc(1px*(1 - var(--tw-divide-y-reverse)));border-bottom-width:calc(1px*var(--tw-divide-y-reverse))}.divide-gray-200>:not([hidden])~:not([hidden]){--tw-divide-opacity:1;border-color:rgba(229,231,235,var(--tw-divide-opacity))}.sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border-width:0}.appearance-none{-webkit-appearance:none;-moz-appearance:none;appearance:none}.bg-fixed{background-attachment:fixed}.bg-transparent{background-color:transparent}.bg-regal-blue{--tw-bg-opacity:1;background-color:rgba(9,31,38,var(--tw-bg-opacity))}.bg-brand-blue{--tw-bg-opacity:1;background-color:rgba(49,151,205,var(--tw-bg-opacity))}.bg-regal-green{--tw-bg-opacity:1;background-color:rgba(37,127,105,var(--tw-bg-opacity))}.bg-regal-red{--tw-bg-opacity:1;background-color:rgba(255,60,0,var(--tw-bg-opacity))}.bg-light-grayone{--tw-bg-opacity:1;background-color:rgba(208,237,225,var(--tw-bg-opacity))}.bg-light-graytwo{--tw-bg-opacity:1;background-color:rgba(220,235,237,var(--tw-bg-opacity))}.bg-shuttle-gray{--tw-bg-opacity:1;background-color:rgba(252,248,247,var(--tw-bg-opacity))}.bg-black{--tw-bg-opacity:1;background-color:rgba(0,0,0,var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgba(255,255,255,var(--tw-bg-opacity))}.bg-gray-50{--tw-bg-opacity:1;background-color:rgba(249,250,251,var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity:1;background-color:rgba(243,244,246,var(--tw-bg-opacity))}.bg-gray-200{--tw-bg-opacity:1;background-color:rgba(229,231,235,var(--tw-bg-opacity))}.bg-gray-300{--tw-bg-opacity:1;background-color:rgba(209,213,219,var(--tw-bg-opacity))}.bg-gray-400{--tw-bg-opacity:1;background-color:rgba(156,163,175,var(--tw-bg-opacity))}.bg-gray-500{--tw-bg-opacity:1;background-color:rgba(107,114,128,var(--tw-bg-opacity))}.bg-gray-700{--tw-bg-opacity:1;background-color:rgba(55,65,81,var(--tw-bg-opacity))}.bg-gray-900{--tw-bg-opacity:1;background-color:rgba(17,24,39,var(--tw-bg-opacity))}.bg-red-100{--tw-bg-opacity:1;background-color:rgba(254,226,226,var(--tw-bg-opacity))}.bg-red-600{--tw-bg-opacity:1;background-color:rgba(220,38,38,var(--tw-bg-opacity))}.bg-red-900{--tw-bg-opacity:1;background-color:rgba(127,29,29,var(--tw-bg-opacity))}.bg-green-400{--tw-bg-opacity:1;background-color:rgba(52,211,153,var(--tw-bg-opacity))}.bg-green-700{--tw-bg-opacity:1;background-color:rgba(4,120,87,var(--tw-bg-opacity))}.bg-purple-500{--tw-bg-opacity:1;background-color:rgba(139,92,246,var(--tw-bg-opacity))}.hover\:bg-regal-blue:hover{--tw-bg-opacity:1;background-color:rgba(9,31,38,var(--tw-bg-opacity))}.hover\:bg-brand-blue:hover{--tw-bg-opacity:1;background-color:rgba(49,151,205,var(--tw-bg-opacity))}.hover\:bg-hover-yellow:hover{--tw-bg-opacity:1;background-color:rgba(253,221,7,var(--tw-bg-opacity))}.hover\:bg-hover-green:hover{--tw-bg-opacity:1;background-color:rgba(46,190,126,var(--tw-bg-opacity))}.hover\:bg-regal-red:hover{--tw-bg-opacity:1;background-color:rgba(255,60,0,var(--tw-bg-opacity))}.hover\:bg-blue-100:hover{--tw-bg-opacity:1;background-color:rgba(219,234,254,var(--tw-bg-opacity))}.hover\:bg-blue-700:hover{--tw-bg-opacity:1;background-color:rgba(29,78,216,var(--tw-bg-opacity))}.hover\:bg-purple-400:hover{--tw-bg-opacity:1;background-color:rgba(167,139,250,var(--tw-bg-opacity))}.focus\:bg-regal-green:focus{--tw-bg-opacity:1;background-color:rgba(37,127,105,var(--tw-bg-opacity))}.focus\:bg-regal-red:focus{--tw-bg-opacity:1;background-color:rgba(255,60,0,var(--tw-bg-opacity))}.focus\:bg-white:focus{--tw-bg-opacity:1;background-color:rgba(255,255,255,var(--tw-bg-opacity))}.focus\:bg-green-500:focus{--tw-bg-opacity:1;background-color:rgba(16,185,129,var(--tw-bg-opacity))}.odd\:bg-light-graytwo:nth-child(odd){--tw-bg-opacity:1;background-color:rgba(220,235,237,var(--tw-bg-opacity))}.odd\:bg-shuttle-gray:nth-child(odd){--tw-bg-opacity:1;background-color:rgba(252,248,247,var(--tw-bg-opacity))}.odd\:bg-white:nth-child(odd){--tw-bg-opacity:1;background-color:rgba(255,255,255,var(--tw-bg-opacity))}.bg-opacity-50{--tw-bg-opacity:0.5}.bg-center{background-position:50%}.bg-top{background-position:top}.bg-no-repeat{background-repeat:no-repeat}.bg-cover{background-size:cover}.border-regal-blue{--tw-border-opacity:1;border-color:rgba(9,31,38,var(--tw-border-opacity))}.border-regal-green{--tw-border-opacity:1;border-color:rgba(37,127,105,var(--tw-border-opacity))}.border-regal-red{--tw-border-opacity:1;border-color:rgba(255,60,0,var(--tw-border-opacity))}.border-dark-gray{--tw-border-opacity:1;border-color:rgba(141,141,141,var(--tw-border-opacity))}.border-black{--tw-border-opacity:1;border-color:rgba(0,0,0,var(--tw-border-opacity))}.border-white{--tw-border-opacity:1;border-color:rgba(255,255,255,var(--tw-border-opacity))}.border-gray-200{--tw-border-opacity:1;border-color:rgba(229,231,235,var(--tw-border-opacity))}.border-gray-400{--tw-border-opacity:1;border-color:rgba(156,163,175,var(--tw-border-opacity))}.border-red-500{--tw-border-opacity:1;border-color:rgba(239,68,68,var(--tw-border-opacity))}.border-red-900{--tw-border-opacity:1;border-color:rgba(127,29,29,var(--tw-border-opacity))}.border-green-500{--tw-border-opacity:1;border-color:rgba(16,185,129,var(--tw-border-opacity))}.hover\:border-transparent:hover{border-color:transparent}.focus\:border-regal-blue:focus{--tw-border-opacity:1;border-color:rgba(9,31,38,var(--tw-border-opacity))}.focus\:border-royal-blue:focus{--tw-border-opacity:1;border-color:rgba(34,44,98,var(--tw-border-opacity))}.focus\:border-regal-green:focus{--tw-border-opacity:1;border-color:rgba(37,127,105,var(--tw-border-opacity))}.focus\:border-regal-red:focus{--tw-border-opacity:1;border-color:rgba(255,60,0,var(--tw-border-opacity))}.focus\:border-white:focus{--tw-border-opacity:1;border-color:rgba(255,255,255,var(--tw-border-opacity))}.focus\:border-gray-500:focus{--tw-border-opacity:1;border-color:rgba(107,114,128,var(--tw-border-opacity))}.focus\:border-green-500:focus{--tw-border-opacity:1;border-color:rgba(16,185,129,var(--tw-border-opacity))}.rounded-none{border-radius:0}.rounded-sm{border-radius:.125rem}.rounded{border-radius:.25rem}.rounded-md{border-radius:.375rem}.rounded-lg{border-radius:.5rem}.rounded-xl{border-radius:.75rem}.rounded-2xl{border-radius:1rem}.rounded-full{border-radius:9999px}.rounded-t-none{border-top-left-radius:0;border-top-right-radius:0}.rounded-b-none{border-bottom-right-radius:0;border-bottom-left-radius:0}.rounded-t-xl{border-top-left-radius:.75rem;border-top-right-radius:.75rem}.rounded-b-xl{border-bottom-right-radius:.75rem}.rounded-b-xl,.rounded-l-xl{border-bottom-left-radius:.75rem}.rounded-l-xl{border-top-left-radius:.75rem}.border-dotted{border-style:dotted}.border-none{border-style:none}.border-2{border-width:2px}.border{border-width:1px}.border-r-0{border-right-width:0}.border-t-2{border-top-width:2px}.border-r-2{border-right-width:2px}.border-b-2{border-bottom-width:2px}.border-t-4{border-top-width:4px}.border-r-4{border-right-width:4px}.border-l-4{border-left-width:4px}.border-b-8{border-bottom-width:8px}.border-t{border-top-width:1px}.border-r{border-right-width:1px}.border-b{border-bottom-width:1px}.border-l{border-left-width:1px}.last\:border-b-0:last-child{border-bottom-width:0}.cursor-pointer{cursor:pointer}.cursor-not-allowed{cursor:not-allowed}.block{display:block}.inline-block{display:inline-block}.inline{display:inline}.flex{display:-webkit-box;display:-ms-flexbox;display:flex}.inline-flex{display:-webkit-inline-box;display:-ms-inline-flexbox;display:inline-flex}.table{display:table}.table-cell{display:table-cell}.grid{display:grid}.contents{display:contents}.hidden{display:none}.flex-col{-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column}.flex-wrap{-ms-flex-wrap:wrap;flex-wrap:wrap}.items-start{-webkit-box-align:start;-ms-flex-align:start;align-items:flex-start}.items-center{-webkit-box-align:center;-ms-flex-align:center;align-items:center}.items-baseline{-webkit-box-align:baseline;-ms-flex-align:baseline;align-items:baseline}.items-stretch{-webkit-box-align:stretch;-ms-flex-align:stretch;align-items:stretch}.content-center{-ms-flex-line-pack:center;align-content:center}.self-stretch{-ms-flex-item-align:stretch;align-self:stretch}.justify-start{-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start}.justify-end{-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end}.justify-center{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.justify-between{-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between}.justify-around{-ms-flex-pack:distribute;justify-content:space-around}.flex-1{-webkit-box-flex:1;-ms-flex:1 1 0%;flex:1 1 0%}.flex-grow{-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1}.flex-shrink-0{-ms-flex-negative:0;flex-shrink:0}.float-right{float:right}.float-left{float:left}.float-none{float:none}.clear-both{clear:both}.font-light{font-weight:300}.font-normal{font-weight:400}.font-medium{font-weight:500}.font-semibold{font-weight:600}.font-bold{font-weight:700}.h-3{height:.75rem}.h-4{height:1rem}.h-5{height:1.25rem}.h-6{height:1.5rem}.h-7{height:1.75rem}.h-8{height:2rem}.h-9{height:2.25rem}.h-10{height:2.5rem}.h-12{height:3rem}.h-14{height:3.5rem}.h-16{height:4rem}.h-20{height:5rem}.h-24{height:6rem}.h-28{height:7rem}.h-32{height:8rem}.h-36{height:9rem}.h-52{height:13rem}.h-56{height:14rem}.h-64{height:16rem}.h-72{height:18rem}.h-80{height:20rem}.h-106{height:34rem}.h-110{height:25rem}.h-auto{height:auto}.h-full{height:100%}.text-xs{font-size:.75rem;line-height:1rem}.text-sm{font-size:.875rem;line-height:1.25rem}.text-base{font-size:1rem;line-height:1.5rem}.text-lg{font-size:1.125rem}.text-lg,.text-xl{line-height:1.75rem}.text-xl{font-size:1.25rem}.text-2xl{font-size:1.5rem;line-height:2rem}.text-3xl{font-size:1.875rem;line-height:2.25rem}.text-4xl{font-size:2.25rem;line-height:2.5rem}.leading-5{line-height:1.25rem}.leading-7{line-height:1.75rem}.leading-9{line-height:2.25rem}.leading-tight{line-height:1.25}.leading-relaxed{line-height:1.625}.leading-loose{line-height:2}.list-disc{list-style-type:disc}.m-1{margin:.25rem}.m-2{margin:.5rem}.m-5{margin:1.25rem}.-m-4{margin:-1rem}.my-0{margin-top:0;margin-bottom:0}.my-1{margin-top:.25rem;margin-bottom:.25rem}.mx-1{margin-left:.25rem;margin-right:.25rem}.my-2{margin-top:.5rem;margin-bottom:.5rem}.mx-2{margin-left:.5rem;margin-right:.5rem}.my-4{margin-top:1rem;margin-bottom:1rem}.my-5{margin-top:1.25rem;margin-bottom:1.25rem}.mx-5{margin-left:1.25rem;margin-right:1.25rem}.my-6{margin-top:1.5rem;margin-bottom:1.5rem}.my-10{margin-top:2.5rem;margin-bottom:2.5rem}.my-12{margin-top:3rem;margin-bottom:3rem}.mx-auto{margin-left:auto;margin-right:auto}.-mx-1{margin-left:-.25rem;margin-right:-.25rem}.-mx-2{margin-left:-.5rem;margin-right:-.5rem}.mb-0{margin-bottom:0}.mt-1{margin-top:.25rem}.mr-1{margin-right:.25rem}.mb-1{margin-bottom:.25rem}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.mb-2{margin-bottom:.5rem}.ml-2{margin-left:.5rem}.mt-3{margin-top:.75rem}.mr-3{margin-right:.75rem}.mb-3{margin-bottom:.75rem}.ml-3{margin-left:.75rem}.mt-4{margin-top:1rem}.mr-4{margin-right:1rem}.mb-4{margin-bottom:1rem}.ml-4{margin-left:1rem}.mt-5{margin-top:1.25rem}.mr-5{margin-right:1.25rem}.mb-5{margin-bottom:1.25rem}.ml-5{margin-left:1.25rem}.mt-6{margin-top:1.5rem}.mr-6{margin-right:1.5rem}.mb-6{margin-bottom:1.5rem}.mt-8{margin-top:2rem}.mr-8{margin-right:2rem}.mb-8{margin-bottom:2rem}.ml-8{margin-left:2rem}.mt-10{margin-top:2.5rem}.mb-10{margin-bottom:2.5rem}.mt-12{margin-top:3rem}.mr-12{margin-right:3rem}.mt-72{margin-top:18rem}.mt-auto{margin-top:auto}.mr-auto{margin-right:auto}.ml-auto{margin-left:auto}.-mt-4{margin-top:-1rem}.-mt-8{margin-top:-2rem}.-ml-8{margin-left:-2rem}.-mt-11{margin-top:-2.75rem}.max-h-16{max-height:4rem}.max-w-sm{max-width:24rem}.max-w-lg{max-width:32rem}.max-w-max{max-width:-webkit-max-content;max-width:-moz-max-content;max-width:max-content}.object-contain{-o-object-fit:contain;object-fit:contain}.object-cover{-o-object-fit:cover;object-fit:cover}.object-fill{-o-object-fit:fill;object-fit:fill}.opacity-25{opacity:.25}.opacity-50{opacity:.5}.opacity-80{opacity:.8}.focus\:outline-none:focus,.outline-none{outline:2px solid transparent;outline-offset:2px}.overflow-auto{overflow:auto}.overflow-hidden{overflow:hidden}.overflow-y-auto{overflow-y:auto}.overflow-x-hidden{overflow-x:hidden}.overflow-x-scroll{overflow-x:scroll}.overflow-y-scroll{overflow-y:scroll}.p-0{padding:0}.p-1{padding:.25rem}.p-2{padding:.5rem}.p-3{padding:.75rem}.p-4{padding:1rem}.p-5{padding:1.25rem}.p-8{padding:2rem}.px-0{padding-left:0;padding-right:0}.py-1{padding-top:.25rem;padding-bottom:.25rem}.px-1{padding-left:.25rem;padding-right:.25rem}.py-2{padding-top:.5rem;padding-bottom:.5rem}.px-2{padding-left:.5rem;padding-right:.5rem}.py-3{padding-top:.75rem;padding-bottom:.75rem}.px-3{padding-left:.75rem;padding-right:.75rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-4{padding-left:1rem;padding-right:1rem}.py-5{padding-top:1.25rem;padding-bottom:1.25rem}.px-5{padding-left:1.25rem;padding-right:1.25rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-7{padding-top:1.75rem;padding-bottom:1.75rem}.py-8{padding-top:2rem;padding-bottom:2rem}.px-8{padding-left:2rem;padding-right:2rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.px-10{padding-left:2.5rem;padding-right:2.5rem}.py-12{padding-top:3rem;padding-bottom:3rem}.px-14{padding-left:3.5rem;padding-right:3.5rem}.px-16{padding-left:4rem;padding-right:4rem}.pb-0{padding-bottom:0}.pt-1{padding-top:.25rem}.pr-1{padding-right:.25rem}.pb-1{padding-bottom:.25rem}.pl-1{padding-left:.25rem}.pt-2{padding-top:.5rem}.pr-2{padding-right:.5rem}.pb-2{padding-bottom:.5rem}.pl-2{padding-left:.5rem}.pt-3{padding-top:.75rem}.pr-3{padding-right:.75rem}.pb-3{padding-bottom:.75rem}.pl-3{padding-left:.75rem}.pt-4{padding-top:1rem}.pr-4{padding-right:1rem}.pb-4{padding-bottom:1rem}.pl-4{padding-left:1rem}.pt-5{padding-top:1.25rem}.pr-5{padding-right:1.25rem}.pb-5{padding-bottom:1.25rem}.pl-5{padding-left:1.25rem}.pt-6{padding-top:1.5rem}.pb-6{padding-bottom:1.5rem}.pl-6{padding-left:1.5rem}.pt-8{padding-top:2rem}.pr-8{padding-right:2rem}.pb-8{padding-bottom:2rem}.pt-9{padding-top:2.25rem}.pt-10{padding-top:2.5rem}.pr-10{padding-right:2.5rem}.pb-10{padding-bottom:2.5rem}.pl-10{padding-left:2.5rem}.pb-12{padding-bottom:3rem}.pt-20{padding-top:5rem}.pr-20{padding-right:5rem}.pt-24{padding-top:6rem}.pointer-events-none{pointer-events:none}.fixed{position:fixed}.absolute{position:absolute}.relative{position:relative}.sticky{position:sticky}.inset-0{right:0;left:0}.inset-0,.inset-y-0{top:0;bottom:0}.top-0{top:0}.right-0{right:0}.bottom-0{bottom:0}.left-0{left:0}.top-1{top:.25rem}.top-2{top:.5rem}.right-2{right:.5rem}.right-3{right:.75rem}.top-12{top:3rem}.top-16{top:4rem}.top-20{top:5rem}.-left-2{left:-.5rem}.-top-4{top:-1rem}.-top-8{top:-2rem}.-top-12{top:-3rem}.resize{resize:both}*{--tw-shadow:0 0 transparent}.shadow{--tw-shadow:0 1px 3px 0 rgba(0,0,0,0.1),0 1px 2px 0 rgba(0,0,0,0.06)}.shadow,.shadow-md{-webkit-box-shadow:var(--tw-ring-offset-shadow,0 0 transparent),var(--tw-ring-shadow,0 0 transparent),var(--tw-shadow);box-shadow:var(--tw-ring-offset-shadow,0 0 transparent),var(--tw-ring-shadow,0 0 transparent),var(--tw-shadow)}.shadow-md{--tw-shadow:0 4px 6px -1px rgba(0,0,0,0.1),0 2px 4px -1px rgba(0,0,0,0.06)}.shadow-lg{--tw-shadow:0 10px 15px -3px rgba(0,0,0,0.1),0 4px 6px -2px rgba(0,0,0,0.05)}.shadow-lg,.shadow-xl{-webkit-box-shadow:var(--tw-ring-offset-shadow,0 0 transparent),var(--tw-ring-shadow,0 0 transparent),var(--tw-shadow);box-shadow:var(--tw-ring-offset-shadow,0 0 transparent),var(--tw-ring-shadow,0 0 transparent),var(--tw-shadow)}.shadow-xl{--tw-shadow:0 20px 25px -5px rgba(0,0,0,0.1),0 10px 10px -5px rgba(0,0,0,0.04)}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgba(0,0,0,0.25)}.shadow-2xl,.shadow-inner{-webkit-box-shadow:var(--tw-ring-offset-shadow,0 0 transparent),var(--tw-ring-shadow,0 0 transparent),var(--tw-shadow);box-shadow:var(--tw-ring-offset-shadow,0 0 transparent),var(--tw-ring-shadow,0 0 transparent),var(--tw-shadow)}.shadow-inner{--tw-shadow:inset 0 2px 4px 0 rgba(0,0,0,0.06)}.shadow-none{--tw-shadow:0 0 transparent}.hover\:shadow-lg:hover,.shadow-none{-webkit-box-shadow:var(--tw-ring-offset-shadow,0 0 transparent),var(--tw-ring-shadow,0 0 transparent),var(--tw-shadow);box-shadow:var(--tw-ring-offset-shadow,0 0 transparent),var(--tw-ring-shadow,0 0 transparent),var(--tw-shadow)}.hover\:shadow-lg:hover{--tw-shadow:0 10px 15px -3px rgba(0,0,0,0.1),0 4px 6px -2px rgba(0,0,0,0.05)}.hover\:shadow-xl:hover{--tw-shadow:0 20px 25px -5px rgba(0,0,0,0.1),0 10px 10px -5px rgba(0,0,0,0.04);-webkit-box-shadow:var(--tw-ring-offset-shadow,0 0 transparent),var(--tw-ring-shadow,0 0 transparent),var(--tw-shadow);box-shadow:var(--tw-ring-offset-shadow,0 0 transparent),var(--tw-ring-shadow,0 0 transparent),var(--tw-shadow)}*{--tw-ring-inset:var(--tw-empty,/*!*/ /*!*/);--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgba(59,130,246,0.5);--tw-ring-offset-shadow:0 0 transparent;--tw-ring-shadow:0 0 transparent}.fill-current{fill:currentColor}.text-left{text-align:left}.text-center{text-align:center}.text-right{text-align:right}.text-regal-blue{--tw-text-opacity:1;color:rgba(9,31,38,var(--tw-text-opacity))}.text-royal-blue{--tw-text-opacity:1;color:rgba(34,44,98,var(--tw-text-opacity))}.text-brand-blue{--tw-text-opacity:1;color:rgba(49,151,205,var(--tw-text-opacity))}.text-regal-green{--tw-text-opacity:1;color:rgba(37,127,105,var(--tw-text-opacity))}.text-regal-red{--tw-text-opacity:1;color:rgba(255,60,0,var(--tw-text-opacity))}.text-dark-gray{--tw-text-opacity:1;color:rgba(141,141,141,var(--tw-text-opacity))}.text-black{--tw-text-opacity:1;color:rgba(0,0,0,var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgba(255,255,255,var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity:1;color:rgba(209,213,219,var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity:1;color:rgba(156,163,175,var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgba(107,114,128,var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity:1;color:rgba(55,65,81,var(--tw-text-opacity))}.text-gray-800{--tw-text-opacity:1;color:rgba(31,41,55,var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgba(17,24,39,var(--tw-text-opacity))}.text-red-600{--tw-text-opacity:1;color:rgba(220,38,38,var(--tw-text-opacity))}.text-red-700{--tw-text-opacity:1;color:rgba(185,28,28,var(--tw-text-opacity))}.text-red-800{--tw-text-opacity:1;color:rgba(153,27,27,var(--tw-text-opacity))}.text-red-900{--tw-text-opacity:1;color:rgba(127,29,29,var(--tw-text-opacity))}.text-yellow-600{--tw-text-opacity:1;color:rgba(217,119,6,var(--tw-text-opacity))}.text-green-500{--tw-text-opacity:1;color:rgba(16,185,129,var(--tw-text-opacity))}.text-green-700{--tw-text-opacity:1;color:rgba(4,120,87,var(--tw-text-opacity))}.text-indigo-800{--tw-text-opacity:1;color:rgba(55,48,163,var(--tw-text-opacity))}.hover\:text-regal-blue:hover{--tw-text-opacity:1;color:rgba(9,31,38,var(--tw-text-opacity))}.hover\:text-regal-green:hover{--tw-text-opacity:1;color:rgba(37,127,105,var(--tw-text-opacity))}.hover\:text-regal-red:hover{--tw-text-opacity:1;color:rgba(255,60,0,var(--tw-text-opacity))}.hover\:text-black:hover{--tw-text-opacity:1;color:rgba(0,0,0,var(--tw-text-opacity))}.hover\:text-white:hover{--tw-text-opacity:1;color:rgba(255,255,255,var(--tw-text-opacity))}.hover\:text-gray-100:hover{--tw-text-opacity:1;color:rgba(243,244,246,var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgba(17,24,39,var(--tw-text-opacity))}.hover\:text-red-700:hover{--tw-text-opacity:1;color:rgba(185,28,28,var(--tw-text-opacity))}.hover\:text-blue-900:hover{--tw-text-opacity:1;color:rgba(30,58,138,var(--tw-text-opacity))}.hover\:text-indigo-500:hover{--tw-text-opacity:1;color:rgba(99,102,241,var(--tw-text-opacity))}.focus\:text-regal-green:focus{--tw-text-opacity:1;color:rgba(37,127,105,var(--tw-text-opacity))}.focus\:text-white:focus{--tw-text-opacity:1;color:rgba(255,255,255,var(--tw-text-opacity))}.truncate{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.italic{font-style:italic}.not-italic{font-style:normal}.uppercase{text-transform:uppercase}.capitalize{text-transform:capitalize}.normal-case{text-transform:none}.underline{text-decoration:underline}.line-through{text-decoration:line-through}.hover\:underline:hover{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.tracking-wide{letter-spacing:.025em}.tracking-wider{letter-spacing:.05em}.align-middle{vertical-align:middle}.visible{visibility:visible}.whitespace-nowrap{white-space:nowrap}.whitespace-pre-wrap{white-space:pre-wrap}.w-2{width:.5rem}.w-3{width:.75rem}.w-4{width:1rem}.w-5{width:1.25rem}.w-6{width:1.5rem}.w-8{width:2rem}.w-10{width:2.5rem}.w-12{width:3rem}.w-16{width:4rem}.w-20{width:5rem}.w-24{width:6rem}.w-28{width:7rem}.w-32{width:8rem}.w-36{width:9rem}.w-40{width:10rem}.w-80{width:20rem}.w-auto{width:auto}.w-1\/2{width:50%}.w-1\/4{width:25%}.w-3\/4{width:75%}.w-full{width:100%}.w-screen{width:100vw}.w-max{width:-webkit-max-content;width:-moz-max-content;width:max-content}.z-0{z-index:0}.z-10{z-index:10}.z-20{z-index:20}.z-30{z-index:30}.z-50{z-index:50}.z-auto{z-index:auto}.gap-1{gap:.25rem}.gap-2{gap:.5rem}.gap-3{gap:.75rem}.gap-4{gap:1rem}.gap-5{gap:1.25rem}.gap-6{gap:1.5rem}.gap-10{gap:2.5rem}.grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}.grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}.grid-cols-4{grid-template-columns:repeat(4,minmax(0,1fr))}.grid-cols-5{grid-template-columns:repeat(5,minmax(0,1fr))}.grid-cols-6{grid-template-columns:repeat(6,minmax(0,1fr))}.grid-cols-12{grid-template-columns:repeat(12,minmax(0,1fr))}.col-span-1{grid-column:span 1/span 1}.col-span-2{grid-column:span 2/span 2}.col-span-3{grid-column:span 3/span 3}.col-span-4{grid-column:span 4/span 4}.col-span-6{grid-column:span 6/span 6}.col-span-7{grid-column:span 7/span 7}.col-span-8{grid-column:span 8/span 8}.col-span-10{grid-column:span 10/span 10}.col-span-12{grid-column:span 12/span 12}.grid-rows-2{grid-template-rows:repeat(2,minmax(0,1fr))}.transform{--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;-webkit-transform:translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));transform:translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.transition{-webkit-transition-property:background-color,border-color,color,fill,stroke,opacity,-webkit-box-shadow,-webkit-transform;transition-property:background-color,border-color,color,fill,stroke,opacity,-webkit-box-shadow,-webkit-transform;transition-property:background-color,border-color,color,fill,stroke,opacity,box-shadow,transform;transition-property:background-color,border-color,color,fill,stroke,opacity,box-shadow,transform,-webkit-box-shadow,-webkit-transform;-webkit-transition-timing-function:cubic-bezier(.4,0,.2,1);transition-timing-function:cubic-bezier(.4,0,.2,1);-webkit-transition-duration:.15s;transition-duration:.15s}.ease-in-out{-webkit-transition-timing-function:cubic-bezier(.4,0,.2,1);transition-timing-function:cubic-bezier(.4,0,.2,1)}.duration-150{-webkit-transition-duration:.15s;transition-duration:.15s}@-webkit-keyframes spin{to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}@keyframes spin{to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}@-webkit-keyframes ping{75%,to{-webkit-transform:scale(2);transform:scale(2);opacity:0}}@keyframes ping{75%,to{-webkit-transform:scale(2);transform:scale(2);opacity:0}}@-webkit-keyframes pulse{50%{opacity:.5}}@keyframes pulse{50%{opacity:.5}}@-webkit-keyframes bounce{0%,to{-webkit-transform:translateY(-25%);transform:translateY(-25%);-webkit-animation-timing-function:cubic-bezier(.8,0,1,1);animation-timing-function:cubic-bezier(.8,0,1,1)}50%{-webkit-transform:none;transform:none;-webkit-animation-timing-function:cubic-bezier(0,0,.2,1);animation-timing-function:cubic-bezier(0,0,.2,1)}}@keyframes bounce{0%,to{-webkit-transform:translateY(-25%);transform:translateY(-25%);-webkit-animation-timing-function:cubic-bezier(.8,0,1,1);animation-timing-function:cubic-bezier(.8,0,1,1)}50%{-webkit-transform:none;transform:none;-webkit-animation-timing-function:cubic-bezier(0,0,.2,1);animation-timing-function:cubic-bezier(0,0,.2,1)}}.line-clamp-2{-webkit-line-clamp:2}.line-clamp-2,.line-clamp-3{overflow:hidden;display:-webkit-box;-webkit-box-orient:vertical}.line-clamp-3{-webkit-line-clamp:3}@media (min-width:640px){.sm\:bg-transparent{background-color:transparent}.sm\:rounded-lg{border-radius:.5rem}.sm\:border-none{border-style:none}.sm\:block{display:block}.sm\:inline-block{display:inline-block}.sm\:grid{display:grid}.sm\:flex-row{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row}.sm\:items-center{-webkit-box-align:center;-ms-flex-align:center;align-items:center}.sm\:h-16{height:4rem}.sm\:text-base{font-size:1rem;line-height:1.5rem}.sm\:text-2xl{font-size:1.5rem;line-height:2rem}.sm\:text-3xl{font-size:1.875rem;line-height:2.25rem}.sm\:px-2{padding-left:.5rem;padding-right:.5rem}.sm\:px-3{padding-left:.75rem;padding-right:.75rem}.sm\:w-1\/2{width:50%}.sm\:w-full{width:100%}.sm\:gap-6{gap:1.5rem}.sm\:grid-cols-12{grid-template-columns:repeat(12,minmax(0,1fr))}}@media (min-width:768px){.md\:rounded-full{border-radius:9999px}.md\:border-none{border-style:none}.md\:block{display:block}.md\:inline-block{display:inline-block}.md\:flex{display:-webkit-box;display:-ms-flexbox;display:flex}.md\:grid{display:grid}.md\:hidden{display:none}.md\:flex-row{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row}.md\:flex-nowrap{-ms-flex-wrap:nowrap;flex-wrap:nowrap}.md\:items-center{-webkit-box-align:center;-ms-flex-align:center;align-items:center}.md\:items-baseline{-webkit-box-align:baseline;-ms-flex-align:baseline;align-items:baseline}.md\:justify-start{-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start}.md\:justify-between{-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between}.md\:justify-around{-ms-flex-pack:distribute;justify-content:space-around}.md\:flex-shrink-0{-ms-flex-negative:0;flex-shrink:0}.md\:font-semibold{font-weight:600}.md\:font-extrabold{font-weight:800}.md\:h-4{height:1rem}.md\:h-7{height:1.75rem}.md\:h-16{height:4rem}.md\:h-52{height:13rem}.md\:h-72{height:18rem}.md\:h-80{height:20rem}.md\:text-sm{font-size:.875rem;line-height:1.25rem}.md\:text-base{font-size:1rem;line-height:1.5rem}.md\:text-lg{font-size:1.125rem;line-height:1.75rem}.md\:text-xl{font-size:1.25rem;line-height:1.75rem}.md\:text-2xl{font-size:1.5rem;line-height:2rem}.md\:text-3xl{font-size:1.875rem;line-height:2.25rem}.md\:text-4xl{font-size:2.25rem;line-height:2.5rem}.md\:text-5xl{font-size:3rem;line-height:1}.md\:m-0{margin:0}.md\:my-0{margin-top:0;margin-bottom:0}.md\:mx-0{margin-left:0;margin-right:0}.md\:my-2{margin-top:.5rem;margin-bottom:.5rem}.md\:mx-3{margin-left:.75rem;margin-right:.75rem}.md\:my-12{margin-top:3rem;margin-bottom:3rem}.md\:mx-auto{margin-left:auto;margin-right:auto}.md\:mt-0{margin-top:0}.md\:mb-0{margin-bottom:0}.md\:mt-2{margin-top:.5rem}.md\:mb-2{margin-bottom:.5rem}.md\:ml-2{margin-left:.5rem}.md\:mt-4{margin-top:1rem}.md\:mr-4{margin-right:1rem}.md\:ml-4{margin-left:1rem}.md\:mt-5{margin-top:1.25rem}.md\:mr-5{margin-right:1.25rem}.md\:mt-8{margin-top:2rem}.md\:mt-10{margin-top:2.5rem}.md\:mt-12{margin-top:3rem}.md\:mr-12{margin-right:3rem}.md\:ml-14{margin-left:3.5rem}.md\:mt-16{margin-top:4rem}.md\:mt-20{margin-top:5rem}.md\:mt-24{margin-top:6rem}.md\:-mt-12{margin-top:-3rem}.md\:-ml-12{margin-left:-3rem}.md\:-mt-16{margin-top:-4rem}.md\:max-w-sm{max-width:24rem}.md\:max-w-lg{max-width:32rem}.md\:overflow-hidden{overflow:hidden}.md\:overflow-x-visible{overflow-x:visible}.md\:p-0{padding:0}.md\:p-3{padding:.75rem}.md\:p-4{padding:1rem}.md\:p-5{padding:1.25rem}.md\:p-6{padding:1.5rem}.md\:p-8{padding:2rem}.md\:px-0{padding-left:0;padding-right:0}.md\:py-1{padding-top:.25rem;padding-bottom:.25rem}.md\:py-2{padding-top:.5rem;padding-bottom:.5rem}.md\:px-2{padding-left:.5rem;padding-right:.5rem}.md\:py-3{padding-top:.75rem;padding-bottom:.75rem}.md\:py-4{padding-top:1rem;padding-bottom:1rem}.md\:px-4{padding-left:1rem;padding-right:1rem}.md\:py-5{padding-top:1.25rem;padding-bottom:1.25rem}.md\:px-5{padding-left:1.25rem;padding-right:1.25rem}.md\:px-6{padding-left:1.5rem;padding-right:1.5rem}.md\:py-8{padding-top:2rem;padding-bottom:2rem}.md\:px-8{padding-left:2rem;padding-right:2rem}.md\:py-10{padding-top:2.5rem;padding-bottom:2.5rem}.md\:px-12{padding-left:3rem;padding-right:3rem}.md\:px-16{padding-left:4rem;padding-right:4rem}.md\:px-24{padding-left:6rem;padding-right:6rem}.md\:px-32{padding-left:8rem;padding-right:8rem}.md\:px-48{padding-left:12rem;padding-right:12rem}.md\:pb-1{padding-bottom:.25rem}.md\:pr-3{padding-right:.75rem}.md\:pl-4{padding-left:1rem}.md\:pt-5{padding-top:1.25rem}.md\:pr-8{padding-right:2rem}.md\:pr-12{padding-right:3rem}.md\:pt-20{padding-top:5rem}.md\:pb-20{padding-bottom:5rem}.md\:top-0{top:0}.md\:right-0{right:0}.md\:text-left{text-align:left}.md\:text-center{text-align:center}.md\:text-right{text-align:right}.md\:text-white{--tw-text-opacity:1;color:rgba(255,255,255,var(--tw-text-opacity))}.md\:uppercase{text-transform:uppercase}.md\:w-72{width:18rem}.md\:w-96{width:24rem}.md\:w-1\/2{width:50%}.md\:w-1\/3{width:33.333333%}.md\:w-2\/3{width:66.666667%}.md\:w-3\/4{width:75%}.md\:w-3\/5{width:60%}.md\:w-full{width:100%}.md\:w-max{width:-webkit-max-content;width:-moz-max-content;width:max-content}.md\:gap-1{gap:.25rem}.md\:gap-2{gap:.5rem}.md\:gap-4{gap:1rem}.md\:gap-5{gap:1.25rem}.md\:gap-6{gap:1.5rem}.md\:gap-8{gap:2rem}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}.md\:grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}.md\:grid-cols-4{grid-template-columns:repeat(4,minmax(0,1fr))}.md\:grid-cols-5{grid-template-columns:repeat(5,minmax(0,1fr))}.md\:grid-cols-10{grid-template-columns:repeat(10,minmax(0,1fr))}.md\:grid-cols-12{grid-template-columns:repeat(12,minmax(0,1fr))}.md\:col-span-2{grid-column:span 2/span 2}.md\:col-span-4{grid-column:span 4/span 4}}@media (min-width:1024px){.lg\:bg-gray-100{--tw-bg-opacity:1;background-color:rgba(243,244,246,var(--tw-bg-opacity))}.lg\:rounded-2xl{border-radius:1rem}.lg\:block{display:block}.lg\:flex{display:-webkit-box;display:-ms-flexbox;display:flex}.lg\:grid{display:grid}.lg\:hidden{display:none}.lg\:flex-row{-webkit-box-orient:horizontal;-ms-flex-direction:row;flex-direction:row}.lg\:flex-col,.lg\:flex-row{-webkit-box-direction:normal}.lg\:flex-col{-webkit-box-orient:vertical;-ms-flex-direction:column;flex-direction:column}.lg\:items-start{-webkit-box-align:start;-ms-flex-align:start;align-items:flex-start}.lg\:items-center{-webkit-box-align:center;-ms-flex-align:center;align-items:center}.lg\:justify-between{-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between}.lg\:font-semibold{font-weight:600}.lg\:font-bold{font-weight:700}.lg\:h-72{height:18rem}.lg\:h-109{height:36rem}.lg\:text-base{font-size:1rem;line-height:1.5rem}.lg\:text-lg{font-size:1.125rem;line-height:1.75rem}.lg\:text-xl{font-size:1.25rem;line-height:1.75rem}.lg\:text-2xl{font-size:1.5rem;line-height:2rem}.lg\:mx-0{margin-left:0;margin-right:0}.lg\:-mx-3{margin-left:-.75rem;margin-right:-.75rem}.lg\:-mx-4{margin-left:-1rem;margin-right:-1rem}.lg\:mt-0{margin-top:0}.lg\:mr-0{margin-right:0}.lg\:ml-0{margin-left:0}.lg\:mt-2{margin-top:.5rem}.lg\:mt-5{margin-top:1.25rem}.lg\:mt-12{margin-top:3rem}.lg\:mt-16{margin-top:4rem}.lg\:-mt-24{margin-top:-6rem}.lg\:overflow-hidden{overflow:hidden}.lg\:p-2{padding:.5rem}.lg\:p-3{padding:.75rem}.lg\:p-5{padding:1.25rem}.lg\:px-0{padding-left:0;padding-right:0}.lg\:py-2{padding-top:.5rem;padding-bottom:.5rem}.lg\:py-3{padding-top:.75rem;padding-bottom:.75rem}.lg\:px-5{padding-left:1.25rem;padding-right:1.25rem}.lg\:px-6{padding-left:1.5rem;padding-right:1.5rem}.lg\:px-8{padding-left:2rem;padding-right:2rem}.lg\:px-10{padding-left:2.5rem;padding-right:2.5rem}.lg\:px-24{padding-left:6rem;padding-right:6rem}.lg\:px-28{padding-left:7rem;padding-right:7rem}.lg\:px-32{padding-left:8rem;padding-right:8rem}.lg\:px-48{padding-left:12rem;padding-right:12rem}.lg\:pr-0{padding-right:0}.lg\:pb-0{padding-bottom:0}.lg\:pl-0{padding-left:0}.lg\:pr-2{padding-right:.5rem}.lg\:text-left{text-align:left}.lg\:text-center{text-align:center}.lg\:truncate{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.lg\:w-64{width:16rem}.lg\:w-72{width:18rem}.lg\:w-80{width:20rem}.lg\:w-96{width:24rem}.lg\:w-1\/2{width:50%}.lg\:w-1\/3{width:33.333333%}.lg\:w-1\/4{width:25%}.lg\:w-2\/5{width:40%}.lg\:w-1\/6{width:16.666667%}.lg\:w-full{width:100%}.lg\:gap-4{gap:1rem}.lg\:gap-5{gap:1.25rem}.lg\:gap-6{gap:1.5rem}.lg\:gap-8{gap:2rem}.lg\:gap-10{gap:2.5rem}.lg\:gap-12{gap:3rem}.lg\:gap-14{gap:3.5rem}.lg\:grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}.lg\:grid-cols-4{grid-template-columns:repeat(4,minmax(0,1fr))}.lg\:grid-cols-6{grid-template-columns:repeat(6,minmax(0,1fr))}.lg\:grid-cols-9{grid-template-columns:repeat(9,minmax(0,1fr))}.lg\:grid-cols-12{grid-template-columns:repeat(12,minmax(0,1fr))}.lg\:col-span-1{grid-column:span 1/span 1}.lg\:col-span-2{grid-column:span 2/span 2}.lg\:col-span-3{grid-column:span 3/span 3}.lg\:col-span-4{grid-column:span 4/span 4}.lg\:col-span-5{grid-column:span 5/span 5}.lg\:col-span-6{grid-column:span 6/span 6}}@media (min-width:1280px){.xl\:container{width:100%;margin-right:auto;margin-left:auto}@media (min-width:640px){.xl\:container{max-width:640px}}@media (min-width:768px){.xl\:container{max-width:768px}}@media (min-width:1024px){.xl\:container{max-width:1024px}}@media (min-width:1280px){.xl\:container{max-width:1280px}}@media (min-width:1536px){.xl\:container{max-width:1536px}}.xl\:flex{display:-webkit-box;display:-ms-flexbox;display:flex}.xl\:flex-col{-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column}.xl\:justify-between{-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between}.xl\:font-bold{font-weight:700}.xl\:h-20{height:5rem}.xl\:h-64{height:16rem}.xl\:h-full{height:100%}.xl\:text-base{font-size:1rem;line-height:1.5rem}.xl\:text-xl{font-size:1.25rem;line-height:1.75rem}.xl\:text-5xl{font-size:3rem;line-height:1}.xl\:mx-auto{margin-left:auto;margin-right:auto}.xl\:mt-3{margin-top:.75rem}.xl\:mt-4{margin-top:1rem}.xl\:mt-5{margin-top:1.25rem}.xl\:mt-auto{margin-top:auto}.xl\:overflow-hidden{overflow:hidden}.xl\:px-0{padding-left:0;padding-right:0}.xl\:py-2{padding-top:.5rem;padding-bottom:.5rem}.xl\:px-3{padding-left:.75rem;padding-right:.75rem}.xl\:px-4{padding-left:1rem;padding-right:1rem}.xl\:px-8{padding-left:2rem;padding-right:2rem}.xl\:pb-3{padding-bottom:.75rem}.xl\:w-1\/4{width:25%}.xl\:grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}.xl\:grid-cols-4{grid-template-columns:repeat(4,minmax(0,1fr))}.xl\:col-span-3{grid-column:span 3/span 3}}.text-new-blue{color:#002366}.bg-new-blue{background:#002366}#our-details ul{padding-left: 1.25rem;margin-top: 1.25rem;list-style-type: disc;font-size: .875rem;line-height: 1.25rem;}@media (min-width: 768px){#our-details ul{margin-top: 0.5rem;}}@media (min-width: 1280px){#our-details ul {margin-top: 1.25rem;font-size: 1rem;line-height: 1.5rem;}}
   html {
  --scrollbarBG: #CFD8DC;
  --thumbBG: #90A4AE;
  scroll-behavior: smooth;
}
body::-webkit-scrollbar {
  width: 16px;
}
body {
  scrollbar-width: thin;
  scrollbar-color: var(--thumbBG) var(--scrollbarBG);
}
body::-webkit-scrollbar-track {
  background: var(--scrollbarBG);
}
body::-webkit-scrollbar-thumb {
  background-color: var(--thumbBG) ;
  border-radius: 6px;
  border: 3px solid var(--scrollbarBG);
}
.main_content h2,.main_content h3,.main_content h4{font-size: 1.25rem}.main_content p{margin-bottom:1rem}@media (min-width:1280px){.main_content p{font-size:1rem;line-height:1.75rem}.main_content h2,.main_content h3,.main_content h4{font-size:1.5rem;line-height:2rem;margin-top:1.25rem;margin-bottom:1.25rem}.main_content h3{font-size: 1.3rem}.main_content h4{font-size: 1.2rem}}@media (min-width:1536px){.main_content p{font-size:1rem;line-height:1.75rem}}
.amp-accordion__header {border: none}.amp-section .amp-icon::before {content: "\21A0";color: #222C62;font-size: 20px;font-weight: 900}.amp-section[expanded] .amp-icon::before {content: "\21A1"}.faq-section .amp-accordion__header {background: rgb(220, 235, 237)}.faq-section .amp-icon::before {content: "\002B";color: #222C62;font-size: 20px;font-weight: 900}.faq-section[expanded] .amp-icon::before {content: "\002D"}

        </style>
@php
$trips = array(1, 3, 241, 205, 223, 20, 43, 68, 225, 310, 56);
@endphp
<!-- AMP Analytics --><script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>

<script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@graph": [{
                    "@type": "WebSite",
                    "@id": "https://himalayantrekkers.com/#website",
                    "url": "https://himalayantrekkers.com",
                    "name": "Himalayan Trekkers",
                    "potentialAction": {
                        "@type": "SearchAction",
                        "target": "https://himalayantrekkers.com/?s={search_term_string}",
                        "query-input": "required name=search_term_string"
                    }
                },
                {
                    "@type": "ImageObject",
                    "@id": "{{ Voyager::image($detail->image) }}/#primaryimage",
                    "url": "{{ Voyager::image($detail->image) }}",
                    "width": {{ $detail->pano == '1' ? '1800' : '1366' }},
                    "height": {{ $detail->pano == '1' ? '668' : '768' }},
                    "caption": "{{ $detail->meta_title }}"
                },
                {
                    "@type": "WebPage",
                    "@id": "https://himalayantrekkers.com/itinerary/{{ $detail->slug }}/#webpage",
                    "url": "https://himalayantrekkers.com/itinerary/{{ $detail->slug }}",
                    "inLanguage": "en-US",
                    "name": "{{ $detail->meta_title }}",
                    "isPartOf": {
                        "@id": "https://himalayantrekkers.com/#website"
                    },
                    "primaryImageOfPage": {
                        "@id": "{{ Voyager::image($detail->image) }}/#primaryimage"
                    },

                    "dateModified": "{{ $detail->updated_at }}",
                    "description": "{{ $detail->meta_description }}."
                }
            ]
        }
    </script>



    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Product",
            "brand": "Himalayan Trekkers Pvt. Ltd.",
            "name": "{{ $detail->meta_title }}",
            "image": [
                "{{ Voyager::image($detail->image) }}"
            ],

            "description": "{{ $detail->meta_description }}",
            @if ($detail->reviews->count() > 0)
                "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "{{ $detail->averageRating() }}",
                "reviewCount": "{{ $detail->reviews->count() }}"
                },
            @endif


            "offers": {
                "@type": "Offer",
                "priceValidUntil": 2023,
                "url": "https://himalayantrekkers.com/itinerary/{{ $detail->slug }}",
                "priceCurrency": "USD",
                "price": "{{ $detail->price }}",
                "availability": "http://schema.org/InStock"
            }

        }
    </script>


    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Trip",
      "name": "{{$detail->title}}",
      "description": "{{$detail->meta_description}}",
      "url": "https://himalayantrekkers.com/itinerary/{{$detail->slug}}/",
      "offers": {
        "@type": "Offer",
        "price": "{{number_format($detail->price - ($detail->discount *$detail->price / 100))}}",
        "priceCurrency": "USD",
        "availability": "https://himalayantrekkers.com/itinerary/{{$detail->slug}}/InStock",
        "validFrom": "{{date('Y')}}-01-01",
        "validThrough": "{{date('Y')}}-12-31",
        "url": "https://himalayantrekkers.com/contact-us"
      }
      @if (!empty($abc))
      ,"itinerary": {
        "@type": "ItemList",
        "itemListElement": [
            @foreach($abc as $key=>$item)
          {
            "@type": "ListItem",
            "position": "{{$key + 1}}",
            "item": {
              "@type": "TouristAttraction",
              "name": "{{$item->title}}",
              "url": "https://himalayantrekkers.com/itinerary/{{$detail->slug}}/",
              "description": "{{explode('</p>',explode(' ',explode('<p>',$item->content)[1])[0])[0]}}"
            }
          }@if($key + 1 != count($abc)),@endif
          @endforeach
          ]
      }
      @endif
    }
    </script>

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "https://himalayantrekkers.com"
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "{{ $detail->destinationId->title }}",
                    "item": "https://himalayantrekkers.com/{{ $detail->destinationId->slug }}"
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "{{ $detail->title }}",
                    "item": "https://himalayantrekkers.com/itinerary/{{ $detail->slug }}"
                }
            ]
        }
    </script>

    @if (!empty($faqs))
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
                "mainEntity": [
                    @foreach ($faqs as $faq)
                        {
                        "@type": "Question",
                        "name": "{{ $faq->question }}",
                        "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "{{ $faq->answer }}"
                        }
                        },
                    @endforeach {
                        "@type": "Question",
                        "name": "Can I customise the itinerary, may be add more days and do a multicountry tour?",
                        "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "Yes you definately can add days and extend your trip to any countries. We also have combination of tours in our  <a href=https://himalayantrekkers.com/multicountry-tours-and-treks> Multicountry Tour and Treks </a> section."
                        }
                    }
                ]
            }
        </script>
    @endif

</head>

<body class="bg-shuttle-gray overflow-x-hidden">
        <amp-analytics type="googleanalytics" config="https://amp.analytics-debugger.com/ga4.json" data-credentials="include">
<script type="application/json">
{
    "vars": {
                "GA4_MEASUREMENT_ID": "G-4GS7CHE41Y",
                "GA4_ENDPOINT_HOSTNAME": "www.google-analytics.com",
                "DEFAULT_PAGEVIEW_ENABLED": true,
                "GOOGLE_CONSENT_ENABLED": false,
                "WEBVITALS_TRACKING": true,
                "PERFORMANCE_TIMING_TRACKING": true
    }
}
</script>
</amp-analytics>

    <amp-animation id="showAnim" layout="nodisplay">
        <script type="application/json">
            {
                "duration": "1ms",
                "fill": "both",
                "iterations": "1",
                "direction": "alternate",
                "animations": [{
                    "selector": "#scrollToTopButton",
                    "keyframes": [{
                        "opacity": "1",
                        "visibility": "visible"
                    }]
                },{
                    "selector": "#below-sticky",
                    "keyframes": [{
                        "opacity": "1",
                        "visibility": "visible",
                        "transform": "scale(1)"
                    }]
                }]
            }
        </script>
    </amp-animation>
    <!-- ... and the second one is for adding the button.-->
    <amp-animation id="hideAnim" layout="nodisplay">
        <script type="application/json">
            {
                "duration": "1ms",
                "fill": "both",
                "iterations": "1",
                "direction": "alternate",
                "animations": [{
                    "selector": "#scrollToTopButton",
                    "keyframes": [{
                        "opacity": "0",
                        "visibility": "hidden"
                    }]
                },{
                    "selector": "#below-sticky",
                    "keyframes": [{
                        "opacity": "0",
                        "visibility": "invisible",
                        "transform": "scale(0)"
                    }]
                },{
                    "selector": "#below-sticky",
                    "keyframes": [{
                        "opacity": "0",
                        "visibility": "invisible",
                        "transform": "scale(0)"
                    }]
                }]
            }
        </script>
    </amp-animation>

    @include('layouts.newampnavbar')

    <p class="target relative">
        <a class="target-anchor" id="top"></a>

        <amp-position-observer on="enter:hideAnim.start; exit:showAnim.start" layout="nodisplay">
        </amp-position-observer>
    </p>



    @php
        if ($detail->pano == '1') {
            $width = '1800';
            $height = '668';
        } else {
            $width = '1366';
            $height = '768';
        }
    @endphp
    <div>
        <div class="flex items-center bg-white sticky top-0 w-full" id="below-sticky" style="height:76px;z-index:9;overflow-x:auto">
                <ul class="flex p-5 font-semibold text-sm md:text-base">
                    <li class="mx-2"><a class="border-b-2 border-regal-red hover:text-regal-red p-2" href="#overview">Overview</a></li>
                    <li class="mx-2"><a class="border-b-2 border-regal-red hover:text-regal-red p-2" href="#itinerary">Trip Itinerary</a></li>
                    @if (!empty($detail->includes) || !empty($detail->excludes))
                    	<li class="mx-2"><a class="border-b-2 border-regal-red hover:text-regal-red p-2" href="#includes">Includes/Excludes</a></li>
                    @endif
                    @if (!empty($faqs))
                        <li class="mx-2"><a class="border-b-2 border-regal-red hover:text-regal-red p-2" href="#faqs">Trip FAQ's</a></li>
                    @endif
                    <li class="mx-2"><a class="border-b-2 border-regal-red hover:text-regal-red p-2" href="#accommodation">Accommodation & Meals</a>
                    </li>
                    @if (!empty($detail->gearlist))
                    <li class="mx-2"><a class="border-b-2 border-regal-red hover:text-regal-red p-2" href="#gearlist">Gear Lists</a></li>
                    @endif
                    @if (count($departures ?? []) > 0)
                        <li class="mx-2"><a class="border-b-2 border-regal-red hover:text-regal-red p-2" href="#departures">Fixed Departures</a></li>
                    @endif
                    @if ($reviews->count() > 0)
                        <li class="mx-2"><a class="border-b-2 border-regal-red hover:text-regal-red p-2" href="#reviews">Reviews</a></li>
                    @endif
                </ul>
        </div>
    <section class="mt-5 px-4 md:px-6 xl:px-8" style="margin-top:-50px">
        <div class="container mx-auto">
            <div class="lg:grid lg:grid-cols-12 lg:gap-5 bg-white rounded-xl">
                <div class="col-span-8">
                    <h1 class="text-xl md:text-3xl font-bold mb-4 text-center">
                        {{ $detail->title . ' - '. $detail->duration . Str::plural(' Day', $detail->duration) }}
                    </h1>
                    <div class="parallax-section relative rounded-xl">
                    @if(!empty($detail->image))
                        <amp-img class="hidden md:block rounded-l-xl" data-hero alt="{{ $detail->image_alt ? $detail->image_alt : $detail->title }}"
                            layout="responsive" width="{{ $width }}" height="{{ $height }}"
                            src="{{ Voyager::image($detail->image) }}"></amp-img>
                        <amp-img class="md:hidden rounded-l-xl" data-hero alt="{{ $detail->image_alt ? $detail->image_alt : $detail->title }}" width="760"
                            height="512" layout="responsive"
                            src="{{ Voyager::image(getThumbnail($detail->image, 'cropped')) }}">
                        </amp-img>
                   @endif
                        {{-- <div class="flex justify-between items-center" amp-fx="parallax" data-parallax-factor="1.3"> --}}
                            {{-- <h1 class="text-white text-xl md:text-4xl ts font-semibold text-center">
                                <span class="parallax-title px-2"> {{ $detail->title }}</span>

                            </h1> --}}
                            {{-- <p class="text-sm ts">{{ $detail->activity[0]->title }}</p> --}}
                        {{-- </div> --}}

                    </div>
                </div>
                <div class="bg-white col-span-4 px-5 pt-5 pb-2 lg:pb-0 rounded-l-xl">
                    <div class="breadcrumbs">
                        <div class="flex items-center text-sm text-regal-red flex-wrap">
                            <a class="inline-block" href="/">
                                {{-- <span class="icon-home text-xs text-center" aria-hidden="true"></span> --}}
                                Home:
                            </a>
                            {{-- <span class="icon-chevron-right text-xs text-center ml-1" aria-hidden="true"></span> --}}
                            <a class="inline-block ml-1 font-semibold" href="/{{ $detail->destinationId->slug }}">

                                {{ $detail->destinationId->title }}:

                            </a>
                            <span class="icon-chevron-right text-xs text-center ml-1" aria-hidden="true"></span>

                            <p class="ml-1 inline-block text-sm text-light-gray font-semibold">{{ $detail->title }}</p>

                        </div>
                    </div>
                    @if(count($detail->activity) > 0)
                    	<a href="{{route('singleactivity.index',['slug'=>$detail->activity[0]->slug])}}" class="block mt-2 xl:mt-5 text-base font-semibold capitalize">{{ $detail->activity[0]->title }}</a>
                    @endif
                    @if ($detail->reviews->count() > 0)
                        <div
                            class="mt-2 xl:mt-5 inline-flex items-center text-xs sm:text-base leading-7 px-2 rounded-full shadow-lg bg-white md:h-7">

                            @include('layouts.star', ['rate' => (int) $detail->reviews->avg('rating')])
                            <p class="ml-2 py-2 text-sm font-semibold">
                                {{ number_format($detail->reviews->avg('rating'), 2) }}

                                <span class="hidden sm:inline-block">({{ $detail->reviews->count() }})</span>
                            </p>

                        </div>
                    @endif
                    {{-- <ul class="mt-5 md:mt-2 xl:mt-5 included text-light-gray text-sm xl:text-base list-disc pl-5">
                        <li>Guaranteed Satisfaction</li>
                        <li>Transparent Price </li>
                        <li>No hidden fees</li>
                        <li>Experience of a More than 10 Years</li>
                        <li>Personal Touch & Professional Service</li>
                    </ul> --}}
                    <div id="our-details">
                        {!! setting('itinerary.trip_detail') !!}
                    </div>

                    <div class="flex items-center justify-start flex-wrap mt-3 md:mt-2 xl:mt-5">
                    <p>
                            @if ($detail->discount)
                            {{-- cut text css  --}}
                            <span class="text-sm md:text-base font-medium line-through">
                                US$ {{number_format($detail->price)}}
                            </span>
                            <span class="md:text-xl font-semibold ml-1">
                                US$ {{ number_format($detail->price - ($detail->discount *$detail->price / 100)) }}</span>
                                @else
                                <span class="md:text-xl font-semibold ml-1">
                                    US$ {{ number_format($detail->price) }}</span>
                            {{--
                                <span class="text-sm md:text-base font-medium line-through">
                                ${{number_format($detail->price * 1.25)}}
                            </span>
                            <span class="md:text-2xl font-semibold ml-1">
                                ${{ number_format($detail->price) }}
                            </span> --}}
                            @endif
                        </span> <span class="text-light-gray font-semibold">  P/P </span>
                    </p>
                    @if ($detail->discount)
                    {{-- <div class="mt-2 text-center"> --}}
                        <span class="inline-block rounded-2xl shadow-sm bg-new-blue text-white py-px px-2 ml-2 text-sm font-semibold">
                            {{$detail->discount.'% off'}}
                        </span>
                    {{-- </div> --}}
                    @endif
                </div>
                    {{-- <button on="tap:forma.scrollTo(duration=200)" role="button" tabindex="0"
                        class="py-2 px-4 rounded-full text-white focus:outline-none w-auto mx-auto bg-regal-blue hover:bg-hover-yellow font-semibold mt-5 hover:text-black uppercase">Fixed
                        Departures
                    </button> --}}



                    <div class="mt-5 flex justify-between items-center">
                        <button on="tap:forma.scrollTo(duration=200)" role="button" tabindex="0"
                            class="hidden lg:block py-1 px-2 text-sm rounded-full text-white focus:outline-none bg-regal-red hover:bg-hover-yellow font-semibold hover:text-black uppercase xl:text-base">Inquire
                            Now</button>
                            <a href="{{ route("initiate-payment", $detail->slug) }}">Book Now</a>
                            </div>


<!-- Your existing code -->
                        <div class="social">
                            <div class="text-sm md:text-base flex justify-start items-center share text-black">

                                <amp-social-share class="rounded-full m-1 text-sm md:text-base" aria-label="Facebook"
                                    type="facebook" width="20" height="20" data-param-app_id="1239482626251780">
                                </amp-social-share>
                                <amp-social-share class="rounded-full m-1" aria-label="Twitter" type="twitter"
                                    width="20" height="20" data-param-app_id="12345678">
                                </amp-social-share>
                                <amp-social-share class="rounded-full m-1" aria-label="Pinterest" type="pinterest"
                                    width="20" height="20">
                                </amp-social-share>
                                <amp-social-share class="rounded-full m-1" aria-label="LinkedIn" type="linkedin"
                                    width="20" height="20" data-param-text="Hello world"
                                    data-param-url="https://himalayantrekkers.com">
                                </amp-social-share>
                                <amp-social-share class="rounded-full m-1" aria-label="WhatsApp" type="whatsapp"
                                    width="20" height="20">
                                </amp-social-share>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


    <section id="overview" class="mt-5 px-4 md:px-6 xl:px-8">
        <div class="container mx-auto">
            <div class="lg:grid lg:grid-cols-12 lg:gap-5">

                <div class="lg:hidden">
                    <div class="aside bg-white rounded-l-xl relative">
                        <div class="h-20 w-20 absolute right-3 -top-4 opacity-50"
                            style="background-image: url('/images/clipboard.svg');">
                        </div>
                        <div class="p-5">
                            <h4 class="text-lg font-semibold uppercase relative">Trip Info</h4>

                            <ul class="bubble">
                                @if (!empty($detail->duration))
                                    <li class="flex items-center justify-between py-2 pl-1 ">
                                        <p class="font-semibold text-regal-blue text-sm">Duration</p>
                                        <p class="font-bold"> {{ $detail->duration }}
                                            {{ Str::plural('Day', $detail->duration) }}</p>
                                    </li>
                                @endif
                                @if (!empty($detail->altitude))
                                    <li class="flex items-center justify-between py-2 pl-1">
                                        <p class="font-semibold text-regal-blue">

                                            Max. Altitude
                                        </p>
                                        <p class="font-bold"> {{ $detail->altitude }} m</p>

                                    </li>
                                @endif



                                <li class="flex items-center justify-between py-2 pl-1">
                                    <p class="w-28 font-semibold text-regal-blue">Difficulty</p>


                                    @if ($detail->tripgrade)
                                        <?php
                                        if ($detail->tripgrade == 1) {
                                            $tripgrade = 'easy';
                                        } elseif ($detail->tripgrade === 2) {
                                            $tripgrade = 'moderate';
                                        } elseif ($detail->tripgrade === 3) {
                                            $tripgrade = 'difficult';
                                        } elseif ($detail->tripgrade === 4) {
                                            $tripgrade = 'strenous';
                                        } else {
                                            $tripgrade = 'very strenous';
                                        }
                                        ?>

                                        <div class="flex items-center h-8">
                                            <amp-img class="object-fill" alt="{{ $tripgrade }}" width="39"
                                                height="35" layout="fixed"
                                                src="/images/tripgrade/{{ $detail->tripgrade . '.svg' }}">
                                            </amp-img>
                                            <p class="ml-2 text-sm font-semibold text-regal-blue uppercase">

                                                {{ $tripgrade }}
                                            </p>
                                        </div>
                                    @endif
                                </li>

                                @if (!empty($detail->arrival))

                                    <li class="flex items-center justify-between py-2 pl-1">
                                        <p class="w-28 font-semibold text-regal-blue">

                                            Starts From</p>
                                        <p class="font-bold">{{ $detail->arrival }}</p>
                                    </li>
                                @endif
                                @if (!empty($detail->departure_from))

                                    <li class="flex items-center justify-between py-2 pl-1">
                                        <p class="w-28 font-semibold text-regal-blue">

                                            Trip Ends At</p>
                                        <p class="font-bold">{{ $detail->departure_from }}</p>
                                    </li>
                                @endif

                                @if (!empty($detail->transport))
                                    <li class="flex items-center justify-between py-2 pl-1">
                                        <p class="flex-shrink-0 font-semibold text-regal-blue w-1/4 xl:w-1/4">

                                            Transport
                                        </p>
                                        <p class="font-bold text-right"> {{ $detail->transport }}</p>
                                    </li>
                                @endif
                                @if ($detail->region_id > 1)
                                    <li class="flex items-center justify-between py-2 pl-1">
                                        <p class="w-28 font-semibold text-regal-blue"> Region/Type</p>
                                        <a class="text-regal-red text-sm text-right font-bold"
                                            href="/trekking-in-nepal/{{ $detail->regionId->slug }}">{{ $detail->regionId->title }}</a>
                                    </li>
                                @endif


                                @empty(!$detail->season)
                                    <li class="flex items-center justify-between pl-1">
                                        <p class="w-32 flex-shrink-0 font-semibold text-regal-blue">

                                            Best Season:
                                        </p>
                                        <ul class="season text-right">
                                            @foreach (json_decode($detail->season, true) as $key => $item)

                                                @if (count(json_decode($detail->season, true)) >= 1)

                                                    <li class="text-sm font-semibold">{{ $item }}</li>

                                                @endif

                                            @endforeach


                                        </ul>



                                    </li>
                                @endempty
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="mt-5 lg:mt-0 col-span-8">
                    @include('newamp.overview')
                </div>
                <div class="col-span-4 rounded-xl"
                id="aside"
                @if ($detail->id == 43) style="max-height: 500px; overflow-y: auto" @endif
                >

                    @include('newamp.aside')
                </div>

            </div>
        </div>
    </section>


    @include('newamp.itin')







{{-- <section id="map-and-altitude" class="mt-5 px-4 md:px-6 xl:px-8">
    <div class="container mx-auto">
        <div class="lg:grid lg:grid-cols-12  lg:gap-5">
            <div class="col-span-8 bg-white rounded-t-xl">

               <amp-selector class="tabs-with-flex p-2" role="tablist" keyboard-select-mode="focus">
  <div id="tab1" class="bg-light-grayone font-bold text-lg uppercase" role="tab" aria-controls="tabpanel1" option selected>Altitude Map</div>
  <div id="tabpanel1" role="tabpanel" aria-labelledby="tab1">Tab one content... </div>
  <div id="tab2" class="bg-light-grayone font-bold text-lg uppercase" role="tab"  aria-controls="tabpanel2" option>Gear List</div>
  <div id="tabpanel2" role="tabpanel" aria-labelledby="tab2">
      @if ($detail->type == 'TREK')
           <amp-img class="bg-white cursor-pointer" width="1366" height="768" layout="responsive"
                                    src="/images/trekking-and-walking-gearlist.jpg">
            </amp-img>
      @elseif($detail->type == 'CLIMBIMG')
       <amp-img class="bg-white cursor-pointer" width="1366" height="768" layout="responsive"
                                    src="/images/mountain-peak-climbing-gearlist.jpg">
        </amp-img>
      @endif

    </div>
  <div id="tab3" role="tab" aria-controls="tabpanel3" option>Tab three</div>
  <div id="tabpanel3" role="tabpanel" aria-labelledby="tab3">Tab three content... </div>
</amp-selector>

            </div>
        </div>
        <div class="col-span-4"></div>
    </div>

</section> --}}






    @include('newamp.includes')
    @include('newamp.misc')
    @include('newamp.faqs')
    @include('newamp.acco')
    @include('newamp.gearlist')
    @include('newamp.departures')
    @include('newamp.reviews')
    </div>

    <button id="scrollToTopButton" on="tap:top.scrollTo(duration=200)" class="scrollToTop text-white">

        <svg class="i-arrow-top mx-auto text-center" viewBox="0 0 32 32" width="20" height="20" fill="currentcolor"
            stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="5">
            <path d="M6 10 L16 2 26 10 M16 2 L16 30"></path>
        </svg><span class="hidden">Top</span>
    </button>

    <div id="inqdiv" class="lg:hidden">
        <form method="GET" target="_blank" action="{{ route('inquirenow') }}">

            <input type="hidden" name="title" value="{{ $detail->title }}">
            <input type="hidden" name="price" value="{{ round($detail->price - ($detail->discount *$detail->price / 100)) }}">
            <button class="block focus:bg-regal-red py-1 px-2 shadow z-50 w-full bg-regal-blue font-bold text-white"
                type="submit">Inquire Now</button>
        </form>
    </div>

    @include('layouts.ampfooter')



</body>

</html>
