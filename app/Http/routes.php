<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['middleware' => ['web']], function () {

	# Routes for Get operations

		#Default Route - Displays the main developer's friend page
		Route::get('/', 'LoremController@getLoremTextResults');

		#Route which shows the Random User Component as being active
		Route::get('/RandomUsers', 'RandomUserController@getRandomUserResults');

		#Route which shows the Lorem Ipsum Component as being active
		Route::get('/LoremIpsum', 'LoremController@getLoremTextResults');


	# Routes for Post operations

		# Route which returns the Lorem Ipsum component results
		Route::post('/LoremIpsum', 'LoremController@postLoremTextResults');

		# Route which returns the Random User component results
		Route::post('/RandomUsers', 'RandomUserController@postRandomUserResults');

});
