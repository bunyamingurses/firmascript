<?php

setlocale(LC_ALL,'tr_TR.UTF-8');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
URL::forceScheme('https');

// İndexes Start
Route::get("/",[Controllers\front\index::class,"index"])->name("index");
Route::get("/index",[Controllers\front\index::class,"index"])->name("index2");
Route::get("/index.html",[Controllers\front\index::class,"index"])->name("index3");
// İndexes Finish

// Categories Start
Route::get("/kategoriler.html",[Controllers\front\index::class,"categories"])->name("categories");
Route::get("/kategoriler",[Controllers\front\index::class,"categories"])->name("categories2");
// Categories Finish

//Sites Start
Route::get("/siteler.html",[Controllers\front\index::class,"sites"])->name("sites");
Route::get("/siteler",[Controllers\front\index::class,"sites"])->name("sites2");
Route::get("/siteler/{id}-{name}.html",[Controllers\front\index::class,"sites"])->name("categorySites");
//Sites Finish

// Contacts Start
Route::get("/iletisim",[Controllers\front\index::class,"contact"])->name("contact");
Route::get("/iletisim.html",[Controllers\front\index::class,"contact"])->name("contact2");
Route::post("/iletisim",[Controllers\front\index::class,"contactPost"])->name("contactPost");
// Contacts Finish

// Get Offers Start
Route::get("/teklifal/{id?}",[Controllers\front\index::class,"getOffer"])->name("getOffer");
Route::get("/teklifal.html/{id?}",[Controllers\front\index::class,"getOffer"])->name("getOffer2");
Route::post("/teklifal.html/{id?}",[Controllers\front\index::class,"getOffer"])->name("getOfferPost");
Route::post("/teklifgonder.html",[Controllers\front\index::class,"offerPost"])->name("postOffer");
// Get Offers Finish

// Sitemap Start
Route::get("/sitemap",[Controllers\front\index::class,"sitemap"])->name("sitemap");
Route::get("/sitemap.xml",[Controllers\front\index::class,"sitemap"])->name("sitemap2");
// Sitemap Finish

// Login Route Start
Route::prefix("login")->as("login.")->group(function (){
    Route::get("/",[Controllers\login\indexController::class,"index"])->name("login");
    Route::get("/index",[Controllers\login\indexController::class,"index"])->name("login2");
    Route::post("/create",[Controllers\login\indexController::class,"login"])->name("loginPost");
    Route::get("/logout",[Controllers\login\indexController::class,"logOut"])->name("logOut");

});
// Login Route Finish



Route::prefix("admin")->as("admin.")->middleware(\App\Http\Middleware\loginControl::class)->group(function (){
    Route::get("/",[Controllers\admin\indexController::class,"index"])->name("index");
    Route::get("/index.html",[Controllers\admin\indexController::class,"index"])->name("index2");

    Route::prefix("setting")->as("setting.")->group(function (){
        Route::get("/",[Controllers\admin\setting\indexController::class,"index"])->name("index");
        Route::get("/create",[Controllers\admin\setting\indexController::class,"create"])->name("create");
        Route::post("/create",[Controllers\admin\setting\indexController::class,"store"])->name("createPost");
        Route::get("/edit/{id}",[Controllers\admin\setting\indexController::class,"edit"])->name("edit");
        Route::post("/update/{id}",[Controllers\admin\setting\indexController::class,"update"])->name("update");
        Route::get("/delete/{id}",[Controllers\admin\setting\indexController::class,"destroy"])->name("delete");
    });

    Route::prefix("category")->as("category.")->group(function (){
        Route::get("/",[Controllers\admin\category\index::class,"index"])->name("index");
        Route::get("/create",[Controllers\admin\category\index::class,"create"])->name("create");
        Route::post("/create",[Controllers\admin\category\index::class,"store"])->name("createPost");
        Route::get("/edit/{id}",[Controllers\admin\category\index::class,"edit"])->name("edit");
        Route::post("/update/{id}",[Controllers\admin\category\index::class,"update"])->name("update");
        Route::get("/delete/{id}",[Controllers\admin\category\index::class,"destroy"])->name("delete");
    });

    Route::prefix("site")->as("site.")->group(function (){
        Route::get("/",[Controllers\admin\sites\indexController::class,"index"])->name("index");
        Route::get("/create",[Controllers\admin\sites\indexController::class,"create"])->name("create");
        Route::post("/create",[Controllers\admin\sites\indexController::class,"store"])->name("createPost");
        Route::get("/edit/{id}",[Controllers\admin\sites\indexController::class,"edit"])->name("edit");
        Route::post("/update/{id}",[Controllers\admin\sites\indexController::class,"update"])->name("update");
        Route::get("/delete/{id}",[Controllers\admin\sites\indexController::class,"destroy"])->name("delete");
    });

    Route::prefix("offer")->as("offer.")->group(function (){
        Route::get("/",[Controllers\admin\offer\indexController::class,"index"])->name("index");
        Route::get("/sendMail",[Controllers\admin\offer\indexController::class,"sendMail"])->name("sendMail");
    });

    Route::prefix("contact")->as("contact.")->group(function (){
        Route::get("/",[Controllers\admin\contact\indexController::class,"index"])->name("index");
        Route::get("/sendMail",[Controllers\admin\contact\indexController::class,"sendMail"])->name("sendMail");
    });





});
