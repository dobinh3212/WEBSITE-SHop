@extends('frontend.layout.__index')

@section('content')
    <!-- BILL-SHIP-AREA   -->
    <form action="{{ route('payments.online') }}" method="post" >
    @csrf

    <!-- PAYMENT-AREA   -->
        <section class="payment-area">
            <div class="container">
                <div class="row " style="display: flex;">
                    <div class="col-md-8 col-sm-12 col-xs-12"  style="margin: 0 auto;">
                        <div class="headline">
                            <h2>Thông tin thanh toán online hóa đơn qua VNPAY </h2>
                        </div>
                        <div class="payment">
                            <div class="form-group">
                                <label for="language">Loại hàng hóa </label>
                                <select name="order_type" id="order_type" class="form-control">

                                    <option value="billpayment">Thanh toán hóa đơn</option>
                                    <option value="fashion">Thời trang</option>
                                    <option value="other">Khác - Xem thêm tại VNPAY</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Họ tên (*) :</label>
                                <input class="form-control" id="fullname"
                                       name="fullname" type="text" value="{{ $customer_orders['fullname'] }}"/>
                            </div>
                            <div class="form-group">
                                <label >Email (*):</label>
                                <input class="form-control" id="email"
                                       name="email" type="text" value="{{ $customer_orders['email'] }}"/>
                            </div>
                            <div class="form-group">
                                <label >Địa chỉ nhận (*):</label>
                                <input class="form-control" id="address"
                                       name="address" type="text" value="{{ $customer_orders['address'] }}"/>
                            </div>
                            <div class="form-group">
                                <label >Số điện thoại (*):</label>
                                <input class="form-control" id="phone"
                                       name="phone" type="text" value="{{ $customer_orders['phone'] }}"/>
                            </div>
                            <div class="form-group">
                                <label for="amount">Tổng số tiền (*): </label>
                                <input class="form-control" id="amount"
                                       name="amount" type="number" value="{{ $customer_orders['total'] - $customer_orders['discount'] }}"/>
                            </div>
                            <div class="form-group">
                                <label for="order_desc">Nội dung thanh toán :</label>
                                <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Noi dung thanh toan</textarea>
                            </div>
                            <div class="form-group">
                                <label for="bank_code">Ngân hàng (*):</label>
                                <select name="bank_code" id="bank_code" class="form-control">
                                    <option value="">Không chọn</option>
                                    <option value="NCB"> Ngan hang NCB</option>
                                    <option value="AGRIBANK"> Ngan hang Agribank</option>
                                    <option value="SCB"> Ngan hang SCB</option>
                                    <option value="SACOMBANK">Ngan hang SacomBank</option>
                                    <option value="EXIMBANK"> Ngan hang EximBank</option>
                                    <option value="MSBANK"> Ngan hang MSBANK</option>
                                    <option value="NAMABANK"> Ngan hang NamABank</option>
                                    <option value="VNMART"> Vi dien tu VnMart</option>
                                    <option value="VIETINBANK">Ngan hang Vietinbank</option>
                                    <option value="VIETCOMBANK"> Ngan hang VCB</option>
                                    <option value="HDBANK">Ngan hang HDBank</option>
                                    <option value="DONGABANK"> Ngan hang Dong A</option>
                                    <option value="TPBANK"> Ngân hàng TPBank</option>
                                    <option value="OJB"> Ngân hàng OceanBank</option>
                                    <option value="BIDV"> Ngân hàng BIDV</option>
                                    <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                    <option value="VPBANK"> Ngan hang VPBank</option>
                                    <option value="MBBANK"> Ngan hang MBBank</option>
                                    <option value="ACB"> Ngan hang ACB</option>
                                    <option value="OCB"> Ngan hang OCB</option>
                                    <option value="IVB"> Ngan hang IVB</option>
                                    <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="language">Ngôn ngữ</label>
                                <select name="language" id="language" class="form-control">
                                    <option value="vn">Tiếng Việt</option>
                                    <option value="en">English</option>
                                </select>
                            </div>
                            <div class="bank-radio">

                                <button type="submit" class="btn btn-default right-cart" >Thanh Toán</button>
                                <button type="button"  class="btn btn-default text-danger right-huy" >Hủy Thanh Toán</button>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- PAYMENT-AREA:END   -->
    </form>

@endsection
