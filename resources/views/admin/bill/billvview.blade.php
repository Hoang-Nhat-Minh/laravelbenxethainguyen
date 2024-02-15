@extends('admin.admin')
@section('content')
  <div class="container m-5 border text-dark" style="background-color: rgb(255, 211, 211);border-radius: 25px">
    <div class="m-5 p-2" style="font-size: 20px">
      <div class="mb-3">
        <div class="row">
          <div class="col-md-4 col-sm-12 d-flex align-items-center p-0">
            <h1>Hóa đơn niêm yết</h1>
          </div>
          <div class="col-md-4 col-sm-12"></div>
          <div class="col-md-4 col-sm-12 d-flex flex-coulum justify-content-end">
            <img src="{{ asset('img/icon.png') }}" style="height:150px;width:150px;">
          </div>
        </div>
      </div>
      <div class="mb-3">
        <p>Ngày làm hóa đơn: {{ $bill->date }}</p>
        <p>Mã hóa đơn: {{ $bill->billcode }}</p>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="col-md-6 col-sm-12 p-0">
            <div class="mb-3">
              <label class="form-label">Khách hàng: {{ $bill->user->name }}</label>
            </div>
            <div class="mb-3 d-flex align-items-center">
              <label class="form-label mb-0 mr-2">Email:{{ $bill->user->email }}</label>
            </div>
            <div class="mb-3 d-flex align-items-center">
              <label class="form-label mb-0 mr-2">SDT:{{ $bill->user->userdata->phone }}</label>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <h3>Bến xe Thái Nguyên</h3>
          <p>Địa chỉ: 218 Thống Nhất, Tân Lập, Thái Nguyên</p>
          <p>Email: benxethainguyen@gmail.com</p>
          <p>Phone: 0398-435-434</p>
        </div>
      </div>

      <table class="table" style="background-color: antiquewhite; border-radius:10px;">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên dịch vụ, sản phẩm</th>
            <th scope="col">Gia hạn</th>
          </tr>
        </thead>
        <tbody>
          @php
            $rows = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten'];
            $i = 0;
          @endphp
          @foreach ($rows as $row)
            @php
              $i++;
            @endphp
            @if (!is_null($bill->{'row' . $row . 'name'}))
              <tr>
                <th scope="row">{{ $i }}</th>
                <td>
                  <p type="text" name="row{{ $row }}name">
                    {{ $bill->{'row' . $row . 'name'} }}</p>
                </td>
                <td>
                  <p type="date" name="row{{ $row }}date">
                    {{ $bill->{'row' . $row . 'date'} }}</p>
                </td>
              </tr>
            @endif
          @endforeach
        </tbody>
      </table>

      <div class="mb-3">
        <label for="price" class="form-label">Tổng hóa đơn: {{ $bill->price }}</label>
      </div>
    </div>
  </div>
@endsection
