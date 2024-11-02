@extends('layouts.app')
@section('content')


    <!-- Page Title -->
    <section class="page-title">
        <div class="bg-layer" style="background-image: url({{$banners->getImage($banners->about_banner)}});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{__("site.About Us")}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{route('client.home')}}">{{__('site.Home')}}</a></li>
                    <li>{{__("site.About Us")}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- about-section -->
    <section class="about-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image_block_one">
                        <div class="image-box mr_30 pr_130 pb_100">
                            <div class="shape" style="background-image: url(assets/images/shape/shape-1.png"></div>
                            <figure class="image"><img src="{{$who->getImage($who->image)}}" alt=""></figure>
                            <div class="text p_absolute r_0 b_0">
                                <h2>{{$who->image_subbox_text_top}}</h2>
                                <h4>{{$who->image_subbox_text_bottom}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_one">
                        <div class="content-box ml_30">
                            <div class="sec-title left p_relative d_block mb_25">
                                <span class="sub-title">{{__('site.Who We Are?')}}</span>
                                <h2>{{$who->title}}</h2>
                            </div>
                            <div class="text p_relative d_block">
                                <p>{{$who->text}}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->


    <!-- service-style-two -->
    <section class="service-style-two about-page p_relative">
        <div class="pattern-layer">
            <div class="pattern-1 p_absolute l_20 b_20"
                 style="background-image: url(assets/images/shape/shape-18.png);"></div>
            <div class="pattern-2 p_absolute t_20 r_20"
                 style="background-image: url(assets/images/shape/shape-19.png);"></div>
        </div>
        <div class="auto-container">
            <div class="sec-title centred mb_50">
                <span class="sub-title">{{__("site.My Services")}}</span>
                <h2>{{__("site.My Services_subtitle")}}</h2>
            </div>
            <div class="row clearfix">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated" data-wow-delay="00ms"
                             data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{$service->getImage($service->image)}}" alt="">
                                    <a href="surgical-procedures.html"><i class="fas fa-link"></i></a>
                                </figure>
                                <div class="lower-content">
                                    <h3><a href="surgical-procedures.html">{{$service->title}}</a></h3>
                                    <div class="link p_relative d_block"><a href="surgical-procedures.html">{{__("site.Read More")}}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- service-style-two end -->



    <!-- chooseus-style-two -->
    <section style="height: 600px;" class="chooseus-style-two about-page p_relative">
        <div class="shape-3 p_absolute t_0 r_0">
        </div>

        <div class="video-column" style="background-image: url({{$aboutWho->getImage($aboutWho->video_thumbnail)}});">
            <div class="video-inner">
                <div class="video-btn">
                    <a href="{{$aboutWho->video}}" class="lightbox-image"
                       data-caption=""><i class="fas fa-play"></i></a>
                </div>
            </div>
        </div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_five">
                        <div class="content-box mr_70">
                            <div class="sec-title light mb_35">
                                <span class="sub-title">{{__("site.Why Choose")}}</span>
                                <h2 class="mb_25">{{$aboutWho->title}}</h2>
                                <p class="pt_2">{{$aboutWho->text}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- chooseus-style-two end -->







@endsection
