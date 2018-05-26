@extends('layouts.admin')

@section('content')

<a href="{{route("detalle_pedido_create", ['idpedidos' => $idpedidos])}}">Crear</a>

<a href="{{route("pedidos_index", ['idpedidos' => $idpedidos])}}">Listo</a>

@if(count( $data ) > 0)
      <p>
       <a href="{{route("pedidos_invoice",["id"=>$idpedidos])}}">Recibo</a>
      </p>
    @endif
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <th>Producto</th>
                  <th>Cantidad Productos</th>
                  <th>Costo</th>
                  <th></th>                  
                </tr>
                
                @foreach ($data as $item)
                <tr >
                  <td>{{ $item->producto->nombre }}</td>
                  <td>{{ $item->cantidad_productos }}</td>
                  <td>{{ $item->cantidad_productos * $item->producto->precio }}</td>
                  <td><a href="{{route("detalle_pedido_edit",['idpedidos' => $idpedidos, "id"=>$item->iddetalle_pedido])}}">Editar</a></td>
                  <td>
                  
                  {!!Form::open(
                    ['url' => route("detalle_pedido_destroy",['idpedidos' => $idpedidos, "id"=>$item->iddetalle_pedido])
            ,"method"=>"delete"
            ]
                  )!!}
                    <button >Eliminar</button>

                  {!!Form::close()!!}
                  </td>

                </tr>
                @endforeach

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

@endsection