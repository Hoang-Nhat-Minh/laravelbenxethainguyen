@extends('admin.admin')

@section('content')
  <div class="container">
    <form action="{{ route('store-acc') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Tên tài khoản:</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Email:</label>
        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Mật khẩu:</label>
        <input type="text" name="password" class="form-control" value="{{ old('pasword') }}">
      </div>
      <div class="mb-3">
        <label for="role" class="form-label">Vai trò:</label>
        <select name="role_id" class="form-control">
          <option value="1">Admin</option>
          <option value="2">User</option>
        </select>
      </div>

      <input class="btn btn-dark mb-3" type="submit" value="Tạo tài khoản"><br>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </form>
  </div>
@endsection
