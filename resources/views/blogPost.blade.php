@extends('layouts.master')

@section('main-content')
  @php
    $data = is_string($post) ? json_decode($post, true) : (array) $post[0];
  @endphp
  <div class="row">
    <div class="col-sm-8">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="card-title mb-0">{{ $data['title'] ?? 'Bez názvu' }}</h5>
            <a href="{{ route('blog.index') }}" class="btn btn-danger">X</a>
          </div>
          <p>{{ $data['content'] ?? '' }}</p>
          <div class="mt-auto d-flex justify-content-end">
            <small class="text-muted">Publikované: {{ $data['created_at'] ?? '' }}</small>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection