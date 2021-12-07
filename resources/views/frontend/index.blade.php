@extends('frontend.layout.__index')

@section('title')
    <title>Trang Chủ</title>
@endsection

@section('content')

    <!-- MAIN-SLIDER-AREA -->
    <div class="main_slider">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    @foreach($banners as $item)
                        <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000">
                        <!-- MAIN IMAGE -->
                            <a href="{{ $item->url }}" target="{{ $item->target }} " title="" style="display:block;width:100%;height:100%">
                                <img src="{{ $item->image }}" alt="darkblurbg" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat" style="width:100%;height:100%">
                            </a>
                        {{-- <!-- LAYER NR. 1 -->
                        <div class="tp-caption black_heavy_60 skewfromleftshort tp-resizeme rs-parallaxlevel-0" data-x="50" data-y="133" data-speed="500" data-start="1850" data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">{{ $item->title }}
                        </div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption grey_regular_18 customin tp-resizeme rs-parallaxlevel-0" data-x="50" data-y="200" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
                            <div style="text-align:left;">{{ $item->description }}</div>
                        </div> --}}
                        <!-- LAYER NR. 3 -->
                        
                    </li>
                      
                    @endforeach
                 
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
        </div>
    </div>
    <!-- MAIN-SLIDER-AREA END -->

     <!-- OUR-BRAND-AREA -->
    <div id="brand-bg">
        <div class="brand-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="partners_list">
                        
                            <div class="partners_list_carousel">
                                @foreach($brands as $key)
                                    <div class="item">
                                        <a href="{{ $key->website }}" target="_blank" title="">
                                            <img src="{{ $key->image }}"  alt="{{ $key->name }}">
                                        </a>
                                    </div>
                                @endforeach
                                
                            </div>
                        
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- OUR-BRAND-AREA END -->

    {{-- lấy danh mục cha --}}
    @foreach($data as $key)
         <!-- MEN-CLOTHING-AREA -->
    <section class="men_clothingcurosel_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h2>{{ $key['parent']->name }}</h2>
                    </div>
                    <div class="menclothing-carousel">
                      
                        {{-- lấy danh sách danh mục con theo danh mục cha --}}
                        @foreach($key['children'] as $product)
                            
                            
                            <div class="men-single" >
                                <div class="parent-images">
                                    <a href="{{ route('details.products', [ 'slug' => $product->slug]) }}"><img src="{{ $product->image }}" style="max-height:250px;" alt="#">
                                </a>
                                </div>
                                @if($product->is_hot)
                                     <div class="tag new">
                                        <span>Hot</span>
                                    </div>
                                @endif
                                <div class="hot-wid-rating">
                                    <h4>
                                        <a href="{{ route('details.products',[ 'slug' => $product->slug]) }}">
                                           {{ strlen($product->name)>55 ? mb_substr($product->name , 0 , 54 , 'UTF-8') . '...' :  $product->name }}
                                        </a>
                                    </h4>
                                   {{--  <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i> --}}
                                    <div class="product-wid-price">
                                        <ins>{{ number_format($product->sale , 0 ,',','.') }} ₫</ins> <del style="color:black;"><small>{{ number_format($product->price, 0 ,',','.') }}₫</small></del>
                                    </div>
                                </div>
                            </div>
                               
                        @endforeach 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MEN-CLOTHING-AREA END -->
    @endforeach
    

   

    
  
    <!-- LATEST-BLOG-AREA -->
    <section class="laest-blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h2>Bài viết mới nhất</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($arrArticlesHot as $post)
                <div class="col-sm-4">
                    <div class="blog-single">
                        <div class="blog-image">
                            <img src="{{ $post->image }}" width="100%" style="max-height:245px; min-height:245px;" alt="">
                            <div class="blog-icon">
                                <img src="./frontend/images/blog-icon.png" alt="#">
                            </div>
                        </div>
                        <div class="blog-text">
                            <h3><a href="{{ route('detailArticle',['slug'=>$post->slug]) }}">{{ $post->title }}</a></h3>
                            <hr class="blog-text-h3">
                            <P>{!! mb_substr($post->summary, 0 , 150) !!} {{ (strlen($post->summary) > 200)?' ...':'' }}</P>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- LATEST-BLOG-AREA END -->

@endsection
