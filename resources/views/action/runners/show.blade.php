@extends('adminlte::page')

@section('title', 'Show Runner')

@section('content_header')
    <h1>Show Runner</h1>
@stop

@section('css')

@stop

@section('js')

@stop

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Runner</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('runners.index') }}"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
                    <div class="box-header with-brunner">
                        <i class="fa fa-text-width"></i>
                
                        <h3 class="box-title">Customer</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <blockquote>
                
                                <a href="{{ route('customers.show', $runner->customer->id)}}">{{$runner->customer->name}}</a> </blockquote>
                      </div>
                      <!-- /.box-body --></div>
                    </div>
            <div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
                    <div class="box-header with-brunner">
                        <i class="fa fa-text-width"></i>
                
                        <h3 class="box-title">Credit Card</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <blockquote>
                
                                <a href="{{ route('creditCards.show', $runner->creditCard->id)}}">{{$runner->creditCard->card_number}}</a> </blockquote>
                            </div>
                            <!-- /.box-body --></div>
                          </div>
                    <div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
                        <div class="box-header with-brunner">
                            <i class="fa fa-text-width"></i>
                    
                            <h3 class="box-title">customer_info</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <blockquote>
                        
                                        {!! print_r($runner->customer_info) !!} </blockquote>
                                    </div>
                                    <!-- /.box-body --></div>
                                  </div>

<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">Runner Origin</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

                {!! $runner->site !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">card_description</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

                {!! $runner->card_description !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">reference</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

                {!! $runner->reference !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">description</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

                {!! $runner->description !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">payment_type_id</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

                {!! $runner->payment_type_id !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">money_id</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

                {!! $runner->money_id !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">user_token</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

                {!! $runner->user_token !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">company_token</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

                {!! $runner->company_token !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">total</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

                {!! $runner->total !!}
            </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">installments</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

                {!! $runner->installments !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">is_active</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

                {!! $runner->is_active !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">status</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

                {!! $runner->status !!}

</div>

</div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">device_token</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

                {!! $runner->device_token !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">device</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

                {!! $runner->device !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">gateway</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

                {{ empty($runner->gateway)?'Sem Gateway':$runner->gateway->name }} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
        <div class="box-header with-brunner">
            <i class="fa fa-text-width"></i>
    
            <h3 class="box-title">gateway_mundipagg_public</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <blockquote>
    
                    {!! $runner->gateway_mundipagg_public !!} </blockquote>
                </div>
                <!-- /.box-body --></div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
                  <div class="box-header with-brunner">
                      <i class="fa fa-text-width"></i>
              
                      <h3 class="box-title">gateway_mundipagg_secret</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <blockquote>
              
                              {!! $runner->gateway_mundipagg_secret !!} </blockquote>
                          </div>
                          <!-- /.box-body --></div>
                        </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">gateway_pagseguro_public</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

                {!! $runner->gateway_pagseguro_public !!} </blockquote>
            </div>
            <!-- /.box-body --></div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
              <div class="box-header with-brunner">
                  <i class="fa fa-text-width"></i>
          
                  <h3 class="box-title">gateway_pagseguro_secret</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <blockquote>
          
                          {!! $runner->gateway_pagseguro_secret !!} </blockquote>
                      </div>
                      <!-- /.box-body --></div>
                    </div>
          <div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
              <div class="box-header with-brunner">
                  <i class="fa fa-text-width"></i>
          
                  <h3 class="box-title">gateway_rede_public</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <blockquote>
          
                          {!! $runner->gateway_rede_public !!} </blockquote>
                      </div>
                      <!-- /.box-body --></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
                        <div class="box-header with-brunner">
                            <i class="fa fa-text-width"></i>
                    
                            <h3 class="box-title">gateway_rede_secret</h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <blockquote>
                    
                                    {!! $runner->gateway_rede_secret !!} </blockquote>
                                </div>
                                <!-- /.box-body --></div>
                              </div>
                    <div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
                        <div class="box-header with-brunner">
                            <i class="fa fa-text-width"></i>
                    
                            <h3 class="box-title">gateway_cielo_public</h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <blockquote>
                    
                                    {!! $runner->gateway_cielo_public !!} </blockquote>
                                </div>
                                <!-- /.box-body --></div>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
                                  <div class="box-header with-brunner">
                                      <i class="fa fa-text-width"></i>
                              
                                      <h3 class="box-title">gateway_cielo_secret</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                      <blockquote>
                              
                                              {!! $runner->gateway_cielo_secret !!} </blockquote>
                                          </div>
                                          <!-- /.box-body --></div>
                                        </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">Payment Service Token</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

{!! $runner->tid !!} </blockquote>
</div>
<!-- /.box-body --></div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">Bank Slip Id</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

{!! $runner->bank_slip_id !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
        <div class="box-header with-brunner">
            <i class="fa fa-text-width"></i>
    
            <h3 class="box-title">Fraud Analysis Integration</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <blockquote>
    
                {{ empty($runner->fraudAnalysi)?'Sem anti Fraude':$runner->fraudAnalysi->name }} </blockquote>
          </div>
          <!-- /.box-body --></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
            <div class="box-header with-brunner">
                <i class="fa fa-text-width"></i>
        
                <h3 class="box-title">Fraud Analysis Information</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <blockquote>
        
                    {{ print_r($runner->fraud_analysis) }} </blockquote>
              </div>
              <!-- /.box-body --></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
                <div class="box-header with-brunner">
                    <i class="fa fa-text-width"></i>
            
                    <h3 class="box-title">Konduto Token</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <blockquote>
            
            {!! $runner->frauds_konduto_secret !!} </blockquote>
                  </div>
                  <!-- /.box-body --></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
                    <div class="box-header with-brunner">
                        <i class="fa fa-text-width"></i>
                
                        <h3 class="box-title">Clearsale Token</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <blockquote>
                
                {!! $runner->frauds_clearsale_secret !!} </blockquote>
                      </div>
                      <!-- /.box-body --></div>
                    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">tax_id</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

{!! $runner->tax_id !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">billing_name</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

{!! $runner->billing_name !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">billing_address</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

{!! $runner->billing_address !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">billing_complement</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

{!! $runner->billing_complement !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">billing_city</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

{!! $runner->billing_city !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">billing_state</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

{!! $runner->billing_state !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">billing_zip</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

{!! $runner->billing_zip !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">billing_country</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

{!! $runner->billing_country !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">created_at</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

{!! $runner->created_at !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">updated_at</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

{!! $runner->updated_at !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12"><div class="box box-solid">
    <div class="box-header with-brunner">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">user_id</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <blockquote>

{!! $runner->user_id !!} </blockquote>
      </div>
      <!-- /.box-body --></div>
    </div>
    </div>

@endsection