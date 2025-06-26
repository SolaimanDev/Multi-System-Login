<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthLoginController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->query('token');

            if (!$token) {
                return redirect('/login')->with('error', 'Token is missing');
            }

        try {
            // Decode payload to check user ID
            $userId = JWTAuth::setToken($token)->getPayload()->get('sub');
            // dd($userId);
            $user = User::find($userId);

            if (!$user) {
                return redirect('/login')->with('error', 'User not found');
            }

            // Authenticate user in foodpanda session
            Auth::login($user);
            session(['jwt_token' => $token]);

            return redirect('/home');

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return redirect('/login')->with('error', 'Invalid token');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        session()->flush();      

        //  redirect back to ecommerce
        if ($request->query('redirect_from') === 'ecommerce') {
            return redirect()->away(config('services.ecommerce_app_url') . '/');            
        }

        return redirect('/login');
    }
}
