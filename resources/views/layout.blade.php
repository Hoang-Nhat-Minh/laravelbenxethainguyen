<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Bến xe Thái Nguyên</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <!-- favicon của web -->
  <link rel="icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
    rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
  {{-- Header Start --}}

  <!-- Spinner Start -->
  <div id="spinner"
    class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
  </div>
  <!-- Spinner End -->

  <!-- Navbar start -->
  <div class="container-fluid fixed-top">
    <div class="container topbar bg-dark d-none d-lg-block">
      <div class="d-flex justify-content-between">
        <div class="top-info ps-2">
          <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a
              href="{{ route('contact') }}" class="text-white">Tân Lập, Thái Nguyên</a></small>
          <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="{{ route('contact') }}"
              class="text-white">benxethainguyen@gmail.com</a></small>
        </div>
        <div class="top-link pe-2">
          <a href="{{ route('chinhsachbaomat') }}" class="text-white"><small class="text-white mx-2">Chính sách bảo
              mật</small>/</a>
          <a href="{{ route('dieukhoan') }}" class="text-white"><small class="text-white mx-2">Điều khoản</small>/</a>
          <a href="{{ route('contact') }}" class="text-white"><small class="text-white ms-2">Liên hệ hỗ trợ</small></a>
        </div>
      </div>
    </div>
    <div class="container px-0">
      <nav class="navbar navbar-light bg-white navbar-expand-xl">
        <a href="{{ route('index') }}" class="navbar-brand">
          <h1 class="text-gray-900 display-6">Bến xe Thái Nguyên</h1>
        </a>
        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarCollapse">
          <span class="fa fa-bars text-primary"></span>
        </button>
        <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
          <div class="navbar-nav mx-auto">
            <a href="{{ route('index') }}" class="nav-item nav-link">Home</a>
            <a href="#" class="nav-item nav-link" onclick="navigateTo('#houses-info')">Quầy</a>
            <a href="#" class="nav-item nav-link" onclick="navigateTo('#dichvu')">Dịch vụ</a>
            <a href="{{ route('contract-user') }}" class="nav-item nav-link">Hợp đồng</a>
            <a href="{{ route('addedhouse') }}" class="nav-item nav-link">Quầy đã đăng kí</a>
            <a href="{{ route('contact') }}" class="nav-item nav-link">Liên hệ</a>
          </div>
          <div class="d-flex m-3 me-0">
            <button class="btn-search btn border border-dark btn-md-square rounded-circle bg-white me-4"
              data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-dark"></i></button>
            <a href="{{ route('profile') }}" class="my-auto">
              <i class="fas fa-user fa-2x"></i>
            </a>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <!-- Navbar End -->

  <!-- Modal Search Start -->
  <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex align-items-center">
          <form action="{{ route('search') }}" method="GET" class="input-group w-75 mx-auto d-flex">
            @csrf

            <input name="searchkey" type="search" class="form-control p-3" placeholder="Nhập keyword"
              aria-describedby="search-icon-1">
            <button type="submit" id="search-icon-1" class="input-group-text p-3"><i
                class="fa fa-search"></i></button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Search End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
      class="fa fa-arrow-up"></i></a>

  {{-- Header End --}}

  @if (session('error'))
    <script>
      alert('{{ session('error') }}');
    </script>
  @endif


  <!--Content-->
  @yield('content')

  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
    <div class="container py-5">
      <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
        <div class="row g-4">
          <div class="col-lg-6">
            <h1 class="text-primary mb-0">Bến xe</h1>
            <p class="text-secondary mb-0">Thái Nguyên</p>
          </div>
          <div class="col-lg-6">
            <div class="d-flex justify-content-end pt-3">
              <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href="https://twitter.com/"><i
                  class="fab fa-twitter"></i></a>
              <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle"
                href="https://www.facebook.com/profile.php?id=100010285871208"><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle"
                href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="row g-5">
        <div class="col-lg-6 col-md-6">
          <div class="footer-item">
            <h4 class="text-light mb-3">Đến với chúng tôi!</h4>
            <p class="mb-4">Tọa lạc tại 218 Thống Nhất, Tân Lập, Thái Nguyên, là một trạm xe buýt
              phổ biến. Nơi đây phục vụ nhiều tuyến xe buýt khác nhau, kết nối Thái Nguyên với các khu vực lân cận.</p>
            <a href="http://www.benxethainguyen.com.vn"
              class="btn border-secondary py-2 px-4 rounded-pill text-primary">Tìm hiểu thêm</a>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 text-end">
          <div class="footer-item">
            <h4 class="text-light mb-3">Liên hệ</h4>
            <p>Địa chỉ: 218 Thống Nhất, Tân Lập, Thái Nguyên</p>
            <p>Email: benxethainguyen@gmail.com</p>
            <p>Phone: 0398-435-434</p>
            <p>Hình thức thanh toán</p>
            <img src="{{ asset('img/payment.png') }}" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer End -->

  <!-- Copyright Start -->
  <div class="container-fluid copyright bg-dark py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
          <span class="text-light"><i class="fas fa-copyright text-light me-2"></i>Bến xe Thái
            Nguyên, All right reserved.</span>
        </div>
        <div class="col-md-6 my-auto text-center text-md-end text-white">
          (⌐■_■) Designed And Code By Hoang Nhat Minh
        </div>
      </div>
    </div>
  </div>
  <!-- Copyright End -->



  <!-- Back to Top -->
  <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
      class="fa fa-arrow-up"></i></a>


  <!-- JavaScript Libraries -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
  <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

  {{-- Trượt đến vị trí chỉ định --}}
  <script>
    function navigateTo(hash) {
      var currentRoute = '{{ Route::currentRouteName() }}';
      if (currentRoute !== 'index') {
        window.location.href = '{{ route('index') }}' + hash;
      } else {
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function() {
          window.location.hash = hash;
        });
      }
    }
  </script>

  <!-- Template Javascript -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
