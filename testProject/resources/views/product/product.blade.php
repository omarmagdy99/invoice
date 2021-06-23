@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">

    <!-- Internal Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">

    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">


@endsection
@section('title')
    المنتجات
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> المنتجات </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    الاعدادات</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('add'))

        <div class="alert alert-success" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>

            <strong>{{ session()->get('add') }}</strong>
        </div>

    @endif
    @if (session()->has('edit'))

        <div class="alert alert-success" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>

            <strong>{{ session()->get('edit') }}</strong>
        </div>

    @endif
    @if (session()->has('delete'))

        <div class="alert alert-success" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>

            <strong>{{ session()->get('delete') }}</strong>
        </div>

    @endif
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-sm-6 col-md-4 col-xl-3">
                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                                data-toggle="modal" href="#modaldemo8"> اضافة منتج</a>
                        </div>

                        <h4 class="card-title mg-b-0">المنتجات</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">إسم المنتج </th>
                                    <th class="wd-15p border-bottom-0">إسم القسم </th>
                                    <th class="wd-20p border-bottom-0">الوصف</th>
                                    <th class="wd-15p border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- @foreach ($section as $sections)
                                    {{ $sections->sectionName }}

                                @endforeach --}}
                                <?php $i = 0; ?>
                                @foreach ($product as $products)
                                    <?php $i++; ?>

                                    <tr>
                                        <td>
                                            <?php echo $i; ?>

                                        </td>



                                        <td>{{ $products->productName }}</td>
                                        <td>{{ $products->Section->sectionName }} </td>
                                        <td>{{ $products->description }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <a class="modal-effect btn btn-danger btn-block "
                                                        data-effect="effect-slide-in-bottom" data-toggle="modal"
                                                        href="#modaldemo3" data-id="{{ $products->id }}"
                                                        data-productsection="{{ $products->productName }}">
                                                        <i class="far fa-trash-alt fa-lg"></i>
                                                    </a>
                                                </div>
                                                <div class="col-6">

                                                    <a class="modal-effect btn btn-warning btn-block "
                                                        data-effect="effect-slide-in-bottom" data-toggle="modal"
                                                        href="#modaldemo2" data-description="{{ $products->description }}"
                                                        data-id="{{ $products->id }}"
                                                        data-namesection="{{ $products->sectionId }}"
                                                        data-productsection="{{ $products->productName }}">

                                                        <i class="fas fa-pencil-ruler fa-lg"></i>
                                                    </a>
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
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    <!-- Modal 1 -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"> اضافة منتج</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('product.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="أسم المنتج"
                                aria-label="Recipient's username" aria-describedby="basic-addon2" name="productName">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">أسم المنتج</span>
                            </div>
                        </div>
                        
                        <div class="input-group mb-3">

                            <select name="sectionName" class="form-control ">
                                <option selected disabled>حدد القسم</option>
                                @foreach ($section as $sections)
                                    <option value="{{ $sections->id }}">{{ $sections->sectionName }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">أسم القسم</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="الوصف" aria-label="Recipient's username"
                                aria-describedby="basic-addon2" name="description">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">الوصف</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-primary" type="submit">اضافة</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal 1-->
    <!-- Modal edit -->
    <div class="modal" id="modaldemo2">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"> تعديل المنتج</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="product/update" method="post" autocomplete="off">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" id="id" name="id">
                            <input type="text" class="form-control" placeholder="أسم المنتج"
                                aria-label="Recipient's username" aria-describedby="basic-addon2" name="productName"
                                id="nameproduct">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">أسم المنتج</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <select name="sectionName" id="sectionName" class="form-control">

                                @foreach ($section as $sections)

                                    <option value="{{ $sections->id }}">{{ $sections->sectionName }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">أسم القسم</span>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="الوصف" aria-label="Recipient's username"
                                aria-describedby="basic-addon2" name="description" id="description">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">الوصف</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-primary" type="submit">تعديل</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal edit-->
    <!-- Modal delete -->
    <div class="modal" id="modaldemo3">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header bg-danger ">
                    <h6 class="modal-title text-white">هل انت متأكد من حذف المنتج</h6><button aria-label="Close"
                        class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="product/destroy" method="post" autocomplete="off">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" id="d-id" name="id">
                            <input type="text" class="form-control " placeholder="أسم المنتج"
                                aria-label="Recipient's username" aria-describedby="basic-addon2" name="productName"
                                id="d-product" disabled>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">أسم المنتج</span>
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
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>

    <script>
        $('#modaldemo2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var description = button.data('description')
            var sectionName = button.data('namesection')
            var productName = button.data('productsection')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #nameproduct').val(productName);
            modal.find('.modal-body #sectionName').val(sectionName);
            modal.find('.modal-body #description').val(description);
            // alert(sectionName);
        })
        $('#modaldemo3').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var productsection = button.data('productsection')
            var modal = $(this)
            modal.find('.modal-body #d-id').val(id);
            modal.find('.modal-body #d-product').val(productsection);

        })

    </script>

@endsection
