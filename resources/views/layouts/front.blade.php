<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  
    <link rel="stylesheet" href="{{ asset('css/criticals.css') }}">
    <link rel="stylesheet" href="{{ asset('css/additional.css?v=2.0') }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/images/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    @yield('metatags')
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    <link rel="manifest" href="/images/site.webmanifest">
    <link rel="mask-icon" href="/images/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/images/favicon.ico">
    @yield('css')
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <script async src="/js/v1.js?v=1.2"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet">
<script async src="https://www.google-analytics.com/analytics.js"></script>

  


<style>
html {
  --scrollbarBG: #CFD8DC;
  --thumbBG: #90A4AE;
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

      .back-to-top-fade-enter-active,
.back-to-top-fade-leave-active {
  transition: opacity 0.7s;
}
.back-to-top-fade-enter,
.back-to-top-fade-leave-to {
  opacity: 0;
}

.back-to-top {
  position: fixed;
  z-index: 1000;
  cursor: pointer;
}
</style>




</head>

<body class="antialiased">
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WCC48GR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    @yield('content')





    @yield('script')
    
    <script src="{{ asset('js/vendor.min.js?v=2.3') }}"></script>


    @yield('more-script')

    



    <script defer src="/js/cookieconsent.js"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            var observer = lozad('.lozad', {
                threshold: 0.1,
                enableAutoReload: true,
                load: function(el) {
                    el.src = el.getAttribute("data-src");
                    el.onload = function() {}
                }
            });
            var pictureObserver = lozad('.lozad-picture', {
                threshold: 0.1
            });
            var backgroundObserver = lozad('.lozad-background', {
                threshold: 0.1
            });
            observer.observe();
            pictureObserver.observe();
            backgroundObserver.observe();
        });
    </script>

    <script>
        var modal = document.getElementById('id01');


        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };

        function open_modal() {
            document.getElementById('id01').style.display = 'block';
            document.getElementById("search").focus();

        }
    </script>


    <script>
        window.addEventListener('load', function() {

            var cc = initCookieConsent();


            var logo = 'Cookie Policy';
            var cookie = '🍪';


            cc.run({
                current_lang: 'en',
                autoclear_cookies: true,
                theme_css: "/js/cookieconsent.css",
                cookie_name: 'cc_cookie',
                cookie_expiration: 365,
                page_scripts: true,


                gui_options: {
                    consent_modal: {
                        layout: 'box',
                        position: 'bottom right',
                        transition: 'slide'
                    },
                    settings_modal: {
                        layout: 'box',

                        transition: 'slide'
                    }
                },

                

                onChange: function(cookie, changed_preferences) {
                


                    if (changed_preferences.indexOf('analytics') > -1) {


                        if (!cc.allowedCategory('analytics')) {


                            console.log('disabling gtag');
                            window.dataLayer = window.dataLayer || [];

                            function gtag() {
                                dataLayer.push(arguments);
                            }

                            gtag('consent', 'default', {
                                'ad_storage': 'denied',
                                'analytics_storage': 'denied'
                            });
                        }
                    }


                },

                languages: {
                    'en': {
                        consent_modal: {
                            title: cookie + ' Your Privacy',
                            description: 'By clicking “Accept all”, you agree Himalayan Trekkers (himalayantrekkers.com) can store cookies on your device and disclose information in accordance with our privacy policy. <button type="button" data-cc="c-settings" class="cc-link">Let me choose</button>',
                            primary_btn: {
                                text: 'Accept all',
                                role: 'accept_all'
                            },

                            secondary_btn: {
                                text: 'Settings',
                                role: 'settings'
                            }
                        },
                        settings_modal: {
                            title: logo,
                            save_settings_btn: 'Save settings',
                            accept_all_btn: 'Accept all',
                            reject_all_btn: 'Reject all',
                            close_btn_label: 'Close',
                            cookie_table_headers: [{
                                    col1: 'Name'
                                },
                                {
                                    col2: 'Domain'
                                },
                                {
                                    col3: 'Expiration'
                                }
                            ],
                            blocks: [{
                                title: 'Cookie Usage 📢',
                                description: 'We use cookies to ensure the basic functionalities of the website and to enhance your online experience. You can choose for each category to opt-in/out whenever you want. For more details relative to cookies and other sensitive data, please read the full <a href="/privacy-policy" class="cc-link">privacy policy</a>.'
                            }, {
                                title: 'Strictly necessary cookies',
                                description: 'These cookies are essential for the proper functioning of my website. Without these cookies, the website would not work properly',
                                toggle: {
                                    value: 'necessary',
                                    enabled: true,
                                    readonly: true
                                }
                            }, {
                                title: 'Performance and Analytics cookies',
                                description: 'These cookies allow the website to remember the choices you have made in the past',
                                toggle: {
                                    value: 'analytics',
                                    enabled: false,
                                    readonly: false
                                },
                                cookie_table: [{
                                        col1: '^_ga',
                                        col2: 'google.com',
                                        col3: '2 years',

                                        is_regex: true
                                    },
                                    {
                                        col1: '_gid',
                                        col2: 'google.com',
                                        col3: '2 years',

                                    }
                                ]
                            }, {
                                title: 'Advertisement and Targeting cookies',
                                description: 'These cookies collect information about how you use the website, which pages you visited and which links you clicked on. All of the data is anonymized and cannot be used to identify you',
                                toggle: {
                                    value: 'targeting',
                                    enabled: false,
                                    readonly: false
                                }
                            }, {
                                title: 'More information',
                                description: 'For any queries in relation to our policy on cookies and your choices, please vist our privacy policy page or contact us. <a class="cc-link" href="/privacy-policy">Privacy Policy.</a>.',
                            }]
                        }
                    }
                }
            });
        });
    </script>
     <script type="text/plain" data-cookiecategory="analytics">
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-WCC48GR');
	</script>


</body>

</html>
