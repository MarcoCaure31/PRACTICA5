<?php

use Illuminate\Support\Facades\Route;


Route::view('/','index')->name('index');
Route::view('/header','header')->name('header');
Route::view('/students','students')->name('students');
