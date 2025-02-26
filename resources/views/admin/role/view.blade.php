@extends('admin.index')

@section('content')
    <div class="d-md-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail</h5>

        <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
            <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                <li class="breadcrumb-item text-capitalize"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item text-capitalize active" aria-current="page">Detail d'un role</li>
            </ul>
        </nav>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="card shadow rounded border-0">
                <div class="card-body">
                    <div>
                        <x-back-btn route="role"/>
                    </div>

                    <div class="invoice-middle py-4">
                        <h5>Role Details :</h5>
                        <div class="row mb-0">
                            <div class="col-xl-9 col-md-8 order-2 order-md-1">
                                <dl class="row">
                                    <dt class="col-md-3 col-5 fw-normal">Role No. :</dt>
                                    <dd class="col-md-9 col-7 text-muted">{{ $role->id }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Nom :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        {{ Str::title($role->nom) }}
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Description :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        {{ $role->description ?? "Pas de description pour ce role" }}
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Permission à :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        @forelse($role->permissions  as $permission)
                                            {{ Str::title($permission->name) }}
                                            @unless($loop->last)
                                                {{ ', ' }}
                                            @endif
                                        @empty
                                            Pas de permission attribué à ce role
                                        @endforelse
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Attribuée à :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        @forelse($role->users as $user)
                                            {{ $user->name }}
                                        @empty
                                            Pas d'utilisateur attribué à ce role
                                        @endforelse
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
