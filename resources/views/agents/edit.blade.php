@extends('home')
@section('title', 'Chỉnh sửa đại lý')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Chỉnh sửa đại lý</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('agent.update',$agent->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>Mã đại lý</label>
                        <input type="number" class="form-control" name="code" value="{{$agent->code}}"
                               placeholder="Nhập mã đại lý">
                    </div>
                    <div class="form-group">
                        <label>Tên đại lý</label>
                        <input type="text" class="form-control" name="name" value="{{$agent->name}}"
                               placeholder="Nhập tên đại lý">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{$agent->phone}}"
                               placeholder="Nhập số điện thoại">
                        @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{{$agent->email}}"
                               placeholder="Nhập email">
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="{{$agent->address}}"
                               placeholder="Nhập địa chỉ">
                        @error('address')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Người quản lý</label>
                        <input type="text" class="form-control" name="manager" value="{{$agent->manager}}"
                               placeholder="Nhập tên người quản lý">
                        @error('manager')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-control" name="status">
                            @if($agent->status==0)
                                <option value="0" selected>Hoạt động</option>
                                <option value="1">Ngừng hoạt động</option>
                            @else
                                <option value="0">Hoạt động</option>
                                <option value="1" selected>Ngừng hoạt động</option>
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

