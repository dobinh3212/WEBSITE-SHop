@extends('frontend.layout.__index')


@section('title')

    <title>{{ $product->meta_title }}</title>
    <meta name="description" content="{{ $product->meta_description }}">
    <meta name="keywords" content="{{ $product->meta_description }}"/>

@endsection


@section('css')
    <style type="text/css">
        iframe.fb_iframe_widget_lift {
            width: 100%!important;
        }

        .tab-content ul{
            padding-left: 25px;
        }


    </style>
@endsection
@section('content')
    <!-- PAGE-TITLE-AREA -->


   @if($banner)
        <section class="page-title-area" style="background: url({{ ($banner) ? $banner->image :'' }})no-repeat;background-position: center center;background-size: cover;">
            <a href="{{ ($banner && $banner->url) ? $banner->url :'Javacsript:void(0)' }}" style="display:block;" {{ ($banner && $banner->url) ? "target='$banner->target'" :'' }} >
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

    <!-- BREADCRUMBS -->
    <div class="title-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="bred-title">
                        <h3>Sản phẩm chi tiết</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="/">Trang Chủ</a></li>
                        <li><a href="{{ route('shop.category',['slug'=>$product->category->slug]) }}">{{ $product->category->name }}</a></li>
                        <li><a href="{{ route('details.products',['slug'=>$product->slug]) }}">{{ $product->name }}</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS:END -->

    <!-- PRODUCT-LIST-AREA -->
    <div class="single-product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="single-product-details">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="product-img-detail">

                                    <div class="single_product_image">
                                        <input type="hidden" id="__VIEWxSTATE" />
                                        <ul id='zoom1' class=''>
                                            <li>
                                                <img src="{{ $product->image }}" alt='image1' />
                                            </li>
                                            @foreach( $product_images as $key)

                                                <li>
                                                    <img src="{{ $key->image }}" alt='image product details {{ $key->id }}' />
                                                </li>

                                            @endforeach

                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single-product-content">
                                    <h1>{{ $product->name }}</h1>
                                    <div class="product-review">
                                        <ul>
                                            {{-- <li>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </li> --}}
                                            <li><span class="fb-comments-count" data-href="{{ url()->current() }}"></span> Review(s)</li>

                                        </ul>
                                        <h4 style="color:black;"><b>Trạng Thái : </b>  {!! ($product->stock > 0)?'<span class="badge" style="background: #33ff00;color: black;font-size: 13px;">Còn hàng</span>':'<span class="badge" style="background: #ff0000;color: black;font-size: 13px;">Hết Hàng</span>' !!}</span>
                                        </h4>
                                        <h4 style="color:black;padding-top: 5px;"><b>Thương Hiệu : </b> <span> {{ ($product->brand ) ? $product->brand->name : 'Khác' }} </span></h4>
                                        @if($product->color)
                                            <h4><b>Màu : </b> <span>{{ $product->color }}</span></h4>
                                        @endif

                                        @if($product->memory)
                                            <h4><b>Bộ Nhớ : </b> <span>{{ $product->memory }}</span></h4>
                                        @endif

                                        <div class="product-wid-price">

                                            <ins style="color:#ff000;">{{ number_format($product->sale,0,',','.') }} ₫</ins>
                                            <del style="color:#000;">{{ number_format($product->price , 0 , ',','.') }} ₫</del>
                                        </div>
                                        {{-- <p>The ship set ground on the shore of this uncharted desert isle with Gilligan the Skipper too the millionaire and his wife. And when the odds are against him and their dangers work to do. </p> --}}
                                        {!! $product->summary !!}
                                    </div>
{{--
                                    <div class="single-color">
                                        <div class="product-color">
                                            <h4>Color :</h4>
                                            <ul>
                                                <li>
                                                    <a class="black-clr" href="javascript:void(0)"></a>
                                                </li>
                                                <li>
                                                    <a class="yellow-clr" href="#"></a>
                                                </li>
                                                <li>
                                                    <a class="red-clr" href="#"></a>
                                                </li>
                                                <li>
                                                    <a class="rose-clr" href="#"></a>
                                                </li>
                                                <li>
                                                    <a class="pest-clr" href="#"></a>
                                                </li>
                                                <li>
                                                    <a class="grey-clr" href="#"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-size">
                                            <p>Size :</p>
                                            <select>
                                                <option>XL</option>
                                                <option>L</option>
                                                <option>M</option>
                                                <option>S</option>
                                                <option>XS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single-color">
                                        <div class="product-collection">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-heart-o"></i></a>
                                                </li>
                                                <li><a href="#"><i class="fa fa-exchange"></i></a>
                                                </li>
                                                <li><a href="#"><i class="fa fa-envelope-o"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>  --}}
                                    <div class="single-color last-color-child">
                                        <div class="size-heading">
                                            <h5>Qty :</h5>
                                        </div>
                                        <div class="size-down">
                                            <input type="number" step="1" min="0" id="quantity" max="{{ $product->stock }}" value="1" title="Qty" class="input-text qty text" size="4">
                                        </div>
                                        <div class="size-cart">
                                            <a href="javascript:void(0)" data-id="{{ $product->id }}" class="fa fa-shopping-cart">  &nbsp;  Thêm Giỏ Hàng</a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab product-tab-single">
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Mô Tả Chi Tiết</a>
                            </li>
                            <li role="presentation"><a href="#comment" aria-controls="comment" role="tab" data-toggle="tab">Đánh Giá</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content" style="color:#333">

                            <div role="tabpanel" class="tab-pane active" id="description">
                                @if(strlen(trim($product->description,' ')) == 0)
                                    <div class="alert alert-success">
                                        Đang cập nhập ....
                                    </div>
                                @else
                                    <div class="content-description">
                                        {!! $product->description !!}
                                    </div>
                                    <div class="xem-them text-center">
                                        <div class="btn btn-default btn-view-more">
                                            <span class="more-text">Xem thêm <i class="fa fa-chevron-down"></i></span>
                                            <span class="less-text">Thu gọn <i class="fa fa-chevron-up"></i></span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div role="tabpanel" class="tab-pane" id="comment">
                                 <div id="fb-root"></div>

                                <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5" ></div>
                            </div>
                        </div>

                    </div>

                </div>
                {{-- <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="brands">
                        <h3>Brands <i class="fa fa-bars"></i></h3>
                        <ul>
                            <li> <input type="checkbox" name="vehicle" value="Bike"> Awesome <span>(03)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike"> Beauty <span>(05)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike"> Elegant <span>(11)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike"> Fantastic <span>(01)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike"> Wonderful <span>(06)</span>
                            </li>
                        </ul>
                    </div>
                    <div class="filter">
                        <h3>Filter by price</h3>
                        <div class="filter_inner">
                            <div id="slider-range"></div>
                            <div class="f_price">
                                <div class="filter_a">
                                    <a href="#">Lọc</a>
                                </div>
                                <div class="cat_filter_box">
                                    <p>
                                        <input type="text" id="amount" readonly style="border:0; color:#000; font-weight:bold;">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="colours">
                        <h3> Mức Giá <i class="fa fa-bars"></i></h3>
                        <ul>
                            <li> <input type="checkbox" name="vehicle" value="Bike">  0đ <i class="fa fa-long-arrow-right"></i>2.000.000đ <span>(03)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike">  2.000.000đ <i class="fa fa-long-arrow-right"></i>5.000.000đ  <span>(05)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike">  5.000.000đ <i class="fa fa-long-arrow-right"></i>10.000.000đ <span>(05)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike">  10.000.000đ <i class="fa fa-long-arrow-right"></i>25.000.000đ <span>(05)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike">  25.000.000đ <i class="fa fa-long-arrow-right"></i>50.000.000đ <span>(05)</span>
                            </li>
                            <li> <input type="checkbox" name="vehicle" value="Bike">  Trên 50.000.000đ <span>(05)</span>
                            </li>

                        </ul>
                    </div>
                    <div class="best-sell">
                        <h3 style="font-size:15px;">Sản phẩm bán chạy</h3>

                        <div id="plCarousel" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <div class="single-wid-product sel-pd">
                                        <a href="#"><img src="./frontend/images/sell1.png" alt="" class="product-thumb">
                                        </a>
                                        <h2><a href="single-product.html">Canon mini model</a></h2>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                            <ins>$250.00</ins>
                                        </div>
                                    </div>
                                    <div class="single-wid-product sel-pd">
                                        <a href="#"><img src="./frontend/images/sell2.png" alt="" class="product-thumb">
                                        </a>
                                        <h2><a href="single-product.html">Nexus</a></h2>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                            <ins>$250.00</ins>
                                        </div>
                                    </div>
                                    <div class="single-wid-product sel-pd">
                                        <a href="#"><img src="./frontend/images/sell3.png" alt="" class="product-thumb">
                                        </a>
                                        <h2><a href="single-product.html">Pink women bag</a></h2>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                            <ins>$250.00</ins>
                                        </div>
                                    </div>
                                    <div class="single-wid-product sel-pd">
                                        <a href="#"><img src="./frontend/images/sell4.png" alt="" class="product-thumb">
                                        </a>
                                        <h2><a href="single-product.html">Trendy Watch</a></h2>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                            <ins>$250.00</ins>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-wid-product sel-pd">
                                        <a href="#"><img src="./frontend/images/sell1.png" alt="" class="product-thumb">
                                        </a>
                                        <h2><a href="single-product.html">Canon mini model</a></h2>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                            <ins>$250.00</ins>
                                        </div>
                                    </div>
                                    <div class="single-wid-product sel-pd">
                                        <a href="#"><img src="./frontend/images/sell2.png" alt="" class="product-thumb">
                                        </a>
                                        <h2><a href="single-product.html">Nexus</a></h2>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                            <ins>$250.00</ins>
                                        </div>
                                    </div>
                                    <div class="single-wid-product sel-pd">
                                        <a href="#"><img src="./frontend/images/sell3.png" alt="" class="product-thumb">
                                        </a>
                                        <h2><a href="single-product.html">Pink women bag</a></h2>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                            <ins>$250.00</ins>
                                        </div>
                                    </div>
                                    <div class="single-wid-product sel-pd">
                                        <a href="#"><img src="./frontend/images/sell4.png" alt="" class="product-thumb">
                                        </a>
                                        <h2><a href="single-product.html">Trendy Watch</a></h2>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                            <ins>$250.00</ins>
                                        </div>
                                    </div>
                                </div>

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
                </div> --}}

            </div>
             <div class="row" style="margin-top:15px;">
                <div class="col-md-12">
                    <div class="headline">
                        <h2>Sản phẩm cùng danh mục</h2>
                    </div>
                    <div class="menclothing-carousel list-product-details">
                        @foreach($arrProductAttach as $item)
                            <div class="men-single">
                                <div class="parent-images">
                                    <a href="{{ route('details.products',[ 'slug' => $item->slug]) }}"><img src="{{ $item->image }}" style="max-height:260px;" alt="#">
                                </a>
                                </div>
                                @if($item->is_hot)
                                    <div class="tag new">
                                        <span>Hot</span>
                                    </div>
                                @endif
                                <div class="hot-wid-rating">
                                    <h4><a href="{{ route('details.products',[ 'slug' => $item->slug]) }}">
                                        {{ mb_substr($item->name , 0 , 54 , 'UTF-8') }} {{strlen($item->name)>55 ? ' ...': ''}}</a>
                                    </h4>
                                    <div class="product-wid-price">
                                        <ins>{{ number_format($item->sale , 0 ,',','.') }} ₫</ins> <del style="color:black;"><small>{{ number_format($item->price, 0 ,',','.') }} đ</small></del>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- PRODUCT-LIST:END -->
@endsection
@section('js')

    {{-- js giao diện --}}
    <script src="./frontend/js/jquery-ui.js"></script>
    <script>
      $(function() {
        $( "#slider-range" ).slider({
          range: true,
          min: 0,
          max: 100000000,
          values: [ 520, 100000000 ],
          slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
          }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
          " - $" + $( "#slider-range" ).slider( "values", 1 ) );
      });
    </script>

    <!-- glasscase js -->
    <script src="./frontend/js/jquery.glasscase.minf195.js"></script>

    <script type="text/javascript">
        $(function () {
            //ZOOM
            $("#zoom1").glassCase({ 'widthDisplay': 456, 'heightDisplay': 470, 'isSlowZoom': true });
        });
    </script>

    <script type="text/javascript">
        // Xử lý sự kiện
        $(document).ready(function () {
            /*thêm giỏ hàng*/
            $('.fa-shopping-cart').click(function(event){
                event.preventDefault();
                var qty = $("#quantity").val();
                var max = $("#quantity").attr('max');

                if(Number(qty) > max){
                    alert("Không đủ số lượng bán ");
                    return;
                }
                var id = $(this).data('id');
                location.href = "/dat-hang/"+id+"/"+qty;
            })


            /* xử lý nút xem thêm mô tả*/
            $('.btn-view-more').click(function(event){
                event.preventDefault();
                var $this = $(this);
                $this.parent().prev('.content-description').toggleClass('expanded');
                $('html,body').animate({ scrollTop:$('.content-description').offset().top - 110 }, 'slow');
                $(this).toggleClass('active');
                return false;
            });
        })

    </script>

    @if (session('error'))

        <script>
            alert(<?=json_encode(session('error'))?>)
        </script>

    @endif
   {{--  comment facebook --}}
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=1393238477712926&autoLogAppEvents=1" nonce="Bz3hrdsS"></script>
@endsection
