@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Elements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Tabs</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
            </div>
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary">14 Aug 2019</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                        id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate"
                        data-x-placement="bottom-end">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
@if($errors->any())
@foreach ($errors->all() as $item)
    
@endforeach
<div class="alert alert-danger" role="alert">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
       <span aria-hidden="true">&times;</span>
  </button>
    <strong> error </strong> {{$item}}
</div>
@endif
@if(session('add'))
<div class="alert alert-success" role="alert">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
       <span aria-hidden="true">&times;</span>
  </button>
    <strong> خبر جيد  </strong> {{session('add')}}
</div>
@endif
@if(session('delete'))
<div class="alert alert-danger" role="alert">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
       <span aria-hidden="true">&times;</span>
  </button>
    <strong> خبر جيد  </strong> {{session('delete')}}
</div>
@endif

    <!-- row opened -->
    <div class="row row-sm bg-white ">
        <!-- /row -->
        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Basic Style2 Tabs
                    </div>
                    <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">تفاصيل الفواتير
                                                </a></li>
                                            <li><a href="#tab5" class="nav-link" data-toggle="tab">حالة الفاتورة</a></li>
                                            <li><a href="#tab6" class="nav-link" data-toggle="tab">مرفقات الفاتورة</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab4">
                                            <div class="card">

                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table text-md-nowrap" id="example1">

                                                            <tbody>
                                                                <tr>
                                                                    <th class="alert-dark">رقم الفاتورة</th>
                                                                    <td>{{ $invoice->invoice_number }}</td>
                                                                    <th class="alert-dark">تاريخ الفاتورة</th>
                                                                    <td>{{ $invoice->invoice_Date }}</td>

                                                                </tr>
                                                                <tr>
                                                                    <th class="alert-dark">تاريخ اللإستحقاق</th>
                                                                    <td>{{ $invoice->Due_date }}</td>
                                                                    <th class="alert-dark">القسم</th>
                                                                    <td>{{ $invoice->Section->sectionName }}</td>

                                                                </tr>
                                                                <tr>
                                                                    <th class="alert-dark">الخصم</th>
                                                                    <td>{{ $invoice->Discount }}</td>
                                                                    <th class="alert-dark">نسبة الضريبة</th>
                                                                    <td>{{ $invoice->amount_commission }}</td>

                                                                </tr>
                                                                <tr>
                                                                    <th class="alert-dark">قيمة الضريبة</th>
                                                                    <td>{{ $invoice->amount_collection }}</td>
                                                                    <th class="alert-dark">الإجمالي</th>

                                                                    <td>{{ $invoice->Total }}</td>

                                                                </tr>
                                                                <tr>
                                                                    @if ($invoice->Value_Status == 2)
                                                                        <th class="alert-dark">الحالة</th>
                                                                        <td class="text-danger">{{ $invoice->Status }}</td>
                                                                    @endif
                                                                    @if ($invoice->Value_Status == 1)
                                                                        <th class="alert-dark">الحالة</th>
                                                                        <td class="text-success">{{ $invoice->Status }}
                                                                        </td>
                                                                    @endif
                                                                    <th class="alert-dark">المنتج</th>
                                                                    <td>{{ $invoice->product }}</td>

                                                                </tr>
                                                                <tr>
                                                                    <th class="alert-dark">الملاحظة</th>
                                                                    <td>{{ $invoice->note }}</td>


                                                                </tr>


                                                            </tbody>
                                                        </table>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab5">
                                            
                            
                            
                                            <table class="table text-md-nowrap" id="example1">

                                                <tbody>
                                                    @foreach ($details as $item)
                                                        <tr>
                                                            @if ($invoice->Value_Status == 2)
                                                                <th class="alert-dark">الحالة</th>
                                                                <td class="text-danger">{{ $item->Status }}</td>
                                                            @endif
                                                            @if ($invoice->Value_Status == 1)
                                                                <th class="alert-dark">الحالة</th>
                                                                <td class="text-success">{{ $item->Status }}</td>
                                                            @endif
                                                            <th class="alert-dark">الملاحظة</th>
                                                            <td class="">{{ $item->note }}</td>

                                                        </tr>
                                                        <tr>
                                                            <th class="alert-dark">منشئ الفاتورة</th>
                                                            <td class="">{{ $item->user }}</td>
                                                            <th class="alert-dark">تاريخ انشاء الفاتورة</th>
                                                            <td class="">{{ $item->created_at }}</td>

                                                        </tr>

                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab6">
                                            <form action="{{route('store_file')}}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="col-12 mt-4 ">
                                                    <input type="file" class="dropify" data-height="100" accept="image/x-png,image/gif,image/jpeg" name="pic"/>
                                                    <input type="hidden" name="invoice_number" value="{{ $invoice->invoice_number }}">
                                                    <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                                                    <br> <button type="submit" class="btn btn-info mb-2">اضافة مرفق</button><br>
                                                </div>
                                            </form>
                                            <table class="table text-md-nowrap" id="example1">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-5p border-bottom-0">#</th>
                                                        <th class="wd-25p border-bottom-0">أسم المرفق </th>
                                                        <th class="wd-50p border-bottom-0">العميات</th>
                                                     
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=0;?>
                                                    @foreach ($attachment as $attach)
                                                    <tr>
                                                        <?php $i++;?>
                                                        <td>
                                                            <?php echo $i;?>
                                                        </td>
                                                        <td>{{$attach->file_name}}</td>
                                                        <td>
                                                            <a href="/InvoiceFile/{{$attach->invoice_number}}/{{$attach->file_name}}" target="_blank" class="btn btn-success-gradient ">عرض</a>
                                                            <a href="/InvoiceFileDownload/{{$attach->invoice_number}}/{{$attach->file_name}}"  class="btn btn-info-gradient ">تحميل</a>
                                                            <a  data-effect="effect-slide-in-bottom" data-toggle="modal"
                                                            href="#modaldemo8" class="btn btn-danger-gradient btn_delete" data-invoice_number="{{$attach->invoice_number}}" data-file_name="{{$attach->file_name}}" data-id="{{$attach->id}}">مسح</a>
                                                        </td>
                                                    </tr>
                                                        @endforeach
                                                        
                                                </tbody>
                                            </table>
                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!---Prism Pre code-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /div -->


    </div>
    </div>

    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
        <!-- Modal delete -->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header bg-danger ">
                        <h6 class="modal-title text-white">هل انت متأكد من حذف المرفق</h6><button aria-label="Close"
                            class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{route('delete_file')}}" method="post" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="input-group mb-3">
                          <p>  هل انت متأكد من حذف المرفق؟</p>
                                <input type="hidden" id="d-id" name="id">
                                <input type="hidden" id="d-file" name="file_name">
                                <input type="hidden" id="d-number" name="invoice_number">
                                
                              
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">حذف</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal delete-->
    
    
@endsection

@section('js')
<script>
    $('.btn_delete').click(function(){
        $id=$(this).data('id');
        $file_name=$(this).data('file_name');
        $invoice_number=$(this).data('invoice_number');
        $('#d-id').val($id);
        $('#d-file').val($file_name);
        $('#d-number').val($invoice_number);

    })
</script>
<!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
        <!-- Internal Modal js-->
        <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

@endsection
