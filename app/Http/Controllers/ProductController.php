<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function add_product(Request $request){

        $cate = CategoryModel::all();
        if ($request->isMethod('POST')) {
            $data = $request->except('image','_token');
            $data['image'] = '';
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;
        }
        ProductModel::query()->create($data);
        return redirect()->route('admin-listproduct')->with('message','Thêm dữ liệu thành công!');
        }
        return view('Admin.Products.addProduct',compact('cate'));
    }

    public function edit_product(Request $request,$id){
        $cate = CategoryModel::all();
        $Productdedtail = ProductModel::where('id',$id)->first();
        if ($request->isMethod('POST')) {
            $data = $request->except('image','_token');
            $old_image = $Productdedtail->image;
            $data['image'] = $old_image;
            if ($request->hasFile('image')) {
                $path_image = $request->file('image')->store('images');
                $data['image']=$path_image;
            }
            ProductModel::where('id',$id)->update($data);
            if (isset($path_image)) {
                if (file_exists('storage/'.$old_image)) {
                    unlink('/storage/'. $old_image);
                }
            }
            return redirect()->back()->with('message','Cập nhật dữ liệu thành công!');
        }
        return view('Admin.Categories.editCategory',compact('cate','Productdetail'));
    }

    public function delete_product($id){
        ProductModel::where('id',$id)->delete();
        return redirect()->route('admin-listproduct')->with('message','Xóa dữ liệu thành công!');
    }
}
