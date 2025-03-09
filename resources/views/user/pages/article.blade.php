@extends('user.layouts.app')

@section('title', 'Article')

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
                        <li class="color-text-red"><a href="/" class="color-text-red">Home</a></li>
                        <li class="">Our Articles</li>
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
                            <a href="{{ route('adetail')}}"><img src="{{ asset ('template/assets/img/blog/secret1 (2).jpg') }}"
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
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="{{ asset ('template/assets/img/blog/secret1 (1).jpg') }}"
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
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="{{ asset ('template/assets/img/blog/secret1 (4).jpg') }}"
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
                                        <a href="blog-details.html"><img src="{{ asset ('template/assets/img/blog/secret1 (3).jpg') }}"
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
                                        <a href="blog-details.html"><img src="{{ asset ('template/assets/img/blog/secret1 (1).jpg') }}"
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
                                        <a href="blog-details.html"><img src="{{ asset ('template/assets/img/blog/secret1 (2).jpg') }}"
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
                                    <img src="{{ asset ('template/assets/img/gallery/ig-1.jpeg') }}" alt="Gallery Image" class="w-100">
                                    <a href="{{ asset ('template/assets/img/gallery/ig-1.jpeg') }}" class="popup-image gal-btn"><i
                                            class="fal fa-plus"></i></a>
                                </div>
                                <div class="gallery-thumb">
                                    <img src="{{ asset ('template/assets/img/gallery/ig-2.jpeg') }}" alt="Gallery Image" class="w-100">
                                    <a href="{{ asset ('template/assets/img/gallery/ig-2.jpeg') }}" class="popup-image gal-btn"><i
                                            class="fal fa-plus"></i></a>
                                </div>
                                <div class="gallery-thumb">
                                    <img src="{{ asset ('template/assets/img/gallery/ig-3.jpeg') }}" alt="Gallery Image" class="w-100">
                                    <a href="{{ asset ('template/assets/img/gallery/ig-3.jpeg') }}" class="popup-image gal-btn"><i
                                            class="fal fa-plus"></i></a>
                                </div>
                                <div class="gallery-thumb">
                                    <img src="{{ asset ('template/assets/img/gallery/ig-4.jpeg') }}" alt="Gallery Image" class="w-100">
                                    <a href="{{ asset ('template/assets/img/gallery/ig-4.jpeg') }}" class="popup-image gal-btn"><i
                                            class="fal fa-plus"></i></a>
                                </div>
                                <div class="gallery-thumb">
                                    <img src="{{ asset ('template/assets/img/gallery/ig-5.jpeg') }}" alt="Gallery Image" class="w-100">
                                    <a href="{{ asset ('template/assets/img/gallery/ig-5.jpeg') }}" class="popup-image gal-btn"><i
                                            class="fal fa-plus"></i></a>
                                </div>
                                <div class="gallery-thumb">
                                    <img src="{{ asset ('template/assets/img/gallery/ig-6.jpeg') }}" alt="Gallery Image" class="w-100">
                                    <a href="{{ asset ('template/assets/img/gallery/ig-6.jpeg') }}" class="popup-image gal-btn"><i
                                            class="fal fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="widget  ">
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
                        </div> -->
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
    </section>

@endsection

@push('script')
@endpush

