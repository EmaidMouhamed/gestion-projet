@extends('admin.index')
@section('content')
    <div class="d-md-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail</h5>

        <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
            <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                <li class="breadcrumb-item text-capitalize"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item text-capitalize active" aria-current="page">Detail d'une tache</li>
            </ul>
        </nav>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="card shadow rounded border-0">
                <div class="card-body">
                    <div>
                        <x-back-btn route="tache" />
                    </div>
                    <div class="invoice-middle py-4">
                        <h5>Tache Details :</h5>
                        <div class="row mb-0">
                            <div class="col-xl-9 col-md-8 order-2 order-md-1">
                                <dl class="row">
                                    <dt class="col-md-3 col-5 fw-normal">Tache No. :</dt>
                                    <dd class="col-md-9 col-7 text-muted">{{ $tache->id }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Nom :</dt>
                                    <dd class="col-md-9 col-7 text-muted">{{ $tache->nom }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Date Limit :</dt>
                                    <dd class="col-md-9 col-7 text-muted">{{ $tache->date_limite->format('d M Y') }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Statut :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        <span class="badge rounded-pill {{ $tache->statut->badgeClass() }}">
                                            {{ $tache->statut->value }}
                                        </span>
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Prioritée :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        <span class="badge rounded-pill {{ $tache->prioritee->badgeClass() }}">
                                            {{ $tache->prioritee->value }}
                                        </span>
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Description :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        {{ $tache->description }}
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Appartient au projet :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        {{ $tache->projet->nom }}
                                    </dd>

                                </dl>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div><!--end col-->
    </div><!--end row-->
@endsection
