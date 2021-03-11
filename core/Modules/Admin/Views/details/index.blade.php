@extends('Admin::layouts.app')
@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Chi tiết sản phẩm</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li><a href="{{ route('product.index') }}">Sản phẩm</a></li>
                                <li class="active">Chi tiết</li>
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
                            <strong class="card-title">Danh sách</strong>
                            <div class="float-right">
                                <a href="{{ route('details.create', ['name' => $name, 'id' => $id]) }}" class="btn btn-primary">Thêm mới</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(session('notification'))
                                <div class="alert alert-success">
                                    {{ session('notification') }}
                                </div>
                            @endif
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Mô tả vắn tắt</th>
                                    <th>Mô tả</th>
                                    <th>Xóa</th>
                                    <th>Sửa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($details as $details)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{ $details->id }}</td>
                                        <td>{{ $details->product->name }}</td>
                                        <td>
                                            @foreach(explode(',', $details->image) as $value)
                                                <img src="img/details/{{ $value }}" width="100px"
                                                     height="auto;">
                                            @endforeach
                                        </td>
                                        <td>{{ $details->short_description }}</td>
                                        <td>{{ $details->description }}</td>
                                        <td class="center"><a
                                                href="{{ route('details.destroy', ['name' => $name, 'id' => $details->id]) }}"><i
                                                    class="fas fa-trash-alt"></i> Xóa</a></td>
                                        <td class="center"><a
                                                href="{{ route('details.edit', ['name' => $name, 'id' => $details->id]) }}"><i
                                                    class="far fa-edit"></i> Sửa</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
        });
    </script>
@endsection
