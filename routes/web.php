<?php
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('auth/register', 'MemberController@register')->name('register');
    Route::get('auth/login', 'MemberController@login')->name('login');
    Route::get('auth/logout', 'MemberController@logout')->name('logout');
    Route::get('payment', 'MemberController@recharge')->name('payment');
    Route::post('member/create', 'MemberController@create')->name('createMember');
    Route::post('member/auth', 'MemberController@authMember')->name('authMember');
    Route::post('member/changepass', 'MemberController@changepass')->name('changepass');
    Route::get('profile', 'MemberController@profile')->name('profile');
    Route::get('transaction', 'MemberController@transaction')->name('transaction');
    Route::get('proxy', 'MemberController@proxy')->name('proxy');
    Route::get('blog', 'MemberController@new')->name('blog');
    Route::get('contact', 'MemberController@contact')->name('contact');
    Route::get('server', 'MemberController@server')->name('server');
    Route::redirect('/login', '/login');
  
Auth::routes(['register' => false]);

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'Admin/HomeController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
    //services
    Route::resource('services', 'Admin\ServicesController');
    Route::delete('services_mass_destroy', 'Admin\ServicesController@massDestroy')->name('services.mass_destroy');
    //server
    Route::resource('server', 'Admin\ServerController');
    Route::delete('server_mass_destroy', 'Admin\ServerController@massDestroy')->name('server.mass_destroy');
    //country
    Route::resource('country', 'Admin\CountryController');
    Route::delete('country_mass_destroy', 'Admin\CountryController@massDestroy')->name('country.mass_destroy');
    //coupon
    Route::resource('coupon', 'Admin\CouponController');
    Route::delete('coupon_mass_destroy', 'Admin\CouponController@massDestroy')->name('coupon.mass_destroy');
    //ipaddress
    Route::resource('ipaddress', 'Admin\IpAddressController');
    Route::delete('ipaddress_mass_destroy', 'Admin\IpAddressController@massDestroy')->name('ipaddress.mass_destroy');
    //category
    Route::resource('category', 'Admin\CategoryController');
    Route::delete('category_mass_destroy', 'Admin\CategoryController@massDestroy')->name('category.mass_destroy');
    //blog
<<<<<<< HEAD
    Route::resource('blog', 'Admin\BlogController');
    Route::delete('blog_mass_destroy', 'Admin\BlogController@massDestroy')->name('blog.mass_destroy');
=======
    Route::resource('post', 'Admin\PostController');
    Route::delete('post_mass_destroy', 'Admin\PostController@massDestroy')->name('post.mass_destroy');
>>>>>>> master
});
