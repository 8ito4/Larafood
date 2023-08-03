<?php

use App\Http\Controllers\Admin\DetailPlanController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PlanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;



Route::prefix('admin')
        ->group(function() {

    // Routes Details Permission        

    Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
    Route::resource('permissions', PermissionController::class);        


    // Routes   Profile
    Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
    Route::resource('profiles', ProfileController::class);
            // ->only(['index', 'create', 'store', 'edit', 'update', 'show','destroy']);


    Route::namespace('Admin')->group(function() {


        // Routes Details Plan

        Route::delete('plans/{url}/details/{idDetail}/edit', [DetailPlanController::class, 'destroy'])->name('details.plan.destroy');
        Route::get('plans/{url}/details/{idDetail}/show', [DetailPlanController::class, 'show'])->name('details.plan.show');
        Route::put('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'update'])->name('details.plan.update');
        Route::get('plans/{url}/details/{idDetail}/edit', [DetailPlanController::class, 'edit'])->name('details.plan.edit');
        Route::post('plans/{url}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');
        Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
        Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');

        // Routes plans 

        Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
        Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');
        Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
        Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
        Route::delete('plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
        Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
        Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
        Route::get('plans', [PlanController::class, 'index'])->name('plans.index');

        // Home Dashboard

        Route::get('admin', [PlanController::class, 'index'])->name('admin.index');
    });


    

});



Route::get('/', function () {
    return view('welcome');
});
