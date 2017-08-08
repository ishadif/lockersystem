<?php

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

// student routes
Route::get('dashboard', 'DashboardsController@index');


Route::get('sewa', 'SewaController@index');
Route::get('sewa/{sewa}', 'SewaController@show');
Route::post('permohonan','RentalsSubmissionsController@store');
Route::get('permohonan', 'RentalsSubmissionsController@index');
Route::get('permohonan/create', 'RentalsSubmissionsController@create');
Route::get('permohonan/{submission}', 'RentalsSubmissionsController@show');

Route::get('permohonan-maintenance/{sewa}/create', 'MaintenancesSubmissionsController@create');
Route::post('permohonan-maintenance/{sewa}','MaintenancesSubmissionsController@store');
Route::get('permohonan-maintenance', 'MaintenancesSubmissionsController@index');
Route::get('permohonan-maintenance/{submission}', 'MaintenancesSubmissionsController@show');

Route::get('login', 'StudentAuth\LoginController@showLoginForm')->name('login');
Route::post('login', 'StudentAuth\LoginController@login');
Route::post('logout', 'StudentAuth\LoginController@logout')->name('logout');

Route::get('/profile', 'ProfilesController@index');
Route::post('/profile/password/reset','ProfilesController@reset');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


// staff routes
Route::get('staff/login', 'Auth\LoginController@showLoginForm')->name('staffLogin');
Route::post('staff/login', 'Auth\LoginController@login');
Route::post('staff/logout', 'Auth\LoginController@logout')->name('staffLogout');

Route::get('staff/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('staff/register','Auth\RegisterController@register');
Route::get('staff/users', 'Staff\StaffController@index');

Route::get('staff/profile', 'Staff\ProfilesController@index');
Route::patch('staff/profile', 'Staff\ProfilesController@update');
Route::post('staff/profile/password/reset','Staff\ProfilesController@reset');

Route::get('/staff/permohonan', 'Staff\RentalSubmissionsController@index');
Route::get('/staff/permohonan/{submission}/create', 'Staff\SewaController@create');
Route::post('staff/permohonan/{permohonan}','Staff\SewaController@store');
Route::get('staff/sewa', 'Staff\SewaController@index');
Route::get('staff/sewa/export', 'Staff\SewaController@export');
Route::get('staff/sewa/{rental}', 'Staff\SewaController@show');
Route::patch('staff/sewa/{sewa}/activate','Staff\SewaController@activate');
Route::patch('staff/sewa/{sewa}/finish','Staff\SewaController@finish');

Route::get('/staff/payment/{rental}/create', 'Staff\RentalPaymentsController@create');
Route::post('/staff/sewa/{sewa}/payment','Staff\RentalPaymentsController@store');
Route::get('/staff/payment', 'Staff\RentalPaymentsController@index');
Route::get('/staff/payment/{payment}', 'Staff\RentalPaymentsController@show');
Route::get('/staff/payment-submission', 'Staff\RentalPaymentsController@submission');

Route::get('/staff/permohonan-maintenance', 'Staff\MaintenanceSubmissionsController@index');
Route::get('/staff/maintenance','Staff\MaintenancesController@index');
Route::get('/staff/maintenance/{maintenance}','Staff\MaintenancesController@show');
Route::get('/staff/maintenance/{submission}/create', 'Staff\MaintenancesController@create');
Route::post('/staff/maintenance/{submission}','Staff\MaintenancesController@store');
Route::patch('/staff/maintenance/{maintenance}','Staff\MaintenancesController@update');

Route::get('staff/maintenance-payments', 'Staff\MaintenancePaymentsController@index');
Route::get('staff/maintenance-payments/{payment}', 'Staff\MaintenancePaymentsController@show');
Route::get('staff/submission/maintenance-payments', 'Staff\MaintenancePaymentsController@submission');
Route::get('staff/maintenance/{maintenance}/payment/create', 'Staff\MaintenancePaymentsController@create');
Route::post('/staff/maintenance/{maintenance}/payment','Staff\MaintenancePaymentsController@store');

Route::get('/staff/lockers', 'Staff\LockersController@index');
Route::get('/staff/lockers/{locker}', 'Staff\LockersController@show');
Route::post('/staff/lockers','Staff\LockersController@store');

Route::get('/staff/students', 'Staff\StudentsController@index');
Route::get('/staff/students/create', 'Staff\StudentsController@create');
Route::post('/staff/students','Staff\StudentsController@store');

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Auth::logout();

Route::get('/home', 'HomeController@index');
