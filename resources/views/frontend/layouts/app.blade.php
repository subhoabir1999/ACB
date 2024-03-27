<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | ANTI CORRUPTION BUREAU, MAHARASHTRA</title>
    <link rel="shortcut icon" type="image/png" href="https://acbmaharashtra.gov.in/imgs/favicon.png">

    <!-- Bootstrap-CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

    <!-- Animate JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
    integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- Top Bar with Search and Menu Option for Mobile Only Starts-->
    <div class="top-bar-mob">
        <div class="top-bar-mob-left">
            {{-- <select class="lang-select" name="lang" id="lang">
                <option value="English">English</option>
                <option value="marathi">मराठी</option>
                <option value="hindi">हिन्दी</option>
            </select> --}}
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-body">
                            <form class="d-flex">
                                <input class="form-control rounded-pill me-2" type="search" placeholder="Search" aria-label="Search">
                            <!--<button class="secondary-btn" style="border-radius: 4px;height: 56px;" type="submit"><img src="/frontend/images/search.svg" alt="search-icon"></button> -->
                            </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Ends-->

        
        <div class="top-bar-mob-right d-flex justify-content-end align-items-center">
            <button type="button" class="search-btn" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="/frontend/images/search-white.svg" alt="search-icon"></button>
            <button class="navbar-toggler fs-6" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample">Menu<span><img class="ms-2 navbar-toggler-icon" style="width:16px" src="/frontend/images/menu-bars.svg" alt="menu-bar"
                        srcset=""></span>
            </button>            
        </div>


        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pressRelease') }}">Press Release</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="events.html">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('statistics') }}">Statistics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fir') }}">FIRs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('legal') }}">Legal</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

<!-- Top Bar with Search and Menu Option for Mobile Only Ends-->


    <div class="container-fluid p-0">
        <!-- Navigation Bar Started -->
        <div class="top-navbar">
            <!-- Top Bar Start -->
            <div class="top-bar">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-6 top-call-info d-flex justify-content-start align-items-center">
                        <!-- Tollfree -->
                        <div class="tollfree me-4 ms-4">
                        <a href="tel:1064"> <img src="/frontend/images/call.svg" class="pe-2" alt="call" srcset="">Toll Free Number: 1064</a>
                        </div>
                        <!-- Whatsapp -->
                        <div class="whatsapp">
                        <a href="https://wa.me/9930997700" target="_blank" style="color:#fff;">
                            <img src="/frontend/images/whatsapp.svg" class="pe-2" alt="call" srcset="">WhatsApp Number:
                            <strong>9930997700</strong></a>
                        </div>
                    </div>
                    <div class="col-md-6 top-link-search d-flex justify-content-start align-items-center">
                        <div class="top-bar-links me-4">
                            <a href="#head_office">Go To Main Content</a>
                            <a href="#" id="aMinus">A-</a>
                            <a href="#" id="aReset">A</a>
                            <a href="#" id="aPlus">A+</a>
                            <select class="lang-select" name="lang" id="lang">
                                @foreach (config('app.available_locales') as $key=>$locale)
                                    <option value="{{ $key }}" @if (app()->getLocale() == $key) selected @endif>
                                        {{ strtoupper($locale) }}
                                    </option>
                                @endforeach
                            </select>
                            
                        </div>
                        <!-- Search Bar -->
                        <div class="input-group">
                            <input type="text" class="form-control top-search-bar" placeholder="Search here..."
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <!-- <button class="btn search-btn default-btn" type="button" id="button-addon2"><img src="/frontend/images/search.svg" alt="search_icon" srcset=""></button> -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Top Bar Ends -->

            <!-- Navbar Starts -->
            <nav class="navbar navbar-expand-lg ms-2 me-2">
                <div class="container-fluid">
                    <!-- Nav Logo -->
                    <a class="navbar-brand" href="index.html">
                        <img src="/frontend/images/logo.svg" alt="" srcset="">
                    </a>
                    <div class="nav-right">
                        <!-- Nav Options -->
                        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link {{ areActiveRoutes(['front.index'])}}" aria-current="page" href="{{ route('front.index') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ areActiveRoutes(['pressRelease'])}}" href="{{ route('pressRelease') }}">Press Release</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="events">Events</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ areActiveRoutes(['statistics'])}}" href="{{ route('statistics') }}">Statistics</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ areActiveRoutes(['front.index'])}}" href="#">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ areActiveRoutes(['fir'])}}" href="{{ route('fir') }}">FIRs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ areActiveRoutes(['legal'])}}" href="{{ route('legal') }}">Legal</a>
                                </li>
                            </ul>
                        </div>
                        <a href="bribe-demand-complaint" class="default-btn me-2">Online Complaint</a>
                        <img class="nav-embalem" src="/frontend/images/satya_mav_embalem.svg" class="ms-4" alt="" srcset="">
                    </div>
                </div>
            </nav>
            <!-- Navbar Ends -->
        </div>
        <!-- Navigation Bar Ends -->
    </div>
    <!-- Floating Buttons Starts-->
    <div class="float-btn">
        <a href="https://wa.me/9930997700" target="_blank">
            <div class="float-cta-btn whatsapp-btn wow animate__animated animate__slideInRight">
                <img class="" src="{{ asset('frontend/images/whatsapp-btn.svg') }}" alt="whatsapp-btn" srcset="">
                <span class="content">9930997700</span>
            </div>
        </a>
        <a href="tel:+91 2224921212">
            <div class="float-cta-btn call-btn wow animate__animated animate__slideInRight">
                <img class="" src="{{ asset('frontend/images/call-btn.svg') }}" alt="whatsapp-btn" srcset="">
                <span class="content">+91 2224921212</span>
            </div>
        </a>
        <a href="mailto:acbwebmail@mahapolice.gov.in">
            <div class="float-cta-btn mail-btn wow animate__animated animate__slideInRight">
                <img class="" src="{{ asset('frontend/images/mail-btn.svg') }}" alt="whatsapp-btn" srcset="">
                <span class="content">acbwebmail@mahapolice.gov.in</span>
            </div>
        </a>
    
        <a href="bribe-demand-complaint.html">
            <div class="float-cta-btn online-complaint wow animate__animated animate__slideInRight">
                <img class="" src="{{ asset('frontend/images/complaint-btn.svg') }}" alt="whatsapp-btn" srcset="">
                <span class="content">Complaint Online</span>
            </div>
        </a>
    </div>
    <!-- Floating CTA Buttons ends -->
    
    @yield('content')
    <!-- footer-section start-->

    <footer class="wrapper">
        <div class="container">
            <div class="row footer-link-section mb-2">
                <div class="col-md-2">
                    <p class="link-title fw-bold">QUICK LINKS</p>
                    <ul>
                        <a href="rti.html">
                            <li class="footer-link">Right To Information</li>
                        </a>
                        <a href="tender.html">
                            <li class="footer-link">Tenders</li>
                        </a>
                        <a href="circulars.html">
                            <li class="footer-link">Circulars</li>
                        </a>
                        <a href="#">
                            <li class="footer-link">Site Map</li>
                        </a>
                    </ul>
                </div>
                <div class="col-md-2">
                    <p class="link-title  fw-bold">FOR YOUR INFO</p>
                    <ul>
                        <a href="">
                            <li class="footer-link">Legal</li>
                        </a>
                        <a href="faq.html">
                            <li class="footer-link">FAQs</li>
                        </a>
                        <a href="feedback.html">
                            <li class="footer-link">Feedback</li>
                        </a>
                        <a href="disclaimer.html">
                            <li class="footer-link">Disclaimer and Policies</li>
                        </a>
                    </ul>
                </div>
                <div class="col-md-2">
                    <p class="link-title  fw-bold">OTHER LINKS</p>
                    <ul>
                        <a href="office-range-unit.html">
                            <li class="footer-link">ACB Head Office</li>
                        </a>
                        <a href="#">
                            <li class="footer-link">ACB Mobile App</li>
                        </a>
                        <a href="important-link.html">
                            <li class="footer-link">Important Website Link</li>
                        </a>
                    </ul>
                </div>
                <div class="col-md-2">
                    <p class="link-title  fw-bold">RECOMMENDED</p>
                    <ul>
                        <a href="gallery.html">
                            <li class="footer-link">Photo Gallery</li>
                        </a>
                        <a href="#">
                            <li class="footer-link">Aapale Sarkar</li>
                        </a>
                        <a href="#">
                            <li class="footer-link">National Portal of India</li>
                        </a>
                    </ul>
                </div>
                <div class="col-md-2">
                    <p class="link-title  fw-bold">HOW TO REACH?</p>
                    <ul>
                        <a href="reach-us.html">
                            <li class="footer-link">By Road</li>
                        </a>
                        <a href="reach-us.html">
                            <li class="footer-link">By Air</li>
                        </a>
                        <a href="reach-us.html">
                            <li class="footer-link">By Rail</li>
                        </a>
                    </ul>
                </div>
                <div class="col-md-2">
                    <p class="link-title  fw-bold">CONTACT</p>
                    <ul>
                        <a href="">
                            <li class="footer-link">+91 22-249-21212</li>
                        </a>
                        <a href="#">
                            <li class="footer-link">9930997700</li>
                        </a>
                        <a href="#">
                            <li class="footer-link">acbwebmail@mahapolice.gov.in</li>
                        </a>
                    </ul>
                </div>
            </div>

            <div class="row footer-address">
                <p class="m-0">DIRECTOR GENERAL, ANTI-CORRUPTION BUREAU OF MAHARASHTRA</p>
                <p class="mb-2">6th Floor, Sir Pochkhanwala Road, Worli Police Camp, Worli, Mumbai - 400 030,
                    Maharashtra, India.</p>
            </div>

            <div class="row footer-copyright">
                <p class="mt-2 mb-2">© 2018 ANTI CORRUPTION BUREAU, MAHARASHTRA | Last Updated On : 01/14/2024 15:41:55
                    | Website Visitors : 5195</p>
            </div>
        </div>
    </footer>
    <!-- footer-section ends-->


    <!-- Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <!-- Jquery JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom-JS -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/headerFooterManager.js') }}"></script>
    <script>
        // alert('hi');
        $('#lang').change(function() {
            // Get the selected locale value
            var selectedLocale = this.value;
    console.log(selectedLocale);
            // Construct the new URL with the selected locale
            var newUrl = "{{ request()->url() }}?language=" + selectedLocale;
    
            // Redirect to the new URL
            window.location.href = newUrl;
        });
    </script>
    <!-- WOW JS -->
    <script>


        new WOW().init();
    </script>
    @yield('script')

    
</body>

</html>