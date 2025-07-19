@section('title', 'Welcome')

<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - OVS App</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:title" content="OVS App" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.svg') }}" />

    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank">
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }            
    </script>

    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="mb-0" id="home">
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
                style="background-image: url(/metronic8/demo39/assets/media/svg/illustrations/landing.svg)">
                <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
                    data-kt-sticky-offset="{default: '200px', lg: '300px'}">

                    <div class="container">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center flex-equal">
                                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
                                    id="kt_landing_menu_toggle">
                                    <i class="ki-outline ki-abstract-14 fs-2hx"></i> </button>

                                <a href="/">
                                    <img alt="OVS App" src="{{ asset('assets/media/logos/default.svg') }}"
                                        class="logo-default h-25px h-lg-30px" />
                                    <img alt="OVS App" src="{{ asset('assets/media/logos/default.svg') }}"
                                        class="logo-sticky h-20px h-lg-25px" />
                                </a>
                            </div>

                            <div class="d-lg-block" id="kt_header_nav_wrapper">
                                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true"
                                    data-kt-drawer-name="landing-menu"
                                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                    data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                                    data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                                    data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                                </div>
                            </div>

                            <div class="flex-equal text-end ms-1">
                                <a href="{{ route('login') }}" class="btn btn-success">Sign In</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                    <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
                        <h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">
                            Start Vote <br />
                            <span
                                style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                                <span id="kt_landing_hero_text">Your Candidate</span>
                            </span>
                        </h1>

                        <a href="{{ route('login') }}" class="btn btn-primary">Lets Start</a>
                    </div>
                </div>

            </div>

            <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
                <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                        fill="currentColor"></path>
                </svg>
            </div>
        </div>

        <div class="mb-0">
            <div class="landing-curve landing-dark-color ">
                <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                        fill="currentColor"></path>
                </svg>
            </div>

            <div class="landing-dark-bg pt-20">
                <div class="container">
                    <div class="row py-10 py-lg-20">
                        <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                            <div class="rounded landing-dark-border p-9 mb-10">
                                <h2 class="text-white">Would you need a Custom License?</h2>

                                <span class="fw-normal fs-4 text-gray-700">
                                    Email us to

                                    <a href="https://keenthemes.com/support"
                                        class="text-white opacity-50 text-hover-primary">support@keenthemes.com</a>
                                </span>
                            </div>

                            <div class="rounded landing-dark-border p-9">
                                <h2 class="text-white">How About a Custom Project?</h2>

                                <span class="fw-normal fs-4 text-gray-700">
                                    Use Our Custom Development Service.

                                    <a href="/metronic8/demo39/pages/user-profile/overview.html"
                                        class="text-white opacity-50 text-hover-primary">Click to Get a Quote</a>
                                </span>
                            </div>
                        </div>

                        <div class="col-lg-6 ps-lg-16">
                            <div class="d-flex justify-content-center">
                                <div class="d-flex fw-semibold flex-column me-20">
                                    <h4 class="fw-bold text-gray-500 mb-6">More for Metronic</h4>

                                    <a href="https://keenthemes.com/faqs"
                                        class="text-white opacity-50 text-hover-primary fs-5 mb-6">FAQ</a>

                                    <a href="https://preview.keenthemes.com/html/metronic/docs"
                                        class="text-white opacity-50 text-hover-primary fs-5 mb-6">Documentaions</a>

                                    <a href="https://www.youtube.com/c/KeenThemesTuts/videos"
                                        class="text-white opacity-50 text-hover-primary fs-5 mb-6">Video Tuts</a>

                                    <a href="https://preview.keenthemes.com/html/metronic/docs/getting-started/changelog"
                                        class="text-white opacity-50 text-hover-primary fs-5 mb-6">Changelog</a>

                                    <a href="https://devs.keenthemes.com/"
                                        class="text-white opacity-50 text-hover-primary fs-5 mb-6">Support Forum</a>

                                    <a href="https://keenthemes.com/blog"
                                        class="text-white opacity-50 text-hover-primary fs-5">Blog</a>
                                </div>

                                <div class="d-flex fw-semibold flex-column ms-lg-20">
                                    <h4 class="fw-bold text-gray-500 mb-6">Stay Connected</h4>

                                    <a href="https://www.facebook.com/keenthemes" class="mb-6">
                                        <img src="/metronic8/demo39/assets/media/svg/brand-logos/facebook-4.svg"
                                            class="h-20px me-2" alt="" />

                                        <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Facebook</span>
                                    </a>

                                    <a href="https://github.com/KeenthemesHub" class="mb-6">
                                        <img src="/metronic8/demo39/assets/media/svg/brand-logos/github.svg"
                                            class="h-20px me-2" alt="" />

                                        <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Github</span>
                                    </a>

                                    <a href="https://twitter.com/keenthemes" class="mb-6">
                                        <img src="/metronic8/demo39/assets/media/svg/brand-logos/twitter.svg"
                                            class="h-20px me-2" alt="" />

                                        <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Twitter</span>
                                    </a>

                                    <a href="https://dribbble.com/keenthemes" class="mb-6">
                                        <img src="/metronic8/demo39/assets/media/svg/brand-logos/dribbble-icon-1.svg"
                                            class="h-20px me-2" alt="" />

                                        <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Dribbble</span>
                                    </a>

                                    <a href="https://www.instagram.com/keenthemes" class="mb-6">
                                        <img src="/metronic8/demo39/assets/media/svg/brand-logos/instagram-2-1.svg"
                                            class="h-20px me-2" alt="" />

                                        <span
                                            class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="landing-dark-separator"></div>

                <div class="container">
                    <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                        <div class="d-flex align-items-center order-2 order-md-1">
                            <a href="/metronic8/demo39/landing.html">
                                <img alt="Logo" src="/metronic8/demo39/assets/media/logos/landing.svg"
                                    class="h-15px h-md-20px" />
                            </a>

                            <span class="mx-5 fs-6 fw-semibold text-gray-600 pt-1" href="https://keenthemes.com">
                                &copy; 2025 Keenthemes Inc.
                            </span>
                        </div>

                        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                            <li class="menu-item">
                                <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                            </li>

                            <li class="menu-item mx-5">
                                <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                            </li>

                            <li class="menu-item">
                                <a href="" target="_blank" class="menu-link px-2">Purchase</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <i class="ki-outline ki-arrow-up"></i>
        </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>

    <script>
        var hostUrl = "assets/index.html";
    </script>

    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

    <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/typedjs/typedjs.bundle.js') }}"></script>

    <script src="{{ asset('assets/js/custom/landing.js') }}"></script>
    <script src="{{ asset('assets/js/custom/pages/pricing/general.js') }}"></script>

</body>

</html>