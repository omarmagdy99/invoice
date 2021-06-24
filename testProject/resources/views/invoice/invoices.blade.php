@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الفواتير
                    المدفوعة</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('title')
    الفواتير
@endsection
@section('content')

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            @if (session('add'))
                <div class="alert alert-success" role="alert">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong> خبر جيد </strong> {{ session('add') }}
                </div>
            @endif
           
            @if (session('update'))
                <div class="alert alert-success" role="alert">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong> خبر جيد </strong> {{ session('update') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header pb-0">
                    <a class="btn btn-primary mb-4 text-white" href="invoices/create">اضافة فاتورة</a>
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">الفواتير المدفوعة</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">رقم الفاتورة </th>
                                    <th class="wd-20p border-bottom-0">تاريخ الفاتورة</th>
                                    <th class="wd-15p border-bottom-0">تاريخ اللإستحقاق</th>
                                    <th class="wd-10p border-bottom-0">المنتج</th>
                                    <th class="wd-25p border-bottom-0">القسم</th>
                                    <th class="wd-25p border-bottom-0">الخصم</th>
                                    <th class="wd-25p border-bottom-0">نسبة الضريبة</th>
                                    <th class="wd-25p border-bottom-0">قيمة الضريبة</th>
                                    <th class="wd-25p border-bottom-0">الإجمالي</th>
                                    <th class="wd-25p border-bottom-0">الحالة</th>
                                    <th class="wd-25p border-bottom-0">الملاحظة</th>
                                    <th class="wd-25p border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($allInvoice as $ivoice)
                                    <tr>
                                        <?php $i++; ?>
                                        <td><?php echo $i; ?></td>

                                        <td>{{ $ivoice->invoice_number }}</td>
                                        <td>{{ $ivoice->invoice_Date }}</td>
                                        <td>{{ $ivoice->Due_date }}</td>
                                        <td>{{ $ivoice->product }}</td>
                                        <td><a
                                                href="/InvoiceDetails/{{ $ivoice->invoice_number }}">{{ $ivoice->Section->sectionName }}</a>
                                        </td>
                                        <td>{{ $ivoice->Discount }}</td>
                                        <td>{{ $ivoice->amount_collection }}</td>
                                        <td>{{ $ivoice->amount_commission }}</td>
                                        <td>{{ $ivoice->Total }}</td>
                                        @if ($ivoice->Value_Status == 2)
                                            <td class="text-danger">{{ $ivoice->Status }}</td>
                                        @endif
                                        @if ($ivoice->Value_Status == 1)
                                            <td class="text-success">{{ $ivoice->Status }}</td>
                                        @endif
                                        <td>{{ $ivoice->note }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-primary" data-toggle="dropdown"
                                                    id="dropdownMenuButton" type="button">العمليات <i
                                                        class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                    <a class="dropdown-item text-info"
                                                        href="{{ url('updateInvoice') }}/{{ $ivoice->id }}"><i
                                                            class="fas fa-pencil-ruler"></i> تعديل</a>


                                                    <a class="modal-effect dropdown-item text-danger btnDel"
                                                        data-effect="effect-slide-in-bottom" data-toggle="modal"
                                                        href="#modaldemo3" data-number="{{ $ivoice->invoice_number }}"
                                                        data-id="{{ $ivoice->id }}"><i class="fas fa-trash"></i> حذف</a>
                                                </div>
                                            </div>
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
    <!-- /row -->
    </div>
    <!-- Modal delete -->
    <div class="modal" id="modaldemo3">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header  ">
                    <h6 class="modal-title text-danger">هل انت متأكد من حذف الفاتورة</h6><button aria-label="Close"
                        class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="invoices/destroy" method="post" autocomplete="off">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" id="d-id" name="id">
                            <input type="text" class="form-control " placeholder="رقم الفاتورة"
                                aria-label="Recipient's username" aria-describedby="basic-addon2" name="invoiceNumber"
                                id="d-invoice" disabled>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">رقم الفاتورة</span>
                            </div>
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
    <!-- Container closed -->

    </div>
    <!-- main-content closed -->

@endsection
@section('js')
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
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

    <script>
        $('.btnDel').on('click', function() {

            $id = $(this).data('id');

            $invoiceNumber = $(this).data('number');
            $('#d-invoice').val($invoiceNumber);
            $('#d-id').val($id);
        });
    </script>
     @if (session('delete'))
     <script>
         notif({
             msg: " تم الحذف بنجاح <b>: نجح</b>",
             type: "success"
         });
     </script>
 @endif
@endsection
