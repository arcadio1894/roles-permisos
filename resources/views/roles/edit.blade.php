@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Cursos
                    @can('courses.index')
                    <a class="btn btn-sm btn-primary pull-right" href="{{ route('roles.index') }}">Volver</a>
                    @endcan
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('roles.update', $role->id) }}">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $role->name }}" name="name" required autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Url amigable') }}</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ $role->slug }}" name="slug" required>

                                @error('slug')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" value="{{ $role->description }}" name="description" required>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Permisos especiales') }}</label>

                            <div class="col-md-6">
                                <input type="radio" id="all-access" name="special" value="all-access" {{ ($role->special == 'all-access')  ? 'checked' : '' }}>
                                <label for="all-access">Acceso total</label><br>
                                <input type="radio" id="no-access" name="special" value="no-access" {{ ($role->special == 'no-access')  ? 'checked' : '' }}>
                                <label for="no-access">Ningún acceso</label><br>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Permisos') }}</label>

                            <ul class="list-unstyled">
                                @foreach($permissions as $permission)
                                    @if (in_array($permission->id, $array_permission))
                                    <li>
                                        <label>
                                            <input type="checkbox" name="permissions[]" checked value="{{ $permission->id }}">
                                            {{ $permission->name }}
                                            <em>({{ $permission->description }})</em>
                                        </label>
                                    </li>
                                    @else
                                        <li>
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                                {{ $permission->name }}
                                                <em>({{ $permission->description }})</em>
                                            </label>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
