@extends('admin.admin')

@section('content')
  <div class="container">
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <table class="table">
      <thead>
        <tr>
          <th class="col-2">Quầy</th>
          <th class="col-2">Hình ảnh</th>
          <th class="col-3">Mô tả ngắn</th>
          <th class="col-3">Chi tiết</th>
          <th class="col-2 text-center">Chỉnh sửa</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($houses as $house)
          <tr>
            <td class="col-2">{{ $house->header }}</td>
            <td class="col-1">
              <img src="{{ asset('Pictures/upFormWeb/' . $house->avatar) }}"
                alt="house Image"style="height:90px; width:90px; object-fit:cover">
            </td>
            <td class="col-2">
              <div class="houseInfo">{{ $house->shortInfo }}</div>
            </td>
            <td class="col-5">
              <div class="houseInfo"
                style="overflow: hidden;
              text-overflow: ellipsis;
              -webkit-line-clamp: 4;
              display: -webkit-box;
              -webkit-box-orient: vertical;">
                {{ $house->detailInfo }}</div>
            </td>

            <td class="col-1"><a class="btn btn-warning mb-3"href="{{ route('edit-house', ['house' => $house]) }}">Sửa
                thông tin</a>
              <form action="{{ route('destroy-house', ['house' => $house]) }}" method="post">
                @csrf
                @method('delete')
                <input class="btn btn-danger" type="submit" value="Xóa quầy">
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
