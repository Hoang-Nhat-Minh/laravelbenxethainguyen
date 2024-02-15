@extends('layout')

@section('content')
  <div class="container p-5" style="margin:110px 0 50px 0;">
    <div class="row">
      <h1>Tìm kiếm: {{ $searchTerm }}</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <h2>Quầy</h2>
        <table class="table">
          <thead>
            <tr>
              <th class="col-2">Quầy</th>
              <th class="col-2">Hình ảnh</th>
              <th class="col-3">Mô tả ngắn</th>
              <th class="col-3">Chi tiết</th>
              <th class="col-2">Xem</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($houses as $house)
              <tr>
                <td>{{ $house->header }}</td>
                <td>
                  <img src="{{ asset('Pictures/upFormWeb/' . $house->avatar) }}" alt="house Image"
                    style="height:90px; width:90px; object-fit:cover">
                </td>
                <td>
                  <div class="houseInfo">{{ $house->shortInfo }}</div>
                </td>
                <td>
                  <div class="houseInfo"
                    style="overflow: hidden;
                  text-overflow: ellipsis;
                  -webkit-line-clamp: 2;
                  display: -webkit-box;
                  -webkit-box-orient: vertical;">
                    {{ $house->detailInfo }}</div>
                </td>

                <td><a href="{{ route('house-detail', ['slug' => $house->slug]) }}" class="btn btn-success text-light">
                    Xem chi tiết
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-12">
        <h2>Dịch vụ</h2>
        <table class="table">
          <thead>
            <tr>
              <th class="col-2">Dịch vụ</th>
              <th class="col-2">Hình ảnh</th>
              <th class="col-3">Mô tả ngắn</th>
              <th class="col-3">Chi tiết</th>
              <th class="col-2 text-center">Xem</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($services as $service)
              <tr>
                <td>{{ $service->header }}</td>
                <td>
                  <img src="{{ asset('Pictures/upFormWeb/' . $service->avatar) }}" alt="service Image"
                    style="height:90px; width:90px; object-fit:cover">
                </td>
                <td>
                  <div class="serviceInfo">{{ $service->shortInfo }}</div>
                </td>
                <td>
                  <div class="serviceInfo"
                    style="overflow: hidden;
                  text-overflow: ellipsis;
                  -webkit-line-clamp: 2;
                  display: -webkit-box;
                  -webkit-box-orient: vertical;">
                    {{ $service->detailInfo }}</div>
                </td>

                <td><a href="{{ route('service-detail', ['slug' => $service->slug]) }}"
                    class="btn btn-success text-light">
                    Xem chi tiết
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
