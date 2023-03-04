<?php  
use Illuminate\Http\Request;
use Bitfuses\Contact\Http\Controllers\MyContactController;

Route::get('contact',[MyContactController::class,'index'])->name('contact');
Route::post('contact',[MyContactController::class,'send']);
    
?>