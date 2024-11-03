<!-- main-footer -->
<footer class="main-footer p_relative">
    <div class="footer-top">
        <div class="auto-container">
            <div class="top-inner">

                <div style="height: 200px" class="footer-logo">
                    <figure style="height: 200px; padding: 30px; " class="logo"><a href="index-2.html"><img src="{{$infos->getImage($infos->logo)}}" alt=""></a></figure>
                </div>

            </div>
        </div>
    </div>
    <div class="widget-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                    <div class="about-widget footer-widget mr_40">

                        <div class="widget-content">
                            <ul class="social-links clearfix">
                                @if(!empty($infos->facebook))
                                    <li ><a style="display: flex; align-items: center; justify-content: center" href="{{ $infos->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                @endif

                                @if(!empty($infos->twitter))
                                    <li><a style="display: flex; align-items: center; justify-content: center" href="{{ $infos->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                @endif

                                @if(!empty($infos->instagram))
                                    <li><a style="display: flex; align-items: center; justify-content: center" href="{{ $infos->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                @endif

                                @if(!empty($infos->linkedin))
                                    <li><a style="display: flex; align-items: center; justify-content: center" href="{{ $infos->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                @endif

                                @if(!empty($infos->youtube))
                                    <li><a style="display: flex; align-items: center; justify-content: center" href="{{ $infos->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                @endif
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="links-widget footer-widget ml_100">
                        <div class="widget-title">
                            <h3>{{__("site.Links")}}</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                @foreach($menus as $menu)
                                    @if(!$menu->is_details_page && $menu->see_on_footer)
                                        <li class="{{ Route::is('client.'.$menu->code) ? 'current' : '' }}">
                                            <a href="{{ $menu->link }}">{{ $menu->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                    <div class="links-widget footer-widget ml_30">
                        <div class="widget-title">
                            <h3>{{__("site.Services")}}</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                @foreach($servicesFooter as $service)
                                    <li><a href="index-2.html">{{$service->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="contact-widget footer-widget ml_50">
                        <div class="widget-title">
                            <h3>{{__('site.Contacts')}}</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="info clearfix">
                                <li><i class="fas fa-map-marker-alt"></i> {{$infos->address}}</li>
                                <li><i class="fas fa-phone"></i> <a href="tel:{{$phone}}">{{$phone}}</a></li>
                                <li><i class="fas fa-envelope"></i> <a href="mailto:{{$email}}">{{$email}}</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom centred">
        <div class="auto-container">
            <div class="copyright">
                © {{ now()->format('Y') }} All rights reserved.
            </div>
        </div>
    </div>
</footer>
<!-- main-footer end -->
