@extends('layout')

@section('content')
  <!-- Cart Page Start -->
  <div class="container-fluid py-5 mt-5">
    <div class="container py-5">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th class="col-1 text-center">Ảnh</th>
              <th class="col">Tên dịch vụ</th>
              <th class="col">Mô tả ngắn</th>
              <th class="col text-center" style="white-space: nowrap;">Đăng ký</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($services as $service)
              <tr>
                <td scope="row">
                  <div class="d-flex align-items-center">
                    <img src="{{ asset('Pictures/upFormWeb/' . $service->avatar) }}" class="img-fluid me-5 rounded-circle"
                      style="width: 80px; height: 80px;" alt="">
                  </div>
                </td>
                <td>
                  <p class="mb-0 mt-4"
                    style="overflow: hidden;
                    text-overflow: ellipsis;
                    -webkit-line-clamp: 2;
                    display: -webkit-box;
                    -webkit-box-orient: vertical;">
                    {{ $service->header }}</p>
                </td>
                <td>
                  <p class="mb-0 mt-4"
                    style="overflow: hidden;
                    text-overflow: ellipsis;
                    -webkit-line-clamp: 2;
                    display: -webkit-box;
                    -webkit-box-orient: vertical;width: 70%;">
                    {{ $service->shortInfo }}</p>
                </td>
                <td>
                  <div class="d-flex align-items-center justify-content-center">
                    <form action="{{ route('addedservicesstore', ['house' => $house, 'service' => $service]) }}"
                      method="POST">
                      @csrf

                      <button class="btn btn-md rounded-circle bg-light border mt-4">
                        <i class="fa fa-check text-primary"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- Dịch vụ đăng ký --}}

      <h1 class="mt-5 mb-2">Dịch vụ đã đăng ký</h1>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th class="col-1 text-center">Ảnh</th>
              <th class="col">Tên dịch vụ</th>
              <th class="col">Mô tả ngắn</th>
              <th class="col text-center" style="white-space: nowrap;">Hủy đăng ký</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($addedservices as $addedservice)
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img src="{{ asset('Pictures/upFormWeb/' . $addedservice->service->avatar) }}"
                      class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                  </div>
                </td>
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
                  <p class="mb-0 mt-4"
                    style="overflow: hidden;
                    text-overflow: ellipsis;
                    -webkit-line-clamp: 2;
                    display: -webkit-box;
                    -webkit-box-orient: vertical;width: 70%;">
                    {{ $addedservice->service->shortInfo }}</p>
                </td>
                <td>
                  <div class="d-flex align-items-center justify-content-center">
                    <form action="{{ route('addedservicedestroy', ['addedservice' => $addedservice]) }}" method="POST">
                      @csrf

                      <button class="btn btn-md rounded-circle bg-light border mt-4">
                        <i class="fa fa-times text-danger"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="mt-5">
        <a href="{{ route('addedhouse') }}" class="btn border-secondary rounded-pill px-4 py-3 text-primary"
          type="submit">Xác
          nhận</a>
      </div>
    </div>
  </div>
  <!-- Cart Page End -->
@endsection
