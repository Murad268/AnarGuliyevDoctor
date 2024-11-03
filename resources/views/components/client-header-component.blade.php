



</div>
<!-- main header -->
<header class="main-header">
    <!-- header-top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="top-inner">
                <div class="left-column">
                    <ul class="info clearfix">
                        <li><i class="icon-1"></i> <a href="mailto:{{$email}}">{{$email}}</a></li>
                        <li><i class="icon-3"></i><a href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}">{{$phone}}</a></li>
                    </ul>
                </div>
                <div class="right-column">
                    <div class="schedule"><i class="icon-4"></i>{{$infos->work_hours_weekday}}</div>
                    <ul class="social-links clearfix">
                        @if(!empty($infos->facebook))
                            <li><a href="{{ $infos->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if(!empty($infos->instagram))
                            <li><a href="{{ $infos->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        @endif
                        @if(!empty($infos->tiktok))
                            <li>
                                <a href="{{ $infos->tiktok }}" target="_blank">
                                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="currentColor">
                                        <path d="M33.25 4H30.9a1.6 1.6 0 0 0-1.6 1.6v21.68a4.88 4.88 0 1 1-3.62-4.74v-4.3a9.18 9.18 0 1 0 7.1 8.91V10.83a14.48 14.48 0 0 0 5.48 1.09h1.47a1.6 1.6 0 0 0 1.6-1.6V7.65A1.6 1.6 0 0 0 40.23 6h-.36a9.16 9.16 0 0 1-6.62-2.9V4z"/>
                                    </svg>
                                </a>
                            </li>
                        @endif
                        @if(!empty($infos->twitter))
                            <li><a href="{{ $infos->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        @endif
                        @if(!empty($infos->linkedin))
                            <li><a href="{{ $infos->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        @endif

                        @if(!empty($infos->youtube))
                            <li><a href="{{ $infos->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        @endif
                    </ul>




                </div>
            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="auto-container">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{route("client.home")}}"><img src="{{$infos->getImage($infos->logo)}}" alt=""></a></figure>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                @foreach($menus as $menu)
                                    @if(!$menu->is_details_page)
                                        <li class="{{ Route::is('client.'.$menu->code) ? 'current' : '' }}">
                                            <a href="{{ $menu->link }}">{{ $menu->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="nav-right">

                    <div style="display: flex; gap: 10px; margin-right: 30px">
                        @foreach($langs as $lang)
                            <div style="display: flex; align-items: center;">
                                <a href="{{ url('language') }}/{{ $lang->code }}" style="text-decoration: none; color: inherit;">
                                    <span class="fi fi-{{ $lang->site_code }}"></span>
                                </a>
                            </div>
                        @endforeach
                    </div>


                    <div class="btn-box">
                        <a href="index-2.html" class="theme-btn btn-one">{{__("site.Appointment")}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{route("client.home")}}"><img src="{{$infos->getImage($infos->logo)}}" alt=""></a></figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <div class="nav-right">

                    <div class="btn-box">
                        <a href="{{route("client.home")}}" class="theme-btn btn-one">{{__("site.Appointment")}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>

    <nav class="menu-box">
        <div class="nav-logo"><a href="{{route("client.home")}}"><img src="{{$infos->getImage($infos->logo)}}" alt="" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li><a href="tel:{{ preg_replace('/[^0-9]/', '', $phone) }}">{{ $phone }}</a></li>
                <li><a href="mailto:{{$email}}">{{$email}}</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                @if(!empty($infos->twitter))
                    <li><a href="{{ $infos->twitter }}" target="_blank"><span class="fab fa-twitter"></span></a></li>
                @endif

                @if(!empty($infos->facebook))
                    <li><a href="{{ $infos->facebook }}" target="_blank"><span class="fab fa-facebook-square"></span></a></li>
                @endif

                @if(!empty($infos->pinterest))
                    <li><a href="{{ $infos->pinterest }}" target="_blank"><span class="fab fa-pinterest-p"></span></a></li>
                @endif

                @if(!empty($infos->instagram))
                    <li><a href="{{ $infos->instagram }}" target="_blank"><span class="fab fa-instagram"></span></a></li>
                @endif

                @if(!empty($infos->youtube))
                    <li><a href="{{ $infos->youtube }}" target="_blank"><span class="fab fa-youtube"></span></a></li>
                @endif
            </ul>

        </div>
    </nav>
</div><!-- End Mobile Menu -->
