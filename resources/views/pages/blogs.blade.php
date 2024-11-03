@extends('layouts.app')
@include('partials._seo', ['code' => 'blogs'])
@section('content')
    <section class="page-title">
        <div class="bg-layer" style="background-image: url({{$banners->getImage($banners->contact_banner)}});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{__("site.Blogs")}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index-2.html">{{__("site.Home")}}</a></li>
                    <li>{{__("site.Blogs")}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->
    <!-- news-section -->
    <section class="news-section blog-grid p_relative">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="row clearfix">
                    @foreach($blogs as $blog)
                        <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                            <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{$blog->getImage($blog->imagefile)}}" alt="">
                                        <a href="{{route('client.blog', $blog->slug)}}">{{__("site.Read More")}}"><i class="fas fa-link"></i></a>
                                    </figure>
                                    <div class="lower-content">
                                        <div class="inner">
                                            <div class="category"><a href="{{route('client.blog', $blog->slug)}}">{{$blog->category->title}}</a></div>
                                            <h3><a href="{{route('client.blog', $blog->slug)}}">{!! \Illuminate\Support\Str::limit($blog->title, 50, '...') !!}</a></h3>
                                            <ul class="post-info clearfix">
                                                <li><i class="icon-34"></i>{{ \Carbon\Carbon::parse($blog->date)->format('d/m/Y') }}</li>
                                            </ul>

                                            <div class="link"><a href="{{route('client.blog', $blog->slug)}}">{{__("site.Read More")}}</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="pagination-wrapper centred centred">
                @if ($blogs->hasPages())
                    <ul class="pagination clearfix">
                        {{-- Geri düyməsi --}}
                        @if ($blogs->onFirstPage())
                            <li class="disabled"><span><i class="fas fa-angle-left"></i></span></li>
                        @else
                            <li><a href="{{ $blogs->previousPageUrl() }}"><i class="fas fa-angle-left"></i></a></li>
                        @endif

                        {{-- Səhifə Nömrələri --}}
                        @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                            @if ($page == $blogs->currentPage())
                                <li><a href="{{ $url }}" class="current">{{ $page }}</a></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        {{-- İrəli düyməsi --}}
                        @if ($blogs->hasMorePages())
                            <li><a href="{{ $blogs->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a></li>
                        @else
                            <li class="disabled"><span><i class="fas fa-angle-right"></i></span></li>
                        @endif
                    </ul>
                @endif

            </div>
        </div>
    </section>
    <!-- news-section end -->



@endsection
