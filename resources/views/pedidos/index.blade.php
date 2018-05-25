@extends('layouts.admin')

@section('content')

<a href="{{route("pedidos_create")}}">Crear</a>
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
                  <th>ID</th>
                  <th>Cliente</th>
                  <th>Costo</th>
                  <th>Estado</th>
                  <th>Costo envío</th>
                  <th></th>
                  <th></th>
                  <th></th>                  
                </tr>
                @foreach ($data as $item)
                <tr>
                  <td>{{$item->idpedidos}}</td>
                  <td>{{$item->idcliente}}</td>
                  <td>{{$item->costo}}</td>
                  <td>{{$item->idestado}}</td>
                  <td>{{$item->costo_envio}}</td>
                  <td><a href="{{route('detalle_pedido_index',['idpedidos'=>$item->idpedidos])}}">Ver Productos</a></td>
                  <td><a href="{{route("pedidos_edit",["id"=>$item->idpedidos])}}">Editar</a></td>
                  <td>
                  
                  {!!Form::open(
                    ['url' => route("pedidos_destroy",["id"=>$item->idpedidos])
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