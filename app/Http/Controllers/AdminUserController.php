<?php 
namespace App\Http\Controllers; 
use App\Models\User; 

class AdminUserController extends Controller 
{ 
    public function index() 
    { 
        $users = User::orderBy('name')->get(); return view('admin.users.index', compact('users'));
        Route::middleware(['auth', 'admin'])->get('/admin/users', 
        [AdminUserController::class, 'index'])->name('admin.users.index'); 
    } 
}