@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Ver Rol
                    @can('roles.index')
                        <a class="btn btn-sm btn-primary pull-right" href="{{ route('roles.index') }}">Volver</a>
                    @endcan
                </div>

                <div class="card-body">
                    <p><strong>Nombre</strong>     {{ $role->name }}</p>
                    <p><strong>Slug</strong>       {{ $role->slug }}</p>
                    <p><strong>Descripción</strong>  {{ $role->description }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
