<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public route for logging in
Route::post('/login', [AuthController::class, 'login']);

// Protected routes (Only accessible with a valid Bearer token) # Grouped
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});







/*
Route::get('/user', function (Request $request) {

return $request->user();

})->middleware('auth:sanctum');

That snippet is a default placeholder that Laravel 11 includes in api.php once you run install:api. It is both a functional route and a "template" to show you how to protect your future API routes.

Here is a breakdown of what that specific code is doing "under the hood" now that you've installed Sanctum:

1. The Route: /api/user
Even though the code says Route::get('/user'...), Laravel automatically adds an /api prefix to every route inside this file.

Access it at: http://localhost:8000/api/user

Purpose: It returns the currently authenticated user's data as a JSON object.

2. The Middleware: auth:sanctum
This is the "security guard" we discussed.

What it does now: It looks for a Bearer Token in the incoming request's header.

The Logic: * If a valid token is found, it "logs in" the user for that single request and allows the code to run.

If no token (or an invalid one) is sent, it immediately stops the request and returns a 401 Unauthorized JSON response.

3. The Closure: return $request->user();
$request: This object contains everything about the incoming call (headers, parameters, etc.).

-------------------------------------------------------------------------------------------------
->user(): Because the auth:sanctum middleware successfully ran right before this, the $request now "knows" exactly which user is calling. This method simply pulls that user's record from your database and returns it.
Individual Protection: Every single route you wanted to protect had to have
->middleware('auth:sanctum') manually typed at the end.

Route::middleware('auth:sanctum')->group
Inherited Protection: By wrapping routes in a group, they all inherit the auth:sanctum guard.
You only have to write "sanctum" once at the top.
*/
