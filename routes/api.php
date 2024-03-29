<?php
//
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Api\Support\IndexController;
//
///*SUPPORT*/
//Route::post('/support/send', [IndexController::class, 'index'])->name('support.index');
//
////todo можливо буде реалізація в майбутньому
//Route::post('/upload/image', function (Request $request) {
//    $image = $request->file('image');
//    $imageName = time() . '.' . $image->getClientOriginalExtension();
//
//    $image->move(public_path('upload/images'), $imageName);
//
//    return response()->json([
//        'success' => 1,
//        'file' => [
//            'url' => '/upload/images/' . $imageName,
//        ],
//    ]);
//});
