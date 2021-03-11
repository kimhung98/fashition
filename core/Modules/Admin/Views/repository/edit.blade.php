@extends('Admin::layouts.app')
@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Sản phẩm</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="active">Sản phẩm</li>
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
                            <small>{{ $product->product_name }}</small>
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
                                    {{session('notification')}}
                                </div>
                            @endif
                            <form action="{{ route('products.update', $product->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Thể loại</label>
                                    <select class="form-control" name="category_id">
                                        <option value="{{ $product->category_id }}">{{ $product->category->name }}</option>
                                        @foreach($category as $category)
                                            <option
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Giới tính</label>
                                    <select class="form-control" name="gender_id">
                                        <option value="{{ $product->gender_id }}">{{ $product->gender->name }}</option>
                                        @foreach($gender as $gender)
                                            <option
                                                value="{{ $gender->id }}">{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nhãn hiệu</label>
                                    <select class="form-control" name="brand_id">
                                        <option value="{{ $product->brand_id }}">{{ $product->brand->name }}</option>
                                        @foreach($brand as $brand)
                                            <option
                                                value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input class="form-control" name="name" value="{{ $product->name }}"
                                           placeholder="Nhập tên sản phẩm..."/>
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <p>
                                        <img src="img/product/{{ $product->image }}" width="150px;" height="auto">
                                        <input type="file" name="image" class="form-control">
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>Giá tiền</label>
                                    <input class="form-control" name="price" value="{{ $product->price }}"
                                           placeholder="Nhập giá tiền sản phẩm..."/>
                                </div>
                                <div class="form-group">
                                    <label>Giảm giá</label>
                                    <input class="form-control" name="price_sale" value="{{ $product->price_sale }}"
                                           placeholder="Nhập số tiền giảm giá sản phẩm..."/>
                                </div>
                                <div class="form-group">
                                    <label>Nổi bật</label>
                                    <label class="radio-inline">
                                        <input name="highlights"
                                               @if($product->highlights == 0)
                                               {{"checked"}}
                                               @endif
                                               value="0" type="radio">Không
                                    </label>
                                    <label class="radio-inline">
                                        <input name="highlights"
                                               @if($product->highlights == 1)
                                               {{"checked"}}
                                               @endif
                                               value="1" type="radio">Có
                                    </label>
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
