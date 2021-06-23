<?php

namespace App\Http\Controllers;

use App\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section=sections::all();

        return view('sections.sections',compact('section'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'sectionName' => 'required|unique:sections|max:255'
            ],[
                'sectionName.required' => 'يجب ادخال اسم القسم',
                'sectionName.unique' => 'هذا القسم موجود بالفعل'
            ]);
            sections::create([
                'sectionName' => $request->sectionName,
                'description' => $request->description,
                'createdBy' => (Auth::user()->name)

            ]);
                session()->flash('add','تم الأضافة بنجاح');
            return \redirect('sections');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id= $request->id;
        $this -> validate($request,[
            'sectionName' => 'required|max:255'
            ],[
                'sectionName.required' => 'يجب ادخال اسم القسم',
                
            ]);
            $section= sections::find($id);
            $section->update([
                'sectionName' => $request->sectionName,
                'description' => $request->description
                

            ]);
                session()->flash('edit','تم التعديل بنجاح');
            return \redirect('sections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        sections::find($id)->delete();
        session()->flash('delete','تم الحذف بنجاح');
        return(\redirect('sections'));
    }
}
