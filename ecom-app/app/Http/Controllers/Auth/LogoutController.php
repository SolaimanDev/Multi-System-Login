<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
   public function logout(Request $request)
   {
      try {
         JWTAuth::invalidate(JWTAuth::getToken()); // Invalidate token
      } catch (\Exception $e) {
         // Token already expired or invalid
      }

      Auth::logout();
      session()->flush();

      return redirect()->away(config('services.foodpanda_app_url') . '/logout?redirect_from=ecommerce');

   }

}
