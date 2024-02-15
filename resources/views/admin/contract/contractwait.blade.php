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
          <th class="col-2">Tài khoản</th>
          <th class="col-7">email</th>
          <th class="col-3">Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>
              {{ $user->email }}
            </td>
            <td>
              <a class="btn btn-warning mb-3" href="{{ route('contractwaitdetail', ['user' => $user]) }}">Xem</a>
              <form method="POST" action="{{ route('contractwait-set-owner', ['user' => $user]) }}"
                style="display: inline-block;">
                @csrf
                <input type="submit" class="btn btn-success mb-3" value="Xác nhận"
                  onclick="return confirm('Bạn có chắc đã tạo hợp đồng không?');">
              </form>
              <a class="btn btn-danger mb-3" href="{{ route('contractwait-destroy', ['user' => $user]) }}"
                onclick="event.preventDefault(); if (confirm('Bạn có chắc muốn hủy không?')) { window.location.href = this.href; }">Hủy</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
