@extends('frontend.layout.__index')

@section('css')

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

    <!-- BREADCRUMBS  -->
    <div class="title-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="bred-title">
                        <h3>{{ ($banner) ? $banner->title :'' }}</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a>
                        </li>
                        <li><a href="{{ route('shop.category',['slug'=>$category->slug]) }}">{{ $category->name }}</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS:END  -->

    <!-- PRODUCT-LIST-AREA  -->
    <div class="product-list-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="brands">
                        <h3>Thương Hiệu<i class="fa fa-bars"></i></h3>
                        <ul>
                            @foreach($brands as $key => $item)
                            <li> <label> <input type="checkbox" id="filter-brand-{{ $item->id }}" class="filter-brand"  value="{{ $item->id }}"> {{ $item->name }} </label></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="colours">
                        <h3>Giá Sản Phẩm <i class="fa fa-bars"></i></h3>
                        <ul>
                            <li> <label> <input type="checkbox" data-operator="OR" data-filter="price" id="filter-price-0-1000000" class="filter-price" value="0-1000000"> Giá dưới 1.000.000đ </label></li>
                            <li> <label> <input type="checkbox" data-operator="OR" data-filter="price" id="filter-price-1000000-2000000" class="filter-price" value="1000000-2000000"> 1.000.000đ - 2.000.000đ </label></li>
                            <li> <label> <input type="checkbox" data-operator="OR" data-filter="price" id="filter-price-2000000-5000000" class="filter-price" value="2000000-5000000"> 2.000.000đ - 5.000.000đ </label></li>
                            <li> <label> <input type="checkbox" data-operator="OR" data-filter="price" id="filter-price-5000000-10000000" class="filter-price" value="5000000-10000000"> 5.000.000đ - 10.000.000đ </label></li>
                            <li> <label> <input type="checkbox" data-operator="OR" data-filter="price" id="filter-price-10000000-25000000" class="filter-price" value="10000000-25000000"> 10.000.000đ - 25.000.000đ </label></li>
                            <li> <label> <input type="checkbox" data-operator="OR" data-filter="price" id="filter-price-25000000-50000000" class="filter-price" value="25000000-50000000"> 25.000.000đ - 50.000.000đ </label></li>
                            <li> <label> <input type="checkbox" data-operator="OR" data-filter="price" id="filter-price-50000000" class="filter-price" value="50000000"> Giá trên 50.000.000đ </label></li>
                        </ul>
                    </div>
                    <div class="best-sell">
                        <h3>Sản phẩm bán chạy</h3>

                        <div id="plCarousel" class="carousel slide" data-ride="carousel">

                          <!-- Wrapper for slides -->
                          <div class="carousel-inner" role="listbox">

                            @for($i = 0 ; $i < ceil( $sellingProducts->count()/4) ; $i++)
                                <div class="item {{ $i==0?'active':'' }}">
                                    @foreach($sellingProducts as $item=>$key)
                                        @if($i*4 <= $item &&  $item < ($i+1) * 4)
                                            <div class="single-wid-product sel-pd">
                                                <a href="{{ route('details.products',[ 'slug' => $key->slug]) }}"><img src="{{ $key->image }}" alt="" class="product-thumb">
                                                </a>
                                                <h2><a href="{{ route('details.products',[ 'slug' => $key->slug]) }}">{{ (strlen($key->name) > 55) ? mb_substr($key->name , 0 , 54 , 'UTF-8')." ..." : $key->name }}</a></h2>

                                                <div class="product-wid-price">
                                                    <ins style="font-size:15px;">{{ number_format($key->sale , 0 , ',' , '.') }} ₫</ins>
                                                </div>
                                            </div>
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
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                   
                    @if($products->count() > 0)
                        <div class="row">
                            @foreach($products as $key)

                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="product-single">
                                        <div class="parent-images" style="height:300px!important;">
                                            <a href="{{ route('details.products',[ 'slug' => $key->slug]) }}"><img src="{{ $key->image }}" alt="#" style="max-height:100% ; max-width:100%;"></a>
                                        </div>
                                        @if($key->is_hot)
                                            <div class="tag new">
                                                <span>hot</span>
                                            </div>
                                        @endif
                                        <div class="hot-wid-rating">
                                            <h4>
                                                <a href="{{ route('details.products',[ 'slug' => $key->slug]) }}">
                                                        {{ (strlen($key->name) > 55) ? mb_substr($key->name , 0 , 54 , 'UTF-8')." ..." : $key->name }}
                                                </a>
                                            </h4>
                                            <div class="product-wid-price"> <ins >{{ number_format($key->sale , 0 , ',' , '.') }} ₫</ins> </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center">
                            {{ $products->appends(request()->all())->links() }}
                        </div>
                    @else
                        <div class="alert alert-warning">
                            <strong>Warning! </strong> Không tồn tại bản ghi nào .
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT-LIST:END -->

@endsection

@section('js')


    <!-- Range js -->
    <script src="./frontend/ui/1.11.4/jquery-ui.js"></script>
    <script>
      $(function() {
        $( "#slider-range" ).slider({
          range: true,
          min: 150,
          max: 1400,
          values: [ 520, 1100 ],
          slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
          }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
          " - $" + $( "#slider-range" ).slider( "values", 1 ) );
      });
    </script>

    <script src="./frontend/js/advanced_search_product.js"></script>
@endsection
