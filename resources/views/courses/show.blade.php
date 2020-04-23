@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Ver Curso
                    @can('courses.index')
                        <a class="btn btn-sm btn-primary pull-right" href="{{ route('courses.index') }}">Volver</a>
                    @endcan
                </div>

                <div class="card-body">
                    <p><strong>Nombre</strong>     {{ $course->name }}</p>
                    <p><strong>Descripción</strong>  {{ $course->description }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
