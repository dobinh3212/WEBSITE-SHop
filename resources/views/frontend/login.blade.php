@extends('frontend.layout.__index')

@section('title')
<title>Đăng Nhập</title>
@endsection

@section('css')
<style type="text/css">
.content-information-login{
	padding-top: 30px;
}
.form-login input:focus{
	outline: none;
	box-shadow: none;
}
.form-login label{
	color: black;
}
.form-login input{
	background: #ccc;
	border:none;
}
.login-facebook-gmail{
	margin-top: 30px;
}
.form-login .btn-register{
	border: 1px solid black;
}
.form-login .split {
    border-bottom: 2px solid #afafaf;
    position: relative;
    height: 23px;
    margin: 10px 0 20px 0;
    justify-content: center;
    display: flex;
}
.form-login .split p {
    position: absolute;
    top: 10px;
    background: #fff;
    padding: 0 10px;
    color: #afafaf;
    font-size: 14px;
    font-weight: bold;
}
.content-information-login h2{
	color: black;
}
</style>
@endsection

@section('content')
<section class="container content-information-login">
	<div class="row">
		<div class="col-sm-6 login-logo">
			<div class="login-img w-100" style="overflow:hidden">
				<img src="./frontend/images/banner-login.jpg" style="max-width:none;height: 100%;">
			</div>
		</div>
		<div class="col-sm-6">
			<h2>Đăng Nhập</h2>
			<div class="form-login">
				<div class="row login-facebook-gmail">
					<div class="col-sm-6">
						<button type="" class="btn btn-primary btn-block">Tiếp tục với Facebook</button>
					</div>
					<div class="col-sm-6">
						<button type="" class="btn btn-primary btn-block">Đăng nhập với Google</button>
					</div>
				</div>
				<div class="split">
                    <p>Hoặc</p>
                </div>
				<form action="{{ route('shop.postLogin') }}" method="post">
					@csrf
					
					<div class="form-group">
						<label for="email">Tài Khoản :</label>
						<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
						@if($errors->has('email'))
                            <span class="text-danger"><strong>Error : </strong> {{ $errors->first('email') }}</span>
                        @endif
					</div>
					<div class="form-group">
						<label for="pwd">Mật Khẩu :</label>
						<input type="password" class="form-control" id="pwd" name="password">
						@if($errors->has('password'))
                            <span class="text-danger"><strong>Error : </strong> {{ $errors->first('password') }}</span>
                        @endif
					</div>
					<div class="checkbox">
						<label><input type="checkbox"> Ghi Nhớ</label>
					</div>

					@if(session('error'))
						<div class="alert alert-danger" style="margin:10px 0px;">
						{{ session('error') }}
						</div>
					@endif

					<div class="row">
						<div class="col-sm-6">
							<button type="" class="btn btn-warning btn-block">Đăng Nhập</button>
						</div>
						<div class="col-sm-6">
							<a href="{{ route('shop.register') }}" class="btn btn-light btn-block btn-register">Đăng Ký</a>
						</div>
					</div>
					
				</form>
				<div class="text-right" style="margin-top:10px;">
					<a href="{{ route('forget.password.get') }}" ><u>Quên mật khẩu</u></a>
				</div>
			</div>

		</div>
	</div>

</section>
@endsection
