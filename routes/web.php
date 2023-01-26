<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\HomeController;
use App\Http\controllers\MessageController;
use App\Http\controllers\PostController;


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
//     return view('home');
// });


Route::get('/',[HomeController::class,'sign_in']);

Route::get('/dashboard',[HomeController::class, 'home'])->name('dashboard');

Route::get('/profile',[HomeController::class,'profile'])->name('profile');

Route::get('/job_offer',[HomeController::class,'job_offer'])->name('job_offer');

Route::get('/chat',[MessageController::class,'chat'])->name('chat');

Route::get('/friend',[HomeController::class,'friend'])->name('friend');

Route::post('/friendship/add/{friend}', [HomeController::class, 'addFriend'])->name('add-friend');

Route::delete('friendship/delete/{friend}', [HomeController::class, 'deleteFriend'])->name('delete-friend');

Route::get('/calender',[HomeController::class,'calender'])->name('calendar');

Route::get('/cafe',[HomeController::class,'cafeteria'])->name('cafe');

Route::get('/groups',[HomeController::class,'group'])->name('groups');
Route::post('/join-group/{groupID}',[HomeController::class,'join_group'])->name('join-group');
Route::delete('/leave-group/{groupID}',[HomeController::class,'leave_group'])->name('leave-group');

Route::get('/create_group',[HomeController::class,'create_group'])->name('create_group');
Route::post('/create_group', [HomeController::class, 'store_group'])->name('store_group');

Route::get('/group-detail/{group}', [HomeController::class,'group_detail'])->name('group-detail');

Route::get('/clubs',[HomeController::class,'club'])->name('clubs');

Route::get('/file',[HomeController::class,'file'])->name('file');

Route::get('/gallery',[HomeController::class,'gallery'])->name('gallery');

Route::get('/privacy-setting',[HomeController::class,'privacy_settings'])->name('privacy-setting');

//Route::get('/news',[HomeController::class,'news'])->name('news');

Route::get('/sign-up',[HomeController::class,'sign_up'])->name('sign-up');

Route::get('/sign-in',[HomeController::class,'sign_in'])->name('sign-in');

Route::get('/create-account',[HomeController::class,'add_info'])->name('create-account');

Route::get('/notification',[HomeController::class,'notification'])->name('notification');

Route::delete('/delete-post/{post}',[HomeController::class,'delete_post'])->name('delete-post');

Route::get('/edit-profile',[HomeController::class,'profile_edit'])->name('edit-profile');
Route::patch('/profile/update/{principal}', [HomeController::class, 'profile_update'])->name('update-profile');
Route::put('/profile/update/{principal}', [HomeController::class, 'profile_update'])->name('update-profile');

Route::patch('/profile/password/{principal}', [HomeController::class, 'password_update'])->name('update-password');
Route::put('/profile/password/{principal}', [HomeController::class, 'password_update'])->name('update-password');

Route::get('/account-setting',[HomeController::class,'account_setting'])->name('account-setting');

Route::resource('/posts', PostController::class);
Route::resource('/events', EventController::class);
Route::resource('/news', NewsController::class);


Route::get('/chat',[MessageController::class,'chat']);
Route::post('/sendmessage',[MessageController::class,'sendMessage']);
Route::post('/get-user-message',[MessageController::class,'getUserMessage']);
Route::post('/read-message',[MessageController::class,'readMessage']);
Route::post('/unread-message',[MessageController::class,'unreadMessage']);
Route::post('/message-media',[MessageController::class,'Mediafile']);
Route::get('/search', [MessageController::class, 'search'] );


/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
});
*/
/*
Route::get('/', function () {
    return view('guest.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/chat',[MessageController::class,'chat']);

Route::get('/chat/{id}',[MessageController::class,'getMessage']);

Route::post('/sendmessage',[MessageController::class,'sendMessage']);
Route::post('/get-user-message',[MessageController::class,'getUserMessage']);
*/