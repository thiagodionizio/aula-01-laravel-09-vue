@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="content">
            <div class="card">
                {{ Form::model($user, ['url' => route('users.update', ['user'=>$user->id]), 'method'=>'put']) }}

                    <div class="card-header">
                        <h3 class="card-header">Usuários</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('Nome') }}
                            {{ Form::text('name', $user->name, ['class'=>'form-control', 'placeholder'=>"Digite o nome do usuário"]) }}
                        </div>

                        <div class="form-group">

                            {{ Form::label('E-mail') }}
                            {{ Form::email('email', $user->email, ['class'=>'form-control', 'placeholder'=>"Digite o e-mail do usuário"]) }}
                        </div>
                        <div class="form-group">

                            {{ Form::label('Senha') }}
                            {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>"Digite a senha do usuário"]) }}
                        </div>


                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="submit">Salvar</button>
                    </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
