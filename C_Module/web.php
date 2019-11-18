<?php

use App\Route;

Route::get("/", "MainController@index");

Route::get("/all", "MainController@all");

Route::get("/brand", "MainController@brand");

Route::get("/sale", "MainController@sale");

Route::get("/signIn", "MainController@signIn");

Route::get("/signUp", "MainController@signUp");

Route::get("/view", "MainController@view");

Route::post("/login", "BoardController@login");

Route::post('/register', "BoardController@register");

if(isset($_SESSION['user'])){
    Route::get("/cart", "MainController@cart");
    Route::get("/purchase", "MainController@purchase");
    Route::get("/myPage", "MainController@myPage");
    Route::get("/logout", "MainController@logout");
}