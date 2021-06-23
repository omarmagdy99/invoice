<?php

namespace App\Http\Controllers;

use App\invoice_attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class InvoiceAttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'pic'=>['required']
        ]);
        $image_name=$request->file('pic')->getClientOriginalName();
        invoice_attachment::create([
            'invoice_number'=>$request->invoice_number,
            'invoice_id'=>$request->invoice_id,
            'file_name'=>$image_name,
            'created_by'=>Auth::user()->name,
        ]);
            $request->pic->move(public_path('attachment/').$request->invoice_number,$image_name);
            session()->flash('add','تمت الاضافة بنجاح');
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\invoice_attachment  $invoice_attachment
     * @return \Illuminate\Http\Response
     */
    public function show(invoice_attachment $invoice_attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\invoice_attachment  $invoice_attachment
     * @return \Illuminate\Http\Response
     */
    public function edit(invoice_attachment $invoice_attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\invoice_attachment  $invoice_attachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoice_attachment $invoice_attachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\invoice_attachment  $invoice_attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        invoice_attachment::find($request->id)->delete();
        Storage::disk('attachment_location')->delete($request->invoice_number.'/'.$request->file_name);
        session()->flash('delete','deleted successfully');

        return back();
    }
}
