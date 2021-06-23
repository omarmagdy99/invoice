@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

@endsection
@section('title')
    الأقسام
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> الأقسام </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الاعدادات</span>
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
                                data-toggle="modal" href="#modaldemo8"> اضافة قسم</a>
                        </div>

                        <h4 class="card-title mg-b-0">الأقسام</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">إسم القسم </th>
                                    <th class="wd-20p border-bottom-0">الوصف</th>
                                    <th class="wd-15p border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($section as $sections)
                                    <?php $i++; ?>

                                    <tr>
                                        <td>
                                            <?php echo $i; ?>

                                        </td>


                                        <td>{{ $sections->sectionName }}</td>
                                        <td>{{ $sections->description }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-4">

                                                    <button class="btn btn-primary">
                                                        <i class="far fa-eye fa-lg "></i>
                                                    </button>
                                                </div>
                                                <div class="col-4">
                                                    <a class="modal-effect btn btn-danger btn-block "
                                                        data-effect="effect-slide-in-bottom" data-toggle="modal"
                                                        href="#modaldemo3" data-id="{{ $sections->id }}"
                                                        data-namesection="{{ $sections->sectionName }}">
                                                        <i class="far fa-trash-alt fa-lg"></i>
                                                    </a>
                                                </div>
                                                <div class="col-4">

                                                    <a class="modal-effect btn btn-warning btn-block "
                                                        data-effect="effect-slide-in-bottom" data-toggle="modal"
                                                        href="#modaldemo2" data-description="{{ $sections['description'] }}"
                                                        data-id="{{ $sections->id }}"
                                                        data-namesection="{{ $sections->sectionName }}">

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
                    <h6 class="modal-title"> اضافة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('sections.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="أسم القسم"
                                aria-label="Recipient's username" aria-describedby="basic-addon2" name="sectionName">
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
                    <h6 class="modal-title"> تعديل القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="sections/update" method="post" autocomplete="off">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" id="id" name="id">
                            <input type="text" class="form-control" placeholder="أسم القسم"
                                aria-label="Recipient's username" aria-describedby="basic-addon2" name="sectionName"
                                id="sectionName">
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
                    <h6 class="modal-title text-white">هل انت متأكد من حذف القسم</h6><button aria-label="Close"
                        class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="sections/destroy" method="post" autocomplete="off">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" id="id" name="id">
                            <input type="text" class="form-control " placeholder="أسم القسم"
                                aria-label="Recipient's username" aria-describedby="basic-addon2" name="sectionName"
                                id="sectionName" disabled>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">أسم القسم</span>
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

    <script>
        $('#modaldemo2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var description = button.data('description')
            var sectionName = button.data('namesection')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #sectionName').val(sectionName);
            modal.find('.modal-body #description').val(description);
            // alert(sectionName);
        })

    </script>
    <script>
        $('#modaldemo3').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var sectionName = button.data('namesection')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #sectionName').val(sectionName);
            // alert(sectionName);
        })

    </script>

@endsection
