@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li><i class="far fa-times-circle me-2"></i>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-body">
            @if (session('success'))
            <div class=" alert alert-success" role="alert">
                <i class="far fa-check-circle me-2"></i>
                {{session('success')}}
            </div>
            @endif
            <div class="row">
                <h5 class="col card-title">
                    CHỈNH SỬA SẢN PHẨM: <strong class="text-warning">{{$sanpham->tensanpham}}</strong>
                </h5>

                <form method="POST" action="{{route('sanpham.update',[$sanpham->id])}}" class="mt-3">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-3 mt-2 mb-3">
                            <label for="nameBasic" class="form-label">Tên sản Phẩm</label>
                        </div>
                        <div class="col mb-3">
                            <input type="text" id="ten" value="{{$sanpham->tensanpham}}" name="tensanpham" class="form-control" placeholder="Nhập tên sản phẩm..." />
                        </div>

                    </div>
                    <div class="row g-2">
                        <div class="col-3 mt-2 mb-3">
                            <label for="nameBasic" class="form-label">Tên Viết gọn</label>
                        </div>
                        <div class="col mb-3">
                            <input type="text" value="{{$sanpham->tenvietgon}}" name="tenvg" id="tenvg" class="form-control" placeholder="Nhập tên viết gọn..." />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-3 mt-2 mb-3">
                            <label for="nameBasic" class="form-label">Trọng lượng</label>
                        </div>
                        <div class="col mb-3">
                            <input type="text" name="trongluong" value="{{$sanpham->trongluong}}" id="trongluong" class="form-control" placeholder="0" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-3 mt-2 mb-3">
                            <label for="nameBasic" class="form-label">Giá gốc</label>
                        </div>
                        <div class="col mb-3">
                            <input type="text" name="giagoc" value="{{$sanpham->giagoc}}" id="nameBasic" class="form-control" placeholder="399000" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-3 mt-2 ">
                            <label for="nameBasic" class="form-label">Giá sản phẩm</label>
                        </div>
                        <div class="col ">
                            <input type="text" name="giasp" value="{{$sanpham->giasanpham}}" id="nameBasic" class="form-control" placeholder="399000" />
                        </div>
                    </div>

                    <div class="modal-footer mt-2">
                        <a class="btn btn-secondary" href="{{route('sanpham.index')}}">Trở về</a>
                        <button type="submit" class="btn btn-primary">Sửa Sản Phẩm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection