<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MachineParameterController;

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
// Route::get('/', function () {
//     return view('signin');
// })->name('signin');

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/change_password_page', function () {
    return view('change_password');
})->name('change_password_page');

Route::get('/user_management', function () {
    return view('user_management');
})->name('user_management');

Route::get('/machine_management', function () {
    return view('machine_management');
})->name('machine_management');


Route::get('/machine_parameter', function () {
    return view('injection_machine_data');
})->name('injection_machine_data');



/**
 * USER CONTROLLER
 * Note: always use snake case naming convention to route & route name then set camel case to the method for best practice
 */
Route::controller(UserController::class)->group(function () {
    Route::get('/view_users','viewUsers')->name('view_users');
    Route::post('/add_user','addUser')->name('add_user');
    Route::get('/get_user_details','getUserById')->name('get_user_details');
    Route::get('/get_rapidx_users','getRapidxUsers')->name('get_rapidx_users');
    Route::get('/edit_user_status','editUserStatus')->name('edit_user_status');
    Route::get('/reactivate_account','reactivateUserStatus')->name('reactivate_account');
    Route::get('/get_data_for_dashboard','getDataForDashboard')->name('get_data_for_dashboard');
    Route::get('/get_login_user','getUserLogin')->name('get_login_user');
});
// Route::get('/view_machine_parameter', [MachineParameterController::class, 'viewMachin
/**
 * MACHINE CONTROLLER
 */
Route::controller(MachineController::class)->group(function () {
    Route::get('/view_machine', 'viewMachine')->name('view_machine');
    Route::post('/add_machine', 'addMachine')->name('add_machine');
    Route::get('/get_machine_details', 'getMachineById')->name('get_machine_details');
    Route::get('/edit_machine_status', 'editMachineStatus')->name('edit_machine_status');
    Route::get('/reactivate_machine', 'restoreMachineStatus')->name('reactivate_machine');
});

Route::controller(MachineParameterController::class)->group(function () {
    Route::post('/save_machine_one', 'saveMachineOne')->name('save_machine_one');
    Route::post('/save_machine_two', 'saveMachineTwo')->name('save_machine_two');
    Route::post('/save_injection_tab_list', 'saveInjectionTabList')->name('save_injection_tab_list');

    Route::get('/get_machine_name_form1','getMachineDetailsForm1')->name('get_machine_name_form1');
    Route::get('/get_machine_name_form2','getMachineDetailsForm2')->name('get_machine_name_form2');
    Route::get('/get_operator_name','getOperatorName')->name('get_operator_name');
    Route::get('/load_machine_parameter_one', 'loadMachineParameterOne')->name('load_machine_parameter_one');
    Route::get('/load_machine_parameter_two', 'loadMachineParameterTwo')->name('load_machine_parameter_two');
    Route::get('/load_injection_tab_list', 'loadInjectionTabList')->name('load_injection_tab_list');
    Route::get('/edit_machine_parameter', 'editMachineParameter')->name('edit_machine_parameter');
    Route::get('/edit_machine_parameter_two', 'editMachineParameterTwo')->name('edit_machine_parameter_two');
    Route::get('/edit_injection_tab_list', 'editInjectionTabList')->name('edit_injection_tab_list');

    //
});
//


//
// Route::get('/get_machine_name_form1',[MachineParameterController::class, 'getMachineDetailsForm1'])->name('get_machine_name_form1');


