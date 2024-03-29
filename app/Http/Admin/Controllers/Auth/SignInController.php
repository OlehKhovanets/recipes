<?php

namespace App\Http\Admin\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class SignInController extends Controller
{
   public function index()
   {
       return view('admin.auth.sign-in');
   }
}
