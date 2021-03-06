<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/clear', function() {
    
    Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return 'clear';
});

Route::get('/','User\UserController@index')->name('user.index');
Route::get('/signUp','User\SignUpController@signUp')->name('user.signUp');
Route::get('/signUpStore','User\SignUpController@signUpStore')->name('user.signUpStore');

// Forget Password

Route::get('/forgetPassword','User\ForgetPasswordController@forgetPassword')->name('user.forgetPassword');
Route::post('/forgetPassword','User\ForgetPasswordController@sendMail')->name('user.sendMail');
Route::get('/getUserPasswordView/{token}','User\ForgetPasswordController@getUserPasswordView')->name('user.getUserPasswordView');
Route::post('/getUserPasswordView/{token}','User\ForgetPasswordController@resetPassword')->name('user.resetPassword');

// FaceBook sign up

Route::get('login/facebook', 'User\FaceboolController@redirectToProvider')->name('user.facebook');
Route::get('login/facebook/callback', 'User\FaceboolController@handleProviderCallback');

// Twitter Signup

Route::get('login/twitter', 'User\TwitterController@redirectToProvider')->name('user.twitter');
Route::get('login/twitter/callback', 'User\TwitterController@handleProviderCallback');

// Linkedin Signup

Route::get('login/linkedin', 'User\LinkedinController@redirectToProvider')->name('user.linkedin');
Route::get('login/linkedin/callback', 'User\LinkedinController@handleProviderCallback');

// Instagram Signup

Route::get('login/instagram', 'User\InstagramController@redirectToProvider')->name('user.instagram');
Route::get('login/instagram/callback', 'User\InstagramController@handleProviderCallback');

Route::get('/login','User\LoginController@login')->name('user.login');
Route::post('/login','User\LoginController@loginCheck')->name('user.loginCheck');





Route::get('/courseCategory/{id}','User\CourseCategoryController@courseCategory')->name('user.courseCategory');

// Course Details

Route::get('/allCourse','User\CourseController@allCourse')->name('user.allCourse');
Route::get('/courseDetails/{id}','User\CourseController@courseDetails')->name('user.courseDetails');
Route::get('/courseContent/{id}','User\CourseController@courseDemo')->name('user.courseDemo');

// Course Search
Route::get('/courseSearch','User\CourseController@courseSearch')->name('user.courseSearch');

// Course Demo Files

Route::get('/courseDemoFile/{course_id}/{lectureid}/{checkid}','User\CourseController@courseDemoFile')->name('user.courseDemoFile');


// Blog 

Route::get('/allBlog','User\BlogController@allBlog')->name('user.allBlog');
Route::get('/blogdetails/{id}','User\BlogController@blogDetails')->name('user.blogDetails');


// Card Add 
Route::get('/cartAdd','User\CartController@cartAdd')->name('user.cartAdd');

// Wislist Add

Route::get('/wishListAdd','User\WishListController@wishListAdd')->name('user.wishListAdd');

// Filering

Route::get('/courseFiltering','User\CourseController@courseFiltering')->name('user.courseFiltering');
Route::get('/skillFiltering','User\CourseController@skillFiltering')->name('user.skillFiltering');
Route::get('/priceFiltering','User\CourseController@priceFiltering')->name('user.priceFiltering');
Route::get('/topicsFiltering','User\CourseController@topicsFiltering')->name('user.topicsFiltering');
Route::get('/autorFiltering','User\CourseController@autorFiltering')->name('user.autorFiltering');
Route::get('/ratingsFiltering','User\CourseController@ratingsFiltering')->name('user.ratingsFiltering');

// Footer Route



Route::group(['middleware' => 'userSess'], function () {
    

    Route::get('/logOut','User\LoginController@logOut')->name('user.logOut');

    // Cart

    Route::get('/cart','User\CartController@cartIndex')->name('user.cartIndex');
    Route::get('/getCartItem','User\CartController@getCartItem')->name('user.getCartItem');
    
    Route::get('/cartRemove','User\CartController@cartRemove')->name('user.cartRemove');
    Route::get('/cartToWishList','User\CartController@cartToWishList')->name('user.cartToWishList');
    Route::get('/applyCoupon','User\CartController@applyCoupon')->name('user.applyCoupon');

    // Wish List

    Route::get('/wishListIndex','User\WishListController@wishListIndex')->name('user.wishListIndex');
    Route::get('/wishListItem','User\WishListController@wishListItem')->name('user.wishListItem');
    
    Route::get('/wishToCart','User\WishListController@wishToCart')->name('user.wishToCart');
    Route::get('/wishListRemove','User\WishListController@wishListRemove')->name('user.wishListRemove');

    // Check out
    Route::get('/checkOut','User\CheckOutController@checkOutIndex')->name('user.checkOutIndex');
    Route::get('/courseOrder','User\CheckOutController@courseOrder')->name('user.courseOrder');

    // User Profile

    Route::get('/userProfile','User\ProfileController@userProfile')->name('user.userProfile');
    Route::get('/userProfileUpdate','User\ProfileController@userProfileUpdate')->name('user.userProfileUpdate');
    Route::get('/deleteUserLinks','User\ProfileController@deleteUserLinks')->name('user.deleteUserLinks');

    // Course Enroll

    Route::get('/enrollHistory','User\ProfileController@enrollHistory')->name('user.enrollHistory');

    // Enroll Filtering
    Route::get('/keyWordFiltering','User\ProfileController@keyWordFiltering')->name('user.keyWordFiltering');
    Route::get('/categoryFiltering','User\ProfileController@categoryFiltering')->name('user.categoryFiltering');

    

    // Answer Submit

    Route::get('/submitAnswer','User\ExamController@submitAnswer')->name('user.submitAnswer');

    // Submit Form

    Route::post('/formInsert','User\UserSubmitFileController@formInsert')->name('user.formInsert');

    // Submitted form
     
    Route::get('/submittedForm','User\ProfileController@submittedForm')->name('user.submittedForm');

    // Ratings

    Route::get('/getRatings','User\RatingsController@getRatings')->name('user.getRatings');
    Route::get('/ratingsInsert','User\RatingsController@ratingsInsert')->name('user.ratingsInsert');

    // Notifications
    Route::get('/notificationData','User\NotificationController@notificationData')->name('user.notificationData');
    Route::get('/deleteNotification','User\NotificationController@deleteNotification')->name('user.deleteNotification');

    // Course Certificate

    Route::get('/CourseCertificate/{id}','User\CertificateController@CourseCertificate')->name('user.CourseCertificate');
});



// Admin Panel Starts from here


// Admin Forget password

Route::get('/admin/forgetPassword','Admin\ForgetPasswordController@forgetPassword')->name('admin.forgetPassword');
Route::post('/admin/forgetPassword','Admin\ForgetPasswordController@sendMail')->name('admin.sendMail');
Route::get('/admin/getUserPasswordView/{token}','Admin\ForgetPasswordController@getUserPasswordView')->name('admin.getUserPasswordView');
Route::post('/admin/getUserPasswordView/{token}','Admin\ForgetPasswordController@resetPassword')->name('admin.resetPassword');

Route::get('/admin/login','Admin\LoginController@loginAdmin')->name('admin.loginAdmin');
Route::post('/admin/login','Admin\LoginController@loginAdminCheck')->name('admin.loginAdminCheck');


Route::group(['middleware'=>['adminSess'],'prefix' => 'admin'], function () {

    Route::get('/adminLogout','Admin\LoginController@adminLogout')->name('admin.adminLogout');

    Route::get('/','Admin\AdminController@index')->name('admin.index');


    // Permission

    Route::get('/role','Admin\RoleController@roleIndex')->name('admin.roleIndex');
    Route::get('/getRoleList','Admin\RoleController@getRoleList')->name('admin.getRoleList');
    Route::get('/insertRole','Admin\RoleController@insertRole')->name('admin.insertRole');
    Route::get('/editRole','Admin\RoleController@editRole')->name('admin.editRole');
    Route::get('/editRoleUpdate','Admin\RoleController@editRoleUpdate')->name('admin.editRoleUpdate');
    Route::get('/deleteRole','Admin\RoleController@deleteRole')->name('admin.deleteRole');
    Route::get('/rolePermission','Admin\RoleController@rolePermission')->name('admin.rolePermission');
    Route::get('/permissionStore','Admin\RoleController@permissionStore')->name('admin.permissionStore');



    // Admin Module

    Route::get('/adminListIndex','Admin\AdminRegistrationController@adminListIndex')->name('admin.adminListIndex');
    Route::get('/getAdminList','Admin\AdminRegistrationController@getAdminList')->name('admin.getAdminList');
    Route::post('/insertAdminList','Admin\AdminRegistrationController@insertAdminList')->name('admin.insertAdminList');
    Route::get('/editAdminList','Admin\AdminRegistrationController@editAdminList')->name('admin.editAdminList');
    Route::post('/editAdminListUpdate','Admin\AdminRegistrationController@editAdminListUpdate')->name('admin.editAdminListUpdate');
    Route::get('/deleteAdminList','Admin\AdminRegistrationController@deleteAdminList')->name('admin.deleteAdminList');


    // Course Category

    Route::get('/courseCategoryIndex','Admin\CourseCategoryController@courseCategoryIndex')->name('admin.courseCategoryIndex');
    Route::get('/getCategoryCourseList','Admin\CourseCategoryController@getCategoryCourseList')->name('admin.getCategoryCourseList');
    Route::get('/getSubCategory','Admin\CourseCategoryController@getSubCategory')->name('admin.getSubCategory');
    Route::get('/insertCourseCategory','Admin\CourseCategoryController@insertCourseCategory')->name('admin.insertCourseCategory');
    Route::get('/editCourseCategory','Admin\CourseCategoryController@editCourseCategory')->name('admin.editCourseCategory');
    Route::get('/editCourseCategoryUpdate','Admin\CourseCategoryController@editCourseCategoryUpdate')->name('admin.editCourseCategoryUpdate');
    Route::get('/deleteCourseCategory','Admin\CourseCategoryController@deleteCourseCategory')->name('admin.deleteCourseCategory');

    // Course

    Route::get('/courseListIndex','Admin\CourseController@courseListIndex')->name('admin.courseListIndex');
    Route::get('/getCourseList','Admin\CourseController@getCourseList')->name('admin.getCourseList');

    Route::get('/courseAdd','Admin\CourseController@courseAdd')->name('admin.courseAdd');
    Route::get('/courseEdit/{id}','Admin\CourseController@courseEdit')->name('admin.courseEdit');

    Route::get('/getCategoryList','Admin\CourseController@getCategoryList')->name('admin.getCategoryList');
    Route::post('/insertCourse','Admin\CourseController@insertCourse')->name('admin.insertCourse');
    Route::get('/editCourse','Admin\CourseController@editCourse')->name('admin.editCourse');
    Route::post('/editCourseUpdate','Admin\CourseController@editCourseUpdate')->name('admin.editCourseUpdate');
    Route::get('/deleteCourse','Admin\CourseController@deleteCourse')->name('admin.deleteCourse');

    // Course Structure

    Route::get('/courseStructure/{id}','Admin\CourseController@courseStructure')->name('admin.courseStructure');


    // Course Module

    Route::get('/moduleList/{id}','Admin\CourseModuleController@moduleList')->name('admin.moduleList');
    Route::get('/moduleAdd/{id}','Admin\CourseModuleController@moduleAdd')->name('admin.moduleAdd');
    Route::post('/moduleAdd/{id}','Admin\CourseModuleController@moduleInsert')->name('admin.moduleInsert');
    Route::get('/editModule/{id}','Admin\CourseModuleController@editModule')->name('admin.editModule');
    Route::post('/editModule/{id}','Admin\CourseModuleController@editModuleUpdate')->name('admin.editModuleUpdate');
    Route::get('/courseModuleDelete/{id}','Admin\CourseModuleController@courseModuleDelete')->name('admin.courseModuleDelete');


    // Course Lecture

    Route::get('/courseContentIndex/{id}','Admin\CourseController@courseContentIndex')->name('admin.courseContentIndex');
    Route::get('/lectureAdd/{id}','Admin\CourseController@lectureAdd')->name('admin.lectureAdd');
    Route::post('/lectureAdd/{id}','Admin\CourseController@lectureAddInsert')->name('admin.lectureAddInsert');
    Route::get('/lectureEdit/{id}','Admin\CourseController@lectureEdit')->name('admin.lectureEdit');
    Route::post('/lectureEdit/{id}','Admin\CourseController@lectureUpdate')->name('admin.lectureUpdate');
    Route::get('/lectureDelete/{id}','Admin\CourseController@lectureDelete')->name('admin.lectureDelete');
    Route::get('/getCourseContentList','Admin\CourseController@getCourseContentList')->name('admin.getCourseContentList');
    Route::get('/editCourseContent','Admin\CourseController@editCourseContent')->name('admin.editCourseContent');
    

    // Course Files
    Route::get('/lectureWiseFiles','Admin\CourseController@lectureWiseFiles')->name('admin.lectureWiseFiles');
    Route::get('/fileDelete','Admin\CourseController@fileDelete')->name('admin.fileDelete');
    Route::post('/insertLectureFiles','Admin\CourseController@insertLectureFiles')->name('admin.insertLectureFiles');

    //user Module 

    Route::get('/userList','Admin\RegisteredUserController@userList')->name('admin.userList');
    Route::get('/getUserList','Admin\RegisteredUserController@getUserList')->name('admin.getUserList');
    Route::get('/editUserList','Admin\RegisteredUserController@editUserList')->name('admin.editUserList');
    Route::post('/insertUserList','Admin\RegisteredUserController@insertUserList')->name('admin.insertUserList');
    Route::post('/editUserListUpdate','Admin\RegisteredUserController@editUserListUpdate')->name('admin.editUserListUpdate');
    Route::get('/deleteUserList','Admin\RegisteredUserController@deleteUserList')->name('admin.deleteUserList');

    // Coupon Module

    Route::get('/couponIndex','Admin\CouponController@couponIndex')->name('admin.couponIndex');
    Route::get('/getCouponList','Admin\CouponController@getCouponList')->name('admin.getCouponList');
    Route::get('/insertCoupon','Admin\CouponController@insertCoupon')->name('admin.insertCoupon');
    Route::get('/editCoupon','Admin\CouponController@editCoupon')->name('admin.editCoupon');
    Route::get('/editCouponUpdate','Admin\CouponController@editCouponUpdate')->name('admin.editCouponUpdate');
    Route::get('/deleteCoupon','Admin\CouponController@deleteCoupon')->name('admin.deleteCoupon');


    // Course Order List
    
    Route::get('/courseOrderList','Admin\CourseOrderController@courseOrderList')->name('admin.courseOrderList');
    Route::get('/orderCourseDelete/{id}','Admin\CourseOrderController@orderCourseDelete')->name('admin.orderCourseDelete');
    Route::get('/activeCourse/{id}','Admin\CourseOrderController@activeCourse')->name('admin.activeCourse');
    Route::get('/deActiveCourse/{id}','Admin\CourseOrderController@deActiveCourse')->name('admin.deActiveCourse');

    // Exam

    Route::get('/exam/{id}','Admin\ExamController@examIndex')->name('admin.examIndex');
    Route::get('/examAdd/{id}','Admin\ExamController@examAdd')->name('admin.examAdd');
    Route::post('/examAdd/{id}','Admin\ExamController@examAddInsert')->name('admin.examAddInsert');
    Route::get('/examEdit/{id}','Admin\ExamController@examEdit')->name('admin.examEdit');
    Route::post('/examEdit/{id}','Admin\ExamController@examEditUpdate')->name('admin.examEditUpdate');
    Route::get('/deleteExam/{id}','Admin\ExamController@deleteExam')->name('admin.deleteExam');


    // Blog 

    Route::get('/blog','Admin\BlogController@blogList')->name('admin.blogList');
    Route::get('/blogAdd','Admin\BlogController@blogAdd')->name('admin.blogAdd');
    Route::post('/blogAdd','Admin\BlogController@blogInsert')->name('admin.blogInsert');
    Route::get('/blogEdit/{id}','Admin\BlogController@blogEdit')->name('admin.blogEdit');
    Route::post('/blogEdit/{id}','Admin\BlogController@blogUpdate')->name('admin.blogUpdate');
    Route::get('/blogDelete/{id}','Admin\BlogController@blogDelete')->name('admin.blogDelete');

    // Settings - Login page

    Route::get('/loginPageDetails','Admin\AdminLoginPageController@loginPageDetails')->name('admin.loginPageDetails');
    Route::get('/loginPageAdd','Admin\AdminLoginPageController@loginPageAdd')->name('admin.loginPageAdd');
    Route::post('/loginPageAdd','Admin\AdminLoginPageController@loginPageInsert')->name('admin.loginPageInsert');

    Route::get('/loginPageEdit/{id}','Admin\AdminLoginPageController@loginPageEdit')->name('admin.loginPageEdit');
    Route::post('/loginPageEdit/{id}','Admin\AdminLoginPageController@loginPageUpdate')->name('admin.loginPageUpdate');
    Route::get('/loginPageDelete/{id}','Admin\AdminLoginPageController@loginPageDelete')->name('admin.loginPageDelete');

    // Home Page

    Route::get('/homePage','Admin\HomePageController@homePage')->name('admin.homePage');
    Route::get('/homeAdd','Admin\HomePageController@homeAdd')->name('admin.homeAdd');
    Route::post('/homeAdd','Admin\HomePageController@homeAddStore')->name('admin.homeAddStore');
    Route::get('/homePageEdit/{id}','Admin\HomePageController@homePageEdit')->name('admin.homePageEdit');
    Route::post('/homePageEdit/{id}','Admin\HomePageController@homePageEditUpdate')->name('admin.homePageEditUpdate');
    Route::get('/homePageDelete/{id}','Admin\HomePageController@homePageDelete')->name('admin.homePageDelete');

    // Menue 

    Route::get('/menueList','Admin\MenuesController@menueList')->name('admin.menueList');
    Route::get('/menueAdd','Admin\MenuesController@menueAdd')->name('admin.menueAdd');
    Route::post('/menueAdd','Admin\MenuesController@menueAddStore')->name('admin.menueAddStore');
    Route::get('/menueEdit/{id}','Admin\MenuesController@menueEdit')->name('admin.menueEdit');
    Route::post('/menueEdit/{id}','Admin\MenuesController@menueUpdate')->name('admin.menueUpdate');
    Route::get('/menueDelete/{id}','Admin\MenuesController@menueDelete')->name('admin.menueDelete');

    // Page

    Route::get('/pagelist','Admin\MenuesController@pageList')->name('admin.pageList');
    Route::get('/pageAdd','Admin\MenuesController@pageAdd')->name('admin.pageAdd');
    Route::post('/pageAdd','Admin\MenuesController@pageAddStore')->name('admin.pageAddStore');

    Route::get('/pageEdit/{id}','Admin\MenuesController@pageEdit')->name('admin.pageEdit');
    Route::post('/pageEdit/{id}','Admin\MenuesController@pageEditUpdate')->name('admin.pageEditUpdate');
    Route::get('/pageDelete/{id}','Admin\MenuesController@pageDelete')->name('admin.pageDelete');
});

Route::get('/{any}','User\FooterController@footerIndex')->name('user.footerIndex');