@extends('layouts.master')

@section('main-content')
  <h1>Pridať nový článok</h1>
  <div class="row">
    <div class="col-sm-8 ">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="card-title mb-0">Nový článok</h5>
            <a href="{{ route('blog.index') }}" class="btn btn-danger">X</a>
          </div>
          <form action="{{ route('blog.save') }}" method="POST">
            @csrf 
            <div class="mb-3">
              <label for="title" class="form-label">Názov:</label>
              <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div></div>
            <div class="mb-3">
              <label for="content" class="form-label">Obsah:</label>
              <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>

<div></div>
@endsection