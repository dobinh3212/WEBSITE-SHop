@extends('frontend.layout.__index')

@section('css')
<style type="text/css">

    .pagination{
        width: auto!important;
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
                        <h3>Tin Tức</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a>
                        </li>
                        <li><a href="{{ route('Articles') }}">{{ $title_article }}</a>
                        </li>

                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS:END -->
	
    <!-- PRODUCT-LIST-AREA  -->
    <div class="product-list-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12">
                    @if($title_search)
                        <div class="alert alert-success">
                            {{ $title_search }}
                        </div>
                    @endif
                    @if($listArticles->total() > 0)
                        @foreach($listArticles as $item)
                            <div class="blog">
                                <div class="blog-img">
                                    <img src="{{ $item->image }}" alt="" style="max-height:450px;">
                                    <div class="blog-sign">
                                        <img src="./frontend/images/blog-sign.png" alt="#" >
                                    </div>
                                </div>
                                <div class="blog-down-text">
                                    <h3><a href="{{ route('detailArticle' , [ 'slug' => $item->slug]) }}">{{ $item->title }}</a></h3>
                                    <hr class="blog-h3">
                                    <P> {!! $item->summary !!} </P>
                                    <hr class="blog-h3">
                                </div>
                                <div class="blog-comments" >
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> {{($item->created_at)?date_format($item->created_at , 'd/m/Y') :''}}</li>
                                      
                                       {{--  <li class="comment-count "><i class="fa fa-comment-o"></i> 
                                             
                                            <span class="fb-comments-count" data-href="{{ route('detailArticle' , ['slug'=>$item->slug]) }}"></span>
                                            Comment
                                        </li> --}}
                                    </ul>
                                    <button type="button" onclick="location.href = '{{ route('detailArticle' , [ 'slug' => $item->slug]) }}';" class="btn btn-default">Read more</button>
                                </div>
                            </div>
                        @endforeach
                        
                        <div class="text-center">
                            {{ $listArticles->appends(request()->all())->links() }}
                        </div>
                    @else
                        <div class="alert alert-success">
                            Đang Cập Nhập ......
                        </div>
                    @endif
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="blog-search">
                        <h3>Search</h3>
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
                           {{--  <li><a href="{{ route('Articles') }}"> Tất Cả </a></li>
                            <li><a href="{{ route('Articles' , ['slug' => 'tin-tuc-noi-bat-1']) }}"> Tin tức nổi bật </a></li>
                            <li><a href="{{ route('Articles' , ['slug' => 'tin-khuyen-mai-2']) }}"> Tin khuyến mại </a></li>
                            <li><a href="{{ route('Articles' ,['slug' => 'huong-dan-ky-thuat-3']) }}"> Hướng dẫn kỹ thuật </a></li>
                            <li><a href="{{ route('Articles',['slug' => 'tin-tuc-phu-kien-4']) }}"> Tin tức phụ kiện </a></li>
                            <li><a href="{{ route('Articles',['slug' => 'tin-tuyen-dung-5']) }}"> Tin Tuyển Dụng </a></li> --}}
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
                        <h3>Bài viết gần đây </h3>
                        @foreach($arrArticlesNew as $key)
                        <div class="recent-single">
                            <img src="{{ $key->image }}" alt="#" style="max-width:80px;">
                            <div class="recent-text">
                                <h5><a href="{{ route('detailArticle' , [ 'slug' => $key->slug]) }}">{{ $key->title }}</a></h5>
                                <p><i class="fa fa-calendar"></i> {{($key->created_at)?date_format($key->created_at , 'd/m/Y') :''}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                   
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

@section('js')
   {{--  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=1393238477712926&autoLogAppEvents=1" nonce="Bz3hrdsS"></script> --}}
    
@endsection