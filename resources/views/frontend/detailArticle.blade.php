@extends('frontend.layout.__index')
@section('css')
     <style type="text/css">
         iframe.fb_iframe_widget_lift {
            width: 100%!important;
        }
     </style>
@endsection

@section('content')
	 <!-- PAGE-TITLE-AREA -->
    @if($banner)
        <section class="page-title-area" style="background: url({{ ($banner) ? $banner->image :'' }})no-repeat;background-position: center center;background-size: cover;">
            <a href="{{ ($banner && $banner->url) ? $banner->url :'javascript:void(0)' }}" style="display:block;" {{ ($banner && $banner->url) ? "target='$banner->target'" :'' }} >
                <div class="page-title-overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="page-title">
                                    <h3>{{ ($banner) ? $banner->title :'' }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </section>
    @endif
    <!-- PAGE-TITLE-AREA:END -->
	
    <!--  BREADCRUMBS -->
    <div class="title-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="bred-title">
                        <h3>Chi Tiết Tin Tức</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a>
                        </li>
                        <li><a href="{{ route('Articles') }}">Tin Tức</a>
                        </li>

                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS:END -->
	
    <!-- PRODUCT-LIST-AREA -->
    <div class="product-list-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="blog">
                        <div class="blog-img">
                            <img src="{{ $article->image }}" alt="">
                            <div class="blog-sign">
                                <img src="./frontend/images/blog-sign.png" alt="#">
                            </div>
                        </div>
                        <div class="blog-down-text">
                            <div class="blog-heading">
                                <h3>{{ $article->title }}</h3>
                            </div>
                            {!! $article->description !!}
                        </div>
						<hr class="blog-h3">
                        <div class="blog-comments">
                            <ul>
                                <li>
                                    <i class="fa fa-calendar"></i>
                                    @if($article->created_at)
                                        {{ date_format($article->created_at , 'd/m/Y')}}
                                    @endif
                                </li>
                             
                                <li><a href="#"><i class="fa fa-comment-o"></i> <span class="fb-comments-count" data-href="{{ url()->current() }}"></span> Comments</a></li>
                            </ul>
                            {{-- <div class="cc-com-r">
								<a href="#"><i class="fa fa-user"></i>Posted By : kous Anderson</a>
							</div> --}}
                        </div>
                    </div>
                   
                    <div class="three-comments">
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=1393238477712926&autoLogAppEvents=1" nonce="Bz3hrdsS"></script>
                        <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5" ></div>
                    </div>

                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="blog-search">
                        <h3>Search</i></h3>
                        <div class="blog-search-area">
                             <form action="{{ route('Articles') }}" method="get">
                                <input class="search-field" name="query" type="text" placeholder="Search here..." />
                                <button class="search-button" type="submit"></a>
                            </form>
                        </div>
                    </div>                  
                    <div class="blog-categories">
                        <h3>Danh Mục Tin Tức</h3>
                        <ul>
                            @if($categoriesArticles->count() > 0)
                                @foreach($categoriesArticles as $key=>$item )
                                    <li>
                                        <a href="{{ route('Articles',['slug' => $item->slug]) }}"> {{ $item->name }} </a>
                                    </li>
                                @endforeach
                            @else
                                <div class="pl-2 alert alert-success" style="padding-left:22px; margin-bottom:0px;">
                                    Đang cập nhật ....
                                </div>
                            @endif 
                        </ul>
                    </div>
                    <div class="recent-post">
                        <h3>BÀI VIẾT Mới nhất</h3>
                        @foreach($arrArticlesNew as $key)
                            <div class="recent-single">
                                <img src="{{ $key->image }}" style="max-width:80px;" alt="#">
                                <div class="recent-text">
                                    <h5><a href="{{ route('detailArticle' , ['slug'=>$key->slug]) }}">{{ $key->title }}</a></h5>
                                    <p><i class="fa fa-calendar"></i>  {{($key->created_at)?date_format($key->created_at , 'd/m/Y') :''}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="recent-post">
                        <h3>BÀI VIẾT Liên Quan</h3>
                        @foreach($listArticles as $key)
                            <div class="recent-single">
                                <img src="{{ $key->image }}" style="max-width:80px;" alt="#">
                                <div class="recent-text">
                                    <h5><a href="{{ route('detailArticle' , ['slug'=>$key->slug]) }}">{{ strlen($key->title) > 70 ? mb_substr($key->title , 0 , 69).'...' : $key->title }}</a></h5>
                                    <p><i class="fa fa-calendar"></i>  {{($key->created_at)?date_format($key->created_at , 'd/m/Y') :''}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                     @if(Cookie::has('viewed-articles'))
                        <div class="best-sell">
                            <h3>Tin Tức Đã Xem</h3>
                            
                            <div id="plCarousel" class="carousel slide" data-ride="carousel">

                              <!-- Wrapper for slides -->
                              <div class="carousel-inner" role="listbox">
                
                                @for($i = 0 ; $i < ceil( count($viewedArticles) /4) ; $i++) 
                                    <div class="item {{ $i==0?'active':'' }}" style="height:352px;">
                                        @foreach($viewedArticles as $item=>$key)
                                            @if($i*4 <= $item &&  $item < ($i+1) * 4)
                                                <div class="recent-single">
                                                    <img src="{{ $key->image }}" style="max-width:80px;" alt="#">
                                                    <div class="recent-text">
                                                        <h5><a href="{{ route('detailArticle' , ['slug'=>$key->slug]) }}">{{ strlen($key->title) > 70 ? mb_substr($key->title , 0 , 69).'...' : $key->title }}</a></h5>
                                                        <p><i class="fa fa-calendar"></i>  {{($key->created_at)?date_format($key->created_at , 'd/m/Y') :''}}</p>
                                                    </div>
                                                </div>
                                                {{-- <div class="single-wid-product sel-pd">
                                                    <a href="{{ route('details.products',[ 'slug' => $key->slug]) }}"><img src="{{ $key->image }}" alt="" class="product-thumb">
                                                    </a>
                                                    <h2><a href="{{ route('details.products',[ 'slug' => $key->slug]) }}">{{ (strlen($key->name) > 55) ? mb_substr($key->name , 0 , 54 , 'UTF-8')." ..." : $key->name }}</a></h2>
                                                   
                                                    <div class="product-wid-price">
                                                        <ins style="font-size:15px;">{{ number_format($key->sale , 0 , ',' , '.') }} ₫</ins>
                                                    </div>
                                                </div>   --}}
                                            @endif
                                        @endforeach
                                    </div>
                                @endfor
                              


                              </div>

                              <!-- Left and right controls -->
                              <a class="left carousel-control" href="#plCarousel" role="button" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right carousel-control" href="#plCarousel" role="button" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>
                            </div>
                            
                        </div>
                    @endif
                    {{-- <div class="archives">
                        <h3>Archives</h3>
                        <ul>
                            <li><a href="#"> Appril <span>(03)</span></a>
                            </li>
                            <li><a href="#"> March <span>(05)</span></a>
                            </li>
                            <li><a href="#"> January <span>(11)</span></a>
                            </li>
                            <li><a href="#"> December <span>(01)</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="popular-tag">
                        <h3>Popular tags</h3>
                        <div class="tag-cloud">
                            <a href="#">Amazing</a>
                            <a href="#">Envato</a>
                            <a href="#">Fun</a>
                            <a href="#">Clean</a>
                            <a href="#">Clothing</a>
                            <a href="#">Spa</a>
                            <a href="#">Mobile</a>
                            <a href="#">Tablet</a>
                            <a href="#">Design</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT-LIST:END -->
@endsection