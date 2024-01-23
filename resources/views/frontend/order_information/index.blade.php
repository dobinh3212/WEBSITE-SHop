@extends('frontend.layout.__index')

@section('content')

	<!-- PAGE-TITLE-AREA -->
    <section class="page-title-area"> <div class="page-title-overlay"> <div
    class="container"> <div class="row"> <div class="col-md-12 col-sm-12
    col-xs-12"> <div class="page-title"> <h3>Thanh Toán</h3> </div> </div>
    </div> </div> </div> </section>
    <!-- PAGE-TITLE-AREA:END -->

    <!-- BREADCRUMBS -->
    <div class="title-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="bred-title">
                        <h3>Thanh Toán</h3>
                    </div>
                    {{-- <ol class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li><a href="about-us.html">Thanh Toán</a>
                        </li>
                    </ol> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS:END  -->

    <!-- BILL-SHIP-AREA   -->
    <form action="{{ route('post.thanh-toan') }}" method="post" class="form-horizontal">
        @csrf
        <section class="bill-ship section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                       <div class="headline">
                           <h2>Địa Chỉ Nhận Hàng</h2>

                       </div>
                        <div class="billing">

                            <div class="bill-single">

                                    <input type="text" name="fullname" value="{{ old('fullname') }}" placeholder="Họ tên ..." required>
                                    @if(is_object($errors) && $errors->has('fullname'))
                                        <p class="alert alert-danger">{{ $errors->first('fullname') }}</p>
                                    @endif
                                    <input type="text" name="address" value="{{ old('address') }}" placeholder="Địa chỉ nhận ..." required>
                                    {{--@if($errors->has('address'))
                                        <p class="alert alert-danger">{{ $errors->first('address') }}</p>
                                    @endif--}}
                                    <input type="email" name="email"  value="{{ old('email') }}" placeholder="Email ..." required>
                                    {{--@if($errors->has('email'))
                                        <p class="alert alert-danger">{{ $errors->first('email') }}</p>
                                    @endif--}}
                                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Số điện thoại ...." required>
                                    {{--@if($errors->has('phone'))
                                        <p class="alert alert-danger">{{ $errors->first('phone') }}</p>
                                    @endif--}}
                                    <textarea placeholder="Ghi chú ...." name="note" rows="5"></textarea>
                            </div>



                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="headline">
                           <h2>Thông Tin Đơn Hàng </h2>
                        </div>
                        <div class="summary">
                            <h2><span>Tên Sản Phẩm</span><span class="text-right">Tổng Giá</span></h2>
                            @if($carts->count() > 0)
                                @foreach($carts as $item)
                                    <p>
                                        <a href="" title="">{{ $item->name }}</a>
                                        <span class="text-right text-danger">{{ number_format($item->subtotal , 0 , ',' , '.') }} <u>đ</u></span>
                                    </p>
                                @endforeach
                            @else
                                <p class="text-danger text-center w-100" style="color:red;width:100%;">Chưa tồn tại sản phẩm</p>
                            @endif
                            <h3 class="line">Tổng Giá Trị :<span class="text-right text-danger">{{ number_format($total, 0 , ',' , '.') }} <u>đ</u></span></h3>
                            {{-- <h3 class="line2">Phí Ship<span class="mcolor">null</span></h3> --}}
                            @php
                                $coupon_price = 0 ;
                            @endphp
                            @if(Session::has('coupon'))

                                @if(session('coupon')->unti)

                                    @php
                                        $coupon_price = session('coupon')->value;
                                    @endphp

                                    <h3>Giảm : <span class="cart-total" > {{ number_format($coupon_price, 0 , ',' , '.') }} <u>đ</u></span></h3>

                                @else
                                    @php
                                        $coupon_price =(float)( $total * session('coupon')->percent ) / 100;
                                    @endphp
                                    <h3>Giảm : <span class="cart-total" > {{ session('coupon')->percent }} %</h3>
                                    <h3>Giá Giảm : <span class="cart-total" > {{ number_format($coupon_price, 0 , ',' , '.') }} <u>đ</u></span></h3>
                                @endif
                            @endif

                            <h3>Thanh Toán : <span class="text-right text-danger"><u>{{ number_format($total - $coupon_price, 0 , ',' , '.') }}</u> Đ </span></h3>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-12"></div>
                </div>
            </div>
        </section>
        <!-- BILL-SHIP-AREA:END   -->

        <!-- PAYMENT-AREA   -->
        <section class="payment-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="headline">
                            <h2>Chọn phương thức thanh toán</h2>
                        </div>
                        <div class="payment">

                        <div class="bank-radio">
                            <label>
                                <input type="radio" name="payment_id" value="0" checked="">Thanh toán khi giao hàng</label>
                            <br/>
                            <label>
                                <input type="radio" name="payment_id" value="1">VN Pay<img src="./frontend/images/master-card.png" alt="">
                            </label><br/>
                            @if(is_object($errors))
                                @if ($errors->any())

                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <ul style="padding:0px 20px ">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>

                                    </div>
                                @endif
                            @endif
                            <button type="submit" class="btn btn-default right-cart" >Đặt hàng</button>
                            <button type="button" onclick="location.href='{{ route('shop.cart') }}'" class="btn btn-default text-danger right-huy" >Hủy</button>
                            <br>

                                <p> Mọi thông tin đơn hàng chúng tôi sẽ gửi qua Email nhận hàng của bạn . Bạn vui lòng check email để biết thêm thông tin </p>

                        </div>

                    </div>

                </div>
            </div>
            </div>
        </section>
    <!-- PAYMENT-AREA:END   -->
    </form>

@endsection
