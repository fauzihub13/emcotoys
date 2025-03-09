@extends('user.layouts.app')

@section('title', 'Home')

@push('style')
@endpush

@section('main')


<section class="vs-blog-wrapper blog-details space-top space-extra-bottom">
    <div class="container">
        <div class="row gx-40">
            <div class="col-lg-8">
                <div class="vs-blog blog-single">
                    <div class="blog-img">
                        <img src="{{ asset('template/assets/img/blog/secret1 (1).jpg')}}" alt="Blog Image">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="blog.html"><i class="far fa-calendar-alt"></i>December 3, 2022</a>
                        </div>
                        <h2 class="blog-title">A very warm welcome to our new Treasurer Garden</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisc ing elit, sed do eiusmod tempor
                            incididunt ut la bore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur
                            adipisc ing elit, sed do eiusmod tempor incididunt ut la bore et dolore magna aliqua.
                            Lorem ipsum dolor sit amet, consectetur adipisc ing elit, sed do eiusmod tempor
                            incididunt ut la bore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur
                            adipisc ing elit, sed do eiusmod tempor incididunt ut la bore et dolore magna aliqua.
                        </p>
                        <p class="mb-30">consectetur adipisc ing elit, sed do eiusmod tempor incididunt ut la bore
                            et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisc ing elit, sed do
                            eiusmod tempor incididunt ut la bore et dolore magna aliqua Lorem ipsum lie dolor sit
                            amet, consectetur adipisc ing elit, sed do eiusmod tempor incididunt ut la bore et
                            dolore magna aliqua.</p>
                    </div>
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
                </aside>
            </div>
        </div>
    </div>
</section>

@endsection

@push('script')
@endpush