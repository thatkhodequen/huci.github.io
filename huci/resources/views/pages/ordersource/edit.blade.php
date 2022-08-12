@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Chỉnh sửa nguồn đơn: <strong style="color: #696cff">{{$nguondon->tennguondon}}</strong></h5>
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
            <form method="POST" action="{{route('nguondon.update',[$nguondon->id])}}">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tên</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <input type="text" name="tennguondon" value="{{$nguondon->tennguondon}}" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a class="btn btn-secondary" href="{{route('nguondon.index')}}">Trở về</a>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection