<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*--------------------------------------------------------------
Default Route - Displays the main developer's friend page
--------------------------------------------------------------*/
Route::get('/', 'LoremController@getLoremTextResults');
Route::get('/RandomUsers', 'RandomUserController@getRandomUserResults');
Route::get('/LoremIpsum', 'LoremController@getLoremTextResults');


/*--------------------------------------------------------------
Default Result routes for each conponent
--------------------------------------------------------------*/
Route::post('/LoremIpsum', 'LoremController@postLoremTextResults');
Route::post('/RandomUsers', 'RandomUserController@postRandomUserResults');
Route::post('/RandomLocation', 'RandomLocationController@postRandomLocationResults');

/*--------------------------------------------------------------
.csv route for each component (not Lorem Ipsum)
--------------------------------------------------------------*/
Route::post('/RandomUsers/csv', 'RandomUserController@postRandomUserResultsCSV');
Route::post('/RandomLocation/csv', 'RandomLocationController@postRandomLocationResultsCSV');


/*--------------------------------------------------------------
Excel route for each component (not Lorem Ipsum)
--------------------------------------------------------------*/
Route::post('/RandomUsers/excel', 'RandomUserController@postRandomUserResultsExcel');
Route::post('/RandomLocation/excel', 'RandomLocationController@postRandomLocationResultsExcel');



/*
Practice Route - TODO - Remove this on final deployment
*/
Route::get('/practice', function () {
    echo 'practice route';
});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
