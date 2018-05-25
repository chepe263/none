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
            {!!Form::model($data, ['url' => route("estado_update",["id"=>$data->idestados])
            ,"method"=>"put"
            ])!!}
            @else
            {!!Form::open(['route' => "estado_store"])!!}
            @endif
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  {!! Form::text('nombre',null,["class"=>"form-control"])!!}

                   @if ($errors->has("nombre"))
                  {{$errors->first("nombre")}}
                  @endif
                </div>
                <div class="form-group">
                  <label for="nombre">Descripción</label>
                  {!! Form::text('descripcion',null,["class"=>"form-control"])!!}

                  @if ($errors->has("descripcion"))
                  {{$errors->first("descripcion")}}
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