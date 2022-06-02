<?php

use App\Models\User;
use App\Mail\RecommendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/post/list', [PostController::class, 'index'])->name('post.index');
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');

Route::get('/email/{id}', function($id) {
    $user = User::find($id);
    $userEmail = $user->email;
    try {
        Mail::to($user)->send(new RecommendMail($user));
        return "Email Sent to ${userEmail} !";
    } catch (Exception $e) {
        info($e);
        return "Email Failed to Send ${userEmail} !";
    }
})->name('email.recommend');
