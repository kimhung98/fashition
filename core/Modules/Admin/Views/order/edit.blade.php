@extends('Admin::layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Đơn hàng</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="active"><a href="{{ route('order.index') }}">Đơn hàng</a></li>
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
                            <strong class="card-title">Cập nhật</strong>
                        </div>
                        <div class="card-body">
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        {{ $err }}<br>
                                    @endforeach
                                </div>
                            @endif
                            @if(session('notification'))
                                <div class="alert alert-success">
                                    {{session('notification')}}
                                </div>
                            @endif
                            <form action="{{ route('order.update', $order->id) }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <input class="form-control" value="{{ $order->customer->name }}" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Tổng tiền</label>
                                    <input class="form-control" value="{{ $order->total }}" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Trạng Thái</label>
                                    <select class="form-control" name="status">
                                        @if($order->status == 1)
                                            <option value="{{ $order->status }}">Chờ xử lý</option>
                                            <option value="1">Hoàn thành</option>
                                            <option value="2">Hủy</option>
                                        @elseif($order->status == 2)
                                            <option value="{{ $order->status }}">Hoàn thành</option>
                                        @else
                                            <option value="{{ $order->status }}">Hủy</option>
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default">Cập nhật</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
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
        // $(document).ready(function() {
        //     $('#bootstrap-data-table').DataTable();
        // } );
    </script>
    <script>
        $(document).ready(function () {
            $("#changePassword").change(function () {
                if ($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                } else {
                    $(".password").attr('disabled', '');
                }
            });
        });
    </script>
@endsection
