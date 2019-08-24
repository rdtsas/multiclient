<?php

Route::group(['namespace' => 'Rdtsas\Multiclient\Controllers', 'prefix' => 'api/','middleware' => env('MC_MIDDLEWARE', '')], function () {
    Route::post('credentials', 'DianController@estado_documento');
});
