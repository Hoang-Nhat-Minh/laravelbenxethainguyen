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
          <th class="col-2">Dịch vụ</th>
          <th class="col-2">Hình ảnh</th>
          <th class="col-3">Mô tả ngắn</th>
          <th class="col-3">Chi tiết</th>
          <th class="col-2 text-center">Chỉnh sửa</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($services as $service)
          <tr>
            <td class="col-2">{{ $service->header }}</td>
            <td class="col-1">
              <img src="{{ asset('Pictures/upFormWeb/' . $service->avatar) }}"
                alt="service Image"style="height:90px; width:90px; object-fit:cover">
            </td>
            <td class="col-2">
              <div class="serviceInfo">{{ $service->shortInfo }}</div>
            </td>
            <td class="col-5">
              <div class="serviceInfo"
                style="overflow: hidden;
              text-overflow: ellipsis;
              -webkit-line-clamp: 4;
              display: -webkit-box;
              -webkit-box-orient: vertical;">
                {{ $service->detailInfo }}</div>
            </td>

            <td class="col-1"><a
                class="btn btn-warning mb-3"href="{{ route('edit-service', ['service' => $service]) }}">Sửa
                thông tin</a>
              <form action="{{ route('destroy-service', ['service' => $service]) }}" method="post">
                @csrf
                @method('delete')
                <input class="btn btn-danger" type="submit" value="Xóa dịch vụ">
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
