

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'E-mail:', ['class'=>'form-label']) !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Tipo:', ['class'=>'form-label']) !!}
    <p>@forelse($user->roles as $key => $role)
            {{ $role->name  }}{{count($user->roles) != $key+1 ? ",": ""}}
        @empty
        @endforelse</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Status:', ['class'=>'form-label']) !!}
    <p>{!! ($user->status != 1)? "<strike>" : "" !!}{{$user->name}}{!! ($user->status != 1)? "<strike>" : "" !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:', ['class'=>'form-label']) !!}
    <p>{!! $user->created_at !!}</p>
</div>
