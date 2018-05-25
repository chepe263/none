@extends('layouts.admin')

@section('content')


<div class="row"> 

<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if($editar==true)
            {!!Form::model($data, ['url' => route("detalle_pedido_update",["id"=>$data->iddetalle_pedido])
            ,"method"=>"put"
            ])!!}
            @else
            {!!Form::open(['route' => "detalle_pedido_store"])!!}
            @endif
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre">Producto</label>
                  {!! Form::select('idproducto',$listaproducto, null,["class"=>"form-control"])!!}

                   @if ($errors->has("idproducto"))
                  {{$errors->first("idproducto")}}
                  @endif
                </div>
                <div class="form-group">
                  <label for="nombre">Cantidad productos</label>
                  {!! Form::number('cantidad_productos',null,["class"=>"form-control"])!!}

                  @if ($errors->has("cantidad_productos"))
                  {{$errors->first("cantidad_productos")}}
                  @endif
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              {!!Form::close()!!}
          </div>
        

        </div>
</div>
@endsection