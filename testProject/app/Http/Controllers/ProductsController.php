<?php

namespace App\Http\Controllers;

use App\products;
use App\sections;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       $product= products::all();
       $section= sections::all();
        return view('product.product',['product'=>$product,'section'=>$section]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'productName' => 'required|unique:products|max:255',
            'sectionName' => 'required',
            'description' => 'required',
            
        ],[
            'description.required' => 'يجب ادخال الوصف',
            'sectionName.required' => 'يجب ادخال اسم القسم',
            'productName.required' => 'يجب ادخال اسم المنتج',
            'productName.unique' => 'هذا المنتج موجود بالفعل'
        ]);
        
        products::create([
            'productName'=>$request->productName,
            'description'=>$request->description,          
            'sectionId'=>$request->sectionName
        ]);
        session()->flash('add','تمت الاضافة بنجاح');
        return \redirect('product');
        // return($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=$request->id;
        $this ->validate($request,[
            'productName' => 'required|max:255',
            
        ],[
            'productName.required' => 'يجب ادخال اسم المنتج',
            
        ]);
        $product=products::find($id);
        $product->update([
            'productName'=>$request->productName,
            'description'=>$request->description,          
            'sectionId'=>$request->sectionName
        ]);
        session()->flash('edit','تمت التعديل بنجاح');
        return \redirect('product');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        products::find($id)->delete();
        session()->flash('delete','تم الحذف بنجاح');
        return \redirect('product');
        
    }
}
