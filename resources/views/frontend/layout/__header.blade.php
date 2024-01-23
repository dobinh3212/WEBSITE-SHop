
<header class="entire_header">
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-5">
                    <div class="user-menu">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="value">VN</span><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('trangchu')}}">VietNam</a></li>
                                </ul>
                            </li>

                            <li>Welcome to Ecommerce</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-7">
                    <div class="header-right">
                        <ul>
                            <li>
                                <a href="{{ route('shop.cart') }}"><img src="./frontend/images/check.png" alt="#"> Giỏ Hàng</a>
                            </li>

                            @if(Auth::guard('customer')->check())
                                <li class="dropdown last-child dropdown-small">
                                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><img class="account" src="./frontend/images/account.png" alt="#"><span class="value">{{ Auth::guard('customer')->user()->name }} </span><i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu account-menu">
                                        <li><a href="{{ route('shop.informationUser') }}">Cài Đặt</a>
                                        </li>

                                        <li><a href="{{ route('shop.cart') }}">Giỏ Hàng</a>
                                        </li>
                                        <li><a id="btn-logout" href="{{ route('shop.logout') }}">Đăng Xuất</a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="last-child">
                                    <a class="logg" href="{{ route('shop.login') }}"><img class="login" src="./frontend/images/log.png" alt="#"> Đăng Nhập</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header-area:END -->

    <!-- Logo-area -->
    <div class="logo_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-3 col-xs-12">
                    <div class="logo">
                        <a href="/"><img src="{{ $setting->image }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-sm-9 col-md-9 col-xs-12">
                    <div class="search-area">


                        <form action="{{ route('shop.search') }}" method="get" autocomplete="off">
                            <div class="content-search">
                                <input class="search-field" name="query" id="search-product" placeholder="Search here..." />
                                <button class="search-button"{{--  href="#" --}}></button>
                            </div>
                        </form>
                        <div class="results-box" >

                        </div>

                    </div>
                    <div class="logo_right">
                        <span><i class="fa fa-phone"></i></span>
                        <a href="tel:+{{ $setting->hotline }}">CALL US FREE
                            <br/>{{ $setting->hotline }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO-AREA:END -->

    <!-- MENU-AREA -->
    <div class="menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="categories">
                        <ul id="nav">
                            <li>Danh Mục <i class="fa fa-bars"></i>

                                <ul class="ul_category">
                                    @foreach($categories as $key)

                                        <li>
                                            <a href="{{ route('shop.category',['slug'=>$key->slug]) }}">
                                               {{--  <i class="fa fa-male"></i>  --}}
                                                {!! $key->image ? "<img src='$key->image'>" :''!!}
                                                {{ $key->name }}
                                                {!! $key->categoryChildrens()->count() > 0 ? '<i class="fa fa-angle-right icon-right"></i>' : '' !!}
                                            </a>
                                            @if($key->categoryChildrens()->count() > 0)
                                                 <ul>
                                                    @foreach($key->categoryChildrens()->orderBy('position', 'asc')->get() as $item)
                                                        @if($item->is_active == 0)
                                                            @break
                                                        @endif
                                                        <li>
                                                            <a href="{{ route('shop.category',['slug'=>$item->slug]) }}">
                                                                {!! $item->image ? "<img src='$item->image'>" :''!!}
                                                                {{ $item->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>

                                    @endforeach
                                </ul>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 col-sm-6 col-xs-12">
                    <nav class="main-menu">
                        <ul id="navigation">
                            <li class="active"><a href="/">Trang Chủ </a></li>

                            @foreach($categories as $key => $val)
                                @if ( !in_array($val->position, [1,2,3,4,5]) || $key > 5)
                                    @break;
                                @endif
                                <li>
                                    <a href="{{ route('shop.category',['slug'=>$val->slug]) }}">
                                        {{ $val->name }}

                                        {{-- icon --}}
                                        {!! $val->categoryChildrens()->count() > 0 ? '<i class="fa fa-caret-down"></i>' : '' !!}
                                    </a>
                                    @if($val->categoryChildrens()->count() > 0)
                                        <ul class="drop_nav">
                                            @foreach($val->categoryChildrens()->orderBy('position', 'asc')->get() as $item)

                                                @if($item->is_active == 0 )
                                                    @break
                                                @endif

                                                <li>
                                                    <a href="{{ route('shop.category',['slug'=>$item->slug]) }}">{{ $item->name }}</a>
                                                </li>

                                            @endforeach
                                        </ul>
                                    @endif
                                </li>

                            @endforeach

                            <li>
                                <a href="{{ route('Articles') }}">Tin Tức
                                    {!! $categoriesArticles->count() > 0 ? '<i class="fa fa-caret-down"></i>' : '' !!}
                                </a>
                                @if($categoriesArticles->count() > 0)
                                    <ul class="drop_nav">
                                        @foreach($categoriesArticles as $item)

                                            <li>
                                                <a href="{{ route('Articles',['slug'=>$item->slug]) }}">{{ $item->name }}</a>
                                            </li>

                                        @endforeach
                                    </ul>
                                @endif

                            </li>
                            <li><a href="{{ route('contact') }}">Liên Hệ</a></li>

                        </ul>
                    </nav>

                    <!-- Mobile Navigation -->
                    <div class="only-for-mobile">
                        <div class="col-xs-12">
                            <ul class="ofm">
                                <li class="m_nav"><i class="fa fa-bars"></i> Menu</li>
                            </ul>

                            <!-- MOBILE MENU -->
                            <div class="mobi-menu">
                                <div id='cssmenu'>
                                    <ul>
                                        <li>
                                            <a href='/'><span>Trang Chủ</span></a>

                                        </li>

                                        @foreach($categories as $key)

                                            <li class="{{ $key->categoryChildrens()->count() > 0 ? 'has-sub': '' }}">
                                                <a href="{{ route('shop.category',['slug'=>$key->slug]) }}">
                                                    <span>{{ $key->name }}</span>
                                                </a>
                                                @if($key->categoryChildrens()->count() > 0)
                                                    <ul class="sub-nav">
                                                        @foreach($key->categoryChildrens()->orderBy('position', 'asc')->get() as $item)

                                                            @if($item->is_active == 0 )
                                                                @break
                                                            @endif

                                                            <li>
                                                                <a href="{{ route('shop.category',['slug'=>$item->slug]) }}">{{ $item->name }}</a>
                                                            </li>

                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>

                                        @endforeach
                                        <li>
                                            <a href='product-list.html'><span>Men</span></a>
                                        </li>
                                        <li class="{{ $categoriesArticles->count() > 0 ? 'has-sub': '' }}">

                                            <a href="{{ route('Articles') }}">Tin Tức</a>
                                            @if($categoriesArticles->count() > 0)
                                                <ul class="sub-nav">
                                                    @foreach($categoriesArticles as $item)

                                                        <li>
                                                            <a href="{{ route('Articles',['type'=>$item->slug]) }}">{{ $item->name }}</a>
                                                        </li>

                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                        <li><a href="{{ route('contact') }}">Liên Hệ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-2 col-sm-3 col-xs-12">
                    <div class="menu_right">
                        <a href="{{ route('shop.cart') }}"><i class="fa fa-shopping-cart"></i>CART</a>
                        <span></span>

                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- MENU-AREA:END -->
</header>
