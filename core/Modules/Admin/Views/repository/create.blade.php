@extends('Admin::layouts.app')
@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Kho</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="active">Kho</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Thêm mới</strong>
                        </div>
                        <div class="card-body">
                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        {{ $err }}<br>
                                    @endforeach
                                </div>
                            @endif
                            @if(session('notification'))
                                <div class="alert alert-success">
                                    {{ session('notification') }}
                                </div>
                            @endif
                            <form action="{{ route('repositories.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Sản phẩm</label>
                                    <select class="form-control" name="product_id" id="product_id">
                                        <option value="">--- Chọn sản phẩm ---</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Size</label>
                                    <select class="form-control" name="size_id" id="size">
                                        <option value="">--- Chọn size ---</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Màu</label>
                                    <select class="form-control" name="color_id">
                                        <option value="">--- Chọn màu ---</option>
                                        @foreach($colors as $color)
                                            <option
                                                value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input class="form-control" name="quantity"
                                           placeholder="Nhập số lượng sản phẩm..."/>
                                </div>
                                <button type="submit" class="btn btn-default">Thêm mới</button>
                                <button type="reset" class="btn btn-default">làm mới</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

@endsection

@section('script')
    <script src="admin/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="admin/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="admin/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="admin/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="admin/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="admin/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="admin/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="admin/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="admin/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="admin/assets/js/init/datatables-init.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#bootstrap-data-table').DataTable();

            $("#product_id").change(function () {
                var product_id = $(this).val();
                $.get('admin/repositories/' + product_id, function (data) {
                    $("#size").html(data);
                });
            });
        });
    </script>
@endsection
