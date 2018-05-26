@extends('layouts.admin')

@section('content')

<a href="{{route("clientes_create")}}">Crear</a>

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Clientes</h3>

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
                  <th>Nombre Compañia</th>
                  <th>Telefono</th>
                  <th>Direccion</th>
                  <th>Nombre Completo</th>
                  <th class="no-print"></th>
                  <th class="no-print"></th>
                  <th class="no-print"></th>                  
                </tr>
                @foreach ($data as $item)
                <tr>
                  <td>{{$item->idclientes}}</td>
                  <td>{{$item->nombre_compania}}</td>
                  <td>{{$item->telefono}}</td>
                  <td>{{$item->direccion}}</td>
                  <td>{{$item->nombre}} {{$item->apellido}}</td>
                  <td class="no-print"><a href="{{route("clientes_pedido_nuevo",["id"=>$item->idclientes])}}">Crear pedido</a></td>
                  <td class="no-print"><a href="{{route("clientes_edit",["id"=>$item->idclientes])}}">Editar</a></td>
                  <td class="no-print">
                  
                  {!!Form::open(
                    ['url' => route("clientes_destroy",["id"=>$item->idclientes])
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
<button type="button" onclick="window.print()">
  Generar Reporte
</button>
@endsection