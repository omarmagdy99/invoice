@extends('layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">

    rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                    فواتير</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('title')
    اضافة فواتير
@endsection
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $item)

            <div class="alert alert-danger" role="alert">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong> خطأ </strong>{{ $item }}
            </div>
        @endforeach
    @endif



    <div class="container">
        <form action="{{route('editStatus',['id'=>$old_data->id ])}}" method="POST">
            {{ csrf_field() }}
            <div class="row bg-white card-body">

                <div class="col-4 mt-4 ">
                    <label for="">رقم الفاتورة</label><br>
                    <input readonly class="form-control" placeholder="رقم الفاتورة" type="text" name="invoice_number"
                        value="{{ $old_data->invoice_number }}">
                        <input readonly type="hidden" name="id" value="{{ $old_data->id }}">
                        <input readonly type="hidden" name="old_invoice_number" value="{{ $old_data->invoice_number }}">
                </div>
                <div class="col-4 mt-4 ">

                    <label for="">تاريخ الفاتورة</label><br>
                    <div class="input-group-prepend">

                    </div>
                    <input readonly class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="invoice_Date"  value="{{ $old_data->invoice_Date }}">
                </div>
                <div class="col-4  mt-4">
                    <label for="">تاريخ الأستحقاق</label><br>
                    <div class="input-group-prepend">

                    </div>
                    <input readonly class="form-control " placeholder="MM/DD/YYYY" type="date" name="Due_date"  value="{{ $old_data->Due_date }}">
                </div>

                <div class="col-4 mt-4">
                    <label for="">القسم</label><br>
                    <select readonly id="selectSection" class="form-control select2" name="section" >
                        <option   selected value="{{ $old_data->section_id }}">
                            {{ $old_data->Section->sectionName  }}
                        </option>
                       

                    </select>


                </div>

                <div class="col-4 mt-4 ">
                    <label for="">المنتج</label><br>
                    <select readonly class="form-control " name="product" id="selectProduct"  >
                        <option  selected value="{{ $old_data->product }}">
                            {{ $old_data->product }}
                        </option>
                       

                    </select>

                </div>
                <div class="col-4 mt-4">
                    <label for="">مبلغ التحصيل</label><br>
                    <input readonly class="form-control attain" onchange="" name="amount_collection" placeholder="مبلغ التحصيل" type="number"  value="{{ $old_data->amount_collection }}">
                </div>
                <div class="col-4 mt-4">
                    <label for="">مبلغ العمولة</label><br>
                    <input readonly class="form-control comm" name="amount_commission" placeholder="مبلغ العمولة" type="number"  value="{{ $old_data->amount_commission }}">
                </div>
                <div class="col-4 mt-4">
                    <label for="">الخصم</label><br>
                    <input readonly class="form-control discount" name="discount" placeholder="الخصم " type="number"  value="{{ $old_data->Discount }}">
                </div>
                <div class="col-4 mt-4 ">
                    <label for="">نسبة ضريبة القيمة المضافة</label><br>
                    <select readonly class="form-control select2 addedValue" name="Rate_VAT"  >
                        <option value="{{ $old_data->Rate_VAT }}"  selected>
                            {{ $old_data->Rate_VAT }}%
                        </option>
                       

                    </select>

                </div>

                <div class="col-6 mt-4 ">
                    <label for="">قيمة ضريبة القيمة المضافة</label><br>
                    <input readonly class="form-control value-vat" readonly type="text" name="value_vat"  value="{{ $old_data->Value_VAT }}">
                </div>
                <div class="col-6 mt-4 ">
                    <label for="">الاجمالي شامل الضريبة</label><br>
                    <input readonly class="form-control total" readonly type="text" name="total"  value="{{ $old_data->Total }}">
                </div>
                <div class="col-12 mt-4 ">
                    <label for="">الملاحظة</label><br>
                    <textarea class="form-control" rows="3" name="note"  value="{{ $old_data->note }}" readonly>{{ $old_data->note }}</textarea>
                </div>
                
                <div class="col-4 my-4">
                    <label for="">حالة الدفع </label><br>
                    <select  id="selectSection" class="form-control select2" name="status" >
                        <option    value="1">
                            مدفوعة 
                        </option>
                        <option    value="3">
                             مدفوعة جزئيا 
                        </option>
                       
    
                    </select>
    
    
                </div>
                <div class="col-4 my-4">
                    <label for="">تاريخ الدفع </label><br>
                    
                    <input  class="form-control " placeholder="MM/DD/YYYY" type="date" name="paymentDate"  value="">

    
                </div>
                <button class="btn btn-outline-primary btn-block" type="submit">تعديل</button>
            </div>
        </form>

    </div>
@endsection

@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <!-- Ionicons js -->
    <script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
@endsection
