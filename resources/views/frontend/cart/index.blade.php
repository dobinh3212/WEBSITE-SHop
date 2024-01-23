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

    <!-- BREADCRUMBS -->
    <div class="title-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="bred-title">
                        <h3>Giỏ Hàng</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a>
                        </li>
                        <li><a href="{{ route('shop.cart') }}">Giỏ Hàng</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS:END -->

    <!-- SHOPING-CART-AREA   -->
    <div class="shoping-cart section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="headline">
                        <h2>Thông Tin Giỏ Hàng Của Bạn</h2>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="cart-product item">Hình Ảnh</th>
                                <th class="cart-product-name item" width="40%">Tên Sản Phẩm</th>
                                <th class="cart-qty item">Số Lượng</th>
                                <th class="cart-unit item">Giá Bán</th>

                                <th class="cart-sub-total last-item">Tổng </th>
                                <th class="cart-romove item">Remove</th>
                            </tr>
                            </thead>
                            <!-- /thead -->


                            <tbody>
                            @if($count > 0)
                                @foreach($carts as $key)

                                    <tr id="{{ $key->rowId }}">
                                        <td class="cart-image">
                                            <a href="{{ route('details.products',[ 'slug' => $key->options->slug]) }}" class="entry-thumbnail">
                                                <img src="{{ $key->options->image }}" alt="">
                                            </a>
                                        </td>

                                        <td class="cart-product-name-info">
                                            <div class="cc-tr-inner">
                                                <h4 class="cart-product-description">
                                                    <a href="{{ route('details.products',[ 'slug' => $key->options->slug ]) }}">{{ $key->name }}</a>
                                                </h4>
                                                <div class="cart-product-info">
                                                    @if($key->options->color)
                                                        <p><b>Màu : </b> <span>{{ $key->options->color }}</span></p>
                                                    @endif

                                                    @if($key->options->memory)
                                                        <p><b>Bộ Nhớ : </b> <span>{{ $key->options->memory }}</span></p>
                                                    @endif

                                                </div>
                                            </div>
                                        </td>

                                        <td class="cart-product-quantity">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <input type="number" size="4" class="input-text change-qty text" title="Qty" data-id="{{ $key->id }}" value="{{ $key->qty }}" min="0" step="1">
                                                    <div class="change-count">
                                                        <button class="btnPlus"><i class="fa fa fa-plus" style="font-size:14px;"></i></button>
                                                        <button class="btnMinutes"><i class="fa fa fa-minus" style="font-size:14px;"></i></button>
                                                    </div>
                                                </div>

                                            </div>
                                        </td>
                                        <td class="cart-product-price">
                                            <div class="cc-pr">
                                                {{ number_format($key->options->sale,0,',','.') }}<u>đ</u>
                                            </div>
                                        </td>
                                        <td class="cart-product-sub-total">
                                            <div class="cc-pr total-quantity">
                                                {{ number_format($key->subtotal,0,',','.') }}<u>đ</u>
                                            </div>
                                        </td>
                                        <td class="romove-item">
                                            <a href="Javascrip:void(0)" data-id="{{ $key->rowId }}" class="remove-cart-item">
                                                <img src="./frontend/images/remove.png" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" >
                                        <form id="discount-code" method="post" action="{{ route('shop.check.coupon') }}" >
                                            @csrf
                                            <div class="theme-box">
                                                <input type="text" placeholder="Mã Giảm Giá " name="coupon_code">
                                                <button type="submit" class="btn btn-default right-cart">Áp Dụng</button>
                                                <button type="button" onclick="window.location.href='{{ route('shop.delete.coupon') }}'" class="btn btn-default right-cart">X</button>

                                            </div>
                                        </form>
                                    </td>
                                    <td colspan="2" class="text-right ">
                                        <h5>Tổng Tiền: <span class="cart-total" > {{ number_format($total, 0 , ',' , '.') }} </span> VND</h5>
                                        @php
                                            $coupon_price = 0;
                                        @endphp
                                        @if(Session::has('coupon'))

                                            @if(session('coupon')->unti)

                                                @php
                                                    $coupon_price = session('coupon')->value;
                                                @endphp

                                                <h5>Giảm : <span class="cart-total" > {{ number_format($coupon_price, 0 , ',' , '.') }}</span> VND</h5>

                                            @else
                                                @php
                                                    $coupon_price =(float)( $total * session('coupon')->percent ) / 100;
                                                @endphp
                                                <h5>Giảm : <span class="cart-total" > {{ session('coupon')->percent }} %</h5>
                                                <h5>Giá Giảm : <span class="cart-total" > {{ number_format($coupon_price, 0 , ',' , '.') }}</span> VND</h5>
                                            @endif
                                        @endif
                                        <h5 class="text-danger" >Thanh Toán : <u><span class="cart-total" > {{ number_format($total - $coupon_price, 0 , ',' , '.') }} </span> VND</u></h5>
                                    </td>
                                </tr>

                            @else
                                <tr>
                                    <td colspan="7">
                                        <p class="text-center text-danger" style="font-size:20px;">Chưa có sản phẩm</p>
                                        <!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                            <!-- /tbody -->
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="shopping-cart-btn">
                                            <button type="button" onclick="location.href='{{ route('trangchu') }}';" class="btn btn-default left-cart" >Tiếp tuc mua sắm</button>
                                            <button type="button" class="btn btn-default right-cart right-margin"  onclick="window.location.href='{{ route('remove.shop.cart') }}';" {{ $count==0 ?'disabled':'' }}>Hủy Đơn Hàng</button>
                                            <button type="button" onclick="window.location.href='{{route('thanh-toan')}}';" class="btn btn-default right-cart" {{ $count == 0 ?'disabled':'' }}>Tiến hành thanh toán</button>
                                        </div>
                                        <!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- /table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOPING-CART-AREA:END   -->

@endsection

@section('js')

    <script type="text/javascript">
        $(document).ready(function () {
            cart.init();
        });

        var cart = {
            init: function () {
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
                this.registerEvent();
            },
            registerEvent: function () {
                $('.remove-cart-item').click(function(event){
                    event.preventDefault();
                    var id = $(this).data('id');
                    var item =$(this);

                    $.ajax({
                        url: '/dat-hang/'+id,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            id: id,
                        },
                        success:function (data) {
                            if(data['product'].length == 0 ){
                                location.reload();
                            }
                            else{
                                $('.cart-total').html(data['total']);
                                item.parents('tr').remove();
                            }
                        }
                    })
                });

                // update số lượng sản phẩm trong giỏ hàng
                $('.change-qty').change(function (event) {
                    event.preventDefault();
                    var qty = $(this).val();
                    var id = $(this).data('id');
                    var item =$(this);
                    onUpdateQuantityCart(item ,id ,qty);
                })
                $('.btnPlus').click(function(){
                    var item = $(this).closest('.quant-input').find('.change-qty');
                    var qty = item.val();
                    item.val(++qty);
                    var id = item.data('id');
                    onUpdateQuantityCart(item ,id ,qty);
                });

                $('.btnMinutes').click(function(){
                    var item = $(this).closest('.quant-input').find('.change-qty');
                    var qty = item.val();
                    item.val(--qty);
                    var id = item.data('id');

                    onUpdateQuantityCart(item ,id ,qty);
                });
            }
        }

        function onUpdateQuantityCart( item , id  , qty) {
            $.ajax({
                url: '/gio-hang/edit',
                type: 'PUT',
                dataType: 'json',
                data: {
                    id: id,
                    qty:qty
                },
                success:function (data) {
                    if(data['status'] == 'error'){
                        alert(data['text']);
                        location.reload();
                        return;
                    }
                    if(data['productCart'].length == 0){
                        location.reload();
                    }

                    else{
                        $('.cart-total').html(data['total']);
                        item.parents('tr').find('.total-quantity').html(formatNumber(data['productCart']['subtotal'], '.')+"<u>đ</u>");
                    }

                }
            })
        }

        function formatNumber(nStr, groupSeperate ,decSeperate=null) {
            nStr += '';
            x = nStr.split(decSeperate);
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
            }
            return x1 + x2;
        }
    </script>

@endsection
