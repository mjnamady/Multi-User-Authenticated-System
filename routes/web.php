<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// MY ROUTES

Route::middleware(['auth', 'roles:admin'])->group(function () {
    // SHOW ADMIN'S DASHBOARD
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminFrofile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminFrofileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
}); // End Admin's Middleware


Route::middleware(['auth', 'roles:agent'])->group(function () {
// SHOW AGENT'S DASHBOARD
Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
}); // End Admin's Middleware

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::get('user/login', [UserController::class, 'userLogin'])->name('user.login');
Route::get('user/register', [UserController::class, 'userRegister'])->name('user.register');
Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');


Route::middleware(['auth', 'roles:admin'])->group(function () {
    // SHOW ADMIN'S DASHBOARD

    // All types routes
    Route::controller(PropertyTypeController::class)->group(function(){
        // ->middleware('permission:property.all')
        Route::get('/all/type', 'allTypes')->name('all.type')->middleware('permission:property.all');
        Route::get('/add/type', 'AddTypes')->name('add.type')->middleware('permission:property.add');
        Route::post('/store/type', 'StoreType')->name('store.type');
        Route::get('/edit/type/{id}', 'EditType')->name('edit.type')->middleware('permission:property.edit');;
        Route::post('/update/type', 'UpdateType')->name('update.type');
        Route::get('/delete/type/{id}', 'DeleteType')->name('delete.type');
    });


    //////////////// Amenities all types ///////////////////////

    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/amenities', 'AllAmenities')->name('all.amenities')->middleware('permission:amenities.all');
        Route::get('/add/amenity', 'AddAmenity')->name('add.amenity')->middleware('permission:amenities.add');
        Route::post('/store/amenity', 'StoreAmenity')->name('store.amenity');
        Route::get('/edit/amenity/{id}', 'EditAmenity')->name('edit.amenity')->middleware('permission:amenities.edit');
        Route::post('/update/amenity', 'UpdateAmenity')->name('update.amenity');
        Route::get('/delete/amenity/{id}', 'DeleteAmenity')->name('delete.amenity');
    });


        ////////////////    All Permissions routes      ///////////////////////

        Route::controller(RoleController::class)->group(function(){
            Route::get('/all/permissions', 'AllPermissions')->name('all.permissions')->middleware('role:SuperAdmin');
            Route::get('/add/permission', 'AddPermission')->name('add.permission')->middleware('role:SuperAdmin');
            Route::post('/store/permission', 'StorePermission')->name('store.permission');
            Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission')->middleware('role:SuperAdmin');
            Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
            Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');

            Route::get('/import/permission', 'ImportPermission')->name('import.permission');
            Route::get('/export', 'Export')->name('export');
            Route::post('/import', 'Import')->name('import');
        });


        ////////////////    All Role's routes      ///////////////////////
        
        Route::controller(RoleController::class)->group(function(){
            Route::get('/all/roles', 'AllRoles')->name('all.roles')->middleware('permission:role.menu');
            Route::get('/add/role', 'AddRole')->name('add.role')->middleware('permission:role.menu');
            Route::post('/store/role', 'StoreRole')->name('store.role');
            Route::get('/edit/role/{id}', 'EditRole')->name('edit.role')->middleware('permission:role.menu');;
            Route::post('/update/role', 'UpdateRole')->name('update.role');
            Route::get('/delete/role/{id}', 'DeleteRole')->name('delete.role');

            Route::get('/import/permission', 'ImportPermission')->name('import.permission');
            Route::get('/export', 'Export')->name('export');
            Route::post('/import', 'Import')->name('import');

            Route::get('/add/roles/permission', 'AddRolePermission')->name('add.roles.permission');
            Route::post('/role/permission/store', 'RolePermissionStore')->name('role.permission.store');
            Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
            Route::get('/admin/edit/role/{id}', 'AdminEditRole')->name('admin.edit.role');
            Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');
            Route::get('/admin/delete/role/{id}', 'AdminDeleteRole')->name('admin.delete.role');
        });

        ////////////////// All Manage Admin's routes //////////////////////////////

        Route::controller(AdminController::class)->group(function(){
            Route::get('/all/admin', 'AllAdmin')->name('all.admin')->middleware('permission:agent.all');
            Route::get('/add/admin', 'AddAdmin')->name('add.admin')->middleware('permission:agent.add');
            Route::post('/store/admin', 'StoreAdmin')->name('store.admin');
            Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin')->middleware('permission:agent.edit');
            Route::post('/update/admin/{id}', 'UpdateAdmin')->name('update.admin');
            Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');
        });
   
   

}); // End Admin's Middleware