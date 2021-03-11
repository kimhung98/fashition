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
                                @csrf
                                <div class="form-group">
                                    <label>Thể loại</label>
                                    <select class="form-control" name="category_id">
                                        <option value="">--- Chọn thể loại ---</option>
                                        @foreach($categories as $category)
                                            @if($category->parent != null)
                                                <option value="{{ $category->id }}"
                                                @if($category->id == $product->category_id)
                                                    {{ 'selected' }}
                                                    @endif>{{ $category->name }} {{ $category->category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Thương hiệu</label>
                                    <select class="form-control" name="brand_id">
                                        <option value="">--- Chọn thương hiệu ---</option>
                                        @foreach($brands as $brand)
                                            <option
                                                value="{{ $brand->id }}"
                                            @if($brand->id == $product->brand_id)
                                                {{ 'selected' }}
                                                @endif>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input class="form-control" name="name" placeholder="Nhập tên sản phẩm..."
                                           value="{{ $product->name }}"/>
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <p>
                                    @foreach(explode(',', $product->images) as $image)
                                        <img src="image/product/{{ $image }}" width="100px" height="auto;">
                                    @endforeach
                                    </p>
                                    <input type="file" name="images[]" class="form-control" multiple>
                                </div>
                                <div class="form-group">
                                    <label>Giá tiền</label>
                                    <input class="form-control" name="price"
                                           placeholder="Nhập giá tiền sản phẩm..." value="{{ $product->price }}"/>
                                </div>
                                <div class="form-group">
                                    <label>Giảm giá</label>
                                    <input class="form-control" name="price_sale" value="{{ $product->price_sale }}"
                                           placeholder="Nhập số tiền giảm giá sản phẩm..."/>
                                </div>
                                <div class="form-group">
                                    <label>Nổi bật</label>
                                    <label class="radio-inline">
                                        <input name="highlights" value="0" checked="" type="radio">Không
                                    </label>
                                    <label class="radio-inline">
                                        <input name="highlights" value="1" type="radio">Có
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea name="short_description" class="form-control ckeditor">{{ $product->short_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" class="form-control ckeditor">{{ $product->description }}</textarea>
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
