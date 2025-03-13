@extends('user.layouts.app')

@section('title', 'Detail Article')

@push('style')
@endpush

@section('main')


<section class="vs-blog-wrapper blog-details space-top space-extra-bottom">
    <div class="container">
        <div class="row gx-40">
            <div class="col-lg-8">
                <div class="vs-blog blog-single">
                    <div class="blog-img ">
                        <img src="/storage/{{$article->thumbnail}}" alt="Article Image">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="#"><i class="far fa-calendar-alt"></i>{{ $article->created_at->format('d F, Y') }}</a>
                        </div>
                        <h2 class="blog-title">{{ $article->title}}</h2>
                        <p class="mb-5 text-justify">
                            {{ $article->body}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="sidebar-area">
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
                </aside>
            </div>
        </div>
    </div>
</section>

@endsection

@push('script')
@endpush
