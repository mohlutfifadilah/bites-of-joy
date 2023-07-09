<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
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
            'name_category' => 'required',
        ]);

        $image = $request->file('photo');

        if ($image) {
            $destinationPath = 'img/categories/';
            $productImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
            $photo = $productImage;
        }

        Category::create([
            'photo'         =>   $photo,
            'name_category' =>   $request->name_category,
        ]);

        return redirect()->route('category.index');
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
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
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
            'name_category' => 'required',
        ]);
        $image = $request->file('photo');
        $category = Category::find($id);
        if ($image) {
            $destinationPath = 'img/categories';

            unlink($destinationPath . $category->photo);
            $categoryImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $categoryImage);
            $photo = $categoryImage;

            $category->update([
                'photo'            =>   $photo,
                'name_category'      =>   $request->name_category,
            ]);
        } else {
            $category->update([
                'name_category'      =>   $request->name_category,
            ]);
        }

        return redirect()->route('category.index');
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
        $destinationPath = 'img/categories/';
        $category = Category::find($id);

        unlink($destinationPath . $category->photo);
        $category->delete();

        return redirect()->route('category.index');
    }
}
