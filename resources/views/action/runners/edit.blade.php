@extends('adminlte::page')

@section('title', 'Runners')

@section('content_header')
    <h1>Runners - Editar</h1>
@stop

@section('css')

@stop

@section('js')

@stop

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Runner
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('runners.update', $runner->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Runner Name:</label>
          <input type="text" class="form-control" name="name" value={{ $runner->name }} />
        </div>
        <div class="form-group">
          <label for="price">Runner Price :</label>
          <input type="text" class="form-control" name="price" value={{ $runner->price }} />
        </div>
        <div class="form-group">
          <label for="quantity">Runner Quantity:</label>
          <input type="text" class="form-control" name="qty" value={{ $runner->qty }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection