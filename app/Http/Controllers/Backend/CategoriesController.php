<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::paginate(3);
        $successMsg = session('success');
        return view('cats.index', compact('cats' , 'successMsg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        $cat  = new Category();
        return view('cats.create', compact('cats' , 'cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        return redirect()->route('admin.cats.index')->with('success' , 'the cat added successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = Category::all();
        $cat = Category::findOrFail($id);
        return view('cats.edit', compact("cat" , "cats"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        return redirect()->route('admin.cats.index')->with('success' , 'the cat updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.cats.index')->with('success' , 'the cat deleted successfuly');
    }
}
