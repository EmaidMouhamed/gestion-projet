@extends('admin.index')

@section('content')
    <div class="d-md-flex justify-content-between align-items-center">
        <h5 class="mb-0">Liste</h5>

        <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
            <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                <li class="breadcrumb-item text-capitalize"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item text-capitalize active" aria-current="page">Liste des role</li>
            </ul>
        </nav>
    </div>

    <div class="mt-4">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('erreur'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('erreur') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        <div class="card border-0">
            <div class="d-flex justify-content-between p-4 shadow rounded-top">
                <h6 class="fw-bold mb-0">Listes</h6>
                @can('create', \App\Models\Role::class)
                    <div>
                        <a href="{{ route('role.create') }}" class="btn btn-md btn-pills btn-primary">
                            Ajouter un role
                        </a>
                    </div>
                @endcan
            </div>
            <div class="table-responsive shadow rounded-bottom" data-simplebar style="height: 545px;">
                <table class="table table-center bg-white mb-0">
                    <thead>
                    <tr>
                        <th class="border-bottom p-3">No.</th>
                        <th class="border-bottom p-3" style="min-width: 150px;">Nom</th>
                        <th class="border-bottom p-3" style="min-width: 150px;">Permission</th>
                        <th class="border-bottom p-3" style="min-width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $role)
                        <!-- Start -->
                        <tr>
                            <th class="p-3">#{{ $role->id }}</th>
                            <td class="p-3">
                                <a href="{{ route('role.show', $role) }}" class="text-primary">
                                    <div class="d-flex align-items-center">
                                        <span class="ms-2">{{ Str::title($role->nom) }}</span>
                                    </div>
                                </a>
                            </td>
                            <td class="p-3">
                                <div class="d-flex align-items-center">
                                        <span class="ms-2">
                                            @foreach ($role->permissions as $permission)
                                                {{ (Str::ucfirst($permission->name)) }}
                                                @unless($loop->last)
                                                    {{ ', ' }}
                                                @endif
                                            @endforeach
                                        </span>
                                </div>
                            </td>
                            <td>
                                <table>
                                    @can('update', $role)
                                        <td class="text-end p-1">
                                            <a href="{{ route('role.edit', $role) }}" title="Modifier"
                                               class="btn btn-lg btn-icon btn-pills btn-info">
                                                <i data-feather="edit" class="fea icon-lg icons"></i>
                                            </a>
                                        </td>

                                        @if ($role->etat)
                                            <td class="text-end p-1">
                                                <a href="{{ route('role.activer', $role) }}"
                                                   title="Clicker pour désactivé"
                                                   class="btn btn-lg btn-icon btn-pills btn-success">
                                                    <i data-feather="thumbs-up" class="fea icon-lg icons"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td class="text-end p-1">
                                                <a href="{{ route('role.activer', $role) }}" title="Clicker pour activé"
                                                   class="btn btn-icon btn-lg btn-pills btn-secondary">
                                                    <i data-feather="thumbs-down" class="fea icon-lg icons"></i>
                                                </a>
                                            </td>
                                        @endif
                                    @endcan

                                    @can('delete', $role)
                                        @unless ($role->etat)
                                            <td class="text-end p-1">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#delete{{ $role->id }}"
                                                   class="btn btn-icon btn-lg btn-pills btn-danger">
                                                    <i data-feather="trash-2" class="fea icon-lg icons"></i>
                                                </a>
                                            </td>
                                        @endif
                                    @endcan
                                </table>
                            </td>
                        </tr>
                        <!-- End -->
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!--end col-->

    {{-- Pagination --}}
    <div class="mt-2 text-lg">
        {{ $roles->links() }}
    </div>

    <!-- Delete modal Start -->
    @foreach ($roles as $role)
        <x-modal-delete :model="$role" route="role"/>
    @endforeach
    <!-- Delete modal End -->
@endsection
