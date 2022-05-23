<?php
Route::group(['namespace'=>'EoxysIT\Blog\Http\Controllers'],function(){
Route::get('blog', 'BlogController@create')->name('blog.create');
Route::post('blog', 'BlogController@store')->name('blog.store');
Route::post('subcat', 'BlogController@subCat')->name('subcat');
Route::get('blog-index','BlogController@index')->name('blog.index');
Route::get('blog-edit/{id}','BlogController@edit')->name('blog.edit');
Route::post('blog-update','BlogController@update')->name('blog.update');
Route::post('blog-delete/{id}','BlogController@destroy')->name('blog.delete');
Route::get('category','CategoryController@index')->name('categories.index');
Route::get('category-create','CategoryController@create')->name('categories.create');
Route::post('category-store','CategoryController@store')->name('categories.store');
Route::get('category-edit/{id}','CategoryController@edit')->name('categories.edit');
Route::post('category-update','CategoryController@update')->name('categories.update');
Route::post('category-delete/{id}','CategoryController@destroy')->name('categories.delete');
Route::get('tages-index','TagController@index')->name('tages.index');
Route::get('tages-create','TagController@create')->name('tages.create');
Route::post('tages-store','TagController@store')->name('tages.store');
Route::get('tages-edit/{id}','TagController@edit')->name('tages.edit');
Route::post('tages-update','TagController@update')->name('tages.update');
Route::post('tages-delete/{id}','TagController@destroy')->name('ctages.delete');	
});
Route::get('/blog-dashborad', function() {

    return view('blog::dashborad');
   
});


Route::get('/clear-cache-all', function() {
    Artisan::call('cache:clear');
  
   // dd("Cache Clear All");

    return "Cache Clear All";
});