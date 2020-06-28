@extends('adminlte::page')

@section('title', 'Orders')

@section('content_header')
    <h1>CustomerTokens - Editar</h1>
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
    Edit CustomerToken
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
      <form method="post" action="{{ route('customerTokens.update', $customerToken->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">CustomerToken Name:</label>
          <input type="text" class="form-control" name="name" value={{ $customerToken->name }} />
        </div>
        <div class="form-group">
          <label for="price">CustomerToken Email :</label>
          <input type="text" class="form-control" name="email" value={{ $customerToken->email }} />
        </div>
        <div class="form-group">
          <label for="quantity">CustomerToken Telephone:</label>
          <input type="text" class="form-control" name="telephone" value={{ $customerToken->telephone }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection