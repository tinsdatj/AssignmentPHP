<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        if ($request->isMethod('POST')) {
            $data = $request->only(['username','password']);
            if (Auth::attempt($data) ){
                $user = Auth::user();
                if ($user->role == 'admin') {
                    
                return redirect()->route('admin-dashboard');
                }else{
                    return redirect()->route('home');
                }
            }else{
                return redirect()->back()->with('error','Username hoặc password không đúng!');
            }
        }
        return view('Admin.Login.loginlayout');
        
    }
    public function register(Request $request){
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $data['avatar'] = '';
            $data['address'] = '';
            $data['phone'] = '';
            $password = bcrypt($request['password']);
            $data['password'] = $password;
            User::query()->create($data);
            return redirect()->route('login-admin')->with('message','Đăng kí thành công!');
        }
        return view('Admin.Login.Registerlayout');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login-admin')->with('message','Đăng xuất thành công!');
    }
}
