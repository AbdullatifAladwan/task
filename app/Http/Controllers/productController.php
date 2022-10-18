<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        //show all product from database
        $product = product::all();
        return view('index', compact('product'));
    }


    public function create()
    {
        //show form to add prodact to database
        return view('create');
    }


    public function store(Request $request)
    {
        //function to save submit form to database
        $data = new product();
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'img' => 'required',
        ]);

        //function to save img and move path 'public/Image' 
        if ($request->file('img')) {
            $file = $request->file('img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $data['img'] = $filename;
        }
        $data->name = $request->name;
        $data->price = $request->price;
        $data->desc = $request->desc;
        $data->save();


        return redirect()->route('product.index');
    }


    public function show(product $product)
    {
        //show info for prodact

        return view('show', compact('product'));
    }


    public function edit(product $product)
    {
        //show edit product from  
        return view('edit', compact('product'));
    }



    public function update(Request $request, product $product)
    {

        //function to save submit form edit to database

        $input = $request->all();
        if ($image = $request->file('img')) {
            $destinationPath = 'public/Image';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        } else {
            unset($input['img']);
        }
        $product->update($input);
        return redirect()->route('product.index');
    }



    public function destroy($id)
    {
        //delet product 
        Product::find($id)->delete($id);
        //ajax
        return response()->json([
            'success' => 'Product deleted successfully!'
        ]);
    }
}
