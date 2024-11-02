@extends('layouts.app')
@section('content')




    <!-- Page Title -->
    <section class="page-title">
        <div class="bg-layer" style="background-image: url({{$banners->getImage($banners->blogs_banner)}});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Blog Details</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index-2.html">Home</a></li>
                    <li>Blog Details</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container p_relative">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{$blog->getImage($blog->imagefile)}}" alt="">
                                </figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <div class="category"><a href="blog-details.html">{{$blog->category->title}}</a></div>
                                        <h3>{{$blog->title}}</h3>
                                        <ul class="post-info clearfix">
                                            <li><i class="icon-34"></i>{{ \Carbon\Carbon::parse($blog->date)->format('d/m/Y') }}</li>
                                            </li>
                                        </ul>
                                        <div>
                                            {!! $blog->text !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="post-tags">
                            @php
                                // Tags stringini müəyyən edin (məsələn, databazadan gələn data)


                                // Stringi vergülə görə parçala
                                $tags = explode(',', $blog->tags);
                            @endphp

                            <ul class="tags-list clearfix">
                                <li>
                                    <h5>{{ __('site.tags') }}:</h5>
                                </li>
                                @foreach($tags as $tag)
                                    <li><a href="blog-details.html">{{ $tag }}</a></li>
                                @endforeach
                            </ul>

                        </div>


                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar ml_40">
                        <div class="sidebar-widget search-widget">
                            <div class="widget-title">
                                <h3>{{__('site.Search')}}</h3>
                            </div>
                            <div class="search-form">
                                <form action="{{route('client.blogs')}}" method="get">
                                    <div class="form-group">
                                        <input type="search" name="search" placeholder="{{__('site.Search')}}" required="">
                                        <button type="submit"><i class="icon-50"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h3>{{__('site.Categories')}}</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    <li><a href="{{route("client.blogs")}}">{{__('site.All Categories')}}</a></li>
                                    @foreach($cats as $cat)
                                        <li><a href="{{route('client.blogs')}}?category={{$cat->slug}}">{{$cat->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget post-widget">
                            <div class="widget-title">
                                <h3>{{__("site.Recent Posts")}}</h3>
                            </div>
                            <div class="post-inner">
                                @foreach($recentBlogs as $rBlog)
                                    <div class="post">
                                        <figure class="post-thumb"><a href="{{route('client.blog', $rBlog->slug)}}"><img
                                                    src="{{$rBlog->getImage($rBlog->imagefile)}}" alt=""></a></figure>
                                        <h4><a href="b{{$rBlog->getImage($rBlog->imagefile)}}">{{$rBlog->title}}</a></h4>
                                        <span class="post-date"><i class="icon-34"></i>{{ \Carbon\Carbon::parse($blog->date)->format('d/m/Y') }}</span>
                                    </div>
                                @endforeach

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container end -->
@endsection
