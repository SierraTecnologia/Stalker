@extends('adminlte::page')

@section('title', 'Show Order')

@section('content_header')
    <h1>Show CustomerToken</h1>
@stop

@section('css')

@stop

@section('js')

@stop

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show CustomerToken</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>

            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">
                    CustomerToken Orders
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('orders.table', ['orders' => $customerToken->orders()->get()])</h3>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">


        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">Id</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <blockquote>
                    {{ $customerToken->id }}
                </blockquote>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">name</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <blockquote>
                    {{ $customerToken->name }}
                </blockquote>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">email</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <blockquote>
                    {{ $customerToken->email }}
                </blockquote>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">cpf</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <blockquote>
                    {{ $customerToken->cpf }}
                </blockquote>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">role_id</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <blockquote>
                    {{ $customerToken->role_id }}
                </blockquote>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">created_at</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <blockquote>
                    {{ $customerToken->created_at }}
                </blockquote>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">updated_at</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <blockquote>
                    {{ $customerToken->updated_at }}
                </blockquote>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-text-width"></i>

                <h3 class="box-title">score_points</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <blockquote>
                    {{ $customerToken->score_points }}
                </blockquote>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
    </div>

@endsection