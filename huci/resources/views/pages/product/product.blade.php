@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <h5 class="col card-title">
                    SẢN PHẨM
                </h5>
                <div class="col text-end">
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal"><i class='bx bx-plus-circle'></i> Thêm sản phẩm</a>
                </div>
                <form action="{{route('sanpham.store')}}" method="POST">
                    @csrf
                    <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog model-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Thêm sản phẩm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-3 mt-2 mb-3">
                                            <label for="nameBasic" class="form-label">Tên sản Phẩm</label>
                                        </div>
                                        <div class="col mb-3">
                                            <input type="text" id="ten" name="tensanpham" class="form-control" placeholder="Nhập tên sản phẩm..." />
                                        </div>

                                    </div>
                                    <div class="row g-2">
                                        <div class="col-3 mt-2 mb-3">
                                            <label for="nameBasic" class="form-label">Tên Viết gọn</label>
                                        </div>
                                        <div class="col mb-3">
                                            <input type="text" name="tenvg" id="tenvg" class="form-control" placeholder="Nhập tên viết gọn..." />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-3 mt-2 mb-3">
                                            <label for="nameBasic" class="form-label">Trọng lượng</label>
                                        </div>
                                        <div class="col mb-3">
                                            <input type="text" name="trongluong" id="trongluong" class="form-control" placeholder="0" />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-3 mt-2 mb-3">
                                            <label for="nameBasic" class="form-label">Giá gốc</label>
                                        </div>
                                        <div class="col mb-3">
                                            <input type="text" name="giagoc" id="nameBasic" class="form-control" placeholder="399000" />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-3 mt-2 ">
                                            <label for="nameBasic" class="form-label">Giá sản phẩm</label>
                                        </div>
                                        <div class="col ">
                                            <input type="text" name="giasp" id="nameBasic" class="form-control" placeholder="399000" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Thoát
                                    </button>
                                    <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><i class="far fa-times-circle me-2"></i>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('success'))
            <div class=" alert alert-success" role="alert">
                <i class="far fa-check-circle me-2"></i>
                {{session('success')}}
            </div>
            @endif
            <div class="row">
                <h5 class="card-header">Tổng Sản Phẩm</h5>
                <div class="table text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Tên viết gọn</th>
                                <th>Trọng lượng</th>
                                <th>Giá gốc</th>
                                <th>Giá sản phẩm</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach($sanpham as $key => $sp)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$sp->tensanpham}}</td>
                                <td>{{$sp->tenvietgon}}</td>
                                <td>{{$sp->trongluong . " g"}}</td>
                                <td>{{ number_format($sp->giagoc, 0, ",", ",") . " đ"}}</td>
                                <td>{{ number_format($sp->giasanpham, 0, ",", ",") . " đ"}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('sanpham.edit',[$sp->id])}}"><i class="bx bx-edit-alt me-1"></i> Sửa</a>
                                            <form action="{{route('sanpham.destroy',[$sp->id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="dropdown-item" onclick="return confirm('bạn có chắc chắn xóa nó?')"><i class="bx bx-trash me-1"></i> Xóa
                                                </button>
                                            </form>
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
@endsection