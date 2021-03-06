<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::all();
        return view('categories.index',['title'=>'Categories Page','categories'=>$categories]);

    }

    public function create(){

        return view('categories.create',['title'=>'Create categories Page']);
    
        
    }

    public function store(Request $request){


        $request->validate([
            'name' => 'required|min:2|max:20',
        ]);

        $category = new Category();
        $category->user_id  =  $request->session()->get('loggedUser');
        $category->name = $request->name;
        $category->save();

        return redirect('/admin/categories');

    }

    public function update($id){


        $category = Category::findOrFail($id);
        return view('categories.index',['title'=>'Update categories Page','category'=>$category]);
    }

    public function change(Request $request){

        

        $request->validate([
            'name' => 'required|min:2|max:20',
        ]);

        $category = Category::findOrFail($request->id);
        $category->user_id = $request->session()->get('loggedUser');
        $category->name = $request->name;
        $category->save();

        return redirect('/admin/categories');

    }

    public function destroy($id){

        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/admin/categories');

    }
}
