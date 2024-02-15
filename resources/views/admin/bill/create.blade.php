@extends('admin.admin')
@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <div class="container m-5 border text-dark" style="background-color: rgb(255, 211, 211);border-radius: 25px">
    <form action="{{ route('billstore') }}" method="POST" class="m-5 p-2" style="font-size: 15px">
      @csrf

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
        <p name="date">Ngày làm hóa đơn: {{ date('d-m-Y') }}</p>
        <p name="billcode">Mã hóa đơn: <span id="invoice_id"></span></p>
        <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
        <?php
        $date = date('d-m-YH:i:s');
        $invoice_id = str_replace(['-', ':'], '', $date);
        ?>
        <input type="hidden" name="billcode" id="hidden_invoice_id" value="{{ $invoice_id }}">
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="col-md-6 col-sm-12 p-0">
            <div class="mb-3">
              <label class="form-label">Khách hàng:</label>
              <select class="form-select" aria-label="Default select example" name="user_id" id="owners">
                @foreach ($user_ids as $user_id)
                  <option value='{{ $user_id->user_id }}' data-email='{{ $user_id->user->email }}'
                    data-phone='{{ $user_id->user->userdata->phone }}'>{{ $user_id->user->name }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="mb-3 d-flex align-items-center">
              <label class="form-label mb-0 mr-2">Email:</label>
              <span class="form-control" id="email"></span>
            </div>
            <div class="mb-3 d-flex align-items-center">
              <label class="form-label mb-0 mr-2">SDT:</label><span class="form-control" id="phone"></span>
            </div>
            <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
            <script>
              $(document).ready(function() {
                $('#owners').change(function() {
                  var email = $('option:selected', this).attr('data-email');
                  var phone = $('option:selected', this).attr('data-phone');
                  var date = '{{ date('d-m-YH:i:s') }}';
                  var invoice_id = date.replace(/-/g, '').replace(/:/g, '');
                  if (email) {
                    $('#email').text(email);
                  }
                  if (phone) {
                    $('#phone').text(phone);
                  }
                  if (invoice_id) {
                    $('#invoice_id').text(invoice_id);
                  }
                });
                if ($('#owners').children('option:selected').data('email')) {
                  $('#owners').trigger('change');
                }
              });
            </script>
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
          <tr>
            <th scope="row">1</th>
            <td><input type="text" class="form-control" name="rowonename"></td>
            <td><input type="date" class="form-control" name="rowonedate"></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td><input type="text" class="form-control" name="rowtwoname"></td>
            <td><input type="date" class="form-control" name="rowtwodate"></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td><input type="text" class="form-control" name="rowthreename"></td>
            <td><input type="date" class="form-control" name="rowthreedate"></td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td><input type="text" class="form-control" name="rowfourname"></td>
            <td><input type="date" class="form-control" name="rowfourdate"></td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td><input type="text" class="form-control" name="rowfivename"></td>
            <td><input type="date" class="form-control" name="rowfivedate"></td>
          </tr>
          <tr>
            <th scope="row">6</th>
            <td><input type="text" class="form-control" name="rowsixname"></td>
            <td><input type="date" class="form-control" name="rowsixdate"></td>
          </tr>
          <tr>
            <th scope="row">7</th>
            <td><input type="text" class="form-control" name="rowsevenname"></td>
            <td><input type="date" class="form-control" name="rowsevendate"></td>
          </tr>
          <tr>
            <th scope="row">8</th>
            <td><input type="text" class="form-control" name="roweightname"></td>
            <td><input type="date" class="form-control" name="roweightdate"></td>
          </tr>
          <tr>
            <th scope="row">9</th>
            <td><input type="text" class="form-control" name="rowninename"></td>
            <td><input type="date" class="form-control" name="rowninedate"></td>
          </tr>
          <tr>
            <th scope="row">10</th>
            <td><input type="text" class="form-control" name="rowtenname"></td>
            <td><input type="date" class="form-control" name="rowtendate"></td>
          </tr>
        </tbody>
      </table>

      <div class="mb-3">
        <label for="price" class="form-label">Tổng hóa đơn:</label>
        <input type="text" class="form-control" id="price" name="price">
      </div>
      <button type="submit" class="btn btn-secondary">Tạo hóa đơn</button>
    </form>
  </div>
@endsection
