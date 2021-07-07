@extends('home')
@section('title', 'Danh sách đại lý')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12"><h1>Danh Sách Đại Lý</h1></div>
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <form class="navbar-form navbar-left" action="{{route('agent.search')}}">
                            @csrf
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search" name="keyword">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Mã đại lý</th>
                        <th scope="col">Tên đại lý</th>
                        <th scope="col">Điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Trạng thái</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($agents as $agent)
                        <tr>
                            <td>{{$agent->code}}</td>
                            <td>{{$agent->name}}</td>
                            <td>{{$agent->phone}}</td>
                            <td>{{$agent->email}}</td>
                            <td>{{$agent->address}}</td>
                            <td>{{$agent->status}}</td>
                            <td><a href="{{route('agent.edit',$agent->id)}}">Sửa</a>
                                <a href="{{route('agent.destroy',$agent->id)}}">Xóa</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Không có dữ liệu</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <a class="btn btn-primary" href={{route('agent.create')}}>Thêm mới</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
