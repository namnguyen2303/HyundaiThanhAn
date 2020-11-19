@extends('admin.master')

@php($linkCreate = route('admin.collections.create'))

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
                                <th>Key</th>
                                <th>Link</th>
                                <th>Sắp xếp</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><img alt="" src="{{ $item->image }}" width="100px"></td>
                                    <td>{{ $item->key_collection }}</td>
                                    <td>{{ $item->link }}</td>
                                    <td>{{ $item->display_order }}</td>
                                    <td>
                                        @if($item->is_active === 'on')
                                            <span class="badge badge-pill badge-primary">active</span>
                                        @else
                                            <span class="badge badge-pill badge-alternate">non-active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.collections.edit',  $item->id) }}"
                                           class="badge badge-pill badge-light" title="Cập nhật">
                                            <i class="pe-7s-tools text-primary font-icon"></i>
                                        </a>
                                        <a href="{{ route('admin.collections.destroy',  $item->id) }}"
                                           onclick="event.preventDefault();
                                               if (confirm('Hãy chắc chắn trước khi xóa')) {
                                               document.getElementById('{{ "destroy-form-" . $item->id }}').submit();
                                               } "
                                           class="badge badge-pill badge-light" title="Cập nhật">
                                            <i class="pe-7s-trash text-danger font-icon"></i>
                                        </a>
                                        <form id="{{ 'destroy-form-' . $item->id }}"
                                              action="{{ route('admin.collections.destroy',  $item->id) }}"
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
