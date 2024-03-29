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

Route::get("/like", "BoardController@likes");

Route::post("/search_list", "MainController@search_list");

Route::get("/search", "MainController@search");

Route::get("/search_product", "MainController@search_product");

if(isset($_SESSION['user'])){
    Route::post("/putcart", "BoardController@put_cart");
    Route::get("/purchase", "MainController@purchase");
    Route::get("/cart", "MainController@cart");
    Route::get("/myPage", "MainController@myPage");
    Route::get("/logout", "MainController@logout");
    Route::get("/cart_list", "MainController@cart_list");
    Route::get("/like_delete", "BoardController@like_delete");
    Route::get("/purchasego", "MainController@purchase_go");
    Route::post("/receipt", "BoardController@receipt");
    Route::get("/update", "MainController@update");
    Route::post("/update", "BoardController@update");
}