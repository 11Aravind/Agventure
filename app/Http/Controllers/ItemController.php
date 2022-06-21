<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;


use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function index(Request $request){

        $id = $request->session()->get('loggedUser');        
        
        $items = Item::latest()   
           ->where('user_id',$id)->get();

        return view('items.index',['title'=>'Items page','items'=>$items]); 
    }

    public function show($id){
        $item = Item::findOrFail($id);
        return view('items.show',['title'=>'Item page','item'=>$item]);
    }

    public function create(){
        $categories  = Category::all();
        return view('items.create',['title'=>'Create item page','categories'=>$categories]);
    }

    public function store(Request $request){


        $validatedData = $request->validate([

            'item_name' => 'required|min:2|alpha|max:250',
            'item_description' => 'required|min:5|max:1000',
            'category' => 'required',
            'quantity' => 'required|numeric|min:2|max:6',
            'item_image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        $newImageName = time().'-'. $request->item_name.'.'. 
        $request->item_image->extension();

        // dd($newImageName);

        $request->item_image->move(public_path('images'),$newImageName);

        $item = new Item();
        $item->name = $request->item_name;
        $item->description = $request->item_description;
        $item->user_id = $request->session()->get('loggedUser');
        $item->category_id = $request->category;
        $item->quantity = $request->quantity;
        $item->image = $newImageName;
        $item->save();

        return redirect('/farmer/create-auction');
        
    }

    public function update($id){

        $categories  = Category::all();
        $item = Item::findOrFail($id);

        return view('items.update',['title' => 'Update item Page','item'=>$item,'categories'=>$categories]);
    }

    public function change(Request $request){
        $validatedData = $request->validate([

            
            'item_name' => 'required|min:2|alpha|max:250',
            'item_description' => 'required|min:5|max:1000',
            'category' => 'required',
            'quantity' => 'required|numeric|min:2|max:6',
            // 'item_image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        // $newImageName = time().'-'. $request->item_name.'.'. 
        // $request->item_image->extension();

        // dd($newImageName);

        // $request->item_image->move(public_path('images'),$newImageName);

        $item = Item::findOrFail($request->id);
        $item->name = $request->item_name;
        $item->description = $request->item_description;
        $item->category_id = $request->category;
        $item->user_id = $request->session()->get('loggedUser');
        $item->quantity = $request->quantity;
         $item->image = $request->item_image;
        $item->save();
        return redirect('/farmer/items');
    }

    public function destroy($id){
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect('/farmer/items');
    }
}
