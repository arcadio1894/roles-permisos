@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Usuario
                    @can('courses.index')
                    <a class="btn btn-sm btn-primary pull-right" href="{{ route('users.index') }}">Volver</a>
                    @endcan
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" name="name" required autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Roles') }}</label>

                            <ul class="list-unstyled">
                                @foreach($roles as $role)
                                    @if (in_array($role->id, $array_roles))
                                    <li>
                                        <label>
                                            <input type="checkbox" name="roles[]" checked value="{{ $role->id }}">
                                            {{ $role->name }}
                                            <em>({{ $role->description }})</em>
                                        </label>
                                    </li>
                                    @else
                                        <li>
                                            <label>
                                                <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                                                {{ $role->name }}
                                                <em>({{ $role->description }})</em>
                                            </label>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar cambios') }}
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
