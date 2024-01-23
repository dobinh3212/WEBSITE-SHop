<?php



Route::get('/', 'ShopController@index')->name('trangchu');

// route liên hệ
Route::get('/lien-he', 'ShopController@contact')->name('contact');
Route::post('/lien-he', 'ShopController@postContact')->name('post.contact');

Route::get('/danh-muc/{slug?}', 'ShopController@getListProductsByCategory')->name('shop.category');
Route::get('/chi-tiet-san-pham/{slug?}', 'ShopController@detailProduct')->name('details.products');


Route::get('/chi-tiet-tin-tuc/{slug?}', 'ShopController@detailArticle')->name('detailArticle');
Route::get('/tin-tuc/{slug?}', 'ShopController@listArticles')->name('Articles');

// giỏ hàng
Route::get('/gio-hang', 'CartController@index')->name('shop.cart');

// Thêm mã giảm giá :
Route::post('them-ma-giam-gia', 'CartController@CheckCoupon')->name('shop.check.coupon');
Route::get('huy-ma-giam-gia', 'CartController@unsetCoupon')->name('shop.delete.coupon');

//thêm sản phẩm vào giỏ hàng
Route::get('/dat-hang/{id}/{qty?}', 'CartController@addCart')->name('add.cart');

// update số lượng sản phẩm trong giỏ hàng
Route::put('/gio-hang/edit', 'CartController@updateQtyProductCart')->name('add.cart');

//xóa sản phẩm trong giỏ hàng (ajax)
Route::delete('/dat-hang/{id}', 'CartController@deleteProductCart')->name('delelet.product.cart');

// xóa tất cả sản phẩm trong giỏ hàng
Route::get('/remove/dat-hang', 'CartController@removeCart')->name('remove.shop.cart');


// thanh toán khi mua hàng
Route::get('thanh-toan', 'CartController@viewInformationOrder')->name('thanh-toan');
Route::post('thanh-toan', 'CartController@postInformationOrder')->name('post.thanh-toan');
Route::get('huy-don-hang/{id}', 'CartController@CancelOrder')->name('shop.huy-don-hang');

// thanh toán online qua VNPAY
Route::get('thanh-toan/online' , 'CartController@viewInformationOrderOnline')->name('thanh-toan.online');
Route::post('payments/online', 'CartController@paymentsPost')->name('payments.online');
Route::get('vnpay/return', 'CartController@vnpayReturn')->name('vnpay-return');


// tìm kiếm
Route::get('/search', 'ShopController@search')->name('shop.search');

//Route đăng nhập , đăng ký , đăng xuất  FrontEnd
Route::get('dang-nhap','ShopController@login')->name('shop.login');
Route::post('dang-nhap','ShopController@postLogin')->name('shop.postLogin');
Route::get('dang-ky','ShopController@register')->name('shop.register');
Route::post('dang-ky','ShopController@postRegister')->name('shop.postRegister');
Route::get('dang-xuat','ShopController@logout')->name('shop.logout');

/// Route lấy lại mật khẩu quản trị qua email

Route::get('forget-password', 'ForgotPasswordController@index')->name('forget.password.get');
Route::post('forget-password', 'ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post');
Route::get('reset-password/{token}', 'ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');


// Route hiển thị thông tin khi đăng nhập
Route::get('thong-tin-ca-nhan','ShopController@informationLogin')->name('shop.informationUser');
Route::post('thong-tin-ca-nhan', 'ShopController@changInformation')->name('shop.postChangeInformationUser');



/// Route Đăng nhập trang quản trị
Route::get('admin/login', 'LoginAdminController@index')->name('admin.login');
Route::post('admin/login', 'LoginAdminController@postLogin')->name('post.admin.login');
Route::get('admin/logout', 'LoginAdminController@logout')->name('admin.logout');

/// Route Quản trị
Route::group(['prefix'=>'admin' , 'middleware' => 'check.login.admin']  , function (){
	Route::get('/', 'AdminController@index')->name('admin.home');
    Route::resource('danh-muc', 'CategoryController');
    Route::resource('banner', 'BannerController');
    Route::resource('nha-cung-cap', 'VendorController');
    Route::resource('thuong-hieu', 'BrandController');
    Route::resource('khuyen-mai', 'CouponController');
    Route::resource('san-pham', 'ProductController');
    Route::resource('tin-tuc', 'ArticleController');
    Route::resource('tai-khoan', 'UserController');
    Route::resource('lien-he', 'ContactController');
    Route::resource('roles', 'RoleController');
    Route::resource('order', 'OrderController');
    Route::resource('setting', 'SettingController');
    Route::get('printf/{id}/order', 'OrderController@printPDF')->name('order.pdf');
});


// Route Lỗi url không tồn tại
Route::get('/{str}', 'ShopController@errorUrl')->name('error.url');
