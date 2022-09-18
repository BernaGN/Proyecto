@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    {{ Breadcrumbs::render('users.update', $usuario) }}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Usuario</span>
                    </div>
                    <div class="card-body">
                        {!! Form::model($usuario, [
                            'route' => ['usuarios.update', $usuario],
                            'method' => 'put',
                            'id' => 'formulario',
                            'autocomplete' => 'off',
                            'onsubmit' => 'return checkSubmit();',
                        ]) !!}
                        <div class="form-group position-relative">
                            <label class="h5">Nombre</label>
                            <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                id="name" value="{{ $usuario->name }}">
                            {!! $errors->first('name', '<div class="invalid-tooltip">:message</div>') !!}
                        </div>
                        <div class="form-group position-relative">
                            <label class="h5">Apellido Paterno</label>
                            <input class="form-control {{ $errors->has('apellido_paterno') ? ' is-invalid' : '' }}"
                                name="apellido_paterno" id="apellido_paterno" value="{{ $usuario->apellido_paterno }}">
                            {!! $errors->first('apellido_paterno', '<div class="invalid-tooltip">:message</div>') !!}
                        </div>
                        <div class="form-group position-relative">
                            <label class="h5">Apellido Materno</label>
                            <input class="form-control {{ $errors->has('apellido_materno') ? ' is-invalid' : '' }}"
                                name="apellido_materno" id="apellido_materno" value="{{ $usuario->apellido_materno }}">
                            {!! $errors->first('apellido_materno', '<div class="invalid-tooltip">:message</div>') !!}
                        </div>
                        <div class="form-group position-relative">
                            <label class="h5">Email</label>
                            <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                type="text" value="{{ $usuario->email }}">
                            {!! $errors->first('email', '<div class="invalid-tooltip">:message</div>') !!}
                        </div>
                        <h2 class="h5">Lista de roles</h2>
                        @foreach ($roles as $rol)
                            <p>
                                <label>
                                    {{ $rol->name }}
                                    <input type="radio" name="roles" value="{{ $rol->id }}"
                                        {{ $rol->id == $usuario->roles->first()->id ? 'checked' : '' }}>
                                </label>
                            </p>
                        @endforeach
                        <br>
                        <button type="button" class="btn btn-sm btn-primary" id="enviar">
                            Guardar
                        </button>
                        <a href="{{ route('usuarios.index') }}" class="btn btn-sm btn-default">Cancelar</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-modals.confirm text="Editar" />
@endsection

@section('js')
    <script>
        $.validator.addMethod("strong_password", function(value, element) {
            let password = value;
            if (!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&])(.{8,30}$)/.test(password))) {
                return false;
            }
            return true;
        }, function(value, element) {
            let password = $(element).val();
            if (!(/^(.{8,30}$)/.test(password))) {
                return 'La contraseña debe tener entre 8 y 30 caracteres.';
            } else if (!(/^(?=.*[A-Z])/.test(password))) {
                return 'La contraseña debe contener al menos una mayúscula.';
            } else if (!(/^(?=.*[a-z])/.test(password))) {
                return 'La contraseña debe contener al menos una minúscula.';
            } else if (!(/^(?=.*[0-9])/.test(password))) {
                return 'La contraseña debe contener al menos un dígito.';
            } else if (!(/^(?=.*[@#$%&])/.test(password))) {
                return "La contraseña debe contener caracteres especiales de @#$%&.";
            }
        });
        $.validator.addMethod("isEmail", function(value, element) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test($(element).val());
        }, function(value, element) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test($(element).val())) {
                return 'El correo es incorrecto'
            }
        });
        $('#formulario').validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 20
                },
                apellido_paterno: {
                    maxlength: 20
                },
                apellido_materno: {
                    maxlength: 20
                },
                email: {
                    required: true,
                    isEmail: true,
                    maxlength: 50,
                },
                roles: {
                    required: true
                },
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
            invalidHandler: function(event, validator) {
                if (validator.numberOfInvalids()) {
                    ion.sound.play("error");
                }
            },
            errorClass: "invalid-tooltip"
        });
    </script>
@stop
