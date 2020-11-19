@extends('admin.master')

@php($linkCreate = route('admin.products.create'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">{{ $title ?? 'Danh sách' }}</h5>
                    <div class="table-responsive">
                        <table id="myTable" class="mb-0 table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>Danh mục</th>
                                <th>Giá nhập</th>
                                <th>Giá bán</th>
                                <th>Giá sau khi sale</th>
                                <th>Số lượt xem</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><img alt="" src="{{ $item->cover }}" width="100px"></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ \App\Http\Controllers\Helper::categoryNameProduct()[$item->category] }}</td>
                                    <td>{{ number_format($item->cost) }}</td>
                                    <td>{{ number_format($item->price) }}</td>
                                    <td>{{ number_format($item->price_discount) }}</td>
                                    <td>{{ $item->views }}</td>
                                    <td>
                                        @if($item->is_active === 'on')
                                            <span class="badge badge-pill badge-primary">active</span>
                                        @endif
                                        @if($item->is_hot === 'on')
                                            <span class="badge badge-pill badge-danger">hot</span>
                                        @endif
                                        @if($item->is_top === 'on')
                                            <span class="badge badge-pill badge-warning">top</span>
                                        @endif
                                        @if($item->is_new === 'on')
                                            <span class="badge badge-pill badge-info">new</span>
                                        @endif
                                        @if($item->in_day === 'on')
                                            <span class="badge badge-pill badge-info">inDay</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.products.edit',  $item->id) }}"
                                           class="badge badge-pill badge-light" title="Cập nhật">
                                            <i class="pe-7s-tools text-primary font-icon"></i>
                                        </a>
                                        <a href="{{ route('admin.products.destroy',  $item->id) }}"
                                           onclick="event.preventDefault();
                                               if (confirm('Hãy chắc chắn trước khi xóa')) {
                                               document.getElementById('{{ "destroy-form-" . $item->id }}').submit();
                                               } "
                                           class="badge badge-pill badge-light">
                                            <i class="pe-7s-trash text-danger font-icon"></i>
                                        </a>
                                        <form id="{{ 'destroy-form-' . $item->id }}"
                                              action="{{ route('admin.products.destroy',  $item->id) }}"
                                              method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
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
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(function () {
            $('#myTable').DataTable();
        });
    </script>
@endsection
