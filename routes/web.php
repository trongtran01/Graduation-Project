<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//backend

use Illuminate\Support\Facades\Route;

Route::get('/admin/login',
[
    'uses'=>'AdminController@Admin_Login',
    'as'=>'Admin_Login'
]
);
Route::post('/admin/login',
[
    'uses'=>'AdminController@Post_Admin_Login',
    'as'=>'Post_Admin_Login'
]
);

Route::prefix('admin')->middleware('auth')->as('admin.')->group(function () {
    Route::get('/',[
        'uses'=>'AdminController@index',
        'as'=>'home'
    ]);
    Route::get('/delete_order/{id}',[
        'uses'=>'AdminController@delete_order',
        'as'=>'delete_order'
    ]);
    Route::get('/print_order/{id}',[
        'uses'=>'AdminController@print_order',
        'as'=>'print_order'
    ]);
    Route::get('/confirm/{id}',[
        'uses'=>'AdminController@confirm',
        'as'=>'confirm'
    ]);
    Route::get('/logout',[
        'uses'=>'AdminController@Admin_Logout',
        'as'=>'Admin_Logout'
    ]);

    Route::prefix('Account')->group(function () {
      
        Route::get('info', [
            'uses'=>'AdminController@get_info',
            'as'=>'get_info'
        ]);
        Route::post('info', [
            'uses'=>'AdminController@post_info',
            'as'=>'post_info'
        ]);
        Route::get('change_passwd', [
            'uses'=>'AdminController@change_passwd',
            'as'=>'change_passwd'
        ]);
        Route::post('change_passwd', [
            'uses'=>'AdminController@post_change_passwd',
            'as'=>'post_change_passwd'
        ]);
        Route::post('change_face', [
            'uses'=>'AdminController@post_face',
            'as'=>'post_face'
        ]);
        
    });
    Route::prefix('banner')->group(function () {
        Route::get('list', [
            'uses'=>'BannerController@getBanner',
            'as'=>'list_banner'
        ]);
        Route::get('list_banner', [
            'uses'=>'BannerController@data_banner',
            'as'=>'data_banner'
        ]);
        Route::get('get_list_banner', [
            'uses'=>'BannerController@get_list_banner',
            'as'=>'get_list_banner'
        ]);
        Route::get('insert', [
            'uses'=>'BannerController@insert_banner',
            'as'=>'insert_banner'
        ]);
        Route::post('insert', [
            'uses'=>'BannerController@post_insert_banner',
            'as'=>'post_insert_banner'
        ]);
        Route::get('edit/{id}', [
            'uses'=>'BannerController@edit_banner',
            'as'=>'edit_banner'
        ]);
        Route::post('edit/{id}', [
            'uses'=>'BannerController@post_edit_banner',
            'as'=>'post_edit_banner'
        ]);
        Route::get('delete/{id}', [
            'uses'=>'BannerController@delete_banner',
            'as'=>'delete_banner'
        ]);
    });
    Route::prefix('blog')->group(function () {
        Route::get('list', [
            'uses'=>'BlogController@getblog',
            'as'=>'list_blog'
        ]);
        Route::get('/List_blog',[
            'uses'=>'BlogController@data_blog',
            'as'=>'data_blog'
        ]);
        Route::get('insert', [
            'uses'=>'BlogController@insert',
            'as'=>'insert_blog'
        ]);
        Route::post('insert', [
            'uses'=>'BlogController@post_insert',
            'as'=>'post_insert_blog'
        ]);
        Route::get('edit/{id}', [
            'uses'=>'BlogController@edit',
            'as'=>'edit_blog'
        ]);
        Route::post('edit/{id}', [
            'uses'=>'BlogController@post_edit',
            'as'=>'post_edit_blog'
        ]);
        Route::get('delete/{id}', [
            'uses'=>'BlogController@delete',
            'as'=>'delete_blog'
        ]);
        
    });
    Route::prefix('comment_blogs')->group(function(){
        Route::get('/comments',[
            'uses'=>'BlogController@get_cmt',
            'as'=>'list_cmt'
        ]);
        Route::get('/List_comments',[
            'uses'=>'BlogController@data_cmt',
            'as'=>'data_cmt'
        ]);
        Route::get('/delete_cmt/{id}',[
            'uses'=>'BlogController@delete_cmt',
            'as'=>'delete_cmt'
        ]);
    });
    Route::prefix('product')->group(function(){
        Route::get('/list',[
            'uses'=>'ProductController@get_product',
            'as'=>'list_product'
        ]);
        Route::get('/list_product',[
            'uses'=>'ProductController@data_product',
            'as'=>'data_product'
        ]);
        Route::get('/insert',[
            'uses'=>'ProductController@insert',
            'as'=>'insert_product'
        ]);
        Route::post('/insert',[
            'uses'=>'ProductController@post_insert',
            'as'=>'post_insert_product'
        ]);
        Route::get('/eidt/{id}',[
            'uses'=>'ProductController@edit_product',
            'as'=>'edit_product'
        ]);
        Route::post('/edit/{id}',[
            'uses'=>'ProductController@post_edit',
            'as'=>'post_edit_product'
        ]);
        Route::get('/delete/{id}',[
            'uses'=>'ProductController@delete',
            'as'=>'delete_product'
        ]);
    });
    Route::prefix('product_review')->group(function(){
        Route::get('/review',[
            'uses'=>'ReviewController@get_review',
            'as'=>'list_review'
        ]);
        Route::get('/List_review',[
            'uses'=>'ReviewController@data_review',
            'as'=>'data_review'
        ]);
        Route::get('/delete_review/{id}',[
            'uses'=>'ReviewController@delete_review',
            'as'=>'delete_review'
        ]);
    });
    Route::prefix('type_product')->group(function(){
        Route::get('/list',[
            'uses'=>'Type_ProductController@get_type_product',
            'as'=>'list_type_product'
        ]);
        Route::get('/list_type_product',[
            'uses'=>'Type_ProductController@data_type_product',
            'as'=>'data_type_product'
        ]);
        Route::get('/insert',[
            'uses'=>'Type_ProductController@insert',
            'as'=>'insert_type_product'
        ]);
        Route::post('/insert',[
            'uses'=>'Type_ProductController@post_insert',
            'as'=>'post_insert_type_product'
        ]);
        Route::get('/eidt/{id}',[
            'uses'=>'Type_ProductController@edit_type_product',
            'as'=>'edit_type_product'
        ]);
        Route::post('/edit/{id}',[
            'uses'=>'Type_ProductController@post_edit_type_product',
            'as'=>'post_edit_type_product'
        ]);
        Route::get('/delete/{id}',[
            'uses'=>'Type_ProductController@delete',
            'as'=>'delete_type_product'
        ]);
    });
    
    Route::prefix('size')->group(function(){
        Route::get('/list',[
            'uses'=>'SizeController@get_size',
            'as'=>'list_size'
        ]);
        Route::get('/list_size',[
            'uses'=>'SizeController@data_size',
            'as'=>'data_size'
        ]);
        Route::get('/insert',[
            'uses'=>'SizeController@insert',
            'as'=>'insert_size'
        ]);
        Route::post('/insert',[
            'uses'=>'SizeController@post_insert',
            'as'=>'post_insert_size'
        ]);
        Route::get('/eidt/{id}',[
            'uses'=>'SizeController@edit_size',
            'as'=>'edit_size'
        ]);
        Route::post('/edit/{id}',[
            'uses'=>'SizeController@post_edit_size',
            'as'=>'post_edit_size'
        ]);
        Route::get('/delete/{id}',[
            'uses'=>'SizeController@delete',
            'as'=>'delete_size'
        ]);
    });
    Route::prefix('topping')->group(function(){
        Route::get('/list',[
            'uses'=>'ToppingController@get_topping',
            'as'=>'list_topping'
        ]);
        Route::get('/list_topping',[
            'uses'=>'ToppingController@data_topping',
            'as'=>'data_topping'
        ]);
        Route::get('/insert',[
            'uses'=>'ToppingController@insert',
            'as'=>'insert_topping'
        ]);
        Route::post('/insert',[
            'uses'=>'ToppingController@post_insert',
            'as'=>'post_insert_topping'
        ]);
        Route::get('/eidt/{id}',[
            'uses'=>'ToppingController@edit_topping',
            'as'=>'edit_topping'
        ]);
        Route::post('/edit/{id}',[
            'uses'=>'ToppingController@post_edit_topping',
            'as'=>'post_edit_topping'
        ]);
        Route::get('/delete/{id}',[
            'uses'=>'ToppingController@delete',
            'as'=>'delete_topping'
        ]);
    });
    Route::prefix('images')->group(function(){
        Route::get('/list',[
            'uses'=>'ImagesController@get_images',
            'as'=>'list_images'
        ]);
        Route::get('/list_image',[
            'uses'=>'ImagesController@data_image',
            'as'=>'data_image'
        ]);
        Route::get('/insert',[
            'uses'=>'ImagesController@insert',
            'as'=>'insert_images'
        ]);
        Route::post('/insert',[
            'uses'=>'ImagesController@post_insert',
            'as'=>'post_insert_images'
        ]);
        Route::get('/edit/{id}',[
            'uses'=>'ImagesController@edit_images',
            'as'=>'edit_images'
        ]);
        Route::post('/edit/{id}',[
            'uses'=>'ImagesController@post_edit_images',
            'as'=>'post_edit_images'
        ]);
        Route::get('/delete/{id}',[
            'uses'=>'ImagesController@delete',
            'as'=>'delete_images'
        ]);
    });
    Route::prefix('about')->group(function(){
        Route::get('/list',[
            'uses'=>'AboutController@get_about',
            'as'=>'list_about'
        ]);
        Route::get('/list_about',[
            'uses'=>'AboutController@data_about',
            'as'=>'data_about'
        ]);
        Route::get('/insert',[
            'uses'=>'AboutController@insert_about',
            'as'=>'insert_about'
        ]);
        Route::post('/insert',[
            'uses'=>'AboutController@post_insert_about',
            'as'=>'post_insert_about'
        ]);
        Route::get('/edit/{id}',[
            'uses'=>'AboutController@edit_about',
            'as'=>'edit_about'
        ]);
        Route::post('/edit/{id}',[
            'uses'=>'AboutController@post_edit_about',
            'as'=>'post_edit_about'
        ]);
        Route::get('/delete/{id}',[
            'uses'=>'AboutController@delete_about',
            'as'=>'delete_about'
        ]);
    });
    Route::prefix('our_team')->group(function(){
        Route::get('/list',[
            'uses'=>'AboutController@get_our_team',
            'as'=>'list_our_team'
        ]);
        Route::get('/list_our_team',[
            'uses'=>'AboutController@data_our_team',
            'as'=>'data_our_team'
        ]);
        Route::get('/insert',[
            'uses'=>'AboutController@insert_our_team',
            'as'=>'insert_our_team'
        ]);
        Route::post('/insert',[
            'uses'=>'AboutController@post_insert_our_team',
            'as'=>'post_insert_our_team'
        ]);
        Route::get('/edit/{id}',[
            'uses'=>'AboutController@edit_our_team',
            'as'=>'edit_our_team'
        ]);
        Route::post('/edit/{id}',[
            'uses'=>'AboutController@post_edit_our_team',
            'as'=>'post_edit_our_team'
        ]);
        Route::get('/delete/{id}',[
            'uses'=>'AboutController@delete_our_team',
            'as'=>'delete_our_team'
        ]);
    });
    Route::prefix('contact_info')->group(function(){
        Route::get('/list',[
            'uses'=>'Contact_Info_Controller@get_contact_info',
            'as'=>'list_contact_info'
        ]);
        Route::get('/list_contact_info',[
            'uses'=>'Contact_Info_Controller@data_contact_info',
            'as'=>'data_contact_info'
        ]);
        Route::get('/insert',[
            'uses'=>'Contact_Info_Controller@insert_contact_info',
            'as'=>'insert_contact_info'
        ]);
        Route::post('/insert',[
            'uses'=>'Contact_Info_Controller@post_insert_contact_info',
            'as'=>'post_insert_contact_info'
        ]);
        Route::get('/edit/{id}',[
            'uses'=>'Contact_Info_Controller@edit_contact_info',
            'as'=>'edit_contact_info'
        ]);
        Route::post('/edit/{id}',[
            'uses'=>'Contact_Info_Controller@post_edit_contact_info',
            'as'=>'post_edit_contact_info'
        ]);
        Route::get('/delete/{id}',[
            'uses'=>'Contact_Info_Controller@delete_contact_info',
            'as'=>'delete_contact_info'
        ]);
    });
    Route::prefix('contact')->group(function(){
        Route::get('/list',[
            'uses'=>'ContactController@get_contact',
            'as'=>'list_contact'
        ]);
        Route::get('/list_contact',[
            'uses'=>'ContactController@data_contact',
            'as'=>'data_contact'
        ]);
        Route::get('/delete/{id}',[
            'uses'=>'ContactController@delete_contact',
            'as'=>'delete_contact'
        ]);
    });
});
//fontend
Route::prefix('/')->as('page.')->group(function () {
    Route::prefix('Account')->group(function () {
      
        Route::get('info', [
            'uses'=>'PageController@get_info',
            'as'=>'get_info'
        ]);
        Route::post('info', [
            'uses'=>'PageController@post_info',
            'as'=>'post_info'
        ]);
        Route::post('change_passwd', [
            'uses'=>'PageController@post_change_passwd',
            'as'=>'post_change_passwd'
        ]);
        Route::post('change_face', [
            'uses'=>'PageController@post_face',
            'as'=>'post_face'
        ]);
        
    });
    Route::get('/', 
    [
        'uses'=>'PageController@Home',
        'as'=>'Home'
    ]
    );
    
    Route::get('/about', 
    [
        'uses'=>'PageController@About',
        'as'=>'About'
    ]
    );

    Route::get('/contact', 
    [
        'uses'=>'PageController@Contact',
        'as'=>'Contact'
    ]
    );
    Route::post('/contact', 
    [
        'uses'=>'PageController@post_Contact',
        'as'=>'Post_Contact'
    ]
    );
    Route::get('/blog', 
    [
        'uses'=>'PageController@Blog',
        'as'=>'Blog'
    ]
    );
    Route::get('/blog_detail/{id}', 
    [
        'uses'=>'PageController@Blog_Detail',
        'as'=>'Blog_Detail'
    ]
    );
    Route::post('/comment_blog/{id}', 
    [
        'uses'=>'PageController@Comment_Blog',
        'as'=>'Comment_Blog'
    ]
    );
    Route::get('/search_blogs', 
    [
        'uses'=>'PageController@Search_Blogs',
        'as'=>'search_blogs'
    ]);
    Route::get('/cart_details', 
    [
        'uses'=>'PageController@Cart_details',
        'as'=>'Cart_details'
    ]
    );
    Route::post('/cart_details', 
    [
        'uses'=>'PageController@Post_Cart_details',
        'as'=>'Post_Cart_details'
    ]
    );
    Route::get('/product/{id}', 
    [
        'uses'=>'PageController@Product',
        'as'=>'Product'
    ]
    );
    Route::get('/product_detail/{id}', 
    [
        'uses'=>'PageController@Product_detail',
        'as'=>'Product_detail'
    ]
    );
    Route::get('/search_products', 
    [
        'uses'=>'PageController@Search_Products',
        'as'=>'Search_products'
    ]);
    Route::get('/add_cart/{id}', 
    [
        'uses'=>'PageController@Add_cart',
        'as'=>'Add_cart'
    ]
    );
    

    Route::get('/delete_cart/{id}', 
    [
        'uses'=>'PageController@Delete_cart',
        'as'=>'Delete_cart'
    ]
    );
    Route::get('/delete_all_cart', 
    [
        'uses'=>'PageController@Delete_all_cart',
        'as'=>'Delete_all_cart'
    ]
    );
    Route::get('/login',
    [
        'uses'=>'PageController@Get_Login',
        'as'=>'Get_Login'
    ]
    );
   
    Route::post('/login',
    [
        'uses'=>'PageController@Login',
        'as'=>'Login'
    ]
    );
    Route::get('/logout',
    [
        'uses'=>'PageController@Logout',
        'as'=>'Logout'
    ]
    );
    Route::get('/reset_password',
    [
        'uses'=>'PageController@Reset_Password',
        'as'=>'Reset_Password'
    ]
    );
    Route::get('/update_password',
    [
        'uses'=>'PageController@Update_Password',
        'as'=>'Update_Password'
    ]
    );
    Route::post('/update_password',
    [
        'uses'=>'PageController@Set_Password',
        'as'=>'Set_Password'
    ]
    );
    Route::post('/recover_password',
    [
        'uses'=>'PageController@Recover_Password',
        'as'=>'Recover_Password'
    ]
    );
    Route::get('/register',
    [
        'uses'=>'PageController@Get_Register',
        'as'=>'Get_Register'
    ]
    );
    Route::post('/register',
    [
        'uses'=>'PageController@Register',
        'as'=>'Register'
    ]
    );
    Route::post('/review/{id}',
    [
        'uses'=>'PageController@Review',
        'as'=>'Review'
    ]
    );
    Route::prefix('check_out')->group(function () {
        Route::post('check-out', [
            'uses'=>'PageController@post_check_out',
            'as'=>'post_check_out'
        ]);
        Route::get('payment-success',[
            'uses'=>'PageController@get_payment',
            'as'=>'get_payment'
        ]);
    });
    

});
