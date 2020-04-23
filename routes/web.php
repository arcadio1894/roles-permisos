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

Route::get('/', function () {
    return view('welcome');
});

// TODO: Cambiar esto
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    //Roles
    Route::post('roles/store', 'RoleController@store')->name('roles.store')
        ->middleware('permission:roles.create');

    Route::get('roles', 'RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');

    Route::get('roles/create', 'RoleController@create')->name('roles.create')
        ->middleware('permission:roles.create');

    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
        ->middleware('permission:roles.edit');

    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
        ->middleware('permission:roles.show');

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('permission:roles.edit');
    //Users
    Route::get('users', 'UserController@index')->name('users.index')
        ->middleware('permission:users.index');

    Route::put('users/{user}', 'UserController@update')->name('users.update')
        ->middleware('permission:users.edit');

    Route::get('users/{user}', 'UserController@show')->name('users.show')
        ->middleware('permission:users.show');

    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
        ->middleware('permission:users.destroy');

    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
        ->middleware('permission:users.edit');
    // TODO: Agregar
    Route::post('users/store', 'UserController@store')->name('users.store')
        ->middleware('permission:users.create');
    Route::post('users/store', 'UserController@store')->name('users.create')
        ->middleware('permission:users.create');

    //Courses
    Route::post('courses/store', 'CourseController@store')->name('courses.store')
        ->middleware('permission:courses.create');

    Route::get('courses', 'CourseController@index')->name('courses.index')
        ->middleware('permission:courses.index');

    Route::get('courses/create', 'CourseController@create')->name('courses.create')
        ->middleware('permission:courses.create');

    Route::put('courses/{Course}', 'CourseController@update')->name('courses.update')
        ->middleware('permission:courses.edit');

    Route::get('courses/{Course}', 'CourseController@show')->name('courses.show')
        ->middleware('permission:courses.show');

    Route::delete('courses/{Course}', 'CourseController@destroy')->name('courses.destroy')
        ->middleware('permission:courses.destroy');

    Route::get('courses/{Course}/edit', 'CourseController@edit')->name('courses.edit')
        ->middleware('permission:courses.edit');

    //Teachers and students
    Route::get('teachers', 'UserController@teachers')->name('teachers.index')
        ->middleware('permission:teachers.index');

    Route::get('students', 'UserController@students')->name('students.index')
        ->middleware('permission:students.index');


});
