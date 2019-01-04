<?php
/*
|----------------------------------------------------------------------------------------------------------------------------------
| Laravel - A magical, enchanting php framework that makes my developer life more enjoyable. Now let's create something great!
|----------------------------------------------------------------------------------------------------------------------------------
|
| @summary     E-commerce website made with love and powered by Federex Potolin using Laravel 5.6, Ecommerce Admin Template by eliteadmin and Obaju Front Template by Bootstrapious & Fity.
| @developer   Federex A Potolin
| @contact     0909 820 2040
| @facebook
| @linkedin
| @jobstreet
| @fiver
| @website     http: //potolinfederex.000webhostapp.com/|
|
|
 */

//--------------------
//   Client Side
//--------------------

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', function () {
    return view('index');
});

// backend login by Become A Full Stack Web Developer - Beginner To Advanced
Route::get('/backend-auth/login', 'AuthBackendController@index');
Route::post('/backend-auth/login', 'AuthBackendController@store');

// Kien' codeigniter method user login in js/ajax but not yet finished..
Route::resource('/auth-customers', 'AuthFrontendController');

// products
Route::resource('/products', 'FrontProductsController');

// post, comments, replies
Route::get('/posts', 'FrontPostsController@index');
Route::get('/posts/{id}', 'FrontPostsController@show');
Route::post('/post-comments', 'FrontPostsController@storeComment');
Route::post('/post-comments-replies', 'FrontPostsController@storeReply');
Route::post('/post-reply-to-replies', 'FrontPostsController@storeReplyToReply');

//--------------------
//   Admin Side
//--------------------

Route::middleware(['admin'])->group(function () {
    // admin dashboard
    Route::get('/admin/dashboard', 'DashboardController@index')->name('dashboard_route');

    // users
    Route::resource('/admin/users', 'UsersController');
    // user profile
    Route::resource('/admin/user-profiles', 'UserProfilesController');

    // products
    Route::resource('/admin/products', 'ProductsController');
    Route::get('/admin/products/destroy-image/{id}', 'ProductsController@destroyProductImage')->name('destroyProductImage_route');
    Route::resource('/admin/prod-alt-img', 'ProductAlternativeImagesController');

    // orders
    Route::resource('/admin/orders', 'OrdersController');
    /* for orders status buttons */
    Route::get('/admin/orders-pending/{id}', 'OrdersController@pending')->name('orders.pending');
    Route::get('/admin/orders-confirmed/{id}', 'OrdersController@confirmed')->name('orders.confirmed');
    Route::get('/admin/orders-onTheWay/{id}', 'OrdersController@onTheWay')->name('orders.onTheWay');
    Route::get('/admin/orders-delivered/{id}', 'OrdersController@delivered')->name('orders.delivered');
    Route::get('/admin/orders-cancelled/{id}', 'OrdersController@cancelled')->name('orders.cancelled');

    // show the user's order record/history
    Route::get('/admin/users-orders-records/{id}', 'UsersController@showOrderRecords')->name('user.order.records');
    // destroy user image
    Route::get('/admin/users/destroy-image/{id}', 'UserProfilesController@destroyUserImage')->name('destroy.user.image');

    // posts
    Route::resource('/admin/posts', 'PostsController');
    Route::get('/admin/posts/destroy-image/{id}', 'PostsController@destroyPostImage')->name('destroy.post.image');
    Route::delete('/admin/posts-multiple-destroy', 'PostsController@multipleDestroy');

    // post categories
    Route::resource('/admin/post-categories', 'PostCategoriesController');

    // post tags (ajax, json, experiment ko)
    Route::get('/admin/tags-index', 'TagsController@index');
    Route::get('/admin/tags-read', 'TagsController@read');
    Route::post('/admin/tags-store', 'TagsController@store');
    Route::get('/admin/tags-edit', 'TagsController@edit');
    Route::post('/admin/tags-update', 'TagsController@update');
    Route::post('/admin/tags-destroy', 'TagsController@destroy');

    // posts comments
    Route::resource('/admin/comments', 'CommentsController');
    // post comments replies
    Route::resource('/admin/comment/replies', 'CommentRepliesController');
});

//-------------------------------
// Experiment and Tutorials
//-------------------------------

Route::middleware(['swe'])->group(function () {
    //-------------------------------
    // Extra: Ajax tutorials.
    //-------------------------------

    // L5.5 and Ajax jQuery - Alex Petro - part 1
    Route::get('/javascript-one/index', 'JavascriptOneController@index');
    Route::get('/javascript-one/read', 'JavascriptOneController@read');
    Route::post('/javascript-one/store', 'JavascriptOneController@store');
    Route::post('/javascript-one/destroy', 'JavascriptOneController@destroy');
    Route::get('/javascript-one/edit', 'JavascriptOneController@edit');
    Route::post('/javascript-one/update', 'JavascriptOneController@update');
    // L5.5 and Ajax jQuery - Alex Petro - part 2
    Route::get('/javascript-one/pagination', 'JavascriptOneController@pagination');
    Route::get('/javascript-one/pagination-ajax', 'JavascriptOneController@paginationAjax');
    // L5.5 and Ajax jQuery - Alex Petro - part 3
    Route::get('/js-one-p2/datatable-index', 'JavascriptOneDatatableController@index');
    Route::post('/js-one-p2/datatable-store', 'JavascriptOneDatatableController@store');
    Route::get('/js-one-p2/datatable-edit', 'JavascriptOneDatatableController@edit');
    Route::post('/js-one-p2/datatable-update', 'JavascriptOneDatatableController@update');
    Route::post('/js-one-p2/datatable-destroy', 'JavascriptOneDatatableController@destroy');

    // L5.5 and Ajax Tutorial - Advanced CRUD example Search, Sort, Paginate
    Route::get('/js-two/index', 'JavascriptTwoController@index');
    Route::match(['get', 'post'], '/js-two/create', 'JavascriptTwoController@create');
    Route::match(['get', 'put'], '/js-two/update/{id}', 'JavascriptTwoController@update');
    Route::get('/js-two/show/{id}', 'JavascriptTwoController@show');
    Route::delete('/js-two/delete/{id}', 'JavascriptTwoController@destroy');

    // L5.4 and Ajax -  Hero Sony (Random)
    Route::get('/js-three/index', 'JavascriptThreeController@index');
    Route::post('/js-three/store', 'JavascriptThreeController@store');
    Route::get('/js-three/readByAjax', 'JavascriptThreeController@readByAjax');
    Route::post('/js-three/delete', 'JavascriptThreeController@destroy');
    Route::get('/js-three/edit', 'JavascriptThreeController@edit');
    Route::post('/js-three/update', 'JavascriptThreeController@update');
    // #5.1 Laravel CRUD using AJAX (JQuery).MP4 (inside the folder of L5.4 and Ajax -  Hero Sony (Random))
    Route::get('/js-four/index', 'JavascriptFourController@index');
    Route::post('/js-four/store', 'JavascriptFourController@store');
    Route::get('/js-four/show', 'JavascriptFourController@show');
    Route::get('/js-four/edit/{id}', 'JavascriptFourController@edit');
    Route::post('/js-four/update/{id}', 'JavascriptFourController@update');
    Route::delete('/js-four/delete/{id}', 'JavascriptFourController@destroy');

    // Extra: Ajax tutorials end here. . .
});
