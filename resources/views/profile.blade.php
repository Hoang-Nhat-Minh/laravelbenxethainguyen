@extends('layout')

@section('content')
  <div class='snippet-body m-5 p-5'>
    <div class="container rounded bg-white mt-5 mb-5">
      <div class="row">
        <div class="col-md-3 border-right">
          <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <img class="rounded-circle mt-5" style="width:250px;height:300px;object-fit: cover"
              src="{{ asset('Pictures/upFormWeb/' . $userdata->avatar) }}">
            <span class="font-weight-bold">{{ $user->name }}</span>
            <span class="text-black-50">{{ $user->email }}</span>
          </div>
        </div>
        <div class="col-md-9 border-right">
          <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4 class="text-right">Thông tin của bạn</h4>
            </div>
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif
            <div class="row mt-2">
              <div class="col-md-6">
                <label class="labels">Họ</label>
                <span class="form-control">{{ $userdata->surname }}</span>
              </div>
              <div class="col-md-6">
                <label class="labels">Tên</label>
                <span class="form-control">{{ $userdata->profileName }}</span>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12">
                <label class="labels">Số điện thoại</label>
                <span class="form-control">{{ $userdata->phone }}</span>
              </div>
              <div class="col-md-12">
                <label class="labels">Ngày sinh</label>
                <span class="form-control">{{ $userdata->birthday }}</span>
              </div>
              <div class="col-md-12">
                <label class="labels">Địa chỉ</label>
                <span class="form-control">{{ $userdata->address }}</span>
              </div>
              <div class="col-md-12">
                <label class="labels">Email</label>
                <span class="form-control">{{ $userdata->email }}</span>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-6">
                <a href="{{ route('fix-profile', ['userdata' => $userdata]) }}" class="btn btn-primary profile-button"
                  type="button">Sửa thông tin của bạn</a>
              </div>
              <div class="col-6 d-flex justify-content-end">
                <form action="{{ route('logout') }}" method="POST" style="width: fit-content;"
                  onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không?')">
                  @csrf
                  <button class="btn btn-danger profile-button" type="submit"><i
                      class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Đăng xuất</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
