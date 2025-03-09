@extends('user.layouts.app')

@section('title', 'Home')

@push('style')
@endpush

@section('main')
    <!--==============================
        Breadcumb
    ============================== -->
    <div class="breadcumb-wrapper " data-bg-src="{{ asset ('template/assets/img/blog/family.jpg') }}">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Our Articles</h1>
                <p class="breadcumb-text">Montessori Is A Nurturing And Holistic Approach To Learning</p>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li>Our Articles</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
    Blog Area
    ==============================-->
    <section class="vs-blog-wrapper space-top space-extra-bottom">
        <div class="container">
            <div class="row gx-40">
                <div class="col-lg-8">
                    <div class="vs-blog blog-single has-post-thumbnail">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="{{ asset ('template/assets/img/blog/blog-single-1-1.jpg') }}"
                                    alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="far fa-calendar-alt"></i>December 3, 2022</a>
                                <span><i class="far fa-comment-alt-dots"></i>15</span>
                            </div>
                            <h2 class="blog-title"><a href="blog-details.html">A very warm welcome to our new
                                    Treasurer</a></h2>
                            <p class="blog-text">Lorem ipsum dolor sit amet, consectetur adipisc ing elit, sed do
                                eiusmod tempor incididunt ut la bore et dolore magna aliqua Lorem ipsum dolor sit amet,
                                consectetur adipisc ing elit, sed do eiusmod tempor incididunt ut la bore et dolore
                                magna aliqua.</p>
                            <a href="blog-details.html" class="vs-btn style2">Read More</a>
                        </div>
                    </div>
                    <div class="vs-blog blog-single has-post-thumbnail">
                        <div class="blog-img vs-carousel" data-arrows="true" data-slide-show="1" data-fade="true">
                            <a href="blog-details.html"><img src="{{ asset ('template/assets/img/blog/blog-single-1-2.jpg') }}"
                                    alt="Blog Image"></a>
                            <a href="blog-details.html"><img src="{{ asset ('template/assets/img/blog/blog-single-1-3.jpg') }}"
                                    alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="far fa-calendar-alt"></i>December 3, 2022</a>
                                <span><i class="far fa-comment-alt-dots"></i>15</span>
                            </div>
                            <h2 class="blog-title"><a href="blog-details.html">A very warm welcome to our new
                                    Treasurer</a></h2>
                            <p class="blog-text">Lorem ipsum dolor sit amet, consectetur adipisc ing elit, sed do
                                eiusmod tempor incididunt ut la bore et dolore magna aliqua Lorem ipsum dolor sit amet,
                                consectetur adipisc ing elit, sed do eiusmod tempor incididunt ut la bore et dolore
                                magna aliqua.</p>
                            <a href="blog-details.html" class="vs-btn style2">Read More</a>
                        </div>
                    </div>
                    <div class="vs-blog blog-single">
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="far fa-calendar-alt"></i>December 3, 2022</a>
                                <span><i class="far fa-comment-alt-dots"></i>15</span>
                            </div>
                            <h2 class="blog-title"><a href="blog-details.html">A very warm welcome to our new
                                    Treasurer</a></h2>
                            <p class="blog-text">Lorem ipsum dolor sit amet, consectetur adipisc ing elit, sed do
                                eiusmod tempor incididunt ut la bore et dolore magna aliqua Lorem ipsum dolor sit amet,
                                consectetur adipisc ing elit, sed do eiusmod tempor incididunt ut la bore et dolore
                                magna aliqua.</p>
                            <a href="blog-details.html" class="vs-btn style2">Read More</a>
                        </div>
                    </div>
                    <div class="vs-blog blog-single has-post-thumbnail">
                        <div class="blog-img">
                            <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video"><i
                                    class="fas fa-play"></i></a>
                            <a href="blog-details.html"><img src="{{ asset ('template/assets/img/blog/blog-single-1-4.jpg') }}"
                                    alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="far fa-calendar-alt"></i>December 3, 2022</a>
                                <span><i class="far fa-comment-alt-dots"></i>15</span>
                            </div>
                            <h2 class="blog-title"><a href="blog-details.html">A very warm welcome to our new
                                    Treasurer</a></h2>
                            <p class="blog-text">Lorem ipsum dolor sit amet, consectetur adipisc ing elit, sed do
                                eiusmod tempor incididunt ut la bore et dolore magna aliqua Lorem ipsum dolor sit amet,
                                consectetur adipisc ing elit, sed do eiusmod tempor incididunt ut la bore et dolore
                                magna aliqua.</p>
                            <a href="blog-details.html" class="vs-btn style2">Read More</a>
                        </div>
                    </div>
                    <div class="vs-blog blog-single has-post-thumbnail">
                        <div class="blog-audio">
                            <iframe title="Tell Me U Luv Me (with Trippie Redd) by Juice WRLD" width="751" height="200"
                                src="https://w.soundcloud.com/player/?visual=true&amp;url=https%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F830279092&amp;show_artwork=true&amp;maxwidth=751&amp;maxheight=1000&amp;dnt=1"></iframe>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="far fa-calendar-alt"></i>December 3, 2022</a>
                                <span><i class="far fa-comment-alt-dots"></i>15</span>
                            </div>
                            <h2 class="blog-title"><a href="blog-details.html">A very warm welcome to our new
                                    Treasurer</a></h2>
                            <p class="blog-text">Lorem ipsum dolor sit amet, consectetur adipisc ing elit, sed do
                                eiusmod tempor incididunt ut la bore et dolore magna aliqua Lorem ipsum dolor sit amet,
                                consectetur adipisc ing elit, sed do eiusmod tempor incididunt ut la bore et dolore
                                magna aliqua.</p>
                            <a href="blog-details.html" class="vs-btn style2">Read More</a>
                        </div>
                    </div>
                    <div class="vs-pagination  ">
                        <a href="#" class="pagi-btn">Prev</a>
                        <ul>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">12</a></li>
                        </ul>
                        <a href="#" class="pagi-btn">next</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_search   ">
                            <h3 class="widget_title">Search</h3>
                            <form class="search-form">
                                <input type="text" placeholder="Search Here">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget  ">
                            <h3 class="widget_title">Latest News</h3>
                            <div class="recent-post-wrap">
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-1.jpg"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <div class="recent-post-meta">
                                            <a href="blog.html"><i class="far fa-calendar-alt"></i>December 3, 2022</a>
                                        </div>
                                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">A very
                                                warm welcome to our new Treasurer</a></h4>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-2.jpg"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <div class="recent-post-meta">
                                            <a href="blog.html"><i class="far fa-calendar-alt"></i>February 15, 2022</a>
                                        </div>
                                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">German
                                                kinder and garten mean child</a></h4>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-3.jpg"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <div class="recent-post-meta">
                                            <a href="blog.html"><i class="far fa-calendar-alt"></i>Augest 20, 2022</a>
                                        </div>
                                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">English
                                                uses term to refer to the earliest</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget widget_categories   ">
                            <h3 class="widget_title">Categories</h3>
                            <ul>
                                <li>
                                    <a href="blog.html">TODDLER</a>
                                </li>
                                <li>
                                    <a href="blog.html">PRESCHOOL</a>
                                </li>
                                <li>
                                    <a href="blog.html">KINDERGARTEN</a>
                                </li>
                                <li>
                                    <a href="blog.html">PRE-K PROGRAM</a>
                                </li>
                                <li>
                                    <a href="blog.html">AFTER SCHOOL</a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget  ">
                            <h4 class="widget_title">Photos Gallery</h4>
                            <div class="sidebar-gallery">
                                <div class="gallery-thumb">
                                    <img src="assets/img/widget/gal-1-1.jpg" alt="Gallery Image" class="w-100">
                                    <a href="assets/img/widget/gal-1-1.jpg" class="popup-image gal-btn"><i
                                            class="fal fa-plus"></i></a>
                                </div>
                                <div class="gallery-thumb">
                                    <img src="assets/img/widget/gal-1-2.jpg" alt="Gallery Image" class="w-100">
                                    <a href="assets/img/widget/gal-1-2.jpg" class="popup-image gal-btn"><i
                                            class="fal fa-plus"></i></a>
                                </div>
                                <div class="gallery-thumb">
                                    <img src="assets/img/widget/gal-1-3.jpg" alt="Gallery Image" class="w-100">
                                    <a href="assets/img/widget/gal-1-3.jpg" class="popup-image gal-btn"><i
                                            class="fal fa-plus"></i></a>
                                </div>
                                <div class="gallery-thumb">
                                    <img src="assets/img/widget/gal-1-4.jpg" alt="Gallery Image" class="w-100">
                                    <a href="assets/img/widget/gal-1-4.jpg" class="popup-image gal-btn"><i
                                            class="fal fa-plus"></i></a>
                                </div>
                                <div class="gallery-thumb">
                                    <img src="assets/img/widget/gal-1-5.jpg" alt="Gallery Image" class="w-100">
                                    <a href="assets/img/widget/gal-1-5.jpg" class="popup-image gal-btn"><i
                                            class="fal fa-plus"></i></a>
                                </div>
                                <div class="gallery-thumb">
                                    <img src="assets/img/widget/gal-1-6.jpg" alt="Gallery Image" class="w-100">
                                    <a href="assets/img/widget/gal-1-6.jpg" class="popup-image gal-btn"><i
                                            class="fal fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="widget  ">
                            <h3 class="widget_title">Video</h3>
                            <div class="vs-video-widget">
                                <div class="video-thumb mega-hover">
                                    <img src="assets/img/blog/intro-video-thumb.jpg" alt="Video Thumb" class="w-100">
                                    <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk"
                                        class="play-btn popup-video position-center"><i class="fas fa-play"></i></a>
                                </div>
                                <h4 class="video-title h5"><a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk"
                                        class="text-inherit popup-video">A very warm welcome to our new Treasurer</a>
                                </h4>
                            </div>
                        </div>
                        <div class="widget widget_tag_cloud   ">
                            <h3 class="widget_title">Upcoming Events</h3>
                            <div class="vs-event-widget">
                                <div class="recent-event">
                                    <a href="event-details.html" class="event-date"><span class="month">Dec</span>24</a>
                                    <div class="media-body">
                                        <h4 class="event-title"><a href="event-details.html"
                                                class="text-inherit">Father`s Day Sundaes & Shaving!</a></h4>
                                    </div>
                                </div>
                                <div class="recent-event">
                                    <a href="event-details.html" class="event-date"><span class="month">Dec</span>24</a>
                                    <div class="media-body">
                                        <h4 class="event-title"><a href="event-details.html"
                                                class="text-inherit">Father`s Day Sundaes & Shaving!</a></h4>
                                    </div>
                                </div>
                                <div class="recent-event">
                                    <a href="event-details.html" class="event-date"><span class="month">Dec</span>24</a>
                                    <div class="media-body">
                                        <h4 class="event-title"><a href="event-details.html"
                                                class="text-inherit">Father`s Day Sundaes & Shaving!</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget bg-vs-secondary  " data-bg-src="assets/img/bg/widget-bg-1-1.png">
                            <h4 class="mt-n2 text-white">Join together to make amazing things happen</h4>
                            <p class="mb-4 pb-1 text-white">Get all the latest information, support and guidance about
                                the cost of living with kindergarten.</p>
                            <a href="registration.html" class="vs-btn">Start Registration</a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section><!--==============================
			Footer Area
	==============================-->
    <footer class="footer-wrapper footer-layout1" data-bg-src="assets/img/bg/footer-bg-1-1.png">
        <div class="footer-top">
            <div class="container">
                <div class="row gx-60 gy-4 text-center text-lg-start justify-content-between align-items-center">
                    <div class="col-lg"><a href="index.html"><img src="assets/img/logo-2.svg" alt="logo"></a></div>
                    <div class="col-lg-auto">
                        <h3 class="h4 mb-0 text-white"><img src="assets/img/icon/check-list.svg" alt="icon"
                                class="me-2"> Enrol your child in a Session now!</h3>
                    </div>
                    <div class="col-lg-auto"><a href="contact.html" class="vs-btn">Start Registration</a></div>
                </div>
            </div>
        </div>
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-center gx-60">
                    <div class="col-lg-4">
                        <div class="widget footer-widget">
                            <div class="widget-about">
                                <h3 class="mt-n2">Giving your child the best start in life</h3>
                                <p class="map-link"><img src="assets/img/icon/map.svg" alt="svg">First Floor, 10A
                                    Chandos Street London New Town W1G 9LE</p>
                                <div class="sidebar-gallery">
                                    <div class="gallery-thumb">
                                        <img src="assets/img/widget/gal-2-1.jpg" alt="Gallery Image" class="w-100">
                                        <a href="assets/img/widget/gal-2-1.jpg" class="popup-image gal-btn"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                    <div class="gallery-thumb">
                                        <img src="assets/img/widget/gal-2-2.jpg" alt="Gallery Image" class="w-100">
                                        <a href="assets/img/widget/gal-2-2.jpg" class="popup-image gal-btn"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                    <div class="gallery-thumb">
                                        <img src="assets/img/widget/gal-2-3.jpg" alt="Gallery Image" class="w-100">
                                        <a href="assets/img/widget/gal-2-3.jpg" class="popup-image gal-btn"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Get In Touch</h3>
                            <div>
                                <p class="footer-text">Monday to Friday: <span class="time">8.30am – 02.00pm</span></p>
                                <p class="footer-text">Saturday, Sunday: <span class="time">Close</span></p>
                                <p class="footer-info"><i class="fal fa-envelope"></i>Email: <a
                                        href="mailto:user@domainname.com">user@domainname.com</a></p>
                                <p class="footer-info"><i class="fas fa-mobile-alt"></i>Phone: <a
                                        href="tel:+4402076897888">+44 (0) 207 689 7888</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="widget widget_nav_menu  footer-widget">
                            <h3 class="widget_title">Useful Services</h3>
                            <div class="menu-all-pages-container footer-menu">
                                <ul class="menu">
                                    <li><a href="#">Volunteer</a></li>
                                    <li><a href="#">Join or Renew</a></li>
                                    <li><a href="#">Advocate</a></li>
                                    <li><a href="#">Membership Options</a></li>
                                    <li><a href="#">Partner</a></li>
                                    <li><a href="#">Families Membership</a></li>
                                    <li><a href="#">Sponsor</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Advertise</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row flex-row-reverse gy-3 justify-content-between align-items-center">
                    <div class="col-lg-auto">
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <p class="copyright-text ">Copyright &copy; 2023 <a href="index.html">Kiddino</a>. All Rights
                            Reserved By <a href="https://themeforest.net/user/vecuro_themes">Vecuro</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer> 
    <a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>

@endsection

@push('script')
@endpush

