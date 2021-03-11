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
                                <li class="active">
                                    <a href="{{ route('details.index', ['name' => $name, 'id' => $details->product_id]) }}">Chi tiết</a>
                                </li>
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
                            <strong class="card-title">Sửa</strong>
                            <small>{{ $details->product->name }}</small>
                        </div>
                        <div class="card-body">
                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                                </div>
                            @endif
                            @if(session('notification'))
                                <div class="alert alert-success">
                                    {{ session('notification') }}
                                </div>
                            @endif
                            <form action="{{ route('details.update', ['name' => $name, 'id' => $id]) }}" method="POST"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" value="{{ $details->product->name }}" class="form-control"
                                           readonly>
                                    <input type="hidden" name="product_id" value="{{ $details->product_id }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <p style="display: flex;">
                                        @foreach(explode(',', $details->image) as $value)
                                            <img src="img/details/{{ $value }}" width="150px;"
                                                 height="auto" style="margin-right: 5px;">
                                        @endforeach
                                    </p>
                                    <input type="file" name="image[]" class="form-control" multiple>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="short_description" id="demo" class="form-control ckeditor"
                                              rows="8">{{ $details->short_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" id="demo" class="form-control ckeditor"
                                              rows="8">{{ $details->description }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-default">Sửa</button>
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
    <script>
        $(document).ready(function () {
            $('#bootstrap-data-table').DataTable();
            $("#TheLoai").change(function () {
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaisp/" + idTheLoai, function (data) {
                    $("#LoaiSp").html(data);
                });
            });
        });
    </script>

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
@endsection
