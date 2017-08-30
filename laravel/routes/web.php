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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index');

// Route::get('task/list3', 'TaskController@list3');
// Route::get('task/view/{id?}', 'TaskController@view');
// Route::group(['middleware'=>['web']], function(){
//     Route::resource('orders', 'OrderController');
// });

//////////////////////////상품관련
Route::get('/','Mario\MarioController@index');    
Route::get('/product','Mario\MarioController@product');
Route::get('/short_moving','Mario\MarioController@short_moving');
Route::get('/productDetail','Mario\MarioController@productDetail');
Route::get('/shortProductDetail','Mario\MarioController@shortProductDetail');
Route::get('/createMario', 'Mario\MarioController@createMario');    
Route::post('/createMarioAction', 'Mario\MarioController@createMarioAction');
Route::get('/preview', 'Mario\MarioController@preview');    
Route::post('/purchase', 'Mario\MarioController@purchase');
Route::post('/shortMovingPurchase', 'Mario\MarioController@shortMovingPurchase');

Route::get('/intro','Mario\MarioController@intro');
Route::get('/MovementTofile', 'Mario\MarioController@MovementTofile');
Route::post('/UploadBackSound', 'Mario\MarioController@UploadBackSound');
Route::post('/UploadEffect', 'Mario\MarioController@UploadEffect');
Route::get('/soundfileTest', 'Mario\MarioController@soundfileTest');
Route::post('/searchProduct', 'Mario\MarioController@searchProduct');
Route::post('/searchPerPrice', 'Mario\MarioController@searchPerPrice');
Route::post('/searchPerAge', 'Mario\MarioController@searchPerAge');
Route::post('/searchDetail', 'Mario\MarioController@searchDetail');
Route::post('/searchEffectDetail','Mario\MarioController@searchEffectDetail');
Route::post('/save_temporary', 'Mario\MarioController@save_temporary');
Route::get('/convertType', 'Mario\MarioController@convertType');
Route::get('/Messagetest', 'Mario\MarioController@Messagetest');



//////////////////////////인형상품관련
Route::get('/dollcreateAction', 'Mario\DollController@dollcreateAction');
Route::get('/dollproductView', 'Mario\DollController@dollproductView');



////////////////////////계정관련
Route::get('/registerView','Account\AccountController@registerView');
Route::post('/register','Account\AccountController@register');
Route::post('/loginAction','Account\AccountController@loginAction');
Route::get('/login', 'Account\AccountController@login');
Route::get('/logout','Account\AccountController@logout');
Route::get('/myPage','Account\AccountController@myPage');    
Route::get('/myInfo','Account\AccountController@myInfo');
Route::get('/mySell','Account\AccountController@mySell');
Route::get('/myMarionetteStory','Account\AccountController@myMarionetteStory');
Route::get('/myMarioDetail', 'Account\AccountController@myMarioDetail');
Route::get('/myMarioShortMovingDetail', 'Account\AccountController@myMarioShortMovingDetail');
Route::get('/download', 'Account\AccountController@download');
Route::get('sellApply', 'Account\AccountController@sellApply');
Route::get('/makeMoving', 'Account\AccountController@makeMoving');
Route::get('/createDel', 'Account\AccountController@createDel');
Route::get('/mySellDetail', 'Account\AccountController@mySellDetail');
Route::get('/createMarioModal', 'Account\AccountController@createMarioModal');



//////////////////////////////admin 페이지
Route::get('/adminmain','Admin\AdminController@adminmain');
Route::get('/myPageAdmin','Admin\AdminController@myPageAdmin');
Route::get('/createMarioAdmin','Admin\AdminController@createMarioAdmin');
Route::get('/checkContents','Admin\AdminController@checkContents');
Route::get('/Reviewed', 'Admin\AdminController@Reviewed');
Route::get('/Unreviewed', 'Admin\AdminController@Unreviewed');
Route::post('/AdmincreateMarioAction', 'Admin\AdminController@createAction');
Route::post('/productDel', 'Admin\AdminController@productDel');
Route::post('/approval', 'Admin\AdminController@approval');
Route::get('/adminPreview', 'Admin\AdminController@adminPreview');
Route::get('/ContSales', 'Admin\AdminController@ContSales');
Route::post('/UploadSound' ,'Admin\AdminController@UploadSound');


Route::get('/exception', 'Account\AccountController@exception');
Route::get('/basicSoundfile',function(){
    return view('admin.UploadSound');
});



// 게시판 관련 라우팅
Route::group(['prefix'=>'board', 'as'=>'board.'], function(){
    Route::get('listBoard/{board_no?}', ['as'=>'listBoard', 'uses'=>'Board\BoardController@listBoard']);
    Route::get('listRead/{list_no?}', ['as'=>'listRead', 'uses'=>'Board\BoardController@listRead']);
    Route::get('listWrite', ['as'=>'listWrite', 'uses'=>'Board\BoardController@listWrite']);
    Route::post('listInsert', ['as'=>'listInsert', 'uses'=>'Board\BoardController@listInsert']);
    Route::get('listEdit/{list_no?}', ['as'=>'listEdit', 'uses'=>'Board\BoardController@listEdit']);
    Route::post('listUpdate', ['as'=>'listUpdate', 'uses'=>'Board\BoardController@listUpdate']);
    Route::get('listDelete/{list_no?}', ['as'=>'listDelete', 'uses'=>'Board\BoardController@listDelete']);
});

// Route::get('viewBoard/{list_no?}', 'Board\BoardController@viewBoard');



/* Ajax connection */
Route::post('/insertMarioModal', 'Account\AccountController@insertMarioModal');
Route::get('/getMyContentList', 'Account\AccountController@getMyContentList');
Route::get('/define', 'Mario\MarioController@define');
Route::post('/moveDataTransfer', 'Mario\MarioController@moveDataTransfer');
Route::post('/moveDataTransfer_update', 'Mario\MarioController@moveDataTransfer_update');
Route::post('/saveRecoding', 'Mario\MarioController@saveRecoding');
Route::post('/loadBlocks', 'Mario\MarioController@loadBlocks');
Route::get('/makingTool', 'Mario\MarioController@makingTool');

/* CHU's TEST */

Route::get('/makingToolTest', function(){
  return view('marionett.makingTool_test');
});

Route::get('/making', function(){
  return view('makingTool.main');
});

Route::get('/saveBlockData', 'Mario\MarioController@saveBlockData');
