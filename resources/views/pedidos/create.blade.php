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
            {!!Form::model($data, ['url' => route("pedidos_update",["id"=>$data->idpedidos])
            ,"method"=>"put"
            ])!!}
            @else
            {!!Form::open(['route' => "pedidos_store"])!!}
            @endif
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre">Cliente</label>
                  {!! Form::select('idcliente',[],null,["class"=>"form-control"])!!}

                   @if ($errors->has("idcliente"))
                  {{$errors->first("idcliente")}}
                  @endif
                </div>
                <div class="form-group">
                  <label for="nombre">Costo</label>
                  {!! Form::text('costo',null,["class"=>"form-control"])!!}

                  @if ($errors->has("costo"))
                  {{$errors->first("costo")}}
                  @endif
                </div>
				<div class="form-group">
                  <label for="nombre">costo_envio</label>
                  {!! Form::text('costo_envio',null,["class"=>"form-control"])!!}

                  @if ($errors->has("costo_envio"))
                  {{$errors->first("costo_envio")}}
                  @endif
                </div>
				<div class="form-group">
                  <label for="nombre">Estado</label>
                  {!! Form::select('idestado',[],null,["class"=>"form-control"])!!}

                  @if ($errors->has("idestado"))
                  {{$errors->first("idestado")}}
                  @endif
                </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        {!!Form::close()!!}
        </div>
</div>
@endsection