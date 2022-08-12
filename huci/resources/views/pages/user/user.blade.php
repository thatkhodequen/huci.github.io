@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Nhân Viên</h5>
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
        <div class="table text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Username</th>
                        <th scope="col">Mức Lương</th>
                        <th scope="col">Chức Vụ</th>
                        <th scope="col">Quản Lý</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $key => $u)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{ number_format($u->luong, 0, ",", ",") . " đ"}}</td>
                        <td>Nhân viên</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('user.edit',[$u->id])}}"><i class="bx bx-edit-alt me-1"></i> Sửa</a>
                                    <form action="{{route('user.destroy',[$u->id])}}" method="POST">
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
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Thêm tài khoản</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('user.store')}}">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tên</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class='bx bx-user-voice'></i></span>
                            <input type="text" name="name" class="form-control" id="basic-icon-default-fullname" placeholder="Nguyễn Văn A" aria-describedby="basic-icon-default-fullname2" />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tên đăng nhập</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" name="email" class="form-control" id="basic-icon-default-fullname" placeholder="test" aria-describedby="basic-icon-default-fullname2" />
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
                            <input type="text" name="luong" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="1000000" aria-describedby="basic-icon-default-phone2" />
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
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection