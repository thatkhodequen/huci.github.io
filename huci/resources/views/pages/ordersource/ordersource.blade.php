@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <h5 class="col card-title">
                    Nguồn Đơn Hàng
                </h5>
                <div class="col text-end">
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal"><i class='bx bx-plus-circle'></i> Thêm Nguồn Đơn</a>
                </div>
                <form action="{{route('nguondon.store')}}" method="POST">
                    @csrf
                    <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog model-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Thêm nguồn đơn</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-3 mt-2 mb-3">
                                            <label for="nameBasic" class="form-label">Tên Nguồn đơn</label>
                                        </div>
                                        <div class="col mb-3">
                                            <input type="text" id="ten" name="tennguondon" class="form-control" placeholder="Nhập tên kho hàng..." />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="mb-3 col-3 ">
                                            <label for="defaultSelect" class="form-label mt-2">Nhóm đơn hàng</label>

                                        </div>
                                        <div class="mb-3 col">
                                            <select name="nhomdon" id="defaultSelect" class="form-select">
                                                <option>Đơn công ty</option>
                                                <option  value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Thoát
                                    </button>
                                    <button type="submit" class="btn btn-primary">Thêm Nguồn Đơn</button>
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
                <h5 class="card-header">Tổng Nguồn Đơn</h5>
                <div class="table text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên nguồn đơn</th>
                                <th>Thuộc Nhóm</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach($nguondon as $key => $nd)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$nd->tennguondon}}</td>
                                <td>cong ty</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('nguondon.edit',[$nd->id])}}"><i class="bx bx-edit-alt me-1"></i> Sửa</a>
                                            <form action="{{route('nguondon.destroy',[$nd->id])}}" method="POST">
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