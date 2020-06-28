@extends('adminlte::page')

@section('title', 'Show Order')

@section('content_header')
    <h1>Executed</h1>
@stop

@section('css')

@stop

@section('js')

@stop

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Action Executed</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('finder.action.actions.index') }}"> Back</a>

            </div>

        </div>

    </div>

@endsection