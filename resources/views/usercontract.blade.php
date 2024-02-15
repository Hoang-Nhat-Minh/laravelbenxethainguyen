@extends('layout')

@section('content')
  <div class="container-fluid fruite py-5 mt-5">
    <div class="container py-5 mt-3">
      <div class="tab-class text-center mb-5">
        <div class="row mb-3">
          <div class="col-lg-4 text-start">
            <h1>Hợp đồng của bạn</h1>
          </div>
        </div>
        <div class="tab-content">
          <div class="row g-4">
            <div class="col-lg-12">
              <div class="row g-4">
                @foreach ($contracts as $contract)
                  <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="rounded position-relative fruite-item border">
                      <img src="{{ asset('Pictures/upFormWeb/' . $contract->contract) }}"
                        class="img-fluid w-100 rounded-top" alt="">
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-class mt-5 py-5">
        <div class="row g-4 mb-3">
          <div class="col-lg-4 text-start">
            <h1>Hóa đơn của bạn</h1>
          </div>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th class="col-3">Khách hàng</th>
              <th class="col-auto">Email</th>
              <th class="col-auto">Mã hóa đơn</th>
              <th class="col-3">Thao tác</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bills as $bill)
              <tr>
                <td>
                  {{ $bill->user->name }}
                </td>
                <td>
                  {{ $bill->user->email }}
                </td>
                <td>
                  {{ $bill->billcode }}
                </td>
                <td>
                  <a class="btn btn-warning mb-3" href="{{ route('thanhtoan', ['bill' => $bill]) }}">Thanh toán</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
