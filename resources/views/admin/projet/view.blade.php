@extends('admin.index')
@section('content')
    <div class="d-md-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail</h5>

        <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
            <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                <li class="breadcrumb-item text-capitalize"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item text-capitalize active" aria-current="page">Detail d'un projet</li>
            </ul>
        </nav>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="card shadow rounded border-0">
                <div class="card-body">

                    <div class="invoice-middle py-4">
                        <h5>Projet Details :</h5>
                        <div class="row mb-0">
                            <div class="col-xl-9 col-md-8 order-2 order-md-1">
                                <dl class="row">
                                    <dt class="col-md-3 col-5 fw-normal">Projet No. :</dt>
                                    <dd class="col-md-9 col-7 text-muted">{{ $projet->id }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Nom :</dt>
                                    <dd class="col-md-9 col-7 text-muted">{{ $projet->nom }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Date Debut :</dt>
                                    <dd class="col-md-9 col-7 text-muted"
                                    >{{ $projet->date_debut->format('d M Y') }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Date Fin :</dt>
                                    <dd class="col-md-9 col-7 text-muted">{{ $projet->date_fin->format('d M Y') }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Statut :</dt>
                                    <dd class="col-md-9 col-7 text-muted">{{ $projet->statut }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Description :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        {{ $projet->description ?? "Pas de description pour ce projet" }}
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Crée par :</dt>
                                    <dd class="col-md-9 col-7 text-muted">{{ $projet->user->name }}</dd>

                                </dl>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div><!--end col-->
    </div><!--end row-->
@endsection
