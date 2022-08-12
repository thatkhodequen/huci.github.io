@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Chỉnh sửa tài khoản: <strong style="color: #696cff">{{$user->name}}</strong></h5>
        </div>
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
            <form method="POST" action="{{route('user.update',[$user->id])}}">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tên</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class='bx bx-user-voice'></i></span>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control" id="basic-icon-default-fullname" placeholder="Nguyễn Văn A" aria-describedby="basic-icon-default-fullname2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tên đăng nhập</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" name="email" value="{{$user->email}}" class="form-control" id="basic-icon-default-fullname" placeholder="test" aria-describedby="basic-icon-default-fullname2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Mật khẩu</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i class='bx bx-lock-alt'></i></span>
                            <input type="text" name="pass" id="basic-icon-default-company" class="form-control" placeholder="123123" aria-describedby="basic-icon-default-company2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Mức lương</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"><i class='bx bx-wallet-alt'></i></span>
                            <input type="text" name="luong" value="{{$user->luong}}" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="1000000" aria-describedby="basic-icon-default-phone2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 form-label" for="selectTypeOpt">Chức vụ</label>
                    <div class="col-sm-10">
                        <select id="selectTypeOpt" class="form-select color-dropdown">
                            <option value="bg-primary" selected>Primary</option>
                            <option value="bg-secondary">Secondary</option>
                            <option value="bg-success">Success</option>
                            <option value="bg-danger">Danger</option>
                            <option value="bg-warning">Warning</option>
                            <option value="bg-info">Info</option>
                            <option value="bg-dark">Dark</option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a class="btn btn-secondary" href="{{route('user.index')}}">Trở về</a>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection