<?php

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;

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

// Route::get('create-admin', function() {
//     $user = new User;
//     $user->name = 'admin';
//     $user->email = 'info@haji.com';
//     $user->password = Hash::make('assdlifeassd');
//     $user->save();
//     if($user){
//         return 1;
//     }
// });
Route::get('test-upload', function () {
return view('testUpload');
});
Route::post('upload-file', function (Request $request) {
    $path = $request->file('myfile')->store('public/avatars');
	$client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
	$user = "faridg3";
	$pass = "MasterSMSPass!";
	$fromNum = "+983000505";
	$toNum = array("9353773537");
	$pattern_code = "5b9j5lcy9t";
	$input_data = array("mobile" => "1054 4-41");
	echo $client->sendPatternSms($fromNum,$toNum,$user,$pass,$pattern_code,$input_data);
    return Storage::url($path);
});
Route::get('/dashboard', function () {
    $allMesages = Message::all();
    return view('dashboard', ['messages'=>$allMesages]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::view('/', 'welcome', ['name' => 'Mazarae Talaei']);
Route::get('/contact', [ContactController::class, 'index']);
Route::resource('/likes', LikeController::class);
Route::get('/show-edit-message/{id}', [ContactController::class, 'showEdit'])->middleware(['auth', 'verified']);
Route::post('/edit-message/{id}', function (Request $request, $id) {
    $myMessage = Message::find($id);
    $myMessage->fullName = $request->fullName;
    $myMessage->phone = $request->phone;
    $myMessage->email = $request->email;
    $myMessage->message = $request->message;
    $myMessage->save();
    return redirect('/contact');
})->middleware(['auth', 'verified']);
Route::get('/about', function () {
    return view('help.about');
});
Route::middleware('auth')->get('/delete-message/{id}', function ($id) {
    $message = Message::find($id);
    $message->delete();
    return redirect('/contact');
});
Route::post('/contact', function (Request $request) {
    $newMessage = Message::create([
        'fullName' => $request->fullName,
        'phone' => $request->phone,
        'email' => $request->email,
        'message' => $request->message,
    ]);
    return redirect('/contact');

});
Route::get('/services', function () {
    return "Kertop";
});
Route::get('/portfolio', function () {
    return "Kertop";
});

Route::get('/profile', function () {
    return "Kertop";
});
Route::get('/register', function () {
    return "Kertop";
});

Route::get('/book/{bookNumber}/page/{number}', function ($bookNumber, $number) {
    return '<img src="/books/' . $bookNumber . '/' . $number . '.jpg" >';
})->where('number', '[0-9]+');
