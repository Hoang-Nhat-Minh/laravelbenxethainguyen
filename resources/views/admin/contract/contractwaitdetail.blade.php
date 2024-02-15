@extends('admin.admin')

@section('content')
  <div class="container">
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <h1>Quầy đăng ký</h1>
    <table class="table">
      <thead>
        <tr>
          <th class="col-2">Quầy</th>
          <th class="col-2">Ảnh quầy</th>
          <th class="col-8 text-center">Mô tả</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($houses as $house)
          <tr>
            <td>
              <p class="mb-0 mt-4"
                style="overflow: hidden;
                text-overflow: ellipsis;
                -webkit-line-clamp: 2;
                display: -webkit-box;
                -webkit-box-orient: vertical;">
                {{ $house->header }}</p>
            </td>
            <td>
              <div class="d-flex align-items-center">
                <img src="{{ asset('Pictures/upFormWeb/' . $house->avatar) }}" class="img-fluid me-5 rounded-circle"
                  style="width: 80px; height: 80px;" alt="">
              </div>
            </td>
            <td>
              <p class="mb-0 mt-3 px-5"
                style="overflow: hidden;
                text-overflow: ellipsis;
                -webkit-line-clamp: 2;
                display: -webkit-box;
                -webkit-box-orient: vertical;">
                {{ $house->detailInfo }}</p>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>


    <h1 class="mt-5">Dịch vụ đăng ký</h1>
    <table class="table">
      <thead>
        <tr>
          <th class="col-2">Dịch vụ</th>
          <th class="col-2">Ảnh dịch vụ</th>
          <th class="col-2">Đăng ký cho quầy</th>
          <th class="col-6 text-center">Mô tả</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($addedservices as $addedservice)
          <tr>
            <td>
              <p class="mb-0 mt-4"
                style="overflow: hidden;
                text-overflow: ellipsis;
                -webkit-line-clamp: 2;
                display: -webkit-box;
                -webkit-box-orient: vertical;">
                {{ $addedservice->service->header }}</p>
            </td>
            <td>
              <div class="d-flex align-items-center">
                <img src="{{ asset('Pictures/upFormWeb/' . $addedservice->service->avatar) }}"
                  class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
              </div>
            </td>
            <td>
              <p class="mb-0 mt-4 px-5">
                {{ $addedservice->house }}
              </p>
            </td>
            <td>
              <p class="mb-0 mt-3 px-5"
                style="overflow: hidden;
                text-overflow: ellipsis;
                -webkit-line-clamp: 2;
                display: -webkit-box;
                -webkit-box-orient: vertical;">
                {{ $addedservice->service->detailInfo }}</p>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
