@extends('user.layouts.app')

@section('title', 'About Us')

@push('style')
@endpush

@section('main')

    <section class="vs-hero-wrapper atas">
        <div class="text-center py-3">
            <h1 class="mb-0">About Us</h1>
            <p class="mb-0">Building a Brighter Future Through Play</p>
        </div>
        <div class="vs-wave-shape style3" style="background-color: #FFC6D3;">
            <svg viewBox="0 0 1920 295" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="wave-path atas" fill-rule="evenodd" clip-rule="evenodd"
                    d="M1920 295V202.758C1906.48 131.342 1843.63 77.168 1768.34 77.168C1739.37 77.168 1711.54 85.1814 1687.4 100.128C1650.68 38.4074 1584.56 0 1511.11 0C1412.1 0 1329.2 70.2842 1309.68 163.577C1294.03 136.928 1265.08 119 1232 119C1215.11 119 1198.88 123.673 1184.8 132.389C1163.39 96.397 1124.83 74 1082 74C1022.17 74 972.422 118.018 963.444 175.369C947.459 160.855 926.246 152 903 152C886.11 152 869.88 156.673 855.803 165.389C834.387 129.397 795.832 107 753 107C710.158 107 672.487 129.569 651.251 163.442C635.542 150.075 615.199 142 593 142C576.11 142 559.88 146.673 545.803 155.389C524.387 119.397 485.832 97 443 97C400.012 97 362.23 119.723 341.034 153.789C324.552 132.631 298.841 119 270 119C253.11 119 236.88 123.673 222.803 132.389C201.387 96.397 162.832 74 120 74C53.8333 74 0.000244141 127.833 0.000244141 194C0.000244141 194.41 0.000244141 194.835 0.0152435 195.245L0.000244141 195.248V295H1920Z" />
            </svg>
        </div>
    </section>

    <!--==============================
    About Area
    ==============================-->
    <section class=" space-top space-extra-bottom" style="padding-top: 50px !important;">
        <div class="container">
            <div class="row gx-70 justify-content-center justify-content-xl-start">
                <div class="text-center text-xl-start col-lg-9 col-xl-8 col-xxl-9">
                    <div class="title-area">
                        <span class="sec-subtitle">part of the family since 2011,</span>
                        <h2 class="sec-title">Provide a diverse range of safe and high-quality toys.</h2>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-6 col-xxl-auto mb-md-3 mb-xl-0">
                    <div class="img-box5">
                        <svg class="svg-hidden">
                            <clipPath id="ab-shape1" clipPathUnits="objectBoundingBox">
                                <path
                                    d="M0.464,0.006 C0.488,0,0.513,0,0.536,0.006 L0.7,0.046 C0.723,0.052,0.745,0.063,0.764,0.08 L0.89,0.192 C0.908,0.208,0.922,0.229,0.931,0.252 L0.99,0.41 C0.999,0.433,1,0.458,0.999,0.482 L0.979,0.65 C0.976,0.674,0.967,0.698,0.953,0.718 L0.858,0.857 C0.844,0.877,0.825,0.894,0.803,0.905 L0.655,0.984 C0.633,0.995,0.609,1,0.584,1 H0.416 C0.392,1,0.368,0.995,0.346,0.984 L0.197,0.905 C0.175,0.894,0.157,0.877,0.143,0.857 L0.047,0.718 C0.033,0.698,0.025,0.674,0.022,0.65 L0.001,0.482 C-0.002,0.458,0.001,0.433,0.01,0.41 L0.07,0.252 C0.078,0.229,0.092,0.208,0.111,0.192 L0.237,0.08 C0.255,0.063,0.277,0.052,0.301,0.046 L0.464,0.006">
                                </path>
                            </clipPath>
                        </svg>
                        <div class="img-1 mega-hover"><img src="{{ asset('template/assets/img/about/about.png') }}" alt="about"></div>
                        <div class="exp-pill">
                            <p class="exp-number">100%</p>
                            <p class="exp-text">A+ Results</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-xxl-6 text-center text-xl-start">
                    <p class="fs-sm pe-xxl-4 me-xxl-4 mb-4 pb-1 mt-n2">Since its founding in 2015, EMCO Toys has been dedicated to spreading joy through toys. Starting as a small family-owned store, we’ve grown into a trusted destination for parents seeking high-quality, safe, and fun toys for their children.</p>

                    <div class="row items">
                        <div class="col-md-6">
                            <div class="feature-style1">
                                <div class="feature-icon"><img src="{{ asset('template/assets/img/icon/service1.svg') }}" alt="icon"></div>
                                <h3 class="feature-title h5">Premium Quality</h3>
                                <p class="feature-text">All toys are crafted with attention to detail and meet safety standards.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-style1">
                                <div class="feature-icon"><img src="{{ asset ('template/assets/img/icon/service2.svg') }}" alt="icon"></div>
                                <h3 class="feature-title h5">Wide Variety</h3>
                                <p class="feature-text">We offer toys for all ages, from toddlers to teens.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row items">
                        <div class="col-md-6">
                            <div class="feature-style1">
                                <div class="feature-icon"><img src="{{ asset('template/assets/img/icon/service4.svg') }}" alt="icon"></div>
                                <h3 class="feature-title h5">Affordable Prices</h3>
                                <p class="feature-text">Fun doesn’t have to be expensive—great toys at great prices.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-style1">
                                <div class="feature-icon" style="color: #C8272C;"><img src="{{ asset ('template/assets/img/icon/service5.svg') }}" alt="icon"></div>
                                <h3 class="feature-title h5">Customer Satisfaction</h3>
                                <p class="feature-text">Our friendly team is always ready to help you find the perfect toy.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Wave Shape -->
    <div class="vs-wave-shape style3">
        <svg viewBox="0 0 1920 295" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="wave-path" fill-rule="evenodd" clip-rule="evenodd"
                d="M1920 295V202.758C1906.48 131.342 1843.63 77.168 1768.34 77.168C1739.37 77.168 1711.54 85.1814 1687.4 100.128C1650.68 38.4074 1584.56 0 1511.11 0C1412.1 0 1329.2 70.2842 1309.68 163.577C1294.03 136.928 1265.08 119 1232 119C1215.11 119 1198.88 123.673 1184.8 132.389C1163.39 96.397 1124.83 74 1082 74C1022.17 74 972.422 118.018 963.444 175.369C947.459 160.855 926.246 152 903 152C886.11 152 869.88 156.673 855.803 165.389C834.387 129.397 795.832 107 753 107C710.158 107 672.487 129.569 651.251 163.442C635.542 150.075 615.199 142 593 142C576.11 142 559.88 146.673 545.803 155.389C524.387 119.397 485.832 97 443 97C400.012 97 362.23 119.723 341.034 153.789C324.552 132.631 298.841 119 270 119C253.11 119 236.88 123.673 222.803 132.389C201.387 96.397 162.832 74 120 74C53.8333 74 0.000244141 127.833 0.000244141 194C0.000244141 194.41 0.000244141 194.835 0.0152435 195.245L0.000244141 195.248V295H1920Z" />
        </svg>
    </div>

    <!--==============================
    Why Choose Us
    ==============================-->
    <section class="bg-smoke space-extra-bottom">
        <div class="container">
            <div class="row text-center text-lg-start">
                <div class="col-lg-5 col-xl-6 mb-n4 mb-lg-0">
                    <div class="title-area">
                        <span class="sec-subtitle text-black">Why Choose Us</span>
                        <h2 class="sec-title text-red">Our Core Values</h2>
                    </div>
                </div>
            </div>
            <div class="row gx-0 mt-4 pt-2">
                <div class="col-md-6 col-xl-3">
                    <div class="feature-style2">
                        <div class="feature-img">
                            <div class="vs-circle"></div>
                            <img src="{{ asset ('template/assets/img/choose/choose-1-1.png.png') }}" alt="image">
                        </div>
                        <h3 class="feature-title h5"><a href="service-details.html" class="text-black">Inspiring Creativity</a></h3>
                        <p class="feature-text">Sparking imagination and creativity in every child.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="feature-style2">
                        <div class="feature-img">
                            <div class="vs-circle"></div>
                            <img src="{{ asset ('template/assets/img/choose/choose-1-2.png.png') }}" alt="image">
                        </div>
                        <h3 class="feature-title h5"><a href="service-details.html" class="text-black">Quality Products</a></h3>
                        <p class="feature-text">Providing safe, high-quality, and educational toys.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="feature-style2">
                        <div class="feature-img">
                            <div class="vs-circle"></div>
                            <img src="{{ asset ('template/assets/img/choose/choose-1-3.png.png') }}" alt="image">
                        </div>
                        <h3 class="feature-title h5"><a href="service-details.html" class="text-black">Family
                                Bonding</a></h3>
                        <p class="feature-text">Creating joyful moments to strengthen family connections.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="feature-style2">
                        <div class="feature-img">
                            <div class="vs-circle"></div>
                            <img src="{{ asset('template/assets/img/choose/choose-1-4.png.png') }}" alt="image">
                        </div>
                        <h3 class="feature-title h5"><a href="service-details.html" class="text-black">Innovative Experiences</a></h3>
                        <p class="feature-text">Supporting growth through innovative play solutions.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Wave Shape -->
    <div class="vs-wave-shape style3" style="transform: rotate(180deg);">
        <svg viewBox="0 0 1920 295" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="wave-path" fill-rule="evenodd" clip-rule="evenodd"
                d="M1920 295V202.758C1906.48 131.342 1843.63 77.168 1768.34 77.168C1739.37 77.168 1711.54 85.1814 1687.4 100.128C1650.68 38.4074 1584.56 0 1511.11 0C1412.1 0 1329.2 70.2842 1309.68 163.577C1294.03 136.928 1265.08 119 1232 119C1215.11 119 1198.88 123.673 1184.8 132.389C1163.39 96.397 1124.83 74 1082 74C1022.17 74 972.422 118.018 963.444 175.369C947.459 160.855 926.246 152 903 152C886.11 152 869.88 156.673 855.803 165.389C834.387 129.397 795.832 107 753 107C710.158 107 672.487 129.569 651.251 163.442C635.542 150.075 615.199 142 593 142C576.11 142 559.88 146.673 545.803 155.389C524.387 119.397 485.832 97 443 97C400.012 97 362.23 119.723 341.034 153.789C324.552 132.631 298.841 119 270 119C253.11 119 236.88 123.673 222.803 132.389C201.387 96.397 162.832 74 120 74C53.8333 74 0.000244141 127.833 0.000244141 194C0.000244141 194.41 0.000244141 194.835 0.0152435 195.245L0.000244141 195.248V295H1920Z" />
        </svg>
    </div>

    <section class="  ">
        <div class="container">
            <div class="title-area text-center">
                <div class="sec-bubble">
                    <div class="bubble"></div>
                    <div class="bubble"></div>
                    <div class="bubble"></div>
                </div>
                <h2 class="sec-title" style="color: #C8272C;">Milestone & Achivement</h2>
                <p class="sec-text">What type of education is best for my child</p>
            </div>
            <div class="row gx-40 vs-carousel" data-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2"
                data-xs-slide-show="2" data-dots="true">
                <div class="col-xl-4">
                    <div class="category-style2">
                        <div class="category-img"><a href="class-details.html"><img
                                    src="{{ asset('template/assets/img/category/cat-1-1.jpg.png') }}" alt="category"></a></div>
                        <div class="category-content">

                            <p class="category-text">Certified for child-safe products in 2015.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="category-style2">
                        <div class="category-img"><a href="class-details.html"><img
                                    src="{{ asset('template/assets/img/category/cat-1-2.jpg.png') }}" alt="category"></a></div>
                        <div class="category-content">

                            <p class="category-text">Top 10 Innovative Toy Brand in Asia, 2019.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="category-style2">
                        <div class="category-img"><a href="class-details.html"><img
                                    src="{{ asset('template/assets/img/category/cat-1-3.jpg.png') }}" alt="category"></a></div>
                        <div class="category-content">
                            <p class="category-text">Partnered with global retailers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row my-3"></div>

     <!-- Wave Shape -->
    <div class="vs-wave-shape style3">
        <svg viewBox="0 0 1920 295" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="wave-path" fill-rule="evenodd" clip-rule="evenodd"
                d="M1920 295V202.758C1906.48 131.342 1843.63 77.168 1768.34 77.168C1739.37 77.168 1711.54 85.1814 1687.4 100.128C1650.68 38.4074 1584.56 0 1511.11 0C1412.1 0 1329.2 70.2842 1309.68 163.577C1294.03 136.928 1265.08 119 1232 119C1215.11 119 1198.88 123.673 1184.8 132.389C1163.39 96.397 1124.83 74 1082 74C1022.17 74 972.422 118.018 963.444 175.369C947.459 160.855 926.246 152 903 152C886.11 152 869.88 156.673 855.803 165.389C834.387 129.397 795.832 107 753 107C710.158 107 672.487 129.569 651.251 163.442C635.542 150.075 615.199 142 593 142C576.11 142 559.88 146.673 545.803 155.389C524.387 119.397 485.832 97 443 97C400.012 97 362.23 119.723 341.034 153.789C324.552 132.631 298.841 119 270 119C253.11 119 236.88 123.673 222.803 132.389C201.387 96.397 162.832 74 120 74C53.8333 74 0.000244141 127.833 0.000244141 194C0.000244141 194.41 0.000244141 194.835 0.0152435 195.245L0.000244141 195.248V295H1920Z" />
        </svg>
    </div>

    <!--==============================
    Contact Area
    ==============================-->
    <section class=" bg-smoke " data-bg-src="{{ asset ('template/assets/img/bg/bg-con-1-1.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-auto col-xxl-6">
                    <div class="img-box6">
                        <div class="img-1 mega-hover"><img src="{{ asset ('template/assets/img/about/children-1.png') }}" alt="image"></div>
                        <div class="img-2 mega-hover"><img src="{{ asset ('template/assets/img/about/children-2.png') }}" alt="image"></div>
                    </div>
                </div>
                <div class="col-xl col-xxl-6 align-self-center">
                    <h2 class="sec-title mb-3">We’d Love to Hear From You!</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="list-style1">
                                <ul class="list-unstyled mb-0">
                                    <li>Have questions about our products?</li>
                                    <li>Interested in partnering with us?</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="list-style1">
                                <ul class="list-unstyled">
                                    <li>Need assistance with your orders?</li>
                                    <li>Let us know how we can help!</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('sendContact') }}" method="POST" class="form-style3">
                        @csrf
                        <div class="row justify-content-between">
                            <div class="col-md-6 form-group">
                                <label>Subject <span class="required">(Required)</span></label>
                                <input type="text" name="subject" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Your Name <span class="required">(Required)</span></label>
                                <input type="text" name="name" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Email Address <span class="required">(Required)</span></label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Phone No</label>
                                <input type="number" name="phone">
                            </div>
                            <div class="col-l-6 form-group">
                                <label>Messege</label>
                                <textarea type="text" name="message" required></textarea>
                            </div>
                            <div class="col-auto align-self-center form-group">
                                <input type="checkbox" id="notice" name="notice">
                                <label for="notice">Notify Your child weekly progress</label>
                            </div>
                            <div class="col-auto form-group">
                                <button class="vs-btn" type="submit">Send Messege</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
    Brand
    ==============================-->
    <section class=" space-extra bg-smoke">
        <div class="container">
            <div class="title-area">
                <h2 class="text-center mt-n2">Key supporters</h2>
            </div>
            <div class="row vs-carousel gx-10" data-slide-show="5" data-ml-slide-show="4" data-lg-slide-show="3"
                data-md-slide-show="2" data-sm-slide-show="2">
                <div class="col-auto">
                    <div class="brand-style1"><img src="{{ asset("template/assets/img/brand/b-1-1.png.png") }}" alt="brand"></div>
                </div>
                <div class="col-auto">
                    <div class="brand-style1"><img src="{{ asset("template/assets/img/brand/b-1-2.png.png") }}" alt="brand"></div>
                </div>
                <div class="col-auto">
                    <div class="brand-style1"><img src="{{ asset("template/assets/img/brand/b-1-3.png.png") }}" alt="brand"></div>
                </div>
                <div class="col-auto">
                    <div class="brand-style1"><img src="{{ asset("template/assets/img/brand/b-1-4.png.png") }}" alt="brand"></div>
                </div>
                <div class="col-auto">
                    <div class="brand-style1"><img src="{{ asset("template/assets/img/brand/b-1-5.png.png") }}" alt="brand"></div>
                </div>
                <div class="col-auto">
                    <div class="brand-style1"><img src="{{ asset("template/assets/img/brand/b-1-6.png.png") }}" alt="brand"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Wave Shape -->
    <div class="vs-wave-shape style2 bg-smoke">
        <svg viewBox="0 0 1920 295" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="wave-path" fill-rule="evenodd" clip-rule="evenodd"
                d="M1920 295V202.758C1906.48 131.342 1843.63 77.168 1768.34 77.168C1739.37 77.168 1711.54 85.1814 1687.4 100.128C1650.68 38.4074 1584.56 0 1511.11 0C1412.1 0 1329.2 70.2842 1309.68 163.577C1294.03 136.928 1265.08 119 1232 119C1215.11 119 1198.88 123.673 1184.8 132.389C1163.39 96.397 1124.83 74 1082 74C1022.17 74 972.422 118.018 963.444 175.369C947.459 160.855 926.246 152 903 152C886.11 152 869.88 156.673 855.803 165.389C834.387 129.397 795.832 107 753 107C710.158 107 672.487 129.569 651.251 163.442C635.542 150.075 615.199 142 593 142C576.11 142 559.88 146.673 545.803 155.389C524.387 119.397 485.832 97 443 97C400.012 97 362.23 119.723 341.034 153.789C324.552 132.631 298.841 119 270 119C253.11 119 236.88 123.673 222.803 132.389C201.387 96.397 162.832 74 120 74C53.8333 74 0.000244141 127.833 0.000244141 194C0.000244141 194.41 0.000244141 194.835 0.0152435 195.245L0.000244141 195.248V295H1920Z" />
        </svg>
    </div>


    <!--==============================
    Instagram Posts
    ==============================-->
    <section class=" space-bottom">
        <div class="container">
            <div class="title-area text-center">
                <h2 class="sec-title below">Follow Our Instagram <span class="required">@emcotoys</span></h2>
            </div>
            <div class="row vs-carousel" data-slide-show="6" data-lg-slide-show="5" data-md-slide-show="4"
                data-sm-slide-show="3" data-xs-slide-show="2">

                @for ($i = 1; $i <= 6; $i++)
                    <div class="col-auto">
                        <div class="gallery-style1">
                            <div class="gallery-img">
                                <img src="{{ asset("template/assets/img/gallery/ig-$i.jpeg") }}" alt="gallery">
                                <a href="{{ asset("template/assets/img/gallery/ig-$i.jpeg") }}" class="gallery-btn popup-image">
                                    <i class="far fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endfor

            </div>
        </div>
    </section>





@endsection

@push('script')
@endpush
