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
            {!!Form::model($data, ['url' => route("user_update",["id"=>$data->id])
            ,"method"=>"put"
            ])!!}
            @else
            {!!Form::open(['route' => "user_store"])!!}
            @endif
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Nombre</label>
                  {!! Form::text('name',null,["class"=>"form-control"])!!}

                   @if ($errors->has("name"))
                  {{$errors->first("name")}}
                  @endif
                </div>
                <div class="form-group">
                  <label for="email">Correo</label>
                  {!! Form::email('email',null,["class"=>"form-control"])!!}

                  @if ($errors->has("email"))
                  {{$errors->first("email")}}
                  @endif
                </div>
				<div class="form-group">
                  <label for="nombre">Password</label>
                  {!! Form::password('password',["class"=>"form-control"])!!}

                  @if ($errors->has("password"))
                  {{$errors->first("password")}}
                  @endif
                </div>
				<div class="form-group">
                  <label for="nombre">Confirmar password</label>
                  {!! Form::password('password_confirmation',["class"=>"form-control"])!!}

                  @if ($errors->has("password_confirmation"))
                  {{$errors->first("password_confirmation")}}
                  @endif
                </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        {!!Form::close()!!}
        </div>
</div>
@endsection