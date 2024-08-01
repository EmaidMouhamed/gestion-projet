@extends('admin.index')
@section('content')
    <div class="d-md-flex justify-content-between align-items-center">
        <h5 class="mb-0">Liste</h5>

        <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
            <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                <li class="breadcrumb-item text-capitalize"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item text-capitalize active" aria-current="page">Liste user user</li>
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
                {{-- @if ($errors->any())
                     @foreach ($errors->all() as $error)
                         <div class="alert alert-danger alert-dismissible fade show" user="alert">
                             {{ $error }}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                     @endforeach
                 @endif --}}
            </div>
        </div>
        <div class="card border-0">
            <div class="d-flex justify-content-between p-4 shadow rounded-top">
                <h6 class="fw-bold mb-0">Listes des users assignées</h6>
                <div>
                    <a href="{{ route('assigner_role_user.create') }}" class="btn btn-md btn-pills btn-primary">
                        Assigner un user
                    </a>
                </div>
            </div>
            <div class="table-responsive shadow rounded-bottom" data-simplebar style="height: 545px;">
                <table class="table table-center bg-white mb-0">
                    <thead>
                    <tr>
                        <th class="border-bottom p-3">No.</th>
                        <th class="border-bottom p-3" style="min-width: 150px;">Nom</th>
                        <th class="border-bottom p-3" style="min-width: 150px;">Email</th>
                        <th class="border-bottom p-3" style="min-width: 150px;">Rôle</th>
                        <th class="border-bottom p-3" style="min-width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <!-- Start -->
                        <tr>
                            <th class="p-3">#{{ $user->id }}</th>
                            <td class="p-3">
                                <div class="d-flex align-items-center">
                                    <span class="ms-2">{{ Str::title($user->nom) }}</span>
                                </div>
                            </td>
                            <td class="p-3">
                                <div class="d-flex align-items-center">
                                        <span class="ms-2">
                                            @foreach ($user->permissions as $permission)
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
                                    <td class="text-end p-1">
                                        <a href="{{ route('user.assigner-user-user.create', $user) }}"
                                           title="Assigné à un utilisateur"
                                           class="btn btn-icon btn-lg btn-pills btn-light">
                                            <i data-feather="user-plus" class="fea icon-lg icons"></i>
                                        </a>
                                    </td>

                                    <td class="text-end p-1">
                                        <a href="{{ route('assigner_role_user.edit', $user) }}" title="Modifier"
                                           class="btn btn-lg btn-icon btn-pills btn-info">
                                            <i data-feather="edit" class="fea icon-lg icons"></i>
                                        </a>
                                    </td>

                                    @unless ($user->etat)
                                        <td class="text-end p-1">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                               data-bs-target="#delete{{ $user->id }}" title="Supprimer"
                                               class="btn btn-icon btn-lg btn-pills btn-danger">
                                                <i data-feather="trash-2" class="fea icon-lg icons"></i>
                                            </a>
                                        </td>
                                    @endif
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
        {{ $users->links() }}
    </div>

    <!-- Delete modal Start -->
    @foreach ($users as $user)
        <x-modal-delete :model="$user" route="assigner_role_user"/>
    @endforeach
    <!-- Delete modal End -->
@endsection
