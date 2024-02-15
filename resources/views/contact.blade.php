@extends('layout')

@section('content')
  <!-- Contact Start -->
  <div class="container-fluid contact py-5 mt-5">
    <div class="container py-5 mt-5">
      <div class="p-5 bg-light rounded">
        <div class="row g-4">
          <div class="col-12">
            <div class="text-center mx-auto" style="max-width: 700px;">
              <h1 class="text-primary">Liên hệ với chúng tôi</h1>
              <p class="mb-4">Bến xe khách Thái Nguyên luôn sẵn lòng phục vụ quý khách. Để liên hệ, quý khách có thể gọi
                đến số điện thoại của chúng tôi hoặc gửi email. Chúng tôi cam kết phản hồi nhanh chóng và giải đáp mọi
                thắc mắc của quý khách.</p>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="h-100 rounded">
              <iframe class="rounded w-100" style="height: 400px;"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118705.12146282165!2d105.657191925834!3d21.60406491529363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135273d024bd2b3%3A0xe80981201d7dd242!2zQuG6v24geGUgVGjDoWkgTmd1ecOqbg!5e0!3m2!1svi!2s!4v1705500601809!5m2!1svi!2s"
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
          <div class="col-lg-7">
            <form action="" class="">
              <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Tên của bạn">
              <input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Nhập email của bạn">
              <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Nội dung"></textarea>
              <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary "
                type="submit">Gửi</button>
            </form>
          </div>
          <div class="col-lg-5">
            <div class="d-flex p-4 rounded mb-4 bg-white">
              <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
              <div>
                <h4>Địa chỉ</h4>
                <p class="mb-2">218 Thống Nhất, Tân Lập, Thái Nguyên</p>
              </div>
            </div>
            <div class="d-flex p-4 rounded mb-4 bg-white">
              <i class="fas fa-envelope fa-2x text-primary me-4"></i>
              <div>
                <h4>Email</h4>
                <p class="mb-2">benxethainguyen@gmail.com</p>
              </div>
            </div>
            <div class="d-flex p-4 rounded bg-white">
              <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
              <div>
                <h4>Số điện thoại</h4>
                <p class="mb-2">0398-435-434</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact End -->
@endsection
