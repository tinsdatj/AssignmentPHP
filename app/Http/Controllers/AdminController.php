<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('Admin.index');
    }
    public function listAllProduct(){
        $listcate = CategoryModel::all();
        $listproduct = ProductModel::all();
        return view('Admin.Products.listProducts',compact('listproduct','listcate'));
    }
    public function listAllCategories(){
        $listcate = CategoryModel::all();
        return view('Admin.Categories.listCategories',compact('listcate'));
    }
    public function listAllUsers(){
        $listUser = User::all();
        $userADmin =   Auth::user();
        return view('Admin.Users.listUsers',compact('listUser','userADmin'));
    }
}
