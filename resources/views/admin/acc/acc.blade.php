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
          <th class="col-2">Tên tài khoản</th>
          <th class="col-2">Email</th>
          <th class="col-2">Quyền</th>
          <th class="col-3">Ngày tạo</th>
          <th class="col-3 text-center">Chỉnh sửa</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td class="col-2 align-middle">{{ $user->name }}</td>
            <td class="col-2 align-middle">{{ $user->email }}</td>
            <td class="col-2 align-middle">
              @if ($user->role_id == 1)
                Admin
              @elseif ($user->role_id == 2)
                User
              @endif
            </td>

            <td class="col-3 align-middle">{{ $user->created_at }}</td>
            <td class="d-flex flex-row justify-content-center">
              @if ($user->role_id == 2)
                <form class="m-1" action="{{ route('give-role-user', ['user' => $user]) }}" method="POST">
                  @csrf
                  <input class="btn btn-danger" type="submit" value="Cấp quyền" style="font-size: 15px;">
                </form>
              @elseif ($user->role_id == 1)
                <form class="m-1" action="{{ route('revoke-role-user', ['user' => $user]) }}" method="POST">
                  @csrf
                  <input class="btn btn-danger" type="submit" value="Hủy quyền" style="font-size: 15px;">
                </form>
              @endif

              <form class="m-1" action="{{ route('destroy-user', ['user' => $user]) }}" method="post">
                @csrf
                @method('delete')
                <input class="btn btn-danger" type="submit" value="Xóa tài khoản" style="font-size: 15px;">
              </form>
            </td>

          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
