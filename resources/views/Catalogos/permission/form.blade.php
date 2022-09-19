<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('name', $permission->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),'placeholder' => 'Name','required']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('description', $permission->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''),'placeholder' => 'Description','required']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>
