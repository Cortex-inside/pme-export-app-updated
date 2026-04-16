<!-- Name Field -->
<div class="form-group ">
    {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('email', 'E-mail:', ['class'=>'form-label']) !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('cpf', 'BI:', ['class'=>'form-label']) !!}
        {!! Form::text('cpf', null, ['class' => 'form-control', 'required']) !!}
    </div>
</div>

@if(Route::is("users.create"))
    <div class="form-row">
        <div class="form-group col-md-6">
            {!! Form::label('password', 'Senha:', ['class'=>'form-label']) !!}
            {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group col-md-6">
            {!! Form::label('repassword', 'Confirmar senha:', ['class'=>'form-label']) !!}
            {!! Form::password('repassword',  ['class' => 'form-control', 'required']) !!}
        </div>
    </div>


    <div class="form-group ">
        {!! Form::label('role', 'Tipo de usuário:', ['class'=>'form-label']) !!}
        <select class="form-control role" name="role_id" id="role" data-placeholder="Selecione um tipo de usuário" required>
            <option></option>
            @forelse($roles as $key => $role)
                @if($role != 'empresa' && $role != 'empresa_estrangeira')
                    <option value="{{ $key  }}" @if($key == old('role_id')) SELECTED @endif >{{ ucwords
                    ($role) }}</option>
                @endif
            @empty
            @endforelse
        </select>
    </div>
@else
    @if($user->roles[0]->id != 7 && $user->roles[0]->id != 8)
        <div class="form-group ">
            {!! Form::label('role', 'Tipo de usuário:', ['class'=>'form-label']) !!}
            <select class="form-control role" name="role_id" id="role" data-placeholder="Selecione um tipo de usuário" required>
                <option></option>
                @forelse($roles as $key => $role)
                    @if(Auth::user()->roles[0]->id != 1 && $key == 1)
                    @else
                        @if($role != 'empresa' && $role != 'empresa_estrangeira')
                            <option value="{{ $key  }}" @if(in_array($key, $selectedRoles)) SELECTED @endif>{{ ucwords($role) }}</option>
                        @endif
                    @endif
                @empty
                @endforelse
            </select>
        </div>
    @endif
@endif
<div class="form-group departamento" style="display: none">
    {!! Form::label('department', 'Departamento:', ['class'=>'form-label']) !!}
    <select class="form-control department" id="department_id" name="department_id" data-placeholder="Departamento">
        <option value="">Escolha um departamento</option>
        @forelse($listDepartments as $department)
            <option value="{{$department->id}}" {{(old('department_id')==$department->id || (isset($user) && $user->department_id == $department->id)?"selected":"")}}>{{$department->name}}</option>
        @empty
        @endforelse
    </select>
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:', ['class'=>'form-label']) !!}
    {!! Form::select('status', ['1' => 'Habilitado','2' => 'Desabilitado'],null, ['class' => 'form-control',
    'required']) !!}
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
        <a href="{!! route('users.index') !!}" class="btn btn-default">Cancelar</a>
    </div>
    @if($user->uuid)
    <div class="form-group col-md-6">
        <a href="{!! route('users.change_password',$user->uuid) !!}" class="btn btn-warning pull-right">Alterar senha</a>
    </div>
    @endif
</div>