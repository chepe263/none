@extends('layouts.admin')

@section('content')
<section class="invoice">
      <!-- title row -->
	  
      


      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Nombre Completo.</th>
              <th>Nombre Compañia</th>
              <th>Dirección</th>
              <th>Teléfono</th>
            </tr>
            </thead>
            <tbody>
			<?php 
				$total = 0;
			?>
			@foreach($data as $item)
				<tr>
				  <td>{{ $item->nombre }} {{ $item->apellido }}</td>
				  <td>{{ $item->nombre_compania }}</td>
				  <td>{{ $item->direccion }}</td>
				  <td>{{ $item->telefono }}</td>
				  
				</tr>
			@endforeach
            </tbody>
          </table>
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