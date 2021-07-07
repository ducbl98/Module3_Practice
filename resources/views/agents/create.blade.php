@extends('home')
@section('title', 'Thêm mới đại lý')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới đại lý</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('agent.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Mã đại lý</label>
                        <input type="number" class="form-control" name="code" value="{{old('code')}}"
                               placeholder="Nhập mã đại lý">
                        @error('code')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tên đại lý</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}"
                               placeholder="Nhập tên đại lý">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{old('phone')}}"
                               placeholder="Nhập số điện thoại">
                        @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input type="text" class="form-control" name="email" value="{{old('email')}}"
                               placeholder="Nhập email">
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="{{old('address')}}"
                               placeholder="Nhập địa chỉ">
                        @error('address')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="manager" value="{{old('manager')}}"
                               placeholder="Nhập tên người quản lý">
                        @error('manager')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-control" name="status">
                                <option value="0">Hoạt động</option>
                                <option value="1">Ngừng hoạt động</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection
