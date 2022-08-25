<?php

Route::get('articles', 'WelcomeController@index');

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    

});
