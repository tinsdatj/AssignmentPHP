<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add_category(Request $request){
        if ($request->isMethod('POST')) {
            $data = $request->all();
            CategoryModel::query()->create($data);
            return redirect()->route('admin-listcate')->with('message','Thêm dữ liệu thành công!');
        }
        return view('Admin.Categories.addCategories');
        
    }
    public function edit_category(Request $request,$id){
        $Catedetail = CategoryModel::where('id',$id)->first();
        if ($request->isMethod('POST')) {
            $data = $request->except('_token');
            CategoryModel::where('id',$id)->update($data);
            return redirect()->route('admin-listcate')->with('message','Thay đổi dữ liệu thành công!');
        }
        return view('Admin.Categories.editCategory',compact('Catedetail'));
    }
    public function delete_category($id){
        CategoryModel::where('id',$id)->delete();
        return redirect()->route('admin-listcate')->with('message','Xóa dữ liệu thành công!');
    }
}
