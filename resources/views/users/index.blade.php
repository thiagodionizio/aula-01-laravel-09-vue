@extends('adminlte::page')
@section('content')
    <div class="container-fluid">
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-header">Usuários</h3>
                    <div class="card-tools">
                        <a class="btn-tools" href="{{ route('users.create') }}">Adicionar novo</a>
                    </div>

                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Ação</th>
                            </tr>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>

                                        {{ Form::open(['url'=>route('users.destroy', ['user'=>$user]), 'method'=>'delete']) }}
                                        <a href="{{ route('users.edit', ['user'=>$user]) }}" class="btn btn-success">Editar</a>
                                        <button class="btn btn-danger" type="submit">Apagar</button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
