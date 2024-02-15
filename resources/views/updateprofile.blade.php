@extends('layout')

@section('content')
  <div class='snippet-body m-5 p-5'>
    <form action="{{ route('store-profile') }}" method="POST" enctype="multipart/form-data">
      <div class="container rounded bg-white mt-5 mb-5">
        <div class="row mt-5">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
        </div>

        <div class="row">
          @csrf
          <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
              <label for="image">Ảnh đại diện:</label><br>
              <input class="btn btn-dark" style="width:300px;" type="file" accept="image/*" name="avatar"
                id="file" onchange="loadFileCover(event)">
              <img class="rounded-circle mt-5 outputImg" style="width:250px;height:300px;object-fit: cover"
                id="outputCover" />
              <script>
                var loadFileCover = function(event) {
                  var outputCover = document.getElementById('outputCover');
                  outputCover.src = URL.createObjectURL(event.target.files[0]);
                  outputCover.onload = function() {
                    URL.revokeObjectURL(outputCover.src) //Giải phóng bộ nhớ
                  }
                };
              </script>
              <span class="font-weight-bold">{{ $user->name }}</span>
              <span class="text-black-50">{{ $user->email }}</span>
            </div>
          </div>
          <div class="col-md-9 border-right">
            <div class="p-3 py-5">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right">Thông tin của bạn</h4>
              </div>
              <div class="row mt-2">
                <div class="col-md-6">
                  <label class="labels">Họ</label>
                  <input type="text" name="surname" class="form-control" placeholder="Nhập họ">
                </div>
                <div class="col-md-6">
                  <label class="labels">Tên</label>
                  <input type="text" name="profileName" class="form-control" placeholder="Nhập tên">
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <label class="labels">Số điện thoại</label>
                  <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại">
                </div>
                <div class="col-md-12">
                  <label class="labels">Ngày sinh</label>
                  <input type="date" name="birthday" class="form-control">
                </div>
                <div class="col-md-12">
                  <label class="labels">Địa chỉ</label>
                  <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ">
                </div>
                <div class="col-md-12">
                  <label class="labels">Email</label>
                  <div class="form-control">{{ $user->email }}</div>
                </div>
              </div>
              <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Lưu thông tin
                  của
                  bạn</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
