@extends('layouts.admin')

@section('content')
<section class="invoice">
      <!-- title row -->
	  
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> {{ $data->cliente->nombre_compania }}
            <small class="pull-right">Fecha: {{\Carbon\Carbon::now()->format('d-m-Y')}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>{{ $data->cliente->nombre_compania }}</strong><br>
            {{ $data->cliente->direccion }}<br>
            Email: {{ $data->cliente->user->email }}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Pedido #00{{ 7612 + $data->idpedidos }}</b><br>
          <br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Cant.</th>
              <th>Producto</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
			<?php 
				$total = 0;
			?>
			@foreach($data->detalle as $producto)
				<tr>
				  <td>{{ $producto->cantidad_productos }}</td>
				  <td>{{ $producto->producto->nombre }}</td>
				  <?php 
						$total = $total + ($producto->cantidad_productos * $producto->producto->precio);
				  ?>
				  <td>{{ $producto->cantidad_productos * $producto->producto->precio }}</td>
				  
				</tr>
			@endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row hidden">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <img src="/dist/img/credit/visa.png" alt="Visa">
          <img src="/dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="/dist/img/credit/american-express.png" alt="American Express">
          <img src="/dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow hidden" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Fecha Cuenta {{\Carbon\Carbon::now()->format('d-m-Y')}}</p>

          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%">Subtotal:</th>
                <td>{{ $total }}</td>
              </tr>
              <tr>
                <th>IVA (12%)</th>
                <td>{{ $total * 0.12 }}</td>
              </tr>
              <tr>
                <th>Envio:</th>
                <td>{{ $data->costo_envio }}</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>{{ ( $total * 1.12 ) + $data->costo_envio }}</td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="javascript:window.print()" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Imprimir</a>
          <button type="button" class="btn btn-success pull-right hidden"><i class="fa fa-credit-card"></i> Pagar
          </button>
          <button type="button" class="btn btn-primary pull-right hidden" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
@endsection