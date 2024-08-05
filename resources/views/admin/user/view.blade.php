@extends('admin.index')

@section('content')
    <div class="d-md-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail</h5>

        <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
            <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                <li class="breadcrumb-item text-capitalize"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item text-capitalize active" aria-current="page">Detail d'un utilisateur</li>
            </ul>
        </nav>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="card shadow rounded border-0">
                <div class="card-body">
                    <div>
                        <x-back-btn route="role" />
                    </div>

                    <div class="invoice-middle py-4">
                        <h5>Role Details :</h5>
                        <div class="row mb-0">
                            <div class="col-xl-9 col-md-8 order-2 order-md-1">
                                <dl class="row">
                                    <dt class="col-md-3 col-5 fw-normal">Utilisateur No. :</dt>
                                    <dd class="col-md-9 col-7 text-muted">{{ $user->id }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Nom :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        {{ Str::title($user->name) }}
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Prenom :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        {{ Str::title($user->firstname) }}
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Telephone :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        {{ $user->tel }}
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Enail :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        {{ $user->email }}
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Role :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        @foreach ($user->roles as $role)
                                            <span class="badge bg-soft-secondary">{{ $role->nom }}</span>
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
