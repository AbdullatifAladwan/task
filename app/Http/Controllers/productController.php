<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        $product = product::all();
        return view('index', compact('product'));
    }


    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        $data = new product();
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'img' => 'required',
        ]);


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


        return redirect()->route('product.index')->with('success', 'product has been created successfully.');
    }


    public function show(product $product)
    {
        return view('show', compact('product'));
    }


    public function edit(product $product)
    {
        return view('edit', compact('product'));
    }



    public function update(Request $request, product $product)
    {


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


        return redirect()->route('product.index')->with('success', 'product Has Been updated successfully');
    }



    public function destroy($id)
    {

        Product::find($id)->delete($id);

        return response()->json([
            'success' => 'Product deleted successfully!'
        ]);
    }
}