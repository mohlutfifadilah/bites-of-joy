<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::all();
        $product = Product::all();
        return view('admin.product.index', compact('category', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_category' => 'required',
            'product_name' => 'required',
            'photo' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'price' => 'required',
        ]);
        $image = $request->file('photo');

        if ($image) {
            $destinationPath = 'img/product/upload/';
            $productImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
            $photo = $productImage;
        }

        Product::create([
            'id_category'      =>   $request->id_category,
            'name_product'     =>   $request->product_name,
            'photo'            =>   $photo,
            'description'      =>   $request->description,
            'stock'            =>   $request->stock,
            'price'            =>   preg_replace('/[^0-9,""]/', '', $request->price),
        ]);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.product.edit', compact('category', 'product'));
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
        //
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'price' => 'required',
        ]);
        $image = $request->file('photo');
        $product = Product::find($id);
        if ($image) {
            $destinationPath = 'img/product/upload/';

            unlink($destinationPath . $product->photo);
            $productImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
            $photo = $productImage;

            if($request->id_category){
                $product->update([
                    'id_category'      =>   $request->id_category,
                    'name_product'     =>   $request->product_name,
                    'photo'            =>   $photo,
                    'description'      =>   $request->description,
                    'stock'            =>   $request->stock,
                    'price'            =>   preg_replace('/[^0-9,""]/', '', $request->price),
                ]);
            }
            $product->update([
                'name_product'     =>   $request->product_name,
                'photo'            =>   $photo,
                'description'      =>   $request->description,
                'stock'            =>   $request->stock,
                'price'            =>   preg_replace('/[^0-9,""]/', '', $request->price),
            ]);

        } else {
            if ($request->id_category){
                $product->update([
                    'id_category'      =>   $request->id_category,
                    'name_product'     =>   $request->product_name,
                    'description'      =>   $request->description,
                    'stock'            =>   $request->stock,
                    'price'            =>   preg_replace('/[^0-9,""]/', '', $request->price),
                ]);
            }
            $product->update([
                'name_product'     =>   $request->product_name,
                'description'      =>   $request->description,
                'stock'            =>   $request->stock,
                'price'            =>   preg_replace('/[^0-9,""]/', '', $request->price),
            ]);
        }


        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destinationPath = 'img/product/upload/';
        $product = Product::find($id);

        unlink($destinationPath . $product->photo);
        $product->delete();

        return redirect()->route('product.index');
    }
}
