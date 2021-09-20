<?php


Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/', function(){
    return 'Home';
});

Route::get('/redirect/{service}','SocialController@redirect');

Route::get('/callback/{service}','SocialController@callback');

Route::get('fillable','CrudController@getData');


    // Route::get('store','CrudController@store');

    Route::group(['prefix'=>LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function (){
        Route::group(['prefix'=>'offers'],function(){
        Route::get('create','CrudController@create');
        Route::get('all','CrudController@all');
        Route::get('edit/{offer_id}','CrudController@editOffer');
        Route::post('update/{offer_id}','CrudController@updateOffer')->name('offers.update');

        });

        Route::get('youtube','CrudController@getVideo');


        Route::post('store','CrudController@store')->name('offers.store');
});
