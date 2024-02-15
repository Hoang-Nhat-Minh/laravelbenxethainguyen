@extends('layout')

@section('content')
  <div class="container-fluid fruite py-5 mt-5">
    <div class="container py-5 mt-3">
      <h1 class="mb-4">Quầy bạn đã đăng ký</h1>
      <div class="row g-4">
        <div class="col-lg-12">
          <div class="row g-4 mb-3">
            <div class="col-6">
              <div class="input-group w-100 mx-auto d-flex">
                <input type="search" class="form-control p-3" placeholder="Tìm kiếm" aria-describedby="search-icon-1">
                <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
              </div>
            </div>
          </div>
          <div class="row g-4 mb-3">
            <div class="col-6">
              @if (session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif
              @if ($houses->isEmpty())
                <div class="alert alert-danger">
                  Bạn chưa đăng kí quầy nào.
                </div>
              @endif
            </div>
          </div>
          <div class="row g-4">
            <div class="col-lg-12">
              <div class="row g-4">
                @foreach ($houses as $house)
                  <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="rounded position-relative fruite-item">
                      <div class="fruite-img">
                        <img src="{{ asset('Pictures/upFormWeb/' . $house->avatar) }}" class="img-fluid w-100 rounded-top"
                          alt="" style="height:267px;width:356px;object-fit: cover;">
                      </div>
                      <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                        <h4>{{ $house->header }}</h4>
                        <div class="row d-flex justify-content-between flex-lg-wrap">
                          <a href="{{ route('addedservices', ['house' => $house]) }}"
                            class="col-6 btn border border-secondary rounded-pill px-3 text-primary">
                            <i class="fa fa-search me-2 text-primary"></i>Đăng kí dịch vụ cho quầy
                          </a>
                          <form action="{{ route('destroy-addedhouse', ['house' => $house]) }}" method="post"
                            class="col-6">
                            @csrf
                            @method('delete')
                            <button class="btn border rounded-pill px-3 btn-danger" type="submit">Huỷ
                              đăng kí quầy</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
                <div class="mt-5">
                  <a href="{{ route('submithouse') }}" class="btn border-secondary rounded-pill px-4 py-3 text-primary"
                    type="submit">Gửi đăng kí quầy</a>
                </div>
                <div class="col-12">
                  <div class="pagination d-flex justify-content-center mt-5">
                    <a href="#" class="rounded">&laquo;</a>
                    <a href="#" class="active rounded">1</a>
                    <a href="#" class="rounded">2</a>
                    <a href="#" class="rounded">3</a>
                    <a href="#" class="rounded">4</a>
                    <a href="#" class="rounded">5</a>
                    <a href="#" class="rounded">6</a>
                    <a href="#" class="rounded">&raquo;</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
