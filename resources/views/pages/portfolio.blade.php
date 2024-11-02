@extends('layouts.app')
@section('content')

    <!-- Page Title -->
    <section class="page-title">
        <div class="bg-layer" style="background-image: url({{$banners->getImage($banners->contact_banner)}});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{__('site.Portfolio')}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index-2.html">{{__("site.Home")}}</a></li>
                    <li>{{__('site.Portfolio')}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- portfolio-page-section -->
    <section class="portfolio-page-section p_relative">
        <div class="auto-container">
            <div class="sortable-masonry">
                <div class="filters mb_50">
                    <ul class="filter-tabs filter-btns clearfix centred">
                        <li class="active filter" data-role="button" data-filter=".video">{{__("Video")}}</li>
                        <li class="filter" data-role="button" data-filter=".photo">{{__("Photo")}}</li>
                    </ul>
                </div>
                <div class="items-container row clearfix">
                    @foreach($videos as $video)
                        <div
                            class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column  video ">
                            <div class="project-block-one">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="{{$video->getImage($video->video_image)}}" alt="">
                                    </figure>
                                    <div class="view-btn"><a href="{{$video->video}}"
                                                             class="lightbox-image" data-fancybox="gallery"><i class="icon-33"></i></a>
                                    </div>
                                    <div class="text">
                                        <span>{{$video->text}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach($galleries as $gallery)
                            <div
                                class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column photo">
                                <div class="project-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="{{$gallery->getImage($gallery->image)}}" alt="">
                                        </figure>
                                        <div class="view-btn"><a href="{{$gallery->getImage($gallery->image)}}"
                                                                 class="lightbox-image" data-fancybox="gallery"><i class="icon-33"></i></a>
                                        </div>
                                        <div class="text">
                                            <span>{{$gallery->text}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- portfolio-page-section end -->


@endsection
