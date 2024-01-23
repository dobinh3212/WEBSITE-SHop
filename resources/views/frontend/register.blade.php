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
	margin-top: 30px;
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
.form-group span{
	font-size: 12px;
}
</style>
@endsection

@section('content')
<section class="container content-information-login">
	<div class="row">
		<div class="col-sm-6 login-logo">
			<div class="login-img w-100 h-100" style="overflow:hidden">
				<img src="./frontend/images/banner-login.jpg" style="max-width:none;height: 100%;">
			</div>
		</div>
		<div class="col-sm-6">
			<h3 class="text-center">Đăng Ký Tài Khoản</h3>
			<div class="form-login">

				<form action="{{ route('shop.postRegister') }}" method="post">
					@csrf
					<div class="form-group">
						<label for="email">Họ Tên (*):</label>
						<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
						@if($errors->has('name'))
                        <span class="text-danger"><strong>Error : </strong> {{ $errors->first('name') }}</span>
                        @endif
					</div>
					<div class="form-group">
						<label for="email">Email (*):</label>
						<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
						@if($errors->has('email'))
                            <span class="text-danger"><strong>Error : </strong> {{ $errors->first('email') }}</span>
                        @endif
					</div>
					<div class="form-group">
						<label for="email">Mật Khẩu (*):</label>
						<input type="password" class="form-control" id="password" name="password">
						@if($errors->has('password'))
                            <span class="text-danger"><strong>Error : </strong> {{ $errors->first('password') }}</span>
                        @endif
					</div>
					<div class="form-group">
						<label for="pwd">Nhập Lại Mật Khẩu (*):</label>
						<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
						@if($errors->has('password_confirmation'))
                            <span class="text-danger"><strong>Error : </strong> {{ $errors->first('password_confirmation') }}</span>
                        @endif
					</div>
						<button type="" class="btn btn-warning btn-block btn-register">Đăng Ký</button>
					</div>
					
				</form>
				@if(session('message'))
					<div class="alert alert-success" style="margin-top:20px;">
					{{ session('message') }} &nbsp &nbsp
					<a href="{{ route('shop.login') }}" title=""><u>Đăng Nhập</u></a>
				</div>
				@endif
			</div>
			
		</div>
	</div>

</section>
@endsection
