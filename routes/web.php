<?php

Auth::routes();

Route::get('/', 'HomeController@frontPage')->name('front-page');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/live-request', 'HomeController@liveRequest')->name('live-request');
Route::get('/download', 'HomeController@download')->name('download');
Route::get('/confirm-live-request', 'HomeController@confirmLiveRequest')->name('confirm-live-request');


Route::get('/fico-download', 'HomeController@ficoDownload')->name('fico-download');
Route::get('/confirm-fico-score', 'HomeController@confirmFicoScore')->name('confirm-fico-score');
Route::get('/fico-score', 'HomeController@ficoScore')->name('fico-score');

Route::get('/icon-download', 'HomeController@iconDownload')->name('icon-download');
Route::get('/confirm-icon-plus', 'HomeController@confirmIconPlus')->name('confirm-icon-plus');
Route::get('/icon-plus', 'HomeController@iconPlus')->name('icon-plus');


Route::get('/clear-cache', function() { $exitCode = Artisan::call('cache:clear'); 
return '<h1>Cache facade value cleared</h1>'; });
        
Route::get('/route-clear', function() { $exitCode = Artisan::call('route:clear'); 
return '<h1>Route cache cleared</h1>'; }); 

Route::get('/view-clear', function() { $exitCode = Artisan::call('view:clear'); 
return '<h1>View cache cleared</h1>'; }); 


Route::get('/config-cache', function() { $exitCode = Artisan::call('config:cache'); 
return '<h1>Clear Config cleared</h1>'; });

