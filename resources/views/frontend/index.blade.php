@extends('frontend.layouts.app')
@section('content')

<!-- Banner Carousel -->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($slider as $i=>$slider_dt)
        <div class="carousel-item {{ $i==0?'active':'' }}">
            <img src="{{ asset('storage/'.$slider_dt->photo) }}" class="d-block w-100" alt="{{ getLocalizedColumn($slider_dt, 'title') }}">
        </div>
        @endforeach
        
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Banner Carousel Ends -->

<!-- Headline Marquee -->
<div class="headline d-flex justify-content-start align-items-center">
    <div class="headline-title d-flex justify-content-start align-items-center">
        <img src="{{ asset('frontend/images/headline-icon.svg') }}" alt="healine-icon" class="me-2">
        <p>Headline</p>
    </div>
    <marquee behavior="scroll" direction="left" class="headline-marquee">
        @foreach ($headline as $headline_dt)
        @if($headline_dt->file)
        <a class="text-white" href="{{ asset('storage/'.$headline_dt->file) }}" target="_blank">{{ getLocalizedColumn($headline_dt, 'title') }}</a>
        @elseif($headline_dt->link)
        <a class="text-white" href="{{ $headline_dt->link }}" target="_blank">{{ getLocalizedColumn($headline_dt, 'title') }}</a>
        @else
        <p>{{ getLocalizedColumn($headline_dt, 'title') }}</p>
        @endif
            
        @endforeach
        {{-- <p>आलोसे-विस्तार अधिकारी(पं), पंचायत समिती साकोली, ता. साकोली, जि. भंडारा यांनी तक्रारदार यांनी
            आलोसे-विस्तार अधिकारी(पं), पंचायत समिती साकोली, ता. साकोली, जि. भंडारा यांनी तक्रारदार यांनी</p> --}}
    </marquee>
</div>
<!-- Headline Marquee Ends -->
</div>
<!-- CTA & latest Updates -->
<div class="container cta-latest-section">
    <div class="row">
        <!-- CTA List Starts -->
        <div class="col-md-6 cta-lists wrapper">

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4 wow animate__animated animate__fadeIn" data-wow-delay="0s">
                        <div class="card-body p-0">
                            <p class="large card-title align-items-center"><span class="card-icon me-2"><img
                                        src="{{ asset('frontend/images/bribe-complaint.svg') }}" alt="fir-icon"></span>Bribe Demand Complaint</p>
                            <p class="card-text m-0">Report ACB if any Public Servant demands bribe for Government
                                work.
                            </p>
                            <a href="bribe-demand-complaint.html" class="card-link float-end mt-2">Read More<span><img src="{{ asset('frontend/images/arrow.svg') }}" alt=""></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-4 wow animate__animated animate__fadeIn" data-wow-delay="50ms">
                        <div class="card-body p-0">
                            <p class=" large card-title align-items-center"><span class="card-icon me-2"><img
                                        src="{{ asset('frontend/images/assets-complaint.svg') }}" alt="fir-icon"></span>Disproportionate Assets Complaint</p>
                            <p class="card-text m-0">Report ACB if any Public Servant demands bribe for Government
                                work.
                            </p>
                            <a href="asset_complaint.html" class="card-link float-end mt-2">Read More <span><img src="{{ asset('frontend/images/arrow.svg') }}" alt=""></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-4 wow animate__animated animate__fadeIn" data-wow-delay="60ms">
                        <div class="card-body p-0">
                            <p class="large card-title align-items-center"><span class="card-icon me-2"><img
                                        src="{{ asset('frontend/images/misuse-power.svg') }}" alt="fir-icon"></span>Misuse of Power</p>
                            <p class="card-text m-0">Report ACB if any Public Servant demands bribe for Government
                                work.
                            </p>
                            <a href="other_complaint.html" class="card-link float-end mt-2">Read More <span><img src="{{ asset('frontend/images/arrow.svg') }}" alt=""></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-4 wow animate__animated animate__fadeIn" data-wow-delay="70ms">
                        <div class="card-body p-0">
                            <p class="large card-title align-items-center"><span class="card-icon me-2"><img
                                        src="{{ asset('frontend/images/fir.svg') }}" alt="fir-icon"></span> FIR's</p>
                            <p class="card-text m-0">Report ACB if any Public Servant demands bribe for Government
                                work.
                            </p>
                            <a href="#" class="card-link float-end mt-2">Read More <span><img src="{{ asset('frontend/images/arrow.svg') }}" alt=""></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card wow animate__animated animate__fadeIn" data-wow-delay="80ms">
                        <div class="card-body p-0">
                            <p class="large card-title align-items-center"><span class="card-icon me-2"><img
                                        src="{{ asset('frontend/images/latest-conviction.svg') }}" alt="fir-icon"></span>Latest Convictions</p>
                            <p class="card-text m-0">Report ACB if any Public Servant demands bribe for Government
                                work.
                            </p>
                            <a href="#" class="card-link float-end mt-2">Read More <span><img src="{{ asset('frontend/images/arrow.svg') }}" alt=""></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CTA List Ends -->

        <!-- Latest Update Section Start -->
        <div class="col-md-6 wrapper latest-update-list ps-4">
            <div class="latest-update wow animate__animated animate__fadeIn">
                <div class="latest-update-title mb-3 d-flex justify-content-start">
                    <img class="me-2" src="{{ asset('frontend/images/mic.svg') }}" alt="mic-icon" srcset="">
                    <h5 class="m-0 fw-bold">Latest Updates</h5>
                </div>
                <div class="update-list">
                    @foreach ($pressRelease as $pressRelease_dt)
                    <a href="{{ $pressRelease_dt->file }}" class="update-link active" target="_blank">
                        <p class="m-0">Press Release - {{ getLocalizedColumn($pressRelease_dt, 'title') }} Uploaded By {{ getLocalizedColumn($pressRelease_dt->unitRelation, 'title') }} from {{ getLocalizedColumn($pressRelease_dt->rangeRelation, 'title') }}</p>
                    </a>
                    @endforeach
                    @foreach ($fir as $fir_dt)
                    <a href="{{ $fir_dt->file }}" class="update-link active" target="_blank">
                        <p class="m-0">FIR - {{ getLocalizedColumn($fir_dt, 'title') }} Uploaded By {{ getLocalizedColumn($fir_dt->unitRelation, 'title') }} from {{ getLocalizedColumn($fir_dt->rangeRelation, 'title') }}</p>
                    </a>
                    @endforeach
                    @foreach ($legal as $legal_dt)
                    <a href="{{ $legal_dt->file }}" class="update-link active" target="_blank">
                        <p class="m-0">Legal - {{ getLocalizedColumn($legal_dt, 'title') }} Uploaded By {{ getLocalizedColumn($legal_dt->unitRelation, 'title') }} from {{ getLocalizedColumn($legal_dt->rangeRelation, 'title') }}</p>
                    </a>
                    @endforeach
                    @foreach ($statistic as $statistic_dt)
                    <a href="{{ $statistic_dt->file }}" class="update-link active" target="_blank">
                        <p class="m-0">Statistic - {{ getLocalizedColumn($statistic_dt, 'title') }} </p>
                    </a>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <!-- Latest Update Section Ends -->


    </div>
</div>
<!-- CTA & latest Updates Ends -->

<!-- DM's Message -->
<div class="container wrapper">
    <div class="dm-message wow animate__animated animate__fadeIn">
        <img class="message-quote" src="{{ asset('frontend/images/quote.svg') }}" alt="">
        <div class="message">
            <h5 class="message-title fw-bold">DG′s Message</h5>
            <p class="message-content">The Anti Corruption Bureau (ACB) is an important wing of the Government of
                Maharashtra. Anti
                Corruption Bureau's mission is in consonance with the Maharashtra State Government's policy of
                corruption-free and transparent governance.</p>
            <p class="message-content">The Government provides several services to the citizens. If the Government
                functionaries demand
                bribe for any government duty, the citizens should approach ACB. The ACB shall always firmly
                stand by such citizens and bring the perpetrators to book. A corruption free society will usher
                in an era of progress, prosperity and good governance. This would be possible only with the
                active participation and co-operation of the citizens.</p>
            <p class="message-content">Help ACB to free the society from the clutches of corruption and give impetus
                to development.
                Maharashtra ACB is here to help you at every step.</p>
            <p class="message-content">Jai Hind ! Jai Maharashtra !</p>

            <p class="message-content fw-bold m-0">Shri. Jai Jeet Singh (IPS),</p>
            <p class="message-content">Director General - Anti-Corruption Bureau, Maharashtra State</p>
        </div>
    </div>
</div>
<!-- DM's Message Ends -->

<!-- Live Stats Section -->
<div class="stats container wrapper">
    <h5 class="mb-3 fw-bold">Live statistics outside of Jan 2024</h5>
    <div class="stats-section row" id="counter-stats">
        <div class="col-md-12 d-flex justify-content-between">

            <div class="card wow animate__animated animate__fadeIn" data-wow-delay="0s" style="width: 231px;">
                <div class="card-body stats">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="{{ asset('frontend/images/trap-icon.svg') }}" alt="trap-icon">
                        <h1 class="card-title m-0 ms-3 counting" data-count="17">0</h1>
                    </div>
                    <p class="card-text">Trap</p>
                </div>
            </div>

            <div class="card wow animate__animated animate__fadeIn" data-wow-delay="50ms" style="width: 231px;">
                <div class="card-body">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="{{ asset('frontend/images/recovery-icon.svg') }}" alt="trap-icon">
                        <h1 class="card-title m-0 ms-3 counting" data-count="2">0</h1>
                    </div>
                    <p class="card-text">Recovery</p>
                </div>
            </div>

            <div class="card wow animate__animated animate__fadeIn" data-wow-delay="65ms" style="width: 231px;">
                <div class="card-body">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="{{ asset('frontend/images/no-corruption-icon.svg') }}" alt="trap-icon">
                        <h1 class="card-title m-0 ms-3 counting" data-count="0">0</h1>
                    </div>
                    <p class="card-text">Any Other Corruption</p>
                </div>
            </div>

            <div class="card wow animate__animated animate__fadeIn" data-wow-delay="80ms" style="width: 231px;">
                <div class="card-body">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="{{ asset('frontend/images/suspended-icon.svg') }}" alt="trap-icon">
                        <h1 class="card-title m-0 ms-3 counting" data-count="0">0</h1>
                    </div>
                    <p class="card-text">Suspended Concerns</p>
                </div>
            </div>

            <div class="card last-card wow animate__animated animate__fadeIn" data-wow-delay="95ms" style="width: 231px;">
                <div class="card-body">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="{{ asset('frontend/images/decrease-icon.svg') }}" alt="trap-icon">
                        <h1 class="card-title m-0 ms-3 counting" data-count="20">0</h1><span style="font-size: 24px; font-weight: bold; color: var(--primary-color);">%</span>
                    </div>
                    <p class="card-text">Decrease In Cases</p>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Live Stats Ends -->

<!-- ACB Head Office Ranges & Units Section -->
<div class="container head-office-section wrapper" id="head_office">
    <h5 class="mb-3 fw-bold">ACB Head Office Ranges & Units</h5>
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card wow animate__animated animate__fadeIn">
                <div class="overlay"></div>
                <div class="card-body">
                    <h3 class="text-white large"><b>Mumbai</b></h3>
                    <ul>
                        <li class="lh-lg">Navi Mumbai</li>
                        <li class="lh-lg">Palghar</li>
                        <li class="lh-lg">Ratnagiri</li>
                        <li class="lh-lg">Raigad</li>
                        <li class="lh-lg">Sindhudurg</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card wow animate__animated animate__fadeIn" data-wow-delay="0s">
                <div class="overlay"></div>
                <div class="card-body">
                    <h3 class="text-white large"><b>Thane</b></h3>
                    <ul>
                        <li class="lh-lg">Navi Mumbai</li>
                        <li class="lh-lg">Palghar</li>
                        <li class="lh-lg">Ratnagiri</li>
                        <li class="lh-lg">Raigad</li>
                        <li class="lh-lg">Sindhudurg</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card wow animate__animated animate__fadeIn" data-wow-delay="40ms">
                <div class="overlay"></div>
                <div class="card-body">
                    <h3 class="text-white large"><b>Pune</b></h3>
                    <ul>
                        <li class="lh-lg">Navi Mumbai</li>
                        <li class="lh-lg">Palghar</li>
                        <li class="lh-lg">Ratnagiri</li>
                        <li class="lh-lg">Raigad</li>
                        <li class="lh-lg">Sindhudurg</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card wow animate__animated animate__fadeIn" data-wow-delay="80ms">
                <div class="overlay"></div>
                <div class="card-body">
                    <h3 class="text-white large"><b>Nashik</b></h3>
                    <ul>
                        <li class="lh-lg">Navi Mumbai</li>
                        <li class="lh-lg">Palghar</li>
                        <li class="lh-lg">Ratnagiri</li>
                        <li class="lh-lg">Raigad</li>
                        <li class="lh-lg">Sindhudurg</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-md-3 mb-4">
            <div class="card wow animate__animated animate__fadeIn" data-wow-delay="120ms">
                <div class="overlay"></div>
                <div class="card-body">
                    <h3 class="text-white large"><b>Amravati</b></h3>
                    <ul>
                        <li class="lh-lg">Navi Mumbai</li>
                        <li class="lh-lg">Palghar</li>
                        <li class="lh-lg">Ratnagiri</li>
                        <li class="lh-lg">Raigad</li>
                        <li class="lh-lg">Sindhudurg</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card wow animate__animated animate__fadeIn" data-wow-delay="160ms">
                <div class="overlay"></div>
                <div class="card-body">
                    <h3 class="text-white large"><b>Aurangabad</b></h3>
                    <ul>
                        <li class="lh-lg">Navi Mumbai</li>
                        <li class="lh-lg">Palghar</li>
                        <li class="lh-lg">Ratnagiri</li>
                        <li class="lh-lg">Raigad</li>
                        <li class="lh-lg">Sindhudurg</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card wow animate__animated animate__fadeIn" data-wow-delay="100ms">
                <div class="overlay"></div>
                <div class="card-body">
                    <h3 class="text-white large"><b>Nanded</b></h3>
                    <ul>
                        <li class="lh-lg">Navi Mumbai</li>
                        <li class="lh-lg">Palghar</li>
                        <li class="lh-lg">Ratnagiri</li>
                        <li class="lh-lg">Raigad</li>
                        <li class="lh-lg">Sindhudurg</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card wow animate__animated animate__fadeIn" data-wow-delay="120ms">
                <div class="overlay"></div>
                <div class="card-body">
                    <h3 class="text-white large"><b>Nagpur</b></h3>
                    <ul>
                        <li class="lh-lg">Navi Mumbai</li>
                        <li class="lh-lg">Palghar</li>
                        <li class="lh-lg">Ratnagiri</li>
                        <li class="lh-lg">Raigad</li>
                        <li class="lh-lg">Sindhudurg</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ACB Head Office Ranges & Units ends-->


<!-- Brand & Partner Section -->

<div class="container">
    <div class="owl-carousel owl-theme">

        <div class="item">
            <img class="wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/Make In India.svg') }}" alt="AmritMahotsav" srcset="">
        </div>
        <div class="item">
            <img class=" wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/Maharashtra Police.svg') }}" alt="AmritMahotsav" srcset="">
        </div>
        <div class="item">
            <img class=" wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/Cbi.svg') }}" alt="AmritMahotsav" srcset="">
        </div>
        <div class="item">
            <img class=" wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/Swacch-Bharat.svg') }}" alt="AmritMahotsav" srcset="">
        </div>
        <div class="item">
            <img class=" wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/Digital-India.svg') }}" alt="AmritMahotsav" srcset="">
        </div>
        <div class="item">
            <img class=" wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/NIC_logo.svg') }}" alt="AmritMahotsav" srcset="">
        </div>
        <div class="item">
            <img class=" wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/Ministry-of-Minority-Affairs.svg') }}" alt="AmritMahotsav" srcset="">
        </div>
        <div class="item">
            <img class=" wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/Ministry_of_Electronics_and_Information_Technology.svg') }}" alt="AmritMahotsav" srcset="">
        </div>
        <div class="item">
            <img class=" wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/PMO_India_Logo.svg') }}" alt="AmritMahotsav" srcset="">
        </div>
        <div class="item">
            <img class=" wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/Mygov.svg') }}" alt="AmritMahotsav" srcset="">
        </div>
        <div class="item">
            <img class=" wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/Indiagovin.svg') }}" alt="AmritMahotsav" srcset="">
        </div>
        <div class="item">
            <img class=" wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/swatantra amrut mahotsav.svg') }}" alt="AmritMahotsav" srcset="">
        </div>
        <div class="item">
            <img class=" wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/Bureau Of Police Research and Development.svg') }}" alt="AmritMahotsav" srcset="">
        </div>
        <div class="item">
            <img class=" wow animate__animated animate__fadeIn" src="{{ asset('frontend/images/Govt. Of Maharashtra.svg') }}" alt="AmritMahotsav" srcset="">
        </div>

    </div>
</div>
<!-- Brand and partner section ends -->
@endsection