@extends('layouts.app')

@section('content')

<section>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col col-md-4 col-sm-12">
                <div class="card">
                    <div class="row card-header fw-bold " style="padding-bottom: 0.5rem; padding-top: 1rem">ĐƠN HÀNG</div>
                    <div class="row card-body">
                        <div class="col">
                            <div class="row">
                                <div class="col text-center">
                                    <div class="fw-bold fs-4">{{$sodhchuacheck}}</div>
                                    <small class="text-muted fs-10">Chưa Check</small>
                                </div>
                                <div class="col text-center">
                                    <div class="fw-bold fs-4">{{$sodhcheck}}</div>
                                    <small class=" text-muted fs-10">Đã Check</small>
                                </div>
                            </div>
                            <div class="mt-1 row border-top ">
                                <div class="col-3 text-center text-white shadow bg-primary rounded mt-2">
                                    <i class='fs-2 bx bx-package' style="margin-top: 0.40em;"></i>
                                </div>
                                <div class="col mt-2 ms-1">
                                    <small class=" text-muted fs-100">TỔNG ĐƠN HÀNG</small>
                                    <div class="fw-bold fs-4">{{$sodh}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div id="profileReportChart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-md-4 col-sm-12">
                <div class="card">
                    <div class="" style="min-height: 100px;">
                        <div id="mychart" class=""></div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mt-1 row border-top ">
                            <div class="col-2 text-center text-white shadow bg-primary rounded mt-2">
                                <i class='fs-2 bx bx-dollar' style="margin-top: 0.40em;"></i>
                            </div>
                            <div class="col mt-2 ms-1">
                                <small class=" text-muted fs-100">DOANH THU</small>
                                <div class="fw-bold fs-4">{{ number_format($tien, 0, ",", ",")}} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="mt-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                    <i class='bx bx-plus-circle'></i> Thêm Đơn Hàng
                </button>
                <form action="{{route('order.store')}} " enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Thêm Đơn Hàng</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div class="form-check ">
                                                <input class="form-check-input" name="tuship" type="checkbox" value="1" id="defaultCheck1" />
                                                <label class="form-check-label" for="defaultCheck1">Đơn <strong class="text-danger">Tự Ship/Nhờ Gửi Hộ</strong> </label>
                                            </div>
                                        </div>
                                        <div class="col mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" name="si" type="checkbox" value="S" id="defaultCheck1" />
                                                <label class="form-check-label" for="defaultCheck1"> Đơn <strong class="text-danger">Hàng Sỉ</strong> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="mb-3 col-3">
                                            <label for="defaultSelect" class="form-label mt-2">Chia đôi chiết khấu</label>
                                        </div>
                                        <div class="mb-3 col">
                                            <select id="defaultSelect" name="chiachietkhau" class="form-select">
                                                <option value="">Không</option>
                                                @foreach ($user as $key => $u)
                                                <option value="{{$u->id}}">{{$u->email}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="mb-3 col-3 ">
                                            <label for="defaultSelect" class="form-label mt-2">Nguồn Đơn Hàng <strong class="text-danger">*</strong></label>

                                        </div>
                                        <div class="mb-3 col">
                                            <select id="defaultSelect" name="nguondon" class="form-select">
                                                <option value="">--Chọn nguồn đơn hàng--</option>
                                                @foreach ($nguondon as $key => $nd)
                                                <option value="{{$nd->id}}">{{$nd->tennguondon}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-3 mb-3">
                                            <label for="nameBasic" class="form-label mt-2">Họ & Tên Khách <strong class="text-danger">*</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <input type="text" id="hotenkhach" name="hotenkhach" class="form-control" placeholder="Nhập tên khách hàng..." required autocomplete="hotenkhach" autofocus />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-3 mb-3">
                                            <label for="nameBasic" class="form-label mt-2">Số Điện Thoại <strong class="text-danger">*</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <input type="text" id="nameBasic" name="sdt" class="form-control" placeholder="Nhập số điện thoại..." required pattern="(\+84|0)\d{9,10}" title="Nhập số điện thoại 10 số và bắt đầu từ 0 hoặc +84" autocomplete="sdt" autofocus />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-3 mb-3">
                                            <label for="nameBasic" class="form-label mt-2">Tình Trạng Da </label>
                                        </div>
                                        <div class="col mb-3">
                                            <input type="text" id="" name="tinhtrang" class="form-control" placeholder="Sẹo rổ, mụn, thâm" />
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-3 mb-3">
                                            <label for="nameBasic" class="form-label mt-2">Địa chỉ <strong class="text-danger">*</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <input type="text" id="nameBasic" name="diachi" class="form-control" placeholder="số nhà, tên đường" required autocomplete="diachi" autofocus />
                                            <div class="row mt-2">
                                                <div class="col-4">
                                                    <select id="tinh" name="tinh" class="form-select choose tinh">
                                                        <option value="">Chọn tỉnh</option>
                                                        @foreach ($tinh as $key => $t)
                                                        <option value="{{$t->matp}}">{{$t->name_tinh}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <select id="huyen" name="huyen" class="form-select choose huyen">
                                                        <option>Huyện</option>
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <select id="xa" name="xa" class="form-select xa">
                                                        <option>Xã</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-3 mb-3">
                                            <label for="nameBasic" class="form-label mt-2">Ghi chú bưu điện </label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea class="form-control" id="tinht" name="ghichubd" placeholder="Ghi chú cho nhân viên tư vấn, đóng hàng, check hàng..."></textarea>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-3 mb-3">
                                            <label for="nameBasic" class="form-label mt-2">Ghi chú công ty </label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="ghichuct" class="form-control" id="" rows="3" placeholder="Ghi chú cho nhân viên tư vấn, đóng hàng, check hàng..."></textarea>
                                        </div>
                                    </div>
                                    <div class="row g-2 mt-1">
                                        <div class="row">
                                            <label for="nameBasic" class="form-label ">Chọn sản phẩm </label>
                                        </div>
                                        <div class="row">
                                            @foreach ($sanpham as $key => $sp)
                                            <div class="col-4 mt-2">
                                                <label for="nameBasic" class="form-label fw-bold fs-15">{{$sp->tensanpham}}</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="soluong[{{$sp->id}}]" placeholder="0" min="0" />
                                                    <span class="input-group-text fw-bold">{{$sp->giasanpham}}</span>
                                                    <input type="hidden" name="idsp[{{$sp->id}}]" value="{{$sp->id}}" />
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="row g-2 mt-2">
                                        <div class="mb-3 col-3 ">
                                            <label for="defaultSelect" class="form-label mt-2">Cộng tác viên</label>

                                        </div>
                                        <div class="mb-3 col">
                                            <select id="defaultSelect" class="form-select">
                                                <option>Đơn công ty</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-3 mb-3">
                                            <label for="nameBasic" class="form-label mt-2 text-danger">Thành tiền đơn hàng </label>
                                        </div>
                                        <div class="col mb-3">
                                            <input type="text" id="" name="thanhtien" class="currency form-control border-danger" placeholder="0" />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-3 mb-3">
                                            <label for="nameBasic" class="form-label mt-2 text-warning">Tiền khách chuyển khoản </label>
                                        </div>
                                        <div class="col mb-3">
                                            <input type="text" name="tienchuyen" id="" class="currency form-control border-warning" placeholder="0" />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="mb-3 col-3 ">
                                            <label for="defaultSelect" class="form-label mt-2">Thu tiền ship của khách <strong class="text-danger">*</strong></label>

                                        </div>
                                        <div class="mb-3 col">
                                            <select id="defaultSelect" name="phiship" class="form-select">
                                                @foreach ($phiship as $key => $ps)
                                                <option value="{{$ps->id}}">{{$ps->tenphiship}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="mb-3 col-3 ">
                                            <label for="defaultSelect" class="form-label mt-2">Ngày gửi <strong class="text-danger">*</strong></label>

                                        </div>
                                        <div class="mb-3 col">
                                            <input class="form-control" type="date" name="ngaygui" value="2021-06-18" id="html5-date-input" />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="mb-3 col-3 ">
                                            <label for="defaultSelect" class="form-label mt-2">Tình trạng đơn hàng <strong class="text-danger">*</strong></label>

                                        </div>
                                        <div class="mb-3 col">
                                            <select id="defaultSelect" name="trangthai" class="form-select">
                                                @foreach ($tinhtrang as $key => $tt)
                                                <option value="{{$tt->id}}">{{$tt->tentinhtrang}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="mb-3 col-3 ">
                                            <label for="defaultSelect" class="form-label mt-2">Nhập đơn hàng cho</label>

                                        </div>
                                        <div class="mb-3 col">
                                            <select id="defaultSelect" name="nhapdonhang" class="form-select">
                                                @foreach ($user as $key => $u)
                                                <option value="{{$u->id}}">{{$u->email}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="tiencuoc" value="0">
                                <input type="hidden" name="check" value="0">

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Thoát
                                    </button>
                                    <button type="submit" class="btn btn-primary">Tạo đơn hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="mx-5">
        <div class="row mt-4">
            <div class="col">
                <h5 class="">Đơn Hôm Nay 17/06/2022 <strong class="text-danger">(Chưa Liên Hệ Khách)</strong></h5>
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">
                                <i class='bx bx-notepad'></i> Đơn Thường
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false">
                                <i class='bx bxl-tiktok'></i> Đơn Tiktok
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-messages" aria-controls="navs-top-messages" aria-selected="false">
                                <i class='bx bxl-facebook-square'></i> Đơn Facebook
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                            <table class="table table-hover table-sm ">
                                <thead>
                                    <tr>
                                        <th class="text-center">Mã vận đơn</th>
                                        <th>Thông tin khách</th>
                                        <th>Sản phẩm</th>
                                        <th>Thành tiền</th>
                                        <th>Tiền cước</th>
                                        <th width="250px">Ghi chú</th>
                                        <th>Note gọi</th>
                                        <th>Nguồn đơn</th>
                                        <th>Thông tin đơn</th>
                                        <th class="text-center">Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($donhang_cc as $key => $dh)
                                    @csrf
                                    <tr>
                                        <td class="text-center">
                                            <div>{{$dh->si}}{{$dh->id}}</div>
                                            <button class="btn btn-secondary p-2" onclick="copymau()"><i class='text-center bx bx-copy-alt'></i></button>
                                        </td>
                                        <td>
                                            <div>{{$dh->hotenkhach}}</div>
                                            <div>{{$dh->sdt}}</div>
                                        </td>
                                        <td width="120px">
                                            @foreach ($dh->sanpham as $key => $sp)
                                            <div>{{$sp->pivot->soluong}} {{$sp->tenvietgon}}</div>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if ($dh->thanhtien >= $dh->chuyenkhoan)
                                            <div>{{ number_format($dh->thanhtien, 0, ",", ",")}}</div>
                                            @else
                                            <div class="text-danger fst-italic">{{ number_format($dh->chuyenkhoan, 0, ",", ",")}}</div>
                                            @endif
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="fst-italic">
                                            @if (empty($dh->nguondon->tennguondon))
                                            <div></div>
                                            @else
                                            @if($dh->nguondon->id == 8)
                                            <div class="text-info">{{$dh->nguondon->tennguondon}}</div>
                                            @else
                                            <div>{{$dh->nguondon->tennguondon}}</div>
                                            @endif
                                            @endif
                                        </td>
                                        <td>
                                            <div class="text-primary">{{$dh->user1->name}}</div>
                                            <div>{{ \Carbon\Carbon::parse($dh->ngaynhap)->format('H:i | d-m-Y')}}</div>
                                            <div style="width: fit-content;" class="text-white bg-{{$dh->tinhtrang->mau}} px-2 rounded">{{$dh->tinhtrang->tentinhtrang}}</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">

                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <meta name="_token" content="{{ csrf_token() }}">
                                                    <form action="{{url('lien-he/' .$dh->id)}}" method="POST">
                                                        @csrf
                                                        <button class="dropdown-item"><i class='bx bx-phone me-1'></i> Liên hệ
                                                        </button>
                                                    </form>
                                                    <a id="editorder" data-link="{{route('order.edit',[$dh->id])}}" value="{{$dh->id}}" class="dropdown-item btn"><i class="bx bx-edit-alt me-1"></i> Sửa </a>
                                                    <form action="" method="POST">

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

                        <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Mã vận đơn</th>
                                        <th>Thông tin khách</th>
                                        <th>Sản phẩm</th>
                                        <th>Thành tiền</th>
                                        <th>Tiền cước</th>
                                        <th width="250px">Ghi chú</th>
                                        <th>Note gọi</th>
                                        <th>Nhân viên</th>
                                        <th>Nguồn đơn</th>
                                        <th>Giờ nhập</th>
                                        <th>Trạng thái</th>
                                        <th>Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0 " id="don-tiktok">
                                    <tr>
                                        <td>Mã Đơn: L1693</td>
                                        <td>Tran ngoc gia kim <br> 0908974234</td>
                                        <td>2 Tinh Chất Huci 30 <br> 2 Mask Tơ Tằm</td>
                                        <td></td>
                                        <td></td>
                                        <td>An</td>
                                        <td>Đơn khách cũ</td>
                                        <td>14:46 - 03/06/2022</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Mã vận đơn</th>
                                        <th>Thông tin khách</th>
                                        <th>Sản phẩm</th>
                                        <th>Thành tiền</th>
                                        <th>Note gọi</th>
                                        <th>Nhân viên</th>
                                        <th>Nguồn đơn</th>
                                        <th>Giờ nhập</th>
                                        <th>Trạng thái</th>
                                        <th>Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>Mã Đơn: L1693</td>
                                        <td>Tran ngoc gia kim <br> 0908974234</td>
                                        <td>2 Tinh Chất Huci 30 <br> 2 Mask Tơ Tằm</td>
                                        <td>499,000</td>
                                        <td>112132</td>
                                        <td>An</td>
                                        <td>Đơn khách cũ</td>
                                        <td>14:46 - 03/06/2022</td>
                                        <td>Chưa gửi</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="mx-5">
        <div class="row mt-3">
            <div class="col">
                <h5 class="">Đơn Hôm Nay 17/06/2022 <strong class="text-success">(Đã Liên Hệ Khách)</strong></h5>
                <div class="card">
                    <div class="m-3">
                        <table class="table table-sm table-hover">
                            <thead class="">
                                <tr class="text-center">
                                    <th style="width: fit-content;" class="text-center">Mã vận đơn</th>
                                    <th width="250px">Thông tin khách</th>
                                    <th width="200px">Sản phẩm</th>
                                    <th>Thành tiền</th>
                                    <th>Tiền cước</th>
                                    <th width="350px">Ghi chú</th>
                                    <th>Thông tin đơn</th>
                                    <th style="width: fit-content;" class="text-center">Quản <br> lý</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0" id="">
                                @foreach ($donhang as $key => $dh)
                                @csrf
                                <tr>
                                    <td style="width: fit-content;" class="text-center">
                                        <div>{{$dh->si}}{{$dh->id}}</div>
                                        
                                    </td>
                                    <td width="250px">
                                        <div class="fw-bold mb-1">{{$dh->hotenkhach}}</div>
                                        <div class="mb-1">{{$dh->sdt}}</div>
                                        <div class="mb-1">{{$dh->diachi}}</div>
                                    </td>
                                    <td>
                                        @foreach ($dh->sanpham as $key => $sp)
                                        <div class="mb-1">{{$sp->tenvietgon}} <span class="text-muted">x</span> {{$sp->pivot->soluong}} </div>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @if ($dh->thanhtien >= $dh->chuyenkhoan)
                                        <div>{{ number_format($dh->thanhtien, 0, ",", ",")}}</div>
                                        @else
                                        <div class="text-danger fst-italic">{{ number_format($dh->chuyenkhoan, 0, ",", ",")}}</div>
                                        @endif
                                    </td>
                                    <td></td>
                                    <td>
                                        @if (empty($dh->ghichuct))
                                        <div></div>
                                        @else
                                        <div><i class='bx bx-store-alt'></i>: {{$dh->ghichuct}}</div>
                                        @endif
                                        @if (empty($dh->ghichubd))
                                        <div></div>
                                        @else
                                        <div class="mt-2"><i class='bx bxs-truck'></i></i>: {{$dh->ghichubd}}</div>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="text-primary fw-bold mb-1">{{$dh->user1->name}}</div>
                                        <div class="fst-italic fw-bold mb-1">
                                            @if (empty($dh->nguondon->tennguondon))
                                            <div></div>
                                            @else
                                            @if($dh->nguondon->id == 8)
                                            <div class="text-info">{{$dh->nguondon->tennguondon}}</div>
                                            @else
                                            <div>{{$dh->nguondon->tennguondon}}</div>
                                            @endif
                                            @endif
                                        </div>
                                        <div class="mb-1">{{ \Carbon\Carbon::parse($dh->ngaynhap)->format('H:i | d-m-Y')}}</div>
                                        <div style="width: fit-content;" class="mb-1 fw-bold text-white bg-{{$dh->tinhtrang->mau}} px-2 rounded">{{$dh->tinhtrang->tentinhtrang}}</div>
                                    </td>
                                    <td style="width: fit-content;" class="text-center">
                                        <div class="dropdown">

                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <form action="{{url('lien-he/' .$dh->id)}}" method="POST">
                                                    @csrf
                                                    <button class="dropdown-item"><i class='bx bx-phone me-1'></i> Liên hệ
                                                    </button>
                                                </form>
                                                <a class="dropdown-item" href="" onclick="copymau()"><i class='bx bx-copy-alt me-1'></i> Sao chép</a>
                                                <a class="dropdown-item" href="" id="editorder" data-link="{{route('order.edit',[$dh->id])}}"><i class="bx bx-edit-alt me-1"></i> Sửa</a>
                                                <form action="" method="POST">

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
                        <input type="hidden" value="123123" id="mau">

                        </input>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- edit modal -->
    <form action="" enctype="multipart/form-data" id="form-edit" method="POST">
        @csrf
        <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Sửa Đơn Hàng</h5>
                        <div id="loi"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="form-check ">
                                    <input class="form-check-input" name="tuship" type="checkbox" value="1" id="defaultCheck1" />
                                    <label class="form-check-label" for="defaultCheck1">Đơn <strong class="text-danger">Tự Ship/Nhờ Gửi Hộ</strong> </label>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" name="si" type="checkbox" value="S" id="defaultCheck1" />
                                    <label class="form-check-label" for="defaultCheck1"> Đơn <strong class="text-danger">Hàng Sỉ</strong> </label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-3">
                                <label for="defaultSelect" class="form-label mt-2">Chia đôi chiết khấu</label>
                            </div>
                            <div class="mb-3 col">
                                <select id="defaultSelect" name="chiachietkhau" class="form-select">
                                    <option value="">Không</option>
                                    @foreach ($user as $key => $u)
                                    <option value="{{$u->id}}">{{$u->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-3 ">
                                <label for="defaultSelect" class="form-label mt-2">Nguồn Đơn Hàng <strong class="text-danger">*</strong></label>

                            </div>
                            <div class="mb-3 col">
                                <select id="defaultSelect" name="nguondon" class="form-select">
                                    
                                    @foreach ($nguondon as $key => $nd)
                                    <option id="edit_nguondon" value="{{$nd->id}}">{{$nd->tennguondon}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-3 mb-3">
                                <label for="nameBasic" class="form-label mt-2">Họ & Tên Khách <strong class="text-danger">*</strong></label>
                            </div>
                            <div class="col mb-3">
                                <input type="text" id="edit_ten" name="hotenkhach" class="form-control" placeholder="Nhập tên khách hàng..." required autocomplete="hotenkhach" autofocus />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-3 mb-3">
                                <label for="nameBasic" class="form-label mt-2">Số Điện Thoại <strong class="text-danger">*</strong></label>
                            </div>
                            <div class="col mb-3">
                                <input type="text" id="edit_sdt" name="sdt" class="form-control" placeholder="Nhập số điện thoại..." required pattern="(\+84|0)\d{9,10}" title="Nhập số điện thoại 10 số và bắt đầu từ 0 hoặc +84" autocomplete="sdt" autofocus />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-3 mb-3">
                                <label for="nameBasic" class="form-label mt-2">Tình Trạng Da </label>
                            </div>
                            <div class="col mb-3">
                                <input type="text" id="edit_tinhtrangda" name="tinhtrang" class="form-control" placeholder="Sẹo rổ, mụn, thâm" />
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-3 mb-3">
                                <label for="nameBasic" class="form-label mt-2">Địa chỉ <strong class="text-danger">*</strong></label>
                            </div>
                            <div class="col mb-3">
                                <textarea id="edit_diachi" name="edit_diachi" class="form-control" placeholder="số nhà, tên đường" required autocomplete="diachi" autofocus></textarea>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-3 mb-3">
                                <label for="nameBasic" class="form-label mt-2">Ghi chú bưu điện </label>
                            </div>
                            <div class="col mb-3">
                                <textarea class="form-control" id="edit_gcbd" name="ghichubd" placeholder="Ghi chú cho nhân viên tư vấn, đóng hàng, check hàng..."></textarea>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-3 mb-3">
                                <label for="nameBasic" class="form-label mt-2">Ghi chú công ty </label>
                            </div>
                            <div class="col mb-3">
                                <textarea name="ghichuct" id="edit_gcct" class="form-control" rows="3" placeholder="Ghi chú cho nhân viên tư vấn, đóng hàng, check hàng..."></textarea>
                            </div>
                        </div>
                        <div class="row g-2 mt-1">
                            <div class="row">
                                <label for="nameBasic" class="form-label ">Chọn sản phẩm </label>
                            </div>
                            <div class="row">
                                @foreach ($sanpham as $key => $sp)
                                <div class="col-4 mt-2">
                                    <label for="nameBasic" class="form-label fw-bold fs-15">{{$sp->tensanpham}}</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="soluong[{{$sp->id}}]" placeholder="0" min="0" />
                                        <span class="input-group-text fw-bold">{{ number_format($sp->giasanpham, 0, ",", ",")}}</span>
                                        <input type="hidden" name="idsp[{{$sp->id}}]" value="{{$sp->id}}" />
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="row g-2 mt-2">
                            <div class="mb-3 col-3 ">
                                <label for="defaultSelect" class="form-label mt-2">Cộng tác viên</label>

                            </div>
                            <div class="mb-3 col">
                                <select id="defaultSelect" class="form-select">
                                    <option>Đơn công ty</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-3 mb-3">
                                <label for="nameBasic" class="form-label mt-2 text-danger">Thành tiền đơn hàng </label>
                            </div>
                            <div class="col mb-3">
                                <input type="text" id="edit_thanhtien" name="thanhtien" class="currency form-control border-danger" placeholder="0" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-3 mb-3">
                                <label for="nameBasic" class="form-label mt-2 text-warning">Tiền khách chuyển khoản </label>
                            </div>
                            <div class="col mb-3"> 
                                <input type="text" name="tienchuyen" id="edit_chuyenkhoan" class="currency form-control border-warning" placeholder="0" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-3 ">
                                <label for="defaultSelect" class="form-label mt-2">Thu tiền ship của khách <strong class="text-danger">*</strong></label>

                            </div>
                            <div class="mb-3 col">
                                <select id="defaultSelect" name="phiship" class="form-select">
                                    @foreach ($phiship as $key => $ps)
                                    <option value="{{$ps->id}}">{{$ps->tenphiship}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-3 ">
                                <label for="defaultSelect" class="form-label mt-2">Ngày gửi <strong class="text-danger">*</strong></label>

                            </div>
                            <div class="mb-3 col">
                                <input class="form-control" type="date" name="ngaygui" value="2021-06-18" id="html5-date-input" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-3 ">
                                <label for="defaultSelect" class="form-label mt-2">Tình trạng đơn hàng <strong class="text-danger">*</strong></label>

                            </div>
                            <div class="mb-3 col">
                                <select id="defaultSelect" name="trangthai" class="form-select">
                                    @foreach ($tinhtrang as $key => $tt)
                                    <option value="{{$tt->id}}">{{$tt->tentinhtrang}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-3 ">
                                <label for="defaultSelect" class="form-label mt-2">Nhập đơn hàng cho</label>

                            </div>
                            <div class="mb-3 col">
                                <select id="defaultSelect" name="nhapdonhang" class="form-select">
                                    @foreach ($user as $key => $u)
                                    <option value="{{$u->id}}">{{$u->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="check" value="0">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Thoát
                        </button>
                        <button type="submit" class="btn btn-primary">Sửa đơn hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection