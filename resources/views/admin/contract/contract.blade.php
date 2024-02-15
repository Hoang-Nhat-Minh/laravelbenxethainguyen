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
          <th class="col-3">Hợp đồng</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contracts as $contract)
          <tr>
            <td>{{ $contract->user->name }}</td>
            <td>
              {{ $contract->user->email }}
            </td>
            <td>
              <a href="{{ route('contractdetail', ['contract' => $contract]) }}">
                <img src="{{ asset('Pictures/upFormWeb/' . $contract->contract) }}"
                  alt="Contract Image"style="height:50px; width:50px; object-fit:cover;">
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
