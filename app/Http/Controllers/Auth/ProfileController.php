<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
   public function index()
   {
       return view('auth.profile');
    
   }
   public function indextec()
   {
       return view('auth.profiletec');
    
   }
   
}

