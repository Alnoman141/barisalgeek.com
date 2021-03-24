<?php

use Illuminate\Support\Facades\Artisan;
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

/*
 * *************************************************************************|
 * ******************* Frontend Pages Routes starts ***********************************|
 * *************************************************************************|
 */


/*
 * *******************Home Page route***********************************
 */
Route::get('/', 'Frontend\HomePagesController@index')->name('index');

/*
 * *******************404 Page route ***********************************
 */
Route::get('/Not-Found', 'Frontend\HomePagesController@pageNotFound')->name('pagenotfound');

/*
 * *******************service Page Route ***********************************
 */
Route::group(['prefix' => '/service'],function (){
/*
 * *********************service Show route for showing single service***********************************
 */
    Route::get('/', 'Frontend\ServicePagesController@index')->name('service');

    Route::get('/show/{slug}', 'Frontend\ServicePagesController@show')->name('service.show');

});

/*
 * *******************about Page routes***********************************
 */
Route::group(['prefix' => '/about'],function (){
    /*
     * *******************about index Page route***********************************
     */
    Route::get('/', 'Frontend\AboutPagesController@index')->name('about');
    /*
     * *******************about Page About myself page route***********************************
     */
    Route::get('/show/{id}', 'Frontend\AboutPagesController@show')->name('about.show');

});

/*
 * *******************portfolio Page routes***********************************
 */
Route::group(['prefix' => '/portfolio'],function (){

    /*
 * *******************portfolio index Page route***********************************
 */
    Route::get('/', 'Frontend\PortfolioPagesController@index')->name('portfolio');
    /*
     * ******************* single portfolio Page route***********************************
     */
    Route::get('/show/{id}', 'Frontend\PortfolioPagesController@show')->name('portfolio.show');

});


/*
 * *******************Gallery page route***********************************
 */
Route::get('/gallery', 'Frontend\GalleryPagesController@index')->name('gallery');

/*
 * *******************review Page routes***********************************
 */
Route::group(['prefix' => '/reviews'],function (){
    /*
     * *******************review index Page routes***********************************
     */
    Route::get('/', 'Frontend\ReviewPagesController@index')->name('review');
    /*
     * *******************Single review Show Page routes***********************************
     */
    Route::get('/show/{id}', 'Frontend\ReviewPagesController@show')->name('review.show');
});

/*
 * *******************subscribe Page routes***********************************
 */
Route::group(['prefix' => '/subscriber'],function (){
    /*
     * *******************subscribe store routes***********************************
     */
    Route::post('/store', 'Frontend\SubscribersController@store')->name('subscriber.store');
});

/*
 * *******************Course register Page routes***********************************
 */
Route::group(['prefix' => '/register'],function (){
    /*
     * *******************Course register store routes***********************************
     */
    Route::post('/store', 'Frontend\StudentsRegisterController@store')->name('register.store');
});
/*
 * *******************course Page routes***********************************
 */
Route::group(['prefix' => '/course'],function (){
    /*
     * *******************course index Page routes***********************************
     */
    Route::get('/', 'Frontend\CoursesController@index')->name('course');
    /*
     * *******************single course Page routes***********************************
     */
    Route::get('/show/{id}', 'Frontend\CoursesController@show')->name('course.show');

});

/*
 * *******************batch Page routes***********************************
 */
Route::group(['prefix' => '/batch'],function (){

    /*
 * *******************batch index Page routes***********************************
 */
    Route::get('/', 'Frontend\BatchesController@index')->name('batch');

    /*
 * *******************single batch Page routes***********************************
 */
    Route::get('/show/{id}', 'Frontend\BatchesController@show')->name('batch.show');

});

/*
 * *******************contact Page routes***********************************
 */
Route::group(['prefix' => '/contact'],function (){
    /*
     * *******************contact index Page routes***********************************
     */
    Route::get('/', 'Frontend\ContactPagesController@index')->name('contact');

    /*
 * *******************message store routes***********************************
 */
    Route::post('/store', 'Frontend\ContactPagesController@store')->name('contact.store');

});

/*
 * *******************FFQ Page routes***********************************
 */
Route::get('/ffq', 'Frontend\FFQControllers@index')->name('ffq');

/*
 * *******************privacy Page routes***********************************
 */
Route::get('/privacy', 'Frontend\PrivacyControllers@index')->name('privacy');

/*
 * *******************conditions Page routes***********************************
 */
Route::get('/conditions', 'Frontend\ConditionsControllers@index')->name('condition');



/*
 * *************************************************************************|
 * ******************* Frontend Pages Routes ends ***********************************|
 * *************************************************************************|
 */


/*
 * *************************************************************************|
 * ******************* Admin Panel Routes stats ***********************************|
 * *************************************************************************|
 */
Route::group(['prefix' => '/MyControlPanel'],function (){
    /*
     * *******************Admin index Page route***********************************
     */
    Route::get('/', 'Backend\AdminPagesController@index')->name('admin.index');

    /*
     * *******************Admin admin-privilege Page route***********************************
     */
    Route::get('/admin-privilege', 'Backend\AdminPagesController@adminPrivilege')->name('admin.privilege');
    /*
     * *******************Admin DashBoard Page route***********************************
     */
    Route::get('/dashboard', 'Backend\AdminPagesController@index')->name('admin.dashboard');

    /*
     * *******************Admin showLoginForm Page route***********************************
     */
    Route::get('/login','Auth\Admin\LoginController@showLoginForm')->name('admin.login');

    /*
     * *******************Admin login Page route***********************************
     */
    Route::post('/login/submit','Auth\Admin\LoginController@login')->name('admin.login.submit');

    /*
     * *******************Admin logout Page route***********************************
     */
    Route::post('/logout','Auth\Admin\LoginController@logout')->name('admin.logout');

    /*
     * *******************Admin showRegistrationForm Page route***********************************
     */
    Route::get('/register/form','Auth\Admin\RegisterController@showRegistrationForm')->name('admin.register.form');

    /*
     * *******************Admin Registration Page route***********************************
     */
    Route::post('/register','Auth\Admin\RegisterController@register')->name('admin.register');

    /*
     * *******************Admin verify Page route***********************************
     */
    Route::get('/token/{token}','Backend\VerifyController@verify')->name('admin.registration.verify');

    /*
     * *******************Admin sendResetLinkEmail Page route***********************************
     */
    Route::post('/password/email','Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

    /*
     * *******************Admin showLinkRequestForm Page route***********************************
     */
    Route::get('/password/reset','Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

    /*
     * *******************Admin showResetForm Page route***********************************
     */
    Route::get('/password/reset/{token}','Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

    /*
     * *******************Admin reset Page route***********************************
     */
    Route::post('/password/reset','Auth\Admin\ResetPasswordController@reset')->name('admin.password.update');

    /*
     * *******************Admin List Page route***********************************
     */
    Route::get('/list','Backend\AdminController@index')->name('admin.list');

    /*
     * *******************Admin Show Page route***********************************
     */
    Route::get('/show/{id}','Backend\AdminController@show')->name('admin.show');

    /*
     * *******************Admin Edit Page route***********************************
     */
    Route::get('/edit/{id}','Backend\AdminController@edit')->name('admin.edit');

    /*
     * *******************Admin Update route***********************************
     */
    Route::post('/update/{id}','Backend\AdminController@update')->name('admin.update');

    /*
     * *******************Admin Block Page route***********************************
     */
    Route::get('/block/{id}','Backend\AdminController@block')->name('admin.block');

    /*
     * *******************Admin unblock Page route***********************************
     */
    Route::get('/unblock/{id}','Backend\AdminController@unblock')->name('admin.unblock');

    /*
     * *******************Admin delete Page route***********************************
     */
    Route::get('/user/{id}','Backend\AdminController@destroy')->name('admin.delete');

    /*
     * *******************Admin Category Page route***********************************
     */
    Route::group(['prefix' => '/category'],function (){

        /*
         * *******************Admin Category index Page route***********************************
         */
        Route::get('/', 'Backend\CategoriesController@index')->name('admin.category.index');

        /*
         * *******************Admin Category create Page route***********************************
         */
        Route::get('/create', 'Backend\CategoriesController@create')->name('admin.category.create');

        /*
         * *******************Admin Category store Page route***********************************
         */
        Route::post('/store', 'Backend\CategoriesController@store')->name('admin.category.store');

        /*
         * *******************Admin Category update route***********************************
         */
        Route::post('/update/{id}', 'Backend\CategoriesController@update')->name('admin.category.update');

        /*
         * *******************Admin Category edit Page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\CategoriesController@edit')->name('admin.category.edit');

        /*
         * *******************Admin Category delete route***********************************
         */
        Route::get('/delete/{id}', 'Backend\CategoriesController@destroy')->name('admin.category.delete');
    });

    /*
     * *******************Admin Service Page route***********************************
     */

    Route::group(['prefix' => '/service'],function (){

        /*
         * *******************Admin Service index Page route***********************************
         */
        Route::get('/', 'Backend\ServicesController@index')->name('admin.service.index');

        /*
         * *******************Admin Service create Page route***********************************
         */
        Route::get('/create', 'Backend\ServicesController@create')->name('admin.service.create');

        /*
         * *******************Admin Service store route***********************************
         */
        Route::post('/store', 'Backend\ServicesController@store')->name('admin.service.store');

        /*
         * *******************Admin Service update route***********************************
         */
        Route::post('/update/{id}', 'Backend\ServicesController@update')->name('admin.service.update');

        /*
         * *******************Admin Service edit Page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\ServicesController@edit')->name('admin.service.edit');

        /*
         * *******************Admin Service delete route***********************************
         */
        Route::get('/delete/{id}', 'Backend\ServicesController@destroy')->name('admin.service.delete');
    });

    /*
     * *******************Admin Portfolio Page route***********************************
     */
    Route::group(['prefix' => '/portfolio'],function (){

        /*
         * *******************Admin Portfolio index Page route***********************************
         */
        Route::get('/', 'Backend\PortfolioController@index')->name('admin.portfolio.index');

        /*
         * *******************Admin portfolio create Page route***********************************
         */
        Route::get('/create', 'Backend\PortfolioController@create')->name('admin.portfolio.create');

        /*
         * *******************Admin portfolio store route***********************************
         */
        Route::post('/store', 'Backend\PortfolioController@store')->name('admin.portfolio.store');

        /*
         * *******************Admin portfolio update route***********************************
         */
        Route::post('/update/{id}', 'Backend\PortfolioController@update')->name('admin.portfolio.update');

        /*
         * *******************Admin portfolio show Page route***********************************
         */
        Route::get('/show/{id}', 'Backend\PortfolioController@show')->name('admin.portfolio.show');

        /*
         * *******************Admin portfolio edit Page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\PortfolioController@edit')->name('admin.portfolio.edit');

        /*
         * *******************Admin portfolio delete route***********************************
         */
        Route::get('/delete/{id}', 'Backend\PortfolioController@destroy')->name('admin.portfolio.delete');
    });

    /*
     * *******************Admin testimonial Page route***********************************
     */
    Route::group(['prefix' => '/testimonial'],function (){
        /*
         * *******************Admin testimonial index Page route***********************************
         */
        Route::get('/', 'Backend\TestimonialsController@index')->name('admin.testimonial.index');

        /*
         * *******************Admin testimonial create Page route***********************************
         */
        Route::get('/create', 'Backend\TestimonialsController@create')->name('admin.testimonial.create');

        /*
         * *******************Admin testimonial store route***********************************
         */
        Route::post('/store', 'Backend\TestimonialsController@store')->name('admin.testimonial.store');

        /*
         * *******************Admin testimonial update route***********************************
         */
        Route::post('/update/{id}', 'Backend\TestimonialsController@update')->name('admin.testimonial.update');

        /*
         * *******************Admin testimonial show page route***********************************
         */
        Route::get('/show/{id}', 'Backend\TestimonialsController@show')->name('admin.testimonial.show');

        /*
         * *******************Admin testimonial edit route***********************************
         */
        Route::get('/edit/{id}', 'Backend\TestimonialsController@edit')->name('admin.testimonial.edit');

        /*
         * *******************Admin testimonial delete route***********************************
         */
        Route::get('/delete/{id}', 'Backend\TestimonialsController@destroy')->name('admin.testimonial.delete');
    });

    /*
     * *******************Admin Banner pages route***********************************
     */
    Route::group(['prefix' => '/banner'],function (){

        /*
         * *******************Admin banner index page route***********************************
         */
        Route::get('/', 'Backend\BannersController@index')->name('admin.banner.index');

        /*
         * *******************Admin banner create page route***********************************
         */
        Route::get('/create', 'Backend\BannersController@create')->name('admin.banner.create');

        /*
         * *******************Admin banner store route***********************************
         */
        Route::post('/store', 'Backend\BannersController@store')->name('admin.banner.store');

        /*
         * *******************Admin banner update route***********************************
         */
        Route::post('/update/{id}', 'Backend\BannersController@update')->name('admin.banner.update');

        /*
         * *******************Admin banner edit page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\BannersController@edit')->name('admin.banner.edit');

        /*
         * *******************Admin banner delete route***********************************
         */
        Route::get('/delete/{id}', 'Backend\BannersController@destroy')->name('admin.banner.delete');
    });

    /*
     * *******************Admin Logo page route***********************************
     */
    Route::group(['prefix' => '/logo'],function (){

        /*
         * *******************Admin logo update route***********************************
         */
        Route::post('/update/{id}', 'Backend\LogoController@update')->name('admin.logo.update');
        /*
         * *******************Admin logo edit page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\LogoController@edit')->name('admin.logo.edit');

    });

    /*
     * *******************Admin common banner page route***********************************
     */
    Route::group(['prefix' => '/common-banner'],function (){

        /*
         * *******************Admin common banner update route***********************************
         */
        Route::post('/update/{id}', 'Backend\CommonBannerController@update')->name('admin.common_banner.update');

        /*
         * *******************Admin common banner edit page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\CommonBannerController@edit')->name('admin.common_banner.edit');

    });

    /*
     * *******************Admin social-link page route***********************************
     */

    Route::group(['prefix' => '/social-link'],function (){
        /*
         * *******************Admin social-link update route***********************************
         */
        Route::post('/update/{id}', 'Backend\SocialLinksController@update')->name('admin.social.update');

        /*
         * *******************Admin social-link edit page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\SocialLinksController@edit')->name('admin.social.edit');

    });

    /*
     * *******************Admin privacy page route***********************************
     */
    Route::group(['prefix' => '/privacy'],function (){

        /*
         * *******************Admin privacy update   route***********************************
         */
        Route::post('/update/{id}', 'Backend\PrivacyControllers@update')->name('admin.privacy.update');

        /*
         * *******************Admin privacy edit page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\PrivacyControllers@edit')->name('admin.privacy.edit');

    });

    /*
     * *******************Admin condition page route***********************************
     */
    Route::group(['prefix' => '/condition'],function (){

        /*
         * *******************Admin condition update route***********************************
         */
        Route::post('/update/{id}', 'Backend\ConditionsControllers@update')->name('admin.condition.update');

        /*
         * *******************Admin condition edit page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\ConditionsControllers@edit')->name('admin.condition.edit');

    });

    /*
     * *******************Admin contact-info page route***********************************
     */

    Route::group(['prefix' => '/contact-info'],function (){
        /*
         * *******************Admin contact-info update route***********************************
         */

        Route::post('/update/{id}', 'Backend\ContractInfoController@update')->name('admin.contactinfo.update');

        /*
         * *******************Admin contact-info edit page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\ContractInfoController@edit')->name('admin.contactinfo.edit');

    });

    /*
     * *******************Admin Background image page route***********************************
     */
    Route::group(['prefix' => '/bg'],function (){
        /*
         * *******************Admin Background image update route***********************************
         */
        Route::post('/update/{id}', 'Backend\BgImagesController@update')->name('admin.bg.update');

        /*
         * *******************Admin Background image edit page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\BgImagesController@edit')->name('admin.bg.edit');

    });

    /*
     * *******************Admin About page team route***********************************
     */
    Route::group(['prefix' => '/about'],function (){

        /*
         * *******************Admin about-team index page route***********************************
         */
        Route::get('/team', 'Backend\AboutPageController@index')->name('admin.team.index');

        /*
         * *******************Admin about-team create page route***********************************
         */
        Route::get('/team/create', 'Backend\AboutPageController@create')->name('admin.team.create');

        /*
         * *******************Admin about-team store route***********************************
         */
        Route::post('/team/store', 'Backend\AboutPageController@store')->name('admin.team.store');

        /*
         * *******************Admin about-team edit page route***********************************
         */
        Route::get('/team/edit/{id}', 'Backend\AboutPageController@editTeam')->name('admin.team.edit');

        /*
         * *******************Admin about-team update route***********************************
         */
        Route::post('/team/update/{id}', 'Backend\AboutPageController@updateTeam')->name('admin.team.update');

        /*
         * *******************Admin about-team delete route***********************************
         */
        Route::get('/team/delete/{id}', 'Backend\AboutPageController@delete')->name('admin.team.delete');

        /*
         * *******************Admin about text update route***********************************
         */
        Route::post('/update/{id}', 'Backend\AboutPageController@update')->name('admin.about.update');

        /*
         * *******************Admin about text edit page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\AboutPageController@edit')->name('admin.about.edit');

    });

    /*
     * *******************Admin subscriber page route***********************************
     */
    Route::group(['prefix' => '/subscribers'],function (){

        /*
     * *******************Admin subscriber index page route***********************************
     */
        Route::get('/', 'Backend\SubscribersController@index')->name('admin.subscriber.index');

        /*
         * *******************Admin subscriber approve route***********************************
         */
        Route::get('/approve/{id}', 'Backend\SubscribersController@approve')->name('admin.subscriber.approve');

        /*
         * *******************Admin subscriber delete route***********************************
         */
        Route::get('/delete/{id}', 'Backend\SubscribersController@destroy')->name('admin.subscriber.delete');
    });

    /*
     * *******************Admin Course Register page route***********************************
     */
    Route::group(['prefix' => '/register'],function (){

        /*
         * *******************Admin Course Register index page route***********************************
         */
        Route::get('/student', 'Backend\StudentsRegistrationController@index')->name('admin.register.student.index');

        /*
         * *******************Admin Course Register Seen route***********************************
         */
        Route::get('/student/seen/{id}', 'Backend\StudentsRegistrationController@seen')->name('admin.register.student.seen');

        /*
         * *******************Admin Course Register delete route***********************************
         */
        Route::get('/student/delete/{id}', 'Backend\StudentsRegistrationController@destroy')->name('admin.register.student.delete');
    });


    /*
     * *******************Admin Message route***********************************
     */
    Route::group(['prefix' => 'messages'],function() {
        /*
         * *******************Admin Message index page route***********************************
         */
        Route::get('/list','Backend\ContactsController@index')->name('admin.messages');

        /*
         * *******************Admin Message show page route***********************************
         */
        Route::get('/show/{id}','Backend\ContactsController@show')->name('admin.message.show');

        /*
         * *******************Admin Message reply page route***********************************
         */
        Route::get('/reply/{id}','Backend\ContactsController@replyForm')->name('admin.message.replyform');

        /*
         * *******************Admin Message reply route***********************************
         */
        Route::post('/reply/{id}','Backend\ContactsController@reply')->name('admin.message.reply');

        /*
         * *******************Admin Message delete route***********************************
         */
        Route::get('/delete/{id}','Backend\ContactsController@delete')->name('admin.message.delete');


    });

    /*
     * *******************Admin Gallery page route***********************************
     */
    Route::group(['prefix' => '/gallery'],function (){

        /*
         * *******************Admin Gallery index page route***********************************
         */
        Route::get('/', 'Backend\GalleryController@index')->name('admin.gallery.index');

        /*
         * *******************Admin Gallery create page route***********************************
         */
        Route::get('/create', 'Backend\GalleryController@create')->name('admin.gallery.create');

        /*
         * *******************Admin Gallery store page route***********************************
         */
        Route::post('/store', 'Backend\GalleryController@store')->name('admin.gallery.store');

        /*
         * *******************Admin Gallery edit page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\GalleryController@edit')->name('admin.gallery.edit');

        /*
         * *******************Admin Gallery update route***********************************
         */
        Route::post('/update/{id}', 'Backend\GalleryController@update')->name('admin.gallery.update');

        /*
         * *******************Admin Gallery delete route***********************************
         */
        Route::get('/delete/{id}', 'Backend\GalleryController@destroy')->name('admin.gallery.delete');
    });

    /*
     * *******************Admin batch page route***********************************
     */
    Route::group(['prefix' => '/batch'],function (){

        /*
         * *******************Admin batch index page route***********************************
         */
        Route::get('/', 'Backend\BatchesController@index')->name('admin.batch.index');

        /*
         * *******************Admin batch create page route***********************************
         */
        Route::get('/create', 'Backend\BatchesController@create')->name('admin.batch.create');

        /*
         * *******************Admin batch store route***********************************
         */
        Route::post('/store', 'Backend\BatchesController@store')->name('admin.batch.store');

        /*
         * *******************Admin batch edit page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\BatchesController@edit')->name('admin.batch.edit');

        /*
         * *******************Admin batch update page route***********************************
         */
        Route::post('/update/{id}', 'Backend\BatchesController@update')->name('admin.batch.update');

        /*
         * *******************Admin batch delete route***********************************
         */
        Route::get('/delete/{id}', 'Backend\BatchesController@destroy')->name('admin.batch.delete');
    });

    /*
     * *******************Admin course route***********************************
     */
    Route::group(['prefix' => '/course'],function (){

        /*
         * *******************Admin course index page route***********************************
         */
        Route::get('/', 'Backend\CoursesController@index')->name('admin.course.index');

        /*
         * *******************Admin course create page route***********************************
         */
        Route::get('/create', 'Backend\CoursesController@create')->name('admin.course.create');

        /*
         * *******************Admin course store route***********************************
         */
        Route::post('/store', 'Backend\CoursesController@store')->name('admin.course.store');

        /*
         * *******************Admin course show route***********************************
         */
        Route::get('/show/{id}', 'Backend\CoursesController@show')->name('admin.course.show');

        /*
         * *******************Admin course edit page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\CoursesController@edit')->name('admin.course.edit');

        /*
         * *******************Admin course update route***********************************
         */
        Route::post('/update/{id}', 'Backend\CoursesController@update')->name('admin.course.update');

        /*
         * *******************Admin course delete route***********************************
         */
        Route::get('/delete/{id}', 'Backend\CoursesController@destroy')->name('admin.course.delete');
    });

    /*
     * *******************Admin student page route***********************************
     */
    Route::group(['prefix' => '/student'],function (){

        /*
         * *******************Admin student index page route***********************************
         */
        Route::get('/', 'Backend\StudentsController@index')->name('admin.student.index');

        /*
         * *******************Admin student create page route***********************************
         */
        Route::get('/create', 'Backend\StudentsController@create')->name('admin.student.create');

        /*
         * *******************Admin student store route***********************************
         */
        Route::post('/store', 'Backend\StudentsController@store')->name('admin.student.store');

        /*
         * *******************Admin student show page route***********************************
         */
        Route::get('/show/{id}', 'Backend\StudentsController@show')->name('admin.student.show');

        /*
         * *******************Admin student edit page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\StudentsController@edit')->name('admin.student.edit');

        /*
         * *******************Admin student update route***********************************
         */
        Route::post('/update/{id}', 'Backend\StudentsController@update')->name('admin.student.update');

        /*
         * *******************Admin student delete route***********************************
         */
        Route::get('/delete/{id}', 'Backend\StudentsController@destroy')->name('admin.student.delete');
    });

    /*
     * *******************Admin student success page route***********************************
     */
    Route::group(['prefix' => '/success'],function (){

        /*
         * *******************Admin student success index page route***********************************
         */
        Route::get('/', 'Backend\StudentsSuccess@index')->name('admin.success.index');

        /*
         * *******************Admin  student success create page route***********************************
         */
        Route::get('/create', 'Backend\StudentsSuccess@create')->name('admin.success.create');

        /*
         * *******************Admin  student success index page route***********************************
         */
        Route::post('/store', 'Backend\StudentsSuccess@store')->name('admin.success.store');

        /*
         * *******************Admin  student success show page route***********************************
         */
        Route::get('/show/{id}', 'Backend\StudentsSuccess@show')->name('admin.success.show');

        /*
         * *******************Admin  student success edit page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\StudentsSuccess@edit')->name('admin.success.edit');

        /*
         * *******************Admin  student success update route***********************************
         */
        Route::post('/update/{id}', 'Backend\StudentsSuccess@update')->name('admin.success.update');

        /*
         * *******************Admin  student success delete page route***********************************
         */
        Route::get('/delete/{id}', 'Backend\StudentsSuccess@destroy')->name('admin.success.delete');
    });

    /*
     * *******************Admin  FFQ page route***********************************
     */
    Route::group(['prefix' => '/ffq'],function (){

        /*
         * *******************Admin  FFQ index page route***********************************
         */
        Route::get('/', 'Backend\FFQControllers@index')->name('admin.ffq.index');

        /*
         * *******************Admin  FFQ create page route***********************************
         */
        Route::get('/create', 'Backend\FFQControllers@create')->name('admin.ffq.create');

        /*
         * *******************Admin  FFQ store route***********************************
         */
        Route::post('/store', 'Backend\FFQControllers@store')->name('admin.ffq.store');

        /*
         * *******************Admin  FFQ edit page route***********************************
         */
        Route::get('/edit/{id}', 'Backend\FFQControllers@edit')->name('admin.ffq.edit');

        /*
         * *******************Admin  FFQ update route***********************************
         */
        Route::post('/update/{id}', 'Backend\FFQControllers@update')->name('admin.ffq.update');

        /*
         * *******************Admin  FFQ delete route***********************************
         */
        Route::get('/delete/{id}', 'Backend\FFQControllers@destroy')->name('admin.ffq.delete');
    });


});

/*
 * *********************************************************************************|
 * ******************* Admin Panel Routes Ends ***********************************|
 * *********************************************************************************|
 */


/*
 * *********************************************************************************|
 * ******************* Auth Routes starts ***********************************|
 * *********************************************************************************|
 */

//Auth::routes();

/*
 * *********************************************************************************|
 * ******************* Auth Routes ends ***********************************|
 * *********************************************************************************|
 */

// Api Routes

Route::get('get-student/{id}',function ($id){
    return json_encode(App\Models\Student::where('batch_id',$id)->get());
});