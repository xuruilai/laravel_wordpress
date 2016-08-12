<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::any('{path}', function ($path) {

    if(is_file(public_path("wordpress/$path")))
    {
        return \Response::stream(function() use ($path){
                Header("Content-Type: text/css; charset=UTF-8");
            echo file_get_contents(public_path("wordpress/$path"));
        });

    }else{
        define('laixurui_filter_path', '/Users/jackylai/Work/PHP/blog/resources/wordpress_filter.php');

        include public_path('wordpress/index.php');
    }


})->where(['path' => '[^\?]*']);
