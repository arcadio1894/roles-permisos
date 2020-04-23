@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Usuarios
                        @can('users.create')
                            <a class="btn btn-sm btn-primary pull-right" href="{{ route('users.create') }}">Crear</a>
                        @endcan
                    </div>

                    <div class="card-body">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="10px">Usuario</th>
                                <th>Nombre</th>
                                <th colspan="3">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @can('users.show')
                                            <a class="btn btn-sm btn-dark" href="{{ route('users.show', $user->id) }}" title="Ver"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        @endcan
                                        @can('users.edit')
                                            <a class="btn btn-sm btn-warning" href="{{ route('users.edit', $user->id) }}" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        @endcan
                                        @can('users.destroy')
                                            <a class="btn btn-sm btn-danger" href="{{ route('users.destroy', $user->id) }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();" title="Eliminar">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>

                                            <form id="delete-form" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


