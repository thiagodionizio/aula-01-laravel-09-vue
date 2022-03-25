<div class="form-group">
    {{ Form::label('Nome') }}
    {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>"Digite o nome do usuário"]) }}
</div>

<div class="form-group">

    {{ Form::label('E-mail') }}
    {{ Form::email('email', null, ['class'=>'form-control', 'placeholder'=>"Digite o e-mail do usuário"]) }}
</div>
<div class="form-group">

    {{ Form::label('Senha') }}
    {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>"Digite a senha do usuário"]) }}
</div>
