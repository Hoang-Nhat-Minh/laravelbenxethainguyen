@extends('admin.admin')

@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <div class='snippet-body m-5 p-5 rounded bg-white mt-5 mb-5'>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="container d-flex flex-column align-items-center justify-content-center">
            <h1>Mẫu hợp đồng</h1>
            <br><br>
            <img src="/img/hopdong.jpg" style="height:750px;width:500px;object-fit: cover;">
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <form action="{{ route('store-contract') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label for="owners">Người thuê:</label>
              @if ($users->isEmpty())
                {{ 'Chưa có người dùng nào đăng kí' }}
              @else
                <select class="form-select" aria-label="Default select example" name="user_id" id="owners">
                  @foreach ($users as $user)
                    <option value='{{ $user->id }}'>{{ $user->name }}</option>
                  @endforeach
                </select>
              @endif
            </div>

            <div class="mb-3">
              <label for="image">Ảnh hợp đồng:</label><br>
              <input class="btn btn-dark" type="file" accept="image/*" name="contract" id="file"
                onchange="loadFileCover(event)"><br>
              <img class="outputImg mt-2" id="outputCover" style="height:750px;width:500px;object-fit: cover;" /><br>
              <script>
                var loadFileCover = function(event) {
                  var outputCover = document.getElementById('outputCover');
                  outputCover.src = URL.createObjectURL(event.target.files[0]);
                  outputCover.onload = function() {
                    URL.revokeObjectURL(outputCover.src) // giải phóng bộ nhớ
                  }
                };
              </script>
            </div>
            <input class="btn btn-dark mb-3" type="submit" value="Xác nhận"><br>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
