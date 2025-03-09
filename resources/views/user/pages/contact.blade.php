@extends('user.layouts.app')

@section('title', 'Home')

@push('style')
    <link rel="stylesheet" href="{{ asset('template/assets/css/contact.css') }}">
@endpush

@section('main')

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
                <img width="622" height="533" src="{{ asset ('template/assets/img/hero/Ellipse 1.png') }}" class="ls-l ls-hide-phone ls-img-layer"
                    alt="bg" decoding="async"
                    style="font-size:36px; color:#000; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; top:170px; left:891px; -webkit-background-clip:border-box;"
                    data-ls="parallax:true; parallaxlevel:3; parallaxevent:cursor;">
                <img width="812" height="608" src="{{ asset('template/assets/img/hero/family-rbg.png') }}" class="ls-l ls-hide-phone ls-img-layer"
                    alt="bg" decoding="async"
                    style="font-size:36px; color:#000; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; font-weight:400; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; top:123px; left:830px; -webkit-background-clip:border-box;"
                    data-ls="parallax:true; parallaxlevel:4; parallaxevent:cursor;">
                <h1 style="font-size:50px; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; color:black; font-family:'Fredoka', sans-serif; line-height:70px; font-weight:600; left:310px; top:305px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; easingin:easeOutQuint;">
                    Get in Touch with Us for
                </h1>
                <h1 style="font-size:50px; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; color:black; font-family:'Fredoka', sans-serif; line-height:50px; font-weight:600; left:310px; top:374px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; delayin:300; easingin:easeOutQuint;">
                    Support and 
                </h1>
                <h1 style="font-size:50px; stroke:#000; stroke-width:0px; text-align:left; font-style:normal; text-decoration:none; text-transform:none; letter-spacing:0px; background-position:0% 0%; background-repeat:no-repeat; background-clip:border-box; overflow:visible; color:black; font-family:'Fredoka', sans-serif; line-height:30px; font-weight:600; left:310px; top:445px; -webkit-background-clip:border-box;"
                    class="ls-l ls-hide-tablet ls-hide-phone ls-text-layer"
                    data-ls="offsetxin:-100; delayin:600; easingin:easeOutQuint;">
                    Collaboration
                </h1>   
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
                <img width="708" height="710" src="{{ asset('template/assets/img/hero/Slide-1.png') }}"
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
    <section class="  ">
        <div class="container">
            <div class="top mt-5">
                <h2 class="fs-2">Contact</h2>
                <div class="d-flex justify-content-between">
                    <div class="box d-flex flex-column text-center">
                        <svg class="align-self-center mb-1" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="m19.23 15.26l-2.54-.29a1.99 1.99 0 0 0-1.64.57l-1.84 1.84a15.05 15.05 0 0 1-6.59-6.59l1.85-1.85c.43-.43.64-1.03.57-1.64l-.29-2.52a2 2 0 0 0-1.99-1.77H5.03c-1.13 0-2.07.94-2 2.07c.53 8.54 7.36 15.36 15.89 15.89c1.13.07 2.07-.87 2.07-2v-1.73c.01-1.01-.75-1.86-1.76-1.98"/></svg>
                        <p class="m-0 fw-bold text-dark">Phone number</p>
                        <p class="m-0 text-dark">123-456-789</p>
                    </div>
                    <div class="box d-flex flex-column text-center">
                        <svg class="align-self-center mb-1" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 4l-8 5l-8-5V6l8 5l8-5z"/></svg>
                        <p class="m-0 fw-bold text-dark">Email</p>
                        <p class="m-0 text-dark">info@example.com</p>
                    </div>
                    <div class="box d-flex flex-column text-center">
                        <svg class="align-self-center mb-1" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7"/></svg>
                        <p class="m-0 fw-bold text-dark">Address</p>
                        <p class="m-0 text-dark">Jakarta</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5 mb-5">
            <div class="row">
                <!-- Map Section -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16328186.410165899!2d107.18505469742318!3d-2.381042138954834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sen!2sid!4v1741500085213!5m2!1sen!2sid" 
                        width="100%" 
                        height="500" 
                        style="border:0; border-radius: 10px;"
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
                <!-- Contact Form -->
                <div class="col-lg-6 col-md-12">
                    <h2 class="fs-2">Contact Us</h2>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Your name">
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control" placeholder="Phone number">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email address">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Inquiries">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="4" placeholder="Write your comment here..."></textarea>
                        </div>
                        <a href="" class="btn">Send</a>
                    </form>
                </div>
            </div>
</div>  
    </section>
@endsection

@push('script')
@endpush
