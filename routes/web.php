<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
 $fp = fopen("temperatura.txt", "r");
 while (!feof($fp)){
    $linea = fgets($fp);
    echo $linea;
 }
 fclose($fp);
 // return "hola"; //    return view('welcome');
});

Route::get('/temperature/{temperature}', function($temperature){
  $file = fopen('temperatura.txt','a');
  fwrite($file, date("H:i:s")." - ".$temperature."\n");
  fclose($file);
});

Route::get('/status', function(){
  echo "OK";
});
