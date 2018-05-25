@extends('layouts.admin')

@section('content')

<a href="{{route("productos_create")}}">Crear</a>
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
                  <th>Nombre</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                  <th>Total</th>
                  <th></th>
                  <th></th>                  
                </tr>
                @foreach ($data as $item)
                <tr>
                  <td>{{$item->idproductos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->cantidad}}</td>
                  <td>{{$item->precio}}</td>
                  <td>{{$item->cantidad*$item->precio}}</td>
                  <td><a href="{{route("productos_edit",["id"=>$item->idproductos])}}">Editar</a></td>
                  <td>
                  
                  {!!Form::open(
                    ['url' => route("productos_destroy",["id"=>$item->idproductos])
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