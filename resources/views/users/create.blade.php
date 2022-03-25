@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="content">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-header">Usuários</h3>
                        <div class="card-tools">

                        </div>

                    </div>

                    <div class="card-body">
                       @include('users._form')
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="submit">Salvar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
