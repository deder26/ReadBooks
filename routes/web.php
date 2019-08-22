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

Route::get('/', [
    'uses' => 'ReadBooksController@index',
    'as' => 'index'
]);

Route::get('/home',[
    'uses' => 'ReadBooksController@index',
    'as' => 'index'
]);

Route::get('/blog',[
   'uses' => 'BlogController@Viewblogs',
    'as' => 'Viewblogs'
]);

Route::get('/blog/my-blogs',[
    'uses' => 'BlogController@ViewMyBlogs',
    'as' => 'ViewMyBlogs'
]);

Route::get('/about',[
    'uses' => 'ReadBooksController@about',
    'as' => 'aboutUs'
]);

Route::get('/contact',[
    'uses' => 'ReadBooksController@contact',
    'as' => 'contactUs'
]);

Route::get('/dashboard-selector',[
    'uses' => 'DashboardController@Dashboard',
    'as' => 'Dashboard'
]);

Route::get('/dashboard-admin',[
    'uses' => 'DashboardController@AdminDashboard',
    'as' => 'AdminDashboard',
    'middleware' => 'AdminMiddleWare'
]);

Route::get('/dashboard',[
    'uses' => 'DashboardController@UserDashboard',
    'as' => 'UserDashboard',
    'middleware' => 'UserMiddleWare'
]);

Route::get('/profile',[
    'uses' => 'DashboardController@profile',
    'as' => 'profile',
    'middleware' => 'UserMiddleWare'
    
]);

Route::get('/catagory/add',[
    'uses' => 'CatagoryController@CatagoryAdd',
    'as' => 'CatagoryAdd',
'middleware' => 'AdminMiddleWare'
]);

Route::post('/catagory/save',[
    'uses' => 'CatagoryController@CatagorySave',
    'as' => 'CatagorySave',
    'middleware' => 'AdminMiddleWare'
]);



Route::get('/catagory/manage',[
    'uses' => 'CatagoryController@CatagoryManage',
    'as' => 'CatagoryManage',
    'middleware' => 'AdminMiddleWare'
]);

Route::get('/catagory/manage/edit/{id}',[
    'uses' => 'CatagoryController@CatagoryEdit',
    'as' => 'CatagoryEdit',
    'middleware' => 'AdminMiddleWare'
]);

Route::post('/catagory/manage/update',[
    'uses' => 'CatagoryController@CatagoryUpdate',
    'as' => 'CatagoryUpdate',
    'middleware' => 'AdminMiddleWare'
]);

Route::get('/catagory/delete/{id}',[
    'uses' => 'CatagoryController@CatagoryDelete',
    'as' => 'CatagoryDelete',
    'middleware' => 'AdminMiddleWare'
]);

Route::get('/books/add',[
    'uses' => 'BookController@BookAdd',
    'as' => 'BookAdd',
    'middleware' => 'AdminMiddleWare'
]);

Route::post('/books/add/save',[
    'uses' => 'BookController@BookSave',
    'as' => 'BookSave',
    'middleware' => 'AdminMiddleWare'
]);

Route::get('/books/manage',[
    'uses' => 'BookController@BookManage',
    'as' => 'BookManage',
    'middleware' => 'AdminMiddleWare'
]);

Route::get('/books/manage/edit/{id}',[
    'uses' => 'BookController@BookEdit',
    'as' => 'BookEdit',
    'middleware' => 'AdminMiddleWare'
]);

Route::post('/books/manage/update',[
    'uses' => 'BookController@BookUpdate',
    'as' => 'BookUpdate',
    'middleware' => 'AdminMiddleWare'
]);



Route::get('/books/manage/pdf/{id}',[
    'uses' => 'BookController@ShowBook',
    'as' => 'ShowBook',
    'middleware' => 'AdminMiddleWare'
]);

Route::get('/reports',[
    'uses' => 'ReportController@ViewReports',
    'as' => 'ViewReports',
    'middleware' => 'AdminMiddleWare'
]);

Route::get('/reports/delete/{id}',[
    'uses' => 'ReportController@DeleteReport',
    'as' => 'DeleteReport',
    'middleware' => 'AdminMiddleWare'
]);


Route::get('/settings',[
    'uses' => 'AdminController@AdditionalInfo',
    'as' => 'AdditionalInfo',
    'middleware' => 'AdminMiddleWare'
]);

Route::get('/blog/reports/{id}',[
    'uses' => 'ReportController@SubmitReport',
    'as' => 'SubmitReport',
    'middleware' => 'UserMiddleWare'
]);

Route::get('/blog/write-stroies',[
    'uses' => 'BlogController@WriteStroies',
    'as' => 'WriteStroies',
    'middleware' => 'UserMiddleWare'
]);

Route::post('/blog/write-stroies/save',[
    'uses' => 'BlogController@BlogSave',
    'as' => 'BlogSave',
    'middleware' => 'UserMiddleWare'
]);

Route::get('/blog/my-stroies',[
    'uses' => 'BlogController@MyStroies',
    'as' => 'MyStroies',
    'middleware' => 'UserMiddleWare'
]);

Route::get('/blog/my-stroies/view/{id}',[
    'uses' => 'BlogController@ViewStory',
    'as' => 'ViewStory',
    'middleware' => 'UserMiddleWare'
]);

Route::get('/blog/reports/view/{id}',[
    'uses' => 'BlogController@ViewReportedStory',
    'as' => 'ViewReportedStory',
    'middleware' => 'UserMiddleWare'
]);

Route::get('/blog/my-stroies/delete/{id}',[
    'uses' => 'BlogController@DeleteStory',
    'as' => 'DeleteStory',
    'middleware' => 'UserMiddleWare'
]);

Route::get('/blog/my-stroies/edit/{id}',[
    'uses' => 'BlogController@EditStory',
    'as' => 'EditStory',
    'middleware' => 'UserMiddleWare'
]);


Route::get('/blog/my-stroies/delete/{id}',[
    'uses' => 'BlogController@DeleteStoryF',
    'as' => 'DeleteStoryF',
    'middleware' => 'UserMiddleWare'
]);


Route::post('/blog/my-stroies/update',[
    'uses' => 'BlogController@UpdateStory',
    'as' => 'UpdateStory',
    'middleware' => 'UserMiddleWare'
]);

Route::get('/blog/{id}',[
    'uses' => 'BlogController@SingleViewStory',
    'as' => 'SingleViewStory'
]);

Route::get('/books/read/{id}',[
    'uses' => 'BookController@ReadBook',
    'as' => 'ReadBook'
]);

Route::get('/mail/inbox',[
    'uses' => 'MessageController@InboxMessage',
    'as' => 'InboxMessage',
    'middleware' => 'AdminMiddleWare'
]);

Route::get('/mail/compose-message',[
    'uses' => 'MessageController@ComposeMessage',
    'as' => 'ComposeMessage',
    'middleware' => 'AdminMiddleWare'
]);

Route::get('/books/manage/delete/{id}',[
    'uses' => 'BookController@BookDelete',
    'as' => 'BookDelete',
    'middleware' => 'AdminMiddleWare'
]);

Route::get('/books/{name}/{id}',[
    'uses' => 'BookController@BooksCatagoryView',
    'as' => 'BooksCatagoryView'
]);



Route::post('/blog/comment',[
    'uses' => 'CommentController@Comment',
    'as' => 'comment'
]);

Route::get('/blog/comment/delete/{id}',[
    'uses' => 'CommentController@DeleteComment',
    'as' => 'DeleteComment'
]);

Route::get('/blog/blog/{bid}/comment/edit/{id}',[
    'uses' => 'CommentController@EditComment',
    'as' => 'EditComment'
]);

Route::post('/blog/comment/update',[
    'uses' => 'CommentController@UpdateComment',
    'as' => 'UpdateComment'
]);


Route::get('/additional-info/update/{id}',[
    'uses' => 'AdditionalController@UpdateAdditionalInfo',
    'as' => 'UpdateAdditionalInfo',
    'middleware' => 'AdminMiddleWare'
]);

Route::get('/additional-info',[
    'uses' => 'AdditionalController@AdditionalInfo',
    'as' => 'AdditionalInfo',
    'middleware' => 'AdminMiddleWare'
]);

Route::post('/additional-info-save',[
    'uses' => 'AdditionalController@SaveInfo',
    'as' => 'SaveInfo',
    'middleware' => 'AdminMiddleWare'
]);

Route::get('/inbox',[
    'uses' => 'MessageController@InboxMessage',
    'as' => 'InboxMessage',
    'middleware' => 'AdminMiddleWare'
    
]);

Route::get('/compose-email',[
    'uses' => 'MessageController@ComposeMessage',
    'as' => 'ComposeMessage',
    'middleware' => 'AdminMiddleWare'
   
]);


Route::get('/inbox/delete/{id}',[
    'uses' => 'MessageController@DeleteMessage',
    'as' => 'DeleteMessage',
    'middleware' => 'AdminMiddleWare'
    
]);

Route::get('/inbox/reply/{id}',[
    'uses' => 'MessageController@ReplyMessage',
    'as' => 'ReplyMessage',
    'middleware' => 'AdminMiddleWare'
    
]);

Route::post('/inbox/send-reply',[
    'uses' => 'MessageController@SendReplyMessage',
    'as' => 'SendReplyMessage',
    'middleware' => 'AdminMiddleWare'
    
]);

Route::post('/send-message-done',[
    'uses' => 'MessageController@SendMessage',
    'as' => 'SendMessage',
    'middleware' => 'UserMiddleWare'
]);

Route::post('/send-message',[
    'uses' => 'MessageController@SendComposeMessage',
    'as' => 'SendComposeMessage',
    'middleware' => 'UserMiddleWare'
    
]);

Route::post('/books/search-result',[
    'uses' => 'BookController@SearchBook',
    'as' => 'search'
]);


Auth::routes();

Route::get('/h', 'ReadBooksController@index')->name('home');
