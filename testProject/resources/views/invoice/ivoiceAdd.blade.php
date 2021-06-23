@extends('layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />

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
@if($errors->any())
@foreach ($errors->all() as $item)
    
<div class="alert alert-danger" role="alert">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong> خطأ </strong>{{$item}}
</div>
@endforeach
@endif



    <div class="container">
        <form action="{{route ('invoices.store')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
        <div class="row bg-white card-body">

                <div class="col-4 mt-4 ">
                    <label for="">رقم الفاتورة</label><br>
                    <input class="form-control" placeholder="رقم الفاتورة" type="text" name="invoice_number">
                </div>
                <div class="col-4 mt-4 ">
                    
                    <label for="">تاريخ الفاتورة</label><br>
                    <div class="input-group-prepend">

                    </div>
                    <input class="form-control " placeholder="MM/DD/YYYY"  type="date" name="invoice_Date">
                </div>
                <div class="col-4  mt-4">
                    <label for="">تاريخ الأستحقاق</label><br>
                    <div class="input-group-prepend">

                    </div>
                    <input class="form-control " placeholder="MM/DD/YYYY" type="date" name="Due_date">
                </div>

                <div class="col-4 mt-4">
                    <label for="">القسم</label><br>
                    <select id="selectSection" class="form-control select2" name="section">
                        <option label="اختر القسم" disabled selected >
                            اختر القسم
                        </option>
                        @foreach ($allSection as $item)
                            
                        <option value="{{$item->id}}" >
                            {{$item->sectionName}}
                        </option>
                        @endforeach

                    </select>

                </div>

                <div class="col-4 mt-4 ">
                    <label for="">المنتج</label><br>
                    <select class="form-control " name="product" id="selectProduct">
                        <option label="اختر المنتج" disabled selected >
                           
                        </option>
                        @foreach ($allpro as $pro)
                            
                        <option value="{{$pro->productName}}"   class="productOption pro{{$pro->sectionId}}">
                            {{$pro->productName}}
                        </option>
                        @endforeach
                        

                    </select>

                </div>
                <div class="col-4 mt-4">
                    <label for="">مبلغ التحصيل</label><br>
                    <input class="form-control attain" name="amount_collection" placeholder="مبلغ التحصيل" type="number">
                </div>
                <div class="col-4 mt-4">
                    <label for="">مبلغ العمولة</label><br>
                    <input class="form-control comm" name="amount_commission" placeholder="مبلغ العمولة" type="number">
                </div>
                <div class="col-4 mt-4">
                    <label for="">الخصم</label><br>
                    <input class="form-control discount" name="discount" placeholder="الخصم " type="number">
                </div>
                <div class="col-4 mt-4 ">
                    <label for="">نسبة ضريبة القيمة المضافة</label><br>
                    <select class="form-control select2 addedValue" name="Rate_VAT">
                        <option label="Choose one">
                        </option>
                        <option value="12">
                            12%
                        </option>
                        <option value="20">
                            20%
                        </option>

                    </select>

                </div>

                <div class="col-6 mt-4 ">
                    <label for="">قيمة ضريبة القيمة المضافة</label><br>
                    <input class="form-control value-vat" readonly type="text" name="value_vat">
                </div>
                <div class="col-6 mt-4 ">
                    <label for="">الاجمالي شامل الضريبة</label><br>
                    <input class="form-control total" readonly type="text" name="total">
                </div>
                <div class="col-12 mt-4 ">
                    <label for="">الملاحظة</label><br>
                    <textarea class="form-control" rows="3" name="note"></textarea>
                </div>
                <div class="col-12 mt-4 ">
                    <label for="">المرفقات</label><br>
                    <input type="file" class="dropify" data-height="200" accept="image/x-png,image/gif,image/jpeg" name="pic"/>
                </div>

                <button class="btn btn-outline-primary btn-block" type="submit">Primary</button>
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
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

<script>
    $(document).ready(function(){
        
        
        $('.productOption').hide();
        $('#selectProduct').val("");
        $('select[name="section"]').on('change',function(){

            
            $('#selectProduct').val("");
            $('.productOption').hide();
            var sectionId= $(this).val();
            $(".pro"+ sectionId +" ").show();
            
        });
        if($('.discount').val().length===0)
             $('.discount').val("0");
        $('.discount').click(()=>{
            if($('.discount').val()==="0")
                $('.discount').val("");
        })
        $('.button[type="submit"]').click(function () { 
            if($('.discount').val().length===0)
             $('.discount').val("0");
            
        });
        $('.addedValue').change(function (e) { 
            e.preventDefault();
            if($('.comm').val().length===0){
                alert('ادخل مبلغ العمولة')
                $(this).val('');
            }
            else{

            var attain=$('.attain').val();
            var comm=$('.comm').val();
            var discount=$('.discount').val();
            var ratVal=$(this).val();

            var result1=comm-discount;
            var result2=comm*ratVal/100;
            $('.value-vat').val(result1);
            $('.total').val(result2);
            
            }
        });


    });
</script>
@endsection
