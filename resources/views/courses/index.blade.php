@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Cursos
                    @can('courses.create')
                    <a class="btn btn-sm btn-primary pull-right" href="{{ route('courses.create') }}">Crear</a>
                    @endcan
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10px">Curso</th>
                                <th width="20px">Nombre</th>
                                <th>Descripción</th>
                                <th colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td>{{ $course->id }}</td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->description }}</td>
                                <td>
                                    <a class="btn btn-sm btn-dark" href="{{ route('courses.show', $course->id) }}" title="Ver"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a class="btn btn-sm btn-warning" href="{{ route('courses.edit', $course->id) }}" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a class="btn btn-sm btn-danger" href="{{ route('courses.destroy', $course->id) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();" title="Eliminar">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>

                                    <form id="delete-form" action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $courses->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
