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
            {!!Form::model($data, ['url' => route("clientes_update",["id"=>$data->idclientes])
            ,"method"=>"put"
            ])!!}
            @else
            {!!Form::open(['route' => "clientes_store"])!!}
            @endif
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre">Nombre Compañia</label>
                  {!! Form::text('nombre_compania',null,["class"=>"form-control"])!!}

                   @if ($errors->has("nombre_compania"))
                  {{$errors->first("nombre_compania")}}
                  @endif
                </div>
                <div class="form-group">
                  <label for="nombre">Telefono</label>
                  {!! Form::text('telefono',null,["class"=>"form-control"])!!}

                  @if ($errors->has("telefono"))
                  {{$errors->first("telefono")}}
                  @endif
                </div>
				<div class="form-group">
                  <label for="nombre">direccion</label>
                  {!! Form::text('direccion',null,["class"=>"form-control"])!!}

                  @if ($errors->has("direccion"))
                  {{$errors->first("direccion")}}
                  @endif
                </div>
				<div class="form-group">
                  <label for="nombre">Usuario</label>
                  {!! Form::select('idusuario',$listausuarios, null,["class"=>"form-control"])!!}

                  @if ($errors->has("idusuario"))
                  {{$errors->first("idusuario")}}
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