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

Route::get("/data", "MainController@data");

Route::post("/search", "MainController@search");

if(isset($_SESSION['user'])){
	Route::get("/like", "BoardController@likes");
    Route::get("/cart", "MainController@cart");
    Route::post("/purchase", "MainController@purchase");
    Route::get("/myPage", "MainController@myPage");
    Route::get("/logout", "MainController@logout");
    Route::post("/putcart", "BoardController@put_cart");
    Route::get("/cart_list", "MainController@cart_list");
}