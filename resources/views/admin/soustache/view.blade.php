@extends('admin.index')
@section('content')
    <div class="d-md-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail</h5>

        <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
            <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                <li class="breadcrumb-item text-capitalize"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item text-capitalize active" aria-current="page">Detail d'une Sous Tache</li>
            </ul>
        </nav>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="card shadow rounded border-0">
                <div class="card-body">
                    <div>
                        <x-back-btn route="sousTache" />
                    </div>
                    <div class="invoice-middle py-4">
                        <h5>Sous Tache Details :</h5>
                        <div class="row mb-0">
                            <div class="col-xl-9 col-md-8 order-2 order-md-1">
                                <dl class="row">
                                    <dt class="col-md-3 col-5 fw-normal">Sous Tache No. :</dt>
                                    <dd class="col-md-9 col-7 text-muted">{{ $sousTache->id }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Nom :</dt>
                                    <dd class="col-md-9 col-7 text-muted">{{ $sousTache->nom }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Date Limit :</dt>
                                    <dd class="col-md-9 col-7 text-muted">{{ $sousTache->date_limite->format('d M Y') }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Statut :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        <span class="badge rounded-pill {{ $sousTache->statut->badgeClass() }}">
                                            {{ $sousTache->statut->value }}
                                        </span>
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Prioritée :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        <span class="badge rounded-pill {{ $sousTache->prioritee->badgeClass() }}">
                                            {{ $sousTache->prioritee->value }}
                                        </span>
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Description :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        {{ $sousTache->description }}
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Appartient au projet :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        {{ $sousTache->projet->nom }}
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Assigné aux utilisateurs :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        @foreach ($users as $user)
                                            <span class="badge rounded-pill bg-soft-secondary"> {{ $user->name }} </span>
                                        @endforeach
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
