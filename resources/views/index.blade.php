@extends('layout')

@section('content')
  <!-- Hero Start -->
  <div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
      <div class="row g-5 align-items-center">
        <div class="col-md-12 col-lg-7">
          <h1 class="mb-5 display-3 text-light">Quầy & Dịch vụ</h1>
          <form action="{{ route('search') }}" class="position-relative mx-auto" method="GET">
            @csrf

            <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="text"
              name="searchkey" placeholder="Nhập tên quầy hoặc dich vụ">
            <button type="submit"
              class="btn btn-dark border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100"
              style="top: 0; right: 25%;">Tìm kiếm</button>
          </form>
        </div>
        <div class="col-md-12 col-lg-5">
          <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active rounded">
                <img src="{{ asset('img/tintuc1.jpg') }}" class="img-fluid w-100 h-100 bg-secondary rounded"
                  alt="First slide">
              </div>
              <div class="carousel-item rounded">
                <img src="{{ asset('img/tintuc2.jpg') }}" class="img-fluid w-100 h-100 rounded" alt="Second slide">
              </div>
              <div class="carousel-item rounded">
                <img src="{{ asset('img/register.jpg') }}" class="img-fluid w-100 h-100 rounded" alt="Third slide">
              </div>
              <div class="carousel-item rounded">
                <img src="{{ asset('img/login.jpg') }}" class="img-fluid w-100 h-100 rounded" alt="Four slide">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Hero End -->


  <!-- Featurs Section Start -->
  <div class="container-fluid featurs py-5">
    <div class="container py-5">
      <div class="row g-4">
        <div class="col-md-6 col-lg-3">
          <div class="featurs-item text-center rounded bg-light p-4">
            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
              <i class="fas fa-car-side fa-3x text-white"></i>
            </div>
            <div class="featurs-content text-center">
              <h5>Đảm bảo dịch vụ</h5>
              <p class="mb-0">Dịch vụ hỗ trợ uy tín</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="featurs-item text-center rounded bg-light p-4">
            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
              <i class="fas fa-user-shield fa-3x text-white"></i>
            </div>
            <div class="featurs-content text-center">
              <h5>An Ninh Tin Cậy</h5>
              <p class="mb-0">100% an toàn tuyệt đối</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="featurs-item text-center rounded bg-light p-4">
            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
              <i class="fas fa-exchange-alt fa-3x text-white"></i>
            </div>
            <div class="featurs-content text-center">
              <h5>Thủ tục đơn giản</h5>
              <p class="mb-0">Dễ dàng nhanh chóng</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="featurs-item text-center rounded bg-light p-4">
            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
              <i class="fa fa-phone-alt fa-3x text-white"></i>
            </div>
            <div class="featurs-content text-center">
              <h5>24/7 hỗ trợ</h5>
              <p class="mb-0">Liên hệ hỗ trợ trực tiếp</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Featurs Section End -->

  <!-- House Shop Start-->
  <div class="container-fluid vesitable py-5" id="houses-info">
    <div class="container py-5">
      <h1 class="mb-0">Thông tin các quầy</h1>
      <div class="owl-carousel vegetable-carousel justify-content-center">
        @foreach ($houses as $house)
          <div class="border border-primary rounded position-relative vesitable-item">
            <div class="vesitable-img">
              <img src="{{ asset('Pictures/upFormWeb/' . $house->avatar) }}" class="img-fluid w-100 rounded-top"
                alt="" style="width:250px;height:250px;object-fit: cover;">
            </div>
            <div class="p-4 rounded-bottom">
              <h4 style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $house->header }}</h4>
              <p
                style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                {{ $house->shortInfo }}</p>
              <p>Người thuê: {{ $house->boss ? $house->boss : 'Chưa có người thuê' }}</p>
              <div class="d-flex justify-content-between flex-lg-wrap">
                <a href="{{ route('house-detail', ['slug' => $house->slug]) }}"
                  class="btn border border-secondary rounded-pill px-3 text-dark">
                  <i class="fa fa-exchange-alt me-2 text-primary"></i>Xem chi tiết
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- Vesitable Shop End -->

  <!-- Services Shop Start-->
  <div class="container-fluid fruite py-5" id="dichvu">
    <div class="container py-5">
      <div class="tab-class text-center">
        <div class="row g-4">
          <div class="col-lg-4 text-start">
            <h1>Các loại dịch vụ</h1>
          </div>
        </div>
        <div class="tab-content">
          <div class="row g-4">
            <div class="col-lg-12">
              <div class="row g-4">
                @foreach ($services as $service)
                  <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="rounded position-relative fruite-item">
                      <div class="fruite-img">
                        <img src="{{ asset('Pictures/upFormWeb/' . $service->avatar) }}"
                          class="img-fluid w-100 rounded-top" alt=""
                          style="width:250px;height:285px;object-fit: cover;">
                      </div>
                      <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                        <h4 style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                          {{ $service->header }}</h4>
                        <p
                          style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                          {{ $service->shortInfo }}</p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                          <a href="{{ route('service-detail', ['slug' => $service->slug]) }}"
                            class="btn border border-secondary rounded-pill px-3 text-primary"><i
                              class="fa fa-exchange-alt me-2 text-primary"></i> Xem chi tiết</a>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fruits Shop End-->

  <!-- Banner Section Start-->
  <div class="container-fluid banner bg-secondary my-5">
    <div class="container py-5">
      <div class="row g-4 align-items-center">
        <div class="col-lg-6">
          <div class="py-4">
            <h1 class="display-3 text-white">Dịch vụ</h1>
            <p class="fw-normal display-3 text-dark mb-4">Chuyên nghiệp</p>
            <p class="mb-4 text-light">Chúng tôi cung cấp các dịch vụ chuyên nghiệp và uy tín trong lĩnh vực của khách
              hàng. Chúng tôi có thể đáp ứng mọi nhu cầu của khách hàng, từ những dịch vụ nội bộ như tư vấn, thiết kế,
              đến những dịch vụ ngoại bộ như quảng cáo, tiếp thị, bảo trì, hỗ trợ. Chúng tôi luôn lắng nghe và thấu hiểu
              yêu cầu của khách hàng, để mang đến cho họ những giải pháp tối ưu và hiệu quả nhất.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="position-relative">
            <img src="{{ asset('img/dichvu.png') }}" class="img-fluid w-100 rounded" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Banner Section End -->

  <!-- Fact Start -->
  <div class="container-fluid py-5">
    <div class="container">
      <div class="bg-light p-5 rounded">
        <div class="row g-4 justify-content-center">
          <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="counter bg-white rounded p-5">
              <i class="fa fa-users text-secondary"></i>
              <h4>Thành lập</h4>
              <h1>2016</h1>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="counter bg-white rounded p-5">
              <i class="fa fa-phone-alt text-secondary"></i>
              <h4>Đánh giá dịch vụ</h4>
              <h1>100%</h1>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="counter bg-white rounded p-5">
              <i class="fa fa-star text-secondary"></i>
              <h4>Chỉ tiêu đạt được</h4>
              <h1>33</h1>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="counter bg-white rounded p-5">
              <i class="fa fa-arrow-up text-secondary"></i>
              <h4>Chỉ tiêu đề ra</h4>
              <h1>150</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fact Start -->
@endsection
