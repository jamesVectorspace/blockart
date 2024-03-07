<header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header header-background-color">
        <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
        <a href="{{ route('dashboard') }}" class="b-brand text-decoration-none">
            <span class="b-title">{{ trimWords(preference('company_name'), 17) }}</span>
        </a>
    </div>
    <a class="mobile-menu text-decoration-none" id="mobile-header" href="javascript:">
        <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ltr:me-auto rtl:ms-auto d-flex flex-row flex-wrap float-left nav-menu ms-2">
            @foreach (\App\Lib\Menus\Admin\TopHeaderLeftMenu::get() as $liItem)
                @if (isset($liItem['visibility']) && $liItem['visibility'] === false)
                    @continue
                @endif

                <li class="ltr:ms-3 rtl:me-3 nav-parent">
                    {!! $liItem['item'] !!}
                </li>
            @endforeach
            
        </ul>

        <ul class="navbar-nav ltr:ms-lg-auto rtl:me-lg-auto ms-2 nav-icon me-5 me-lg-2">
            @php
                $flag = config('app.locale');
                $languages = \App\Models\Language::getAll()->where('status', 'Active');
            @endphp


            @if (in_array('App\Http\Controllers\DashboardController@switchLanguage', $prms) && $languages->isNotEmpty())
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle flag flag-icon-background flag-icon-{{ getSVGFlag($flag) }}" id="dropdown-flag" data-bs-toggle="dropdown" href="javascript:" ></a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">{{ __('Select Language') }}</h6>
                            </div>
                            <ul class="noti-body scroll-noti">
                                @foreach ($languages as $language)
                                    <li class="notification">
                                        <div class="media lang d-flex rtl:float-right" id="{{ $language->short_name }}" data-shortname="{{ $language->short_name }}">
                                            <img class="img-radius" src='{{ url("public/datta-able/fonts/flag/flags/4x3/" . getSVGFlag($language->short_name) . ".svg") }}' alt="{{ $language->flag }}">
                                            <div class="media-body">
                                                <p><span>{{ $language->name }}</span></p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
            @endif
            <li class="ltr:me-2 rtl:ms-2">
                <div class="dropdown drp-user">
                    <a href="javascript:void(0)" class="dropdown-toggle text-decoration-none" data-bs-toggle="dropdown">
                        <i class="icon feather icon-settings f-20"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="{{ Auth::user()->fileUrl() }}" class="img-radius" alt="User-Profile-Image">
                            <span>{{ Auth::user()->name }}</span>
                            @if (in_array('App\Http\Controllers\Site\LoginController@logout', $prms))
                                <a href="{{ route('users.logout') }}" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            @endif
                        </div>
                        <ul class="pro-body">
                            <li><a href="{{ route('users.profile') }}" class="dropdown-item text-decoration-none"><i class="feather icon-user"></i> {{ __('Profile') }}</a></li>
                            <li><a href="{{ route('users.activity') . '?userId=' . \Auth::id() }}" class="dropdown-item text-decoration-none"><i class="feather icon-activity"></i> {{ __('Login Activities') }}</a></li>
                            @if (in_array('App\Http\Controllers\Site\LoginController@logout', $prms))
                                <li><a href="{{ route('users.logout') }}" class="dropdown-item text-decoration-none"><i class="feather icon-lock"></i> {{ __('Log Out') }}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
