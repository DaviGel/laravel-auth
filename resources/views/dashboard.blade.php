@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <a class="btn btn-sm btn-primary" href="{{ route('dashboard.create') }}">Crea nuovo progetto</a>
                <div class="card mt-3">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach ($projects as $project)
                            <h4>{{ $project->title }}</h4>
                            <p>{{ $project->description }}</p>
                            <div class="buttons d-flex">
                                <a class="text-decoration-none btn btn-sm btn-info mb-4 text-white"
                                    href="{{ route('dashboard.show', $project->id) }}" alt="Project">Dettaglio</a>
                                <a class="text-decoration-none mx-1 btn btn-sm btn-warning mb-4 text-white"
                                    href="{{ route('dashboard.edit', $project->id) }}" alt="Edit">Modifica</a>
                                <form action="{{ route('dashboard.destroy', $project->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modal-{{ $project->id }}">
                                        Cancella
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-{{ $project->id }}" tabindex="-1"
                                        aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cancellazione
                                                        progetto
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Sei sicuro di voler cancellare il progetto: {{ $project->title }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annulla</button>
                                                    <button type="submit" class="btn btn-danger">Cancella</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
