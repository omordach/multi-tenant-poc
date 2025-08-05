<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('tenant.dashboard'));

Route::get('/info', fn () => 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id'));

