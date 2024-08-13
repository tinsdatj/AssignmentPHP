<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add_user(Request $request){
        if ($request->isMethod('POST')) {
            $data = $request->except('avatar','_token');
            $request['avatar'] = '';
            if ($request->hasFile('avatar')) {
                $path_image = $request->file('avatar')->store('image');
                $request['avatar'] = $path_image;
            }
            $password = bcrypt($request['password']);
            $request['password'] = $password;
            User::query()->create($data);
            return redirect()->route('admin-listUser')->with('message','Thêm dữ liệu thành công!');
        }
        return view('Admin.Users.addUser');
    }
    public function edit_user(Request $request,$id){
        $userdetail = User::where('id',$id)->first();
        if ($request->isMethod('POST')) {
            $data = $request->except('avatar','_token');
            $old_image = $userdetail->image;
            $data['avatar'] = $old_image;
            if ($request->hasFile('avatar')) {
                $path_image = $request->file('avatar')->store('images');
                $request['avatar'] = $path_image;
            }
            User::where('id',$id)->update($data);
            if (isset($path_image)) {
                if (file_exists('/storage'.$old_image)) {
                    unlink('/storage'.$old_image);
                }
            }
            return redirect()->route('admin-listUser')->with('message','Sửa dữ liệu thành công!');
        }
        return view('Admin.Users.editUser',compact('userdetail'));
    }
    public function delete_user($id){
        User::where('id',$id)->delete();
        return redirect()->route('admin-listUser')->with('message','Xóa dữ liệu thành công!');
    }
}
