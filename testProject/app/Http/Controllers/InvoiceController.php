<?php

namespace App\Http\Controllers;

use App\invoice;
use App\invoice_details;
use App\products;
use App\sections;
use App\invoice_attachment;
use Faker\Provider\ar_JO\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use IntlChar;
use Illuminate\Support\Facades\Storage;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $allInvoice=invoice::all();

        return view('invoice.invoices')->with('allInvoice',$allInvoice);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allSection=sections::all();
        $allpro=products::all();
        return view('invoice.ivoiceAdd',compact('allSection','allpro'));
        
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
            'invoice_number'=>['required','unique:invoices'],
            'invoice_Date'=>['required'],
            'Due_date'=>['required'],
            'product'=>['required'],
            'section'=>['required'],
            'amount_collection'=>['required'],
            'discount'=>['required'],
            'value_vat'=>['required'],
            'Rate_VAT'=>['required'],
            

        ]);
        invoice::create([
            'invoice_number'=>$request->invoice_number,
            'invoice_Date'=>$request->invoice_Date,
            'Due_date'=>$request->Due_date,
            'product'=>$request->product,
            'section_id'=>$request->section,
            'amount_collection'=>$request->amount_collection,
            'amount_commission'=>$request->amount_commission,
            'Discount'=>$request->discount,
            'Value_VAT'=>$request->value_vat,
            'Rate_VAT'=>$request->Rate_VAT,
            'Total'=>$request->total,
            'Status'=>'غير مدفوع',
            'Value_Status'=>'2',
            'note'=>$request->note,

        ]);
        $invoiceId=invoice::latest()->first()->id;
        invoice_details::create([
           'id_invoice'=>$invoiceId,
           'invoice_number'=>$request->invoice_number,
           'product'=>$request->product,
           'section'=>$request->section,
           'Status'=>'غير مدفوع',
           'Value_Status'=>'2',
           'note'=>$request->note,
            'user'=>Auth::user()->name,


        ]);
        if($request->hasFile('pic')){
            $invoiceId=invoice::latest()->first()->id;
            $file_name=$request->file('pic')->getClientOriginalName();
            
            $invoice_number=$request->invoice_number;
            invoice_attachment::create([
                'invoice_number'=>$invoice_number,
                'created_by'=>Auth::user()->name,
                'invoice_id'=>$invoiceId,
                'file_name'=>$file_name,
            ]);
            $request->pic->move( public_path('attachment/'.$invoice_number),$file_name);
            

        }
        
        session()->flash('add','لقد تم تسجيل الفاتورة');
        
        return \redirect('invoices');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $old_date=invoice::where('id',$id)->first();
        $allSection=sections::all();
        $allpro=products::all();
        return view('invoice.invoiceUpdate',['old_data'=>$old_date,'allSection'=>$allSection,'allpro'=>$allpro]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice=invoice::where('invoice_number',$id)->first();
        $invoice_details=invoice_details::where('invoice_number',$id)->get();
        $invoice_attachment=invoice_attachment::where('invoice_number',$id)->get();
        return view('invoice.details',['details'=>$invoice_details,'attachment'=>$invoice_attachment,'invoice'=>$invoice]);
        
    }
    public function download($invoice_number,$file_path){
        
        $path=Storage::disk('attachment_location')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_path);
        return response()->download($path);
        // return $path;
        
    }
    public function open_file($invoice_number,$file_path){
        $path=Storage::disk('attachment_location')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_path);
        return response()->file($path);
    }
    // public function delete_file($invoice_number,$file_path){
    //     invoice_attachment::where('file_name',$file_path)->delete();
    //     $path=Storage::disk('attachment_location')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_path);
    //     return response()->delete($path);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'invoice_number'=>['required'],
            'invoice_Date'=>['required'],
            'Due_date'=>['required'],
            'product'=>['required'],
            'section'=>['required'],
            'amount_collection'=>['required'],
            'discount'=>['required'],
            'value_vat'=>['required'],
            'Rate_VAT'=>['required'],
            

        ]); 
        rename(public_path('attachment/'.$request->old_invoice_number),public_path('attachment/'.$request->invoice_number));
        $invoice_data=invoice::where('id',$request->id);
        $invoice_data->update([
            'invoice_number'=>$request->invoice_number,
            'invoice_Date'=>$request->invoice_Date,
            'Due_date'=>$request->Due_date,
            'product'=>$request->product,
            'section_id'=>$request->section,
            'amount_collection'=>$request->amount_collection,
            'amount_commission'=>$request->amount_commission,
            'Discount'=>$request->discount,
            'Value_VAT'=>$request->value_vat,
            'Rate_VAT'=>$request->Rate_VAT,
            'Total'=>$request->total,
            'note'=>$request->note,

        ]);
        $invoice_details=invoice_details::where('id_invoice',$request->id);
        $invoice_details->update([
           'invoice_number'=>$request->invoice_number,
           'product'=>$request->product,
           'section'=>$request->section,
           'note'=>$request->note,


        ]); 

        session()->flash('update','لقد تم تعديل الفاتورة');
        
        return \redirect('invoices');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoice $invoice)
    {
        //
    }
}
