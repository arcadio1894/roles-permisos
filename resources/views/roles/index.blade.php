@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Roles
                        @can('roles.create')
                            <a class="btn btn-sm btn-primary pull-right" href="{{ route('roles.create') }}">Crear</a>
                        @endcan
                    </div>

                    <div class="card-body">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="10px">Role</th>
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th>Descripción</th>
                                <th colspan="3">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->slug }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                        @can('roles.show')
                                            <a class="btn btn-sm btn-dark" href="{{ route('roles.show', $role->id) }}" title="Ver"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        @endcan
                                        @can('roles.edit')
                                            <a class="btn btn-sm btn-warning" href="{{ route('roles.edit', $role->id) }}" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        @endcan
                                        @can('roles.destroy')
                                            <a class="btn btn-sm btn-danger" href="{{ route('roles.destroy', $role->id) }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();" title="Eliminar">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>

                                            <form id="delete-form" action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $roles->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


