@extends('layout')

@section('content')
  <div class="container-fluid py-5 mt-5">
    <div class="container py-5">
      <div class="row g-4 mb-5">
        <div class="row g-4">
          <div class="col-lg-6">
            <div class="rounded">
              <img src="{{ asset('Pictures/upFormWeb/' . $service->avatar) }}" class="img-fluid rounded" alt="Image">
            </div>
          </div>
          <div class="col-lg-6">
            <h4 class="fw-bold mb-3">{{ $service->header }}</h4>
            <div class="d-flex mb-4">
              <i class="fa fa-star text-secondary"></i>
              <i class="fa fa-star text-secondary"></i>
              <i class="fa fa-star text-secondary"></i>
              <i class="fa fa-star text-secondary"></i>
              <i class="fa fa-star text-secondary"></i>
            </div>
            <p class="mb-4">{{ $service->shortInfo }}</p>
            <a href="{{ route('addedhouse') }}"
              class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary">
              Đăng kí
              dịch vụ</a>
          </div>
          <div class="col-lg-12">
            <nav>
              <div class="nav nav-tabs mb-3">
                <p class="nav-link active border-white border-bottom-0">Mô tả</p>
              </div>
            </nav>
            <div class="tab-content mb-5">
              <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                <p>{{ $service->detailInfo }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
