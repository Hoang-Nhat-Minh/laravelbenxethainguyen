@extends('admin.admin')

@section('content')
  <div class="container">
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <table class="table">
      <thead>
        <tr>
          <th class="col-3">Khách hàng</th>
          <th class="col-auto">Email</th>
          <th class="col-auto">Mã hóa đơn</th>
          <th class="col-3 text-center">Thao tác</th>
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
              <a class="btn btn-warning mb-3" href="{{ route('view-bill', ['bill' => $bill]) }}">Chi tiết</a>
              <form class="d-inline-block" action="{{ route('destroy-bill', ['bill' => $bill]) }}" method="post">
                @csrf
                @method('delete')
                <input class="btn btn-success mb-3" type="submit" value="Xác nhận ">
              </form>
              <form class="d-inline-block" action="{{ route('destroy-bill', ['bill' => $bill]) }}" method="post">
                @csrf
                @method('delete')
                <input class="btn btn-danger mb-3" type="submit" value="Xóa">
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
