<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <div class="sidebar-brand d-flex align-items-center justify-content-center">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Quản lý bến xe</div>
  </div>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="{{ route('admin') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Thông tin hiện tại</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Quản lý
  </div>

  <!-- Nav Item - Acc Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAcc" aria-expanded="true"
      aria-controls="collapseAcc">
      <i class="fas fa-fw fa-user"></i>
      <span>Quản lý tài khoản</span>
    </a>
    <div id="collapseAcc" class="collapse" aria-labelledby="headingAcc" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Cài đặt tài khoản:</h6>
        <a class="collapse-item" href="{{ route('acc') }}">Xem các tài khoản</a>
        <a class="collapse-item" href="{{ route('create-acc') }}">Tạo tài khoản</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - House Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHouse"
      aria-expanded="true" aria-controls="collapseHouse">
      <i class="fas fa-fw fa-cog"></i>
      <span>Quản lý các quầy</span>
    </a>
    <div id="collapseHouse" class="collapse" aria-labelledby="headingHouse" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Thông tin quầy:</h6>
        <a class="collapse-item" href="{{ route('house') }}">Xem thông tin các quầy</a>
        <a class="collapse-item" href="{{ route('create-house') }}">Tạo quầy mới</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
      aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Quản lý dịch vụ</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Thông tin dịch vụ:</h6>
        <a class="collapse-item" href="{{ route('service') }}">Xem thông tin các dịch vụ</a>
        <a class="collapse-item" href="{{ route('create-service') }}">Tạo dịch vụ mới</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Contract Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContract"
      aria-expanded="true" aria-controls="collapseContract">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Quản lý hợp đồng</span>
    </a>
    <div id="collapseContract" class="collapse" aria-labelledby="headingContract" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Thông tin hợp đồng:</h6>
        <a class="collapse-item" href="{{ route('contractwait') }}">Yêu cầu đăng kí hợp đồng</a>
        <a class="collapse-item" href="{{ route('contract') }}">Xem các hợp đồng</a>
        <a class="collapse-item" href="{{ route('create-contract') }}">Tạo hợp đồng mới</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Bill Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBill" aria-expanded="true"
      aria-controls="collapseBill">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Quản lý hóa đơn</span>
    </a>
    <div id="collapseBill" class="collapse" aria-labelledby="headingBill" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Thông tin hóa đơn:</h6>
        <a class="collapse-item" href="{{ route('bill-list') }}">Hóa đơn chưa thanh toán</a>
        <a class="collapse-item" href="{{ route('make-bill') }}">Tạo hóa đơn mới</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Contact Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fas fa-fw fa-laugh"></i>
      <span>Hỗ trợ liên hệ</span>
    </a>
  </li>
</ul>
<!-- End of Sidebar -->
