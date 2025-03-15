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

                    {{-- php code get articles looping --}}
                    @if (isset($articles) && !empty($articles) && count($articles) > 0)

                        @foreach ($articles as $article)
                            <div class="vs-blog blog-single has-post-thumbnail">
                                <div class="blog-img article-image">
                                    <a href="{{ route('adetail', $article->slug)}}"><img src="/storage/{{$article->thumbnail}}"
                                            alt="Article Image"></a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="{{ route('adetail', $article->slug) }}"><i class="far fa-calendar-alt"></i>{{ $article->created_at->format('d F, Y') }}</a>
                                        <span><i class="far fa-eye"></i>15</span>
                                    </div>
                                    <h2 class="blog-title">
                                        <a href="{{ route('adetail', $article->slug) }}">
                                            {{ $article->title }}
                                        </a>
                                    </h2>
                                    <p class="blog-text">
                                        {{ substr($article->body,0,200) }}...

                                    </p>
                                    <a href="{{ route('adetail', $article->slug) }}" class="vs-btn style2">Read More</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class=" text-custom-grey text-center ">No article found.</div>
                    @endif

                    <div class="vs-pagination  d-flex justify-content-center ">
                        @if ($articles->hasPages())
                            <a href="{{ !$articles->onFirstPage() ? $articles->previousPageUrl() : '#' }}" class="pagi-btn  {{ !$articles->onFirstPage() ? 'color-custom-red' : '' }} ">Prev</a>
                            <ul>
                                @for ($page = 1; $page <= $articles->lastPage(); $page++)
                                    <li><a href="{{ $articles->url($page) }}">{{ $page }}</a></li>
                                @endfor
                            </ul>
                            <a href="{{ $articles->hasMorePages() ? $articles->nextPageUrl() : '#' }}" class="pagi-btn {{ $articles->hasMorePages() ? 'color-custom-red' : '' }} ">Next</a>
                        @endif
                    </div>

                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_search   ">
                            <h3 class="widget_title">Search</h3>
                            <form class="search-form" method="GET">
                                <input type="text" class="search-field" name="search" value="{{ request('search') ?? '' }}"placeholder="Search Here">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget  ">
                            <h3 class="widget_title">Latest Article</h3>
                            <div class="recent-post-wrap">
                                @if (isset($latest_articles) && !empty($latest_articles && count($latest_articles) > 0))
                                    @foreach ($latest_articles as $latest_article)
                                        <div class="recent-post">
                                            <div class="media-img">
                                                <a href="{{ route('adetail', $latest_article->slug)}}"><img src="/storage/{{$latest_article->thumbnail}}"
                                                        alt="Blog Image"></a>
                                            </div>
                                            <div class="media-body">
                                                <div class="recent-post-meta">
                                                    <a href="{{ route('adetail', $latest_article->slug)}}"><i class="far fa-calendar-alt"></i>{{ $latest_article->created_at->format('d F, Y') }}</a>
                                                </div>
                                                <h4 class="post-title">
                                                    <a class="text-inherit" href="{{ route('adetail', $latest_article->slug)}}">
                                                        {{ substr($latest_article->title ,0,15)}}
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class=" text-custom-grey text-center ">No article found.</div>
                                @endif
                            </div>
                        </div>
                        <div class="widget widget_categories   ">
                            <h3 class="widget_title">Categories</h3>
                            @if (isset($article_categories) && !empty($article_categories && count($article_categories) > 0))
                                <ul>
                                    @foreach ($article_categories as $article_category)
                                        <li>
                                            <a href="?category={{ $article_category->slug }}" class="{{ request('category') == $article_category->slug ? 'color-custom-red text-white' : '' }}">
                                                {{ $article_category->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class=" text-custom-grey text-center ">No category found.</div>
                            @endif

                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')
    <script>
        $('.search-form').submit(function(e) {
            e.preventDefault();

            var search = $('.search-field').val();
            var currentUrl = new URL(window.location.href);

            // Jika parameter search sudah ada, ubah nilainya
            if (currentUrl.searchParams.has('search')) {
                currentUrl.searchParams.set('search', search);
            } else {
                currentUrl.searchParams.append('search', search);
            }
            window.location.href = currentUrl.toString();
        })
    </script>
@endpush

