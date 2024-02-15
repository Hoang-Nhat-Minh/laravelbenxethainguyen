@extends('admin.admin')

@section('content')
  <div class="container d-flex align-items-center justify-content-center flex-column py-3">
    <h1 class="text-dark">Chủ hợp đồng: {{ $contract->user->name }}</h1>
    <h1 class="text-dark">Ảnh hợp đồng:</h1>
    <img src="{{ asset('Pictures/upFormWeb/' . $contract->contract) }}" alt="Contract Image">
  </div>
@endsection
