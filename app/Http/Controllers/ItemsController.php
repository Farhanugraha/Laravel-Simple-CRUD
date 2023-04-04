<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    //
    public function index() {
        $items = items::get();

        return view('items.index' ,['data' => $items]);
    }
    public function add() {
        $category = category::get();
        return view('items.form',['category'=>$category]);
    }
    public function save(Request $request) {
        $data = [
            // $request-> name is to retrieve form with value name on index.blade.php
            'items_code'=> $request->items_code,
            'items_name'=> $request-> items_name,
            'category_id'=> $request->category_id,
            'price'=> $request->price,
            'amount'=> $request->amount,
        ];
        
        items::create($data);
        return redirect()->route('items');
    }

    public function edit($id) {
        $items = items::where('id',$id)->first();
        $category = category::get();
        return view('items.form',['items'=>$items,'category'=>$category]);
    }
    public function update($id,Request $request) {
        $data = [
            // $request-> name is to retrieve form with value name on index.blade.php
            'items_code'=> $request->items_code,
            'items_name'=> $request-> items_name,
            'category_id'=> $request->category_id,
            'price'=> $request->price,
            'amount'=> $request->amount,
        ];

        items::find($id)->update($data);
        return redirect()->route('items');
    }
    public function delete($id) {
        items::find($id)->delete();
        return redirect()->route('items');
    }

}
