<?php

use Illuminate\Support\Facades\Route;

Route::get('/createDealAndAccount', [App\Http\Controllers\Api\v1\ZohoCRMController::class, 'createDealAndAccount']);
