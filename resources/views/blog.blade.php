@extends('layouts.master')

@section('main-content')
  <h1>Blog</h1>
  <a href="{{ route('blog.add') }}" class="btn btn-primary mb-3">Pridať nový článok</a>
  <div class="row">
    @foreach($post as $item)
      @php
        $data = is_string($item) ? json_decode($item, true) : (array) $item;
      @endphp
      <div class="col-sm-6 mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $data['title'] ?? 'Bez názvu' }}</h5>
            <p class="card-text">{{ $data['text'] ?? '' }}</p>
            <a href="{{ route('blog.post',['id'=>$data['id'] ?? 0]) }}" class="btn btn-primary">Čítať viac</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

@endsection