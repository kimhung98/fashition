<?php

namespace Core\Modules\Webview\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Webview::page.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->role == 'superAdmin' || $user->role == 'manager')
                return redirect(route('admin.index'));
            else
                return redirect(route('pages.index'));
        } else {
            return redirect(route('pages.login'))->with('notification', 'Tài khoản hoặc mật khẩu chưa chính xác');
        }
    }
}
