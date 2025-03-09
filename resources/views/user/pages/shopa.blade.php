
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>EMCO Toys</title>
    <meta name="author" content="Vecuro">
    <meta name="description" content="Kiddino - Children School & Kindergarten HTML Template">
    <meta name="keywords" content="Kiddino - Children School & Kindergarten HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="{{ asset ('template/assets/img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('template/assets/img/favicon.ico') }}" type="image/x-icon">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&family=Jost:wght@400;500&display=swap"
        rel="stylesheet">


    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/app.min.css"> -->
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/fontawesome.min.css') }} ">
    <!-- Layerslider -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/layerslider.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/magnific-popup.min.css') }}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/slick.min.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/shop.css') }}">
</head>

<body>


    <!--[if lte IE 9]>
    	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->



    <!--********************************
   		Code Start From Here
	******************************** -->




    <!--==============================
     Preloader
    ==============================-->
    {{-- <div class="preloader  ">
        <button class="vs-btn preloaderCls">Cancel Preloader </button>
        <div class="preloader-inner">
            <div class="loader"></div>
        </div>
    </div> --}}
    <!--==============================
    Mobile Menu
    ============================== -->
    <!-- <div class="vs-menu-wrapper">
        <div class="vs-menu-area text-center">
            <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="{{ url('/') }}"><img src="{{ asset('template/assets/img/logo.svg') }}" alt="Kiddino"></a>
            </div>
            <div class="vs-mobile-menu">
                <ul>
                    <li class="menu-item-has-children">
                        <a href="index.html">Demo</a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Demo Style 1</a></li>
                            <li><a href="index-2.html">Demo Style 2</a></li>
                            <li><a href="index-3.html">Demo Style 3</a></li>
                            <li><a href="index-4.html">Demo Style 4</a></li>
                            <li><a href="index-5.html">Demo Style 5</a></li>
                            <li><a href="index-6.html">Demo Style 6</a></li>
                            <li><a href="index-7.html">Demo Style 7</a></li>
                            <li><a href="index-8.html">Demo Style 8</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="about.html">About Us</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="class.html">Classes</a>
                        <ul class="sub-menu">
                            <li><a href="class.html">Class Style 1</a></li>
                            <li><a href="class-2.html">Class Style 2</a></li>
                            <li><a href="class-details.html">Class Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="blog.html">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children mega-menu-wrap">
                        <a href="#">Pages</a>
                        <ul class="mega-menu">
                            <li><a href="shop.html">Pagelist 1</a>
                                <ul>
                                    <li><a href="index.html">Demo Style 1</a></li>
                                    <li><a href="index-2.html">Demo Style 2</a></li>
                                    <li><a href="index-3.html">Demo Style 3</a></li>
                                    <li><a href="index-4.html">Demo Style 4</a></li>
                                    <li><a href="index-5.html">Demo Style 5</a></li>
                                    <li><a href="class.html">Class Style 1</a></li>
                                    <li><a href="class-2.html">Class Style 2</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Pagelist 2</a>
                                <ul>
                                    <li><a href="class-details.html">Class Details</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="service.html">Service</a></li>
                                    <li><a href="service-details.html">Service Details</a></li>
                                    <li><a href="team.html">Team</a></li>
                                    <li><a href="team-details.html">Team Details</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Pagelist 3</a>
                                <ul>
                                    <li><a href="event-details.html">Event Details</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="shop-details.html">Shop Details</a></li>
                                    <li><a href="cart.html">Shopping Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="price-plan.html">Price Plan</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Pagelist 4</a>
                                <ul>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                    <li><a href="registration.html">Registration</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="error.html">Error Page</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.html">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
    <!--==============================
    Sidemenu
    ============================== -->
    <!-- <div class="sidemenu-wrapper d-none d-lg-block">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget">
                <div class="widget-about">
                    <div class="footer-logo">
                        <img src="{{ asset('template/assets/img/logo.svg') }}" alt="Kiddino">
                    </div>
                    <p class="mb-0">We are constantly expanding the range of services offered, taking care of children of all ages.</p>
                </div>
            </div>
            <div class="widget">
                <h3 class="widget_title">Get In Touch</h3>
                <div>
                    <p class="footer-text">Monday to Friday: <span class="time">8.30am – 02.00pm</span></p>
                    <p class="footer-text">Saturday, Sunday: <span class="time">Close</span></p>
                    <p class="footer-info"><i class="fal fa-envelope"></i>Email: <a href="mailto:user@domainname.com">user@domainname.com</a></p>
                    <p class="footer-info"><i class="fas fa-mobile-alt"></i>Phone: <a href="tel:+4402076897888">+44 (0) 207 689 7888</a></p>
                </div>
            </div>
            <div class="widget">
                <h3 class="widget_title">Latest News</h3>
                <div class="recent-post-wrap">
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="blog-details.html">
                                <img src="{{ asset('template/assets/img/blog/recent-post-1-1.jpg') }}" alt="Blog Image">
                            </a>
                        </div>
                        <div class="media-body">
                            <div class="recent-post-meta">
                                <a href="blog.html"><i class="far fa-calendar-alt"></i>December 3, 2022</a>
                            </div>
                            <h4 class="post-title">
                                <a class="text-inherit" href="blog-details.html">A very warm welcome to our new Treasurer</a>
                            </h4>
                        </div>
                    </div>
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="blog-details.html">
                                <img src="{{ asset('template/assets/img/blog/recent-post-1-2.jpg') }}" alt="Blog Image">
                            </a>
                        </div>
                        <div class="media-body">
                            <div class="recent-post-meta">
                                <a href="blog.html"><i class="far fa-calendar-alt"></i>February 15, 2022</a>
                            </div>
                            <h4 class="post-title">
                                <a class="text-inherit" href="blog-details.html">German kinder and garten mean child</a>
                            </h4>
                        </div>
                    </div>
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="blog-details.html">
                                <img src="{{ asset('template/assets/img/blog/recent-post-1-3.jpg') }}" alt="Blog Image">
                            </a>
                        </div>
                        <div class="media-body">
                            <div class="recent-post-meta">
                                <a href="blog.html"><i class="far fa-calendar-alt"></i>August 20, 2022</a>
                            </div>
                            <h4 class="post-title">
                                <a class="text-inherit" href="blog-details.html">English uses term to refer to the earliest</a>
                            </h4>
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>   -->
<!--==============================
    Popup Search Box
    ============================== -->
    <!-- <div class="popup-search-box d-none d-lg-block  ">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" class="border-theme" placeholder="What are you looking for">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div> -->
    <!--==============================
        Header Area
    ==============================-->
    <header class="vs-header header-layout2">
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col col-sm-auto">
                        <div class="header-logo">
                            <a href="index.html">
                                <img src="{{ asset('template/assets/img/emco.png') }}" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-sm-auto d-none d-lg-block">
                        <div class="header-links style3 style-white">
                            <ul>
                                <li class="d-none d-xl-inline-block"><a href="{{ route('index') }}">HOME</a></li>
                                <li><a href="{{ route('about') }}">ABOUT US</a></li>
                                <li><a href="tel:+4402076897888" class="active">PRODUCT</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col">
                        <div class="row align-items-center justify-content-end gx-3">
                            <div class="col-auto d-none d-lg-block">
                                <div class="header-icons">
                                    <button class="simple-icon style2 sideMenuToggler"><i
                                            class="far fa-bars"></i></button>
                                </div>
                            </div>
                            <div class="col-auto ">
                                <a href="contact.html" class="vs-btn sideMenuToggler">Apply Today</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- <div class="container">
            <div class="menu-area">
                <div class="row justify-content-between align-items-center">
                    <div class="col">
                        <nav class="main-menu menu-style2 d-none d-lg-block">
                            <ul>
                                <li class="menu-item-has-children">
                                    <a href="index.html">Demo</a>
                                    <ul class="sub-menu">
                                        <li><a href="index.html">Demo Style 1</a></li>
                                        <li><a href="index-2.html">Demo Style 2</a></li>
                                        <li><a href="index-3.html">Demo Style 3</a></li>
                                        <li><a href="index-4.html">Demo Style 4</a></li>
                                        <li><a href="index-5.html">Demo Style 5</a></li>
                                        <li><a href="index-6.html">Demo Style 6</a></li>
                                        <li><a href="index-7.html">Demo Style 7</a></li>
                                        <li><a href="index-8.html">Demo Style 8</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="about.html">About Us</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="class.html">Classes</a>
                                    <ul class="sub-menu">
                                        <li><a href="class.html">Class Style 1</a></li>
                                        <li><a href="class-2.html">Class Style 2</a></li>
                                        <li><a href="class-details.html">Class Details</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="blog.html">Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children mega-menu-wrap">
                                    <a href="#">Pages</a>
                                    <ul class="mega-menu">
                                        <li><a href="shop.html">Pagelist 1</a>
                                            <ul>
                                                <li><a href="index.html">Demo Style 1</a></li>
                                                <li><a href="index-2.html">Demo Style 2</a></li>
                                                <li><a href="index-3.html">Demo Style 3</a></li>
                                                <li><a href="index-4.html">Demo Style 4</a></li>
                                                <li><a href="index-5.html">Demo Style 5</a></li>
                                                <li><a href="class.html">Class Style 1</a></li>
                                                <li><a href="class-2.html">Class Style 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Pagelist 2</a>
                                            <ul>
                                                <li><a href="class-details.html">Class Details</a></li>
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="service.html">Service</a></li>
                                                <li><a href="service-details.html">Service Details</a></li>
                                                <li><a href="team.html">Team</a></li>
                                                <li><a href="team-details.html">Team Details</a></li>
                                                <li><a href="gallery.html">Gallery</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Pagelist 3</a>
                                            <ul>
                                                <li><a href="event-details.html">Event Details</a></li>
                                                <li><a href="shop.html">Shop</a></li>
                                                <li><a href="shop-details.html">Shop Details</a></li>
                                                <li><a href="cart.html">Shopping Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="price-plan.html">Price Plan</a></li>
                                                <li><a href="faq.html">FAQ</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Pagelist 4</a>
                                            <ul>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                                <li><a href="registration.html">Registration</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li><a href="error.html">Error Page</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </nav>
                        <button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fal fa-bars"></i></button>
                    </div>
                    <div class="col-auto">
                        <button class="simple-icon searchBoxTggler"><i class="far fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div> -->
    </header>
    <!--==============================
      Hero Area
    ==============================-->
    <section class="vs-hero-wrapper  ">
        <div class="vs-hero-carousel" data-height="1050" data-container="1900" data-slidertype="responsive"
            data-globalbgcolor="#FFC6D3">

            <!-- Slide 1-->
            <div class="ls-slide" data-ls="duration:12000; transition2d:5; kenburnsscale:1.2;">
                <img width="1920" height="295" src="{{ asset('template/assets/img/hero/h-s-2-2.png') }}" class="ls-l ls-img-layer" alt="bg"
                    decoding="async"
                    style="font-size:36px; color:#000; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; top:775px; left:-10px; -webkit-background-clip:border-box;"
                    data-ls="static:forever;">
                <img width="708" height="710" src="{{ asset('template/assets/img/hero/gambar.png') }}" class="ls-l ls-hide-phone ls-img-layer"
                    alt="bg" decoding="async"
                    style="font-size:36px; color:#000; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; top:123px; left:830px; -webkit-background-clip:border-box;"
                    data-ls="parallax:true; parallaxlevel:4; parallaxevent:cursor;">
                <img width="552" height="616" src="{{ asset ('template/assets/img/hero/h-s-2-1.png') }}" class="ls-l ls-hide-phone ls-img-layer"
                    alt="bg" decoding="async"
                    style="font-size:36px; color:#000; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; top:170px; left:1171px; -webkit-background-clip:border-box;"
                    data-ls="parallax:true; parallaxlevel:3; parallaxevent:cursor;">
                <h1 style="font-size:50px; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; color:black; font-family:'Fredoka', sans-serif; line-height:70px; font-weight:600; left:310px; top:305px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; easingin:easeOutQuint;">
                    Safe, Fun, and
                </h1>
                <h1 style="font-size:50px; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; color:black; font-family:'Fredoka', sans-serif; line-height:50px; font-weight:600; left:310px; top:374px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; delayin:300; easingin:easeOutQuint;">
                    Educational Toys for
                </h1>
                <h1 style="font-size:50px; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; color:black; font-family:'Fredoka', sans-serif; line-height:30px; font-weight:600; left:310px; top:445px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; delayin:600; easingin:easeOutQuint;">
                    Every Child
                </h1>
                <p style="font-size:24px; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; font-family:'Jost', sans-serif;; color:black; left:315px; top:515px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; delayin:800; easingin:easeOutQuint;">Give Your Child the Gift of Play and Growth</p>

                <div style="font-size:30px; color:#000; stroke:#000; stroke-width:0px; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; left:315px; top:577px; font-family:'Fredoka', sans-serif; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-tablet ls-hide-phone ls-html-layer"
                    data-ls="offsetyin:100; delayin:1000; easingin:easeOutQuint; offsetyout:100; easingout:easeOutQuint;">
                    <a href="contact.html" class="vs-btn">CONTACT US</a>
                </div>
                <h1 style="font-size:90px; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; color:#ffffff; font-family:'Fredoka', sans-serif; line-height:90px; font-weight:600; left:150px; top:149px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; easingin:easeOutQuint;">
                    World Best
                </h1>
                <h1 style="font-size:90px; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; color:#ffffff; font-family:'Fredoka', sans-serif; line-height:90px; font-weight:600; left:150px; top:245px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; delayin:300; easingin:easeOutQuint;">
                    Children Care
                </h1>
                <h1 style="font-size:90px; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; color:#ffffff; font-family:'Fredoka', sans-serif; line-height:90px; font-weight:600; left:150px; top:351px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; delayin:600; easingin:easeOutQuint;">
                    Program
                </h1>
                <p style="font-size:34px; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; font-family:'Jost', sans-serif;; color:#ffffff; left:150px; top:477px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; delayin:800; easingin:easeOutQuint;">Montessori classrooms and materials
                    encourage</p>
                <p style="stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; font-family:'Jost', sans-serif;; color:#ffffff; left:150px; top:538px; font-size:34px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-desktop ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; delayin:900; easingin:easeOutQuint;">curiosity and discovery.</p>
                <div style="font-size:30px; color:#000; stroke:#000; stroke-width:0px; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; left:150px; top:630px; font-family:'Fredoka', sans-serif; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-desktop ls-hide-phone ls-html-layer"
                    data-ls="offsetyin:100; delayin:1000; easingin:easeOutQuint; offsetyout:100; easingout:easeOutQuint;">
                    <a href="contact.html" class="vs-btn">Start Learning Today</a>
                </div>
                <h1 style="stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; color:#ffffff; font-family:'Fredoka', sans-serif; line-height:110px; font-weight:600; left:100px; top:90px; font-size:110px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-desktop ls-hide-tablet ls-text-layer"
                    data-ls="offsetxin:-100; easingin:easeOutQuint;">
                    World Best
                </h1>
                <h1 style="stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; color:#ffffff; font-family:'Fredoka', sans-serif; line-height:110px; font-weight:600; left:100px; top:236px; font-size:110px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-desktop ls-hide-tablet ls-text-layer"
                    data-ls="offsetxin:-100; delayin:300; easingin:easeOutQuint;">
                    Children Care
                </h1>
                <h1 style="font-size:110px; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; color:#ffffff; font-family:'Fredoka', sans-serif; line-height:110px; font-weight:600; left:100px; top:380px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-desktop ls-hide-tablet ls-text-layer"
                    data-ls="offsetxin:-100; delayin:600; easingin:easeOutQuint;">
                    Program
                </h1>
                <div style="font-size:30px; color:#000; stroke:#000; stroke-width:0px; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; left:100px; top:578px; font-family:'Fredoka', sans-serif; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-desktop ls-hide-tablet ls-html-layer"
                    data-ls="offsetyin:100; delayin:1000; easingin:easeOutQuint; offsetyout:100; easingout:easeOutQuint;">
                    <a href="contact.html" class="vs-btn">Start Learning Today</a>
                </div>
                <img width="708" height="710" src="{{ asset('template/assets/img/hero/hero-2-1.png') }}"
                    class="ls-l ls-hide-desktop ls-hide-tablet ls-img-layer" alt="bg" decoding="async"
                    style="font-size:36px; color:#000; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; top:47px; left:1003px; -webkit-background-clip:border-box;"
                    data-ls="parallax:true; parallaxlevel:4; parallaxevent:cursor;">
                <img width="552" height="616" src="{{ asset('template/assets/img/hero/h-s-2-1.png') }}"
                    class="ls-l ls-hide-desktop ls-hide-tablet ls-img-layer" alt="bg" decoding="async"
                    style="font-size:36px; color:#000; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; top:76px; left:1340px; -webkit-background-clip:border-box;"
                    data-ls="parallax:true; parallaxlevel:3; parallaxevent:cursor;">
            </div>

        </div>
    </section>
    <!--==============================
    Category Area
    ==============================-->
    <section class="  ">
        <div class="container">
            <div class="title-area text-center">
                <div class="sec-bubble">
                    <div class="bubble"></div>
                    <div class="bubble"></div>
                    <div class="bubble"></div>
                </div>
                <h1 class="sec-title" style="color: black;">Browse Our Toys</h1>
                <p class="sec-text" style="font-weight: 600; color:black">Our Collection</p>
            </div>
            <div class="category-container">
                <div class="category">
                    <img src="{{ asset('template/assets/img/shop/Vector.svg') }}" alt="Cloud" class="cloud">
                    <img src="{{ asset('template/assets/img/shop/lego.svg') }}" alt="Bricks" class="icon brix" style="fill: #4482C8;">
                    <p>Bricks</p>
                </div>
                <div class="category">
                    <img src="{{ asset('template/assets/img/shop/Vector (1).svg') }}" alt="Cloud" class="cloud">
                    <img src="{{ asset('template/assets/img/shop/vehicle.svg') }}" alt="Toy Vehicle" class="icon">
                    <p>Toy Vehicle</p>
                </div>
                <div class="category">
                    <img src="{{ asset('template/assets/img/shop/Vector (2).svg') }}" alt="Cloud" class="cloud">
                    <img src="{{ asset('template/assets/img/shop/brick.png') }}" alt="Educational Toys" class="icon">
                    <p>Educational Toys</p>
                </div>
                <div class="category">
                    <img src="{{ asset('template/assets/img/shop/Vector (3).svg') }}" alt="Cloud" class="cloud">
                    <img src="{{ asset('template/assets/img/shop/pot.png') }}" alt="Cooking Toys" class="icon">
                    <p>Cooking Toys</p>
                </div>
                <div class="category">
                    <img src="{{ asset('template/assets/img/shop/Vector (4).svg') }}" alt="Cloud" class="cloud">
                    <img src="{{ asset('template/assets/img/shop/doll.png') }}" alt="Dolls" class="icon">
                    <p>Dolls</p>
                </div>
            </div>
            <!-- <div class="row d-flex gx-0 vs-carousel partner" data-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2"
                data-xs-slide-show="2" data-dots="true">
                <div class="col-xl-4 brands">
                    <div class="category-style2">
                        <div class="category-img"><a href="class-details.html"><img
                                    src="{{ asset('template/assets/img/category/cat-1-1.jpg') }}" alt="category"></a></div>
                    </div>
                </div>
                <div class="col-xl-4 brands">
                    <div class="category-style2">
                        <div class="category-img"><a href="class-details.html"><img
                                    src="{{ asset('template/assets/img/category/cat-1-2.jpg') }}" alt="category"></a></div>
                    </div>
                </div>
                <div class="col-xl-4 brands">
                    <div class="category-style2">
                        <div class="category-img"><a href="class-details.html"><img
                                    src="{{ asset ('template/assets/img/category/cat-1-3.jpg') }}" alt="category"></a></div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <section class="vs-product-wrapper space-extra-bottom">
        <div class="container">
            <div class="title-area text-center" style="margin-top: 80px;">
                <h1 class="sec-title" style="color: black;">Our Products</h1>
                <div class="options">
                    <a href="" class="active">Best Seller</a>
                    <a href="">New Arrival</a>
                </div>
            </div>
            <div class="row justify-content-center shopping">
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="products">
                        <div class="product-image">
                            <a href="">
                                <img src="{{ asset('template/assets/img/shop/1.png') }}" alt="" class="mt-4">
                            </a>
                        </div>
                        <a href="" class="details">Details<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="m5.157 13.069l4.611-4.685a.546.546 0 0 0 0-.768L5.158 2.93a.55.55 0 0 1 0-.771a.53.53 0 0 1 .759 0l4.61 4.684a1.65 1.65 0 0 1 0 2.312l-4.61 4.684a.53.53 0 0 1-.76 0a.55.55 0 0 1 0-.771"/></svg></a>
                    </div>
                    <p class="judul">Mainan EMCO Hot Shot Marvel Viper</p>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="products">
                        <div class="product-image">
                            <a href="">
                                <img src="{{ asset('template/assets/img/shop/1.png') }}" alt="" class="mt-4">
                            </a>
                        </div>
                        <a href="" class="details">Details<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="m5.157 13.069l4.611-4.685a.546.546 0 0 0 0-.768L5.158 2.93a.55.55 0 0 1 0-.771a.53.53 0 0 1 .759 0l4.61 4.684a1.65 1.65 0 0 1 0 2.312l-4.61 4.684a.53.53 0 0 1-.76 0a.55.55 0 0 1 0-.771"/></svg></a>
                    </div>
                    <p class="judul">Mainan EMCO Hot Shot Marvel Viper</p>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="products">
                        <div class="product-image">
                            <a href="">
                                <img src="{{ asset('template/assets/img/shop/1.png') }}" alt="" class="mt-4">
                            </a>
                        </div>
                        <a href="" class="details">Details<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="m5.157 13.069l4.611-4.685a.546.546 0 0 0 0-.768L5.158 2.93a.55.55 0 0 1 0-.771a.53.53 0 0 1 .759 0l4.61 4.684a1.65 1.65 0 0 1 0 2.312l-4.61 4.684a.53.53 0 0 1-.76 0a.55.55 0 0 1 0-.771"/></svg></a>
                    </div>
                    <p class="judul">Mainan EMCO Hot Shot Marvel Viper</p>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="products">
                        <div class="product-image">
                            <a href="">
                                <img src="{{ asset('template/assets/img/shop/1.png') }}" alt="" class="mt-4">
                            </a>
                        </div>
                        <a href="" class="details">Details<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="m5.157 13.069l4.611-4.685a.546.546 0 0 0 0-.768L5.158 2.93a.55.55 0 0 1 0-.771a.53.53 0 0 1 .759 0l4.61 4.684a1.65 1.65 0 0 1 0 2.312l-4.61 4.684a.53.53 0 0 1-.76 0a.55.55 0 0 1 0-.771"/></svg></a>
                    </div>
                    <p class="judul">Mainan EMCO Hot Shot Marvel Viper</p>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="products">
                        <div class="product-image">
                            <a href="">
                                <img src="{{ asset('template/assets/img/shop/1.png') }}" alt="" class="mt-4">
                            </a>
                        </div>
                        <a href="" class="details">Details<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="m5.157 13.069l4.611-4.685a.546.546 0 0 0 0-.768L5.158 2.93a.55.55 0 0 1 0-.771a.53.53 0 0 1 .759 0l4.61 4.684a1.65 1.65 0 0 1 0 2.312l-4.61 4.684a.53.53 0 0 1-.76 0a.55.55 0 0 1 0-.771"/></svg></a>
                    </div>
                    <p class="judul">Mainan EMCO Hot Shot Marvel Viper</p>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="products">
                        <div class="product-image">
                            <a href="">
                                <img src="{{ asset('template/assets/img/shop/1.png') }}" alt="" class="mt-4">
                            </a>
                        </div>
                        <a href="" class="details">Details<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="m5.157 13.069l4.611-4.685a.546.546 0 0 0 0-.768L5.158 2.93a.55.55 0 0 1 0-.771a.53.53 0 0 1 .759 0l4.61 4.684a1.65 1.65 0 0 1 0 2.312l-4.61 4.684a.53.53 0 0 1-.76 0a.55.55 0 0 1 0-.771"/></svg></a>
                    </div>
                    <p class="judul">Mainan EMCO Hot Shot Marvel Viper</p>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="products">
                        <div class="product-image">
                            <a href="">
                                <img src="{{ asset('template/assets/img/shop/1.png') }}" alt="" class="mt-4">
                            </a>
                        </div>
                        <a href="" class="details">Details<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="m5.157 13.069l4.611-4.685a.546.546 0 0 0 0-.768L5.158 2.93a.55.55 0 0 1 0-.771a.53.53 0 0 1 .759 0l4.61 4.684a1.65 1.65 0 0 1 0 2.312l-4.61 4.684a.53.53 0 0 1-.76 0a.55.55 0 0 1 0-.771"/></svg></a>
                    </div>
                    <p class="judul">Mainan EMCO Hot Shot Marvel Viper</p>
                </div>

                <!-- <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="vs-product product-style1">
                        <div class="product-img">
                            <a href="shop-details.html"><img src="assets/img/product/product1-2.png" alt="Image" class="w-100"></a>
                        </div>
                        <div class="product-content">
                            <span class="product-price">$18.00</span>
                            <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Table harmoni
                                    play</a></h3>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5</span></div>
                            <div class="actions">
                                <a href="cart.html" class="vs-btn"><i class="far fa-shopping-cart"></i>Add to Cart</a>
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="vs-product product-style1">
                        <div class="product-img">
                            <a href="shop-details.html"><img src="assets/img/product/product1-3.png" alt="Image" class="w-100"></a>
                        </div>
                        <div class="product-content">
                            <span class="product-price">$89.00 <del>$99.00</del></span>
                            <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Tommy Speak
                                    Head</a></h3>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5</span></div>
                            <div class="actions">
                                <a href="cart.html" class="vs-btn"><i class="far fa-shopping-cart"></i>Add to Cart</a>
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="vs-product product-style1">
                        <div class="product-img">
                            <a href="shop-details.html"><img src="assets/img/product/product1-4.png" alt="Image" class="w-100"></a>
                        </div>
                        <div class="product-content">
                            <span class="product-price">$30.00</span>
                            <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Queen Radio
                                    Home</a></h3>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5</span></div>
                            <div class="actions">
                                <a href="cart.html" class="vs-btn"><i class="far fa-shopping-cart"></i>Add to Cart</a>
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="vs-product product-style1">
                        <div class="product-img">
                            <a href="shop-details.html"><img src="assets/img/product/product1-5.png" alt="Image" class="w-100"></a>
                        </div>
                        <div class="product-content">
                            <span class="product-price">$65.00 <del>$56.00</del></span>
                            <h3 class="product-title"><a class="text-inherit" href="shop-details.html">The Bubblegum
                                    Toy</a></h3>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5</span></div>
                            <div class="actions">
                                <a href="cart.html" class="vs-btn"><i class="far fa-shopping-cart"></i>Add to Cart</a>
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="vs-product product-style1">
                        <div class="product-img">
                            <a href="shop-details.html"><img src="assets/img/product/product1-6.png" alt="Image" class="w-100"></a>
                        </div>
                        <div class="product-content">
                            <span class="product-price">$99.00 <del>$36.00</del></span>
                            <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Wood while
                                    chair</a></h3>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5</span></div>
                            <div class="actions">
                                <a href="cart.html" class="vs-btn"><i class="far fa-shopping-cart"></i>Add to Cart</a>
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="vs-product product-style1">
                        <div class="product-img">
                            <a href="shop-details.html"><img src="assets/img/product/product1-7.png" alt="Image" class="w-100"></a>
                        </div>
                        <div class="product-content">
                            <span class="product-price">$45.00</span>
                            <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Chips Wall
                                    sticker</a></h3>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5</span></div>
                            <div class="actions">
                                <a href="cart.html" class="vs-btn"><i class="far fa-shopping-cart"></i>Add to Cart</a>
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="vs-product product-style1">
                        <div class="product-img">
                            <a href="shop-details.html"><img src="assets/img/product/product1-8.png" alt="Image" class="w-100"></a>
                        </div>
                        <div class="product-content">
                            <span class="product-price">$24.00 <del>$63.00</del></span>
                            <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Watter Flow
                                    Game</a></h3>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5</span></div>
                            <div class="actions">
                                <a href="cart.html" class="vs-btn"><i class="far fa-shopping-cart"></i>Add to Cart</a>
                                <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
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
                <div class="col-auto">
                    <div class="gallery-style1">
                        <div class="gallery-img">
                            <img src="{{ asset ('template/assets/img/gallery/gal-2-1.jpg') }}" alt="gallery">
                            <a href="{{ asset ('template/assets/img/gallery/gal-2-1.jpg') }}" class="gallery-btn popup-image"><i
                                    class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="gallery-style1">
                        <div class="gallery-img">
                            <img src="{{ asset ('template/assets/img/gallery/gal-2-2.jpg') }}" alt="gallery">
                            <a href="{{ asset ('template/assets/img/gallery/gal-2-2.jpg') }}" class="gallery-btn popup-image"><i
                                    class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="gallery-style1">
                        <div class="gallery-img">
                            <img src="{{ asset ('template/assets/img/gallery/gal-2-3.jpg') }}" alt="gallery">
                            <a href="{{ asset ('template/assets/img/gallery/gal-2-3.jpg') }}" class="gallery-btn popup-image"><i
                                    class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="gallery-style1">
                        <div class="gallery-img">
                            <img src="{{ asset ('template/assets/img/gallery/gal-2-4.jpg') }}" alt="gallery">
                            <a href="{{ asset ('template/assets/img/gallery/gal-2-4.jpg') }}" class="gallery-btn popup-image"><i
                                    class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="gallery-style1">
                        <div class="gallery-img">
                            <img src="{{ asset ('template/assets/img/gallery/gal-2-5.jpg') }}" alt="gallery">
                            <a href="{{ asset ('template/assets/img/gallery/gal-2-5.jpg') }}" class="gallery-btn popup-image"><i
                                    class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="gallery-style1">
                        <div class="gallery-img">
                            <img src="{{ asset ('template/assets/img/gallery/gal-2-6.jpg') }}" alt="gallery">
                            <a href="{{ asset ('template/assets/img/gallery/gal-2-6.jpg') }}" class="gallery-btn popup-image"><i
                                    class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="gallery-style1">
                        <div class="gallery-img">
                            <img src="{{ asset ('template/assets/img/gallery/gal-2-7.jpg') }}" alt="gallery">
                            <a href="{{ asset ('template/assets/img/gallery/gal-2-7.jpg') }}" class="gallery-btn popup-image"><i
                                    class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Wave Shape -->
    <div class="vs-wave-shape  style4">
        <svg viewBox="0 0 1920 295" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="wave-path" fill-rule="evenodd" clip-rule="evenodd"
                d="M1920 295V202.758C1906.48 131.342 1843.63 77.168 1768.34 77.168C1739.37 77.168 1711.54 85.1814 1687.4 100.128C1650.68 38.4074 1584.56 0 1511.11 0C1412.1 0 1329.2 70.2842 1309.68 163.577C1294.03 136.928 1265.08 119 1232 119C1215.11 119 1198.88 123.673 1184.8 132.389C1163.39 96.397 1124.83 74 1082 74C1022.17 74 972.422 118.018 963.444 175.369C947.459 160.855 926.246 152 903 152C886.11 152 869.88 156.673 855.803 165.389C834.387 129.397 795.832 107 753 107C710.158 107 672.487 129.569 651.251 163.442C635.542 150.075 615.199 142 593 142C576.11 142 559.88 146.673 545.803 155.389C524.387 119.397 485.832 97 443 97C400.012 97 362.23 119.723 341.034 153.789C324.552 132.631 298.841 119 270 119C253.11 119 236.88 123.673 222.803 132.389C201.387 96.397 162.832 74 120 74C53.8333 74 0.000244141 127.833 0.000244141 194C0.000244141 194.41 0.000244141 194.835 0.0152435 195.245L0.000244141 195.248V295H1920Z" />
        </svg>
    </div>
    <!--==============================
			Footer Area
	==============================-->
    <footer class="footer-wrapper footer-layout3">
        <div class="shape-mockup jump-reverse d-none d-xxxl-block" data-right="0" data-top="0"><img
                src="{{ asset ('template/assets/img/shape/f-s-3-1.png') }}" alt=""></div>
        <div class="shape-mockup jump d-none d-xxxl-block" data-left="0" data-top="-2%"><img
                src="{{ asset ('template/assets/img/shape/f-s-3-2.png') }}" alt=""></div>
        <div class="container">
            <div class="footer-top">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-4">
                    <div class="col-auto">
                        <div class="media-style2">
                            <div class="media-icon"><img src="{{ asset ('template/assets/img/icon/cal-1-1.svg') }}" alt="icon"></div>
                            <div class="media-body">
                                <span class="media-label">Upcoming Events</span>
                                <p class="media-title"><a href="event-details.html" class="text-inherit">Christmas Play
                                        & AGM</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="countdown-style1" id="clockdiv">
                            <ul class="countdown-active" data-end-date="01/12/2024">
                                <li><span class="days"></span>Days</li>
                                <li><span class="hours"></span>Hours</li>
                                <li><span class="minutes"></span>Minutes</li>
                                <li><span class="seconds"></span>Seconds</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-center gx-60">
                    <div class="col-lg-4">
                        <div class="widget footer-widget">
                            <div class="widget-about">
                                <div class="footer-logo">
                                    <img src="{{ asset ('template/assets/img/emco.png') }}" alt="Kiddino">
                                    <h3 class="widget_title">PT Emway <br> Global-Indo</h3>
                                </div>
                                <p class="mt-0">We are constantly expanding the range of services offered, taking care
                                    of children of all ages.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Find Us</h3>
                            <div class="vs-widget-about">
                                <p class="map-link mb-2 pb-1">First Floor, 10A Chandos Street London New Town W1G 9LE
                                </p>
                                <p class="footer-call"><a class="text-inherit" href="tel:+4402076897888">+44 (0) 207 689
                                        7888</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="widget footer-widget">
                            <div class="sosialmed col-lg-auto">
                                <div class="vs-social">
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                        <span>Emco Toys</span>
                                    </a>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                        <span>Emco Toys</span>
                                    </a>
                                    <a href="#">
                                        <i class="fab fa-linkedin-in"></i>
                                        <span>PT EMCO TOYS</span>
                                    </a>
                                    <a href="#">
                                        <i class="fab fa-youtube"></i>
                                        <span>PT EMCO TOYS</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright-wrap">
                <div class="row flex-row-reverse gy-3 justify-content-between align-items-center">
                    <div class="col-lg-auto">
                        <div class="vs-social">
                            <!-- <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a> -->
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <p class="copyright-text text-white">Copyright &copy; 2023 <a href="index.html">Kiddino</a>. All
                            Rights Reserved By <a href="https://themeforest.net/user/vecuro_themes">Vecuro</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer> <!-- Scroll To Top -->
    <a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>

    <!--********************************
			Code End  Here
	******************************** -->

    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
    <script src="{{ asset('template/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('template/assets/js/slick.min.js') }}"></script>
    <!-- <script src="{{ asset('template/assets/js/app.min.js') }}"></script> -->
    <!-- Layerslider -->
    <script src="{{ asset('template/assets/js/layerslider.utils.js') }}"></script>
    <script src="{{ asset('template/assets/js/layerslider.transitions.js') }}"></script>
    <script src="{{ asset('template/assets/js/layerslider.kreaturamedia.jquery.js') }}"></script>
    <!-- jquery ui -->
    <script src="{{ asset('template/assets/js/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('template/assets/js/bootstrap.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('template/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('template/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- Main Js File -->
    <script src="{{ asset('template/assets/js/datecounter.js') }}"></script>
    <script src="{{ asset('template/assets/js/main.js') }}"></script>

</body>

</html>
