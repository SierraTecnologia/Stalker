@extends('adminlte::page')

@section('title', 'Orders')

@section('content_header')
    <h1>Actions</h1>
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
<div class="uper">
    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div><br />
    @endif

    @include('
        finder::action.actions.table-models',
        [
            'actionsForModels' => $actionsForModels,
            'models' => $models
        ]
    )
  
<div>
@endsection