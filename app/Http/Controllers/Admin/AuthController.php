<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Auth\LoginRequest;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.pages.login');
    }

    public function postLogin(LoginRequest $request)
    {
        try {
            $dataLogin = [
                'email' => $request->email,
                'password' => $request->password
            ];
            if (!Auth::attempt($dataLogin)) {
                return [
                    'error' => true,
                    'message' => 'Tài khoản hoặc mật khẩu không đúng'
                ];
            }
            return [
                'error' => false,
            ];
        }catch (\Exception $e) {

        }
    }
}
