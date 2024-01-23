@extends('frontend.layout.__index')


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

<!--BREADCRUMBS    -->
<div class="title-breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="bred-title">
					<h3>Tìm Kiếm</h3>
				</div>
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a>
					</li>
					<li><a href="about-us.html">Tìm Kiếm</a>
					</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<!--BREADCRUMBS:END    -->

<!--PRODUCT-LIST-AREA    -->
<div class="search-result-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="headline">
							<h2>Kết Quả Tìm Kiếm <span>{{ $total ? $total.'(items)' : '' }}</span></h2>
						</div>
						<div class="product-tab">
							<!-- Tab panes -->
							<div class="row">
								
								@if($total > 0)
									 @foreach($products as $key)

			                            <div class="col-md-3 col-sm-3 col-xs-12">
			                                <div class="product-single">
			                                    <div class="parent-images">
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
			                                        {{-- <i class="fa fa-star"></i>
			                                        <i class="fa fa-star"></i>
			                                        <i class="fa fa-star"></i>
			                                        <i class="fa fa-star"></i>
			                                        <i class="fa fa-star"></i> --}}
			                                        <div class="product-wid-price">
			                                            <ins>{{ number_format($key->sale , 0 , ',' , '.') }} VNĐ</ins>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
			                        @endforeach
								@else
									<p class="text-center text-danger"> Không tìm thấy sản phẩm như mong muốn !!!</p>
								@endif
							</div>
							@if($products)
								<div class="text-center">
			                        {{ $products->appends(request()->all())->links() }}
			                    </div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--  PRODUCT-LIST:END -->


@endsection