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
                                <li><a href="{{ route('products.index') }}">Sản phẩm</a></li>
                                <li class="active">Chi tiết sản phẩm</li>
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
                            <strong class="card-title">{{ $product->name }}</strong>
                        </div>
                        <div class="card-body">
                            @if(session('notification'))
                                <div class="alert alert-success">
                                    {{ session('notification') }}
                                </div>
                            @endif
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                <tr align="center">
                                    <th>Thể loại</th>
                                    <th>Thương hiệu</th>
                                    <th>Hình ảnh</th>
                                    <th>Giá tiền</th>
                                    <th>Giảm giá</th>
                                    <th>Nổi Bật</th>
                                    <th>Mô tả ngắn</th>
                                    <th>Mô tả chi tiết</th>
                                    <th>Xóa</th>
                                    <th>Sửa</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="odd gradeX" align="center">
                                    <td>{{ $product->category->name }} {{ $product->category->category->name }}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>
                                        @foreach(explode(',', $product->images) as $image)
                                            <p><img src="image/product/{{ $image }}" width="100px" height="auto;"></p>
                                        @endforeach
                                    </td>
                                    <td>{{ number_format($product->price, 0) }}đ</td>
                                    <td>{{ number_format($product->price_sale, 0) }}đ</td>
                                    <td>
                                        @if($product->highlights == 0)
                                            {{ 'Không' }}
                                        @else
                                            {{ 'Có' }}
                                        @endif
                                    </td>
                                    <td>{{ $product->short_description }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td class="center"><a href="{{ route('products.destroy', $product->id) }}"><i
                                                class="fas fa-trash-alt"></i> Xóa</a></td>
                                    <td class="center"><a href="{{ route('products.edit', $product->id) }}"><i
                                                class="far fa-edit"></i> Sửa</a></td>
                                </tr>
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
            $('#example').dataTable({
                search: false,
                paging: false,
                searching: false,
                info: false
            });
        });
    </script>
@endsection
