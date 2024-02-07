@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.projects.index') }}">Torna alla lista dei progetti</a>
                <div class="card mt-3">
                    <div class="card-header">{{ __('Crea nuovo progetto') }}</div>
                    <div class="card-body">
                        <form class="mt-3" action="{{ route('admin.projects.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Titolo</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrizione</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id=""
                                    cols="30" rows="10">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    name="slug" value="{{ old('slug') }}">
                                @error('slug')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Invia</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
