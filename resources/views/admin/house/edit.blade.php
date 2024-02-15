@extends('admin.admin')

@section('content')
  <div class="container">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('update-house', ['house' => $house]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="name" class="form-label">Tên quầy:</label>
        <input type="text" id="name" name="header" class="form-control" value="{{ $house->header }}">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Mô tả ngắn gọn:</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="shortInfo" rows="3">{{ $house->shortInfo }}</textarea>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Mô tả chi tiết:</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="detailInfo" rows="3">{{ $house->detailInfo }}</textarea>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Ảnh Cover hiện tại:</label><br>
        <img class="mb-1" src="{{ asset('Pictures/upFormWeb/' . $house->avatar) }}"
          style="height:350px;width:350px;object-fit: cover;" alt="">
        <input type="file" id="name" name="avatar" class="form-control" value="">
      </div>
      <button type="submit" class="btn btn-dark">Sửa thông tin</button>
    </form>
  </div>
@endsection
