@extends('admin.admin')

@section('content')
  <div class="container">
    <form action="{{ route('store-house') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Tên quầy:</label>
        <input type="text" id="name" name="header" class="form-control" value="{{ old('header') }}">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Mô tả ngắn gọn:</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="shortInfo" rows="3">{{ old('shortInfo') }}</textarea>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Mô tả chi tiết:</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="detailInfo" rows="3">{{ old('detailInfo') }}</textarea>
      </div>
      <input class="btn btn-dark mb-3" type="submit" value="Đăng"><br>

      <label for="image">Ảnh Cover:</label><br>
      <input class="btn btn-dark" type="file" accept="image/*" name="avatar" id="file"
        onchange="loadFileCover(event)"><br>
      <img class="outputImg mt-2" id="outputCover" style="height:350px;width:350px;object-fit: cover;" /><br>
      <script>
        var loadFileCover = function(event) {
          var outputCover = document.getElementById('outputCover');
          outputCover.src = URL.createObjectURL(event.target.files[0]);
          outputCover.onload = function() {
            URL.revokeObjectURL(outputCover.src) // giải phóng bộ nhớ
          }
        };
      </script>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </form>
  </div>
@endsection
