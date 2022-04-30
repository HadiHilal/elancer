<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function index()
    {
        $cats = Category::all();
        $successMsg = session('success');
        return view('cats.index', compact('cats' , 'successMsg'));
    }

    public function create()
    {
        $cats = Category::all();
        $cat  = new Category();
        return view('cats.create', compact('cats' , 'cat'));
    }
    public function add(Request $request)
    {

        $rules =[
            'name' => 'required|between:2,200|unique:categories,name',
            'parent_id' => 'nullable|int|exists:categories,id'
        ];

        $validate =  Validator::make($request->all() , $rules);
         $validate->validate();
        // if($validate->fails()){
        //     dd($validate->errors());
        // }
        $cat = new Category();
        $cat->name = $request->name;
        $cat->slug = Str::slug($cat->name);
        $cat->parent_id = $request->parent_id;
        $cat->save();
        return redirect()->to(url('cats'))->with('success' , 'the cat added successfuly');
    }

    public function edit($id)
    {
        $cats = Category::all();
        $cat = Category::findOrFail($id);
        return view('cats.edit', compact("cat" , "cats"));
    }
    public function update(Request $request , $id)
    {

        $rules =[
            'name' => 'required|between:2,200',
            'parent_id' => 'nullable|int|exists:categories,id'
        ];

        $validate =  Validator::make($request->all() , $rules);
        $validate->validate();

        $cat = Category::findOrFail($id);
        $cat->name = $request->name;
        $cat->slug = Str::slug($cat->name);
        $cat->save();
        return redirect()->to(url('cats'))->with('success' , 'the cat updated successfuly');
    }

    public function delete($id){
        Category::destroy($id);
        return redirect()->to(url('cats'))->with('success' , 'the cat deleted successfuly');

    }
}
