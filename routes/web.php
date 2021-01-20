<?php

use Illuminate\Support\Facades\Route;

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
 
 // route //---

// Route::get('/', function () {
//     return view('welcome',['name'=>'Saif Mahmud Khan Dourjoy']);
// });


//route + middleware //---

// Route::get('/hello', function () {
//     return view('hello');
// })->middleware('age');

// group middleare //--

// Route::group(['middleware' => ['age']], function () {

//     Route::get('/hello', function () {
//     return view('hello');
// });

//  Route::get('/ola', function () {
//     echo "asrtsrat?";
// });
// });


Route::get('/','Postcontroller@HomePage');
Route::get('/about','Newcontroller@AboutPage');
Route::get('/contact','Newcontroller@ContactPage');
Route::get('/simplepost','Postcontroller@SimplePostPage');


Route::get('add/categorypage','Newcontroller@AddCategoryPage');
Route::post('add/category','Newcontroller@AddCategory')->name('add.category');

Route::get('all/categorypage','Newcontroller@AllCategoryPage')->name('allcategory');
// Route::get('showallcategory','Newcontroller@ShowAllCategory');

Route::get('single-category/{id}','Newcontroller@SingleView');

Route::get('edit-category/{id}','Newcontroller@EditViewpPage');
Route::post('updatecategory/{id}','Newcontroller@UpdateCategory');

Route::get('delete-category/{id}','Newcontroller@DeleteCategory');

Route::get('/simplepost','Postcontroller@SimplePostPage');
Route::post('add-post','Postcontroller@AddPost');

Route::get('all-posts','Postcontroller@AllPostPage')->name('allpost');

Route::get('single-post/{id}','Postcontroller@SinglePost');

Route::get('edit-post/{id}','Postcontroller@EditPost');
Route::post('update-post/{id}','Postcontroller@UpdatePost');
Route::get('delete-post/{id}','Postcontroller@DeletePost');

//resource route--------

Route::resource('student','StudentController');







