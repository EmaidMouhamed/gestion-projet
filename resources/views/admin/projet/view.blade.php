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
                    <div>
                        <x-back-btn route="projet"/>
                    </div>

                    <div class="invoice-middle py-4">
                        <h5>Projet Details :</h5>
                        <div class="row mb-0">
                            <div class="col-xl-9 col-md-8 order-2 order-md-1">
                                <dl class="row">
                                    <dt class="col-md-3 col-5 fw-normal">Projet No. :</dt>
                                    <dd class="col-md-9 col-7 text-muted">{{ $projet->id }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Nom :</dt>
                                    <dd class="col-md-9 col-7 text-muted">{{ $projet->nom }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Budget :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        {{ $projet->budget ? number_format($projet->budget, 2) . ' FCFA' : 'Gratuit' }}
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Date Debut :</dt>
                                    <dd class="col-md-9 col-7 text-muted"
                                    >{{ $projet->date_debut->format('d M Y') }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Date Fin :</dt>
                                    <dd class="col-md-9 col-7 text-muted">{{ $projet->date_fin->format('d M Y') }}</dd>

                                    <dt class="col-md-3 col-5 fw-normal">Statut :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                            <span class="badge rounded-pill {{ $projet->statut->badgeClass() }}">
                                                {{ $projet->statut->value }}
                                            </span>
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Description :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        {{ $projet->description }}
                                    </dd>

                                    <dt class="col-md-3 col-5 fw-normal">Chef de projet :</dt>
                                    <dd class="col-md-9 col-7 text-muted">
                                        {{ $projet->user->name ?? "Utilisateur n'existe plus" }}
                                    </dd>

                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0">
                        <div class="d-flex justify-content-between p-4 shadow rounded-top">
                            <h6 class="fw-bold mb-0">Listes des taches</h6>
                            @can('create', \App\Models\Tache::class)
                                <div>
                                    <a href="{{ route('projet.tache.create', $projet->id) }}"
                                       class="btn btn-md btn-pills btn-primary">
                                        Ajouter une tache
                                    </a>
                                </div>
                            @endcan
                        </div>
                        <div class="table-responsive shadow rounded-bottom" data-simplebar style="height: 545px;">
                            <table class="table table-center bg-white mb-0">
                                <thead>
                                <tr>
                                    <th class="border-bottom p-3">No.</th>
                                    <th class="border-bottom p-3" style="min-width: 220px;">Nom</th>
                                    <th class="border-bottom p-3" style="min-width: 140px;">Date Limit</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">Statut</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">Proprietée</th>
                                    <th class="border-bottom p-3" style="min-width: 100px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($projet->taches as $tache)
                                    <!-- Start -->
                                    <tr>
                                        <th class="p-3">#{{ $tache->id }}</th>
                                        <td class="p-3">
                                            <a href="{{ route('tache.show', $tache) }}" class="text-primary">
                                                <div class="d-flex align-items-center">
                                                    <span>{{ $tache->nom }}</span>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="p-3">
                                            <div class="d-flex align-items-center">
                                                <span>{{ $tache->date_limite->format('d M Y') }}</span>
                                            </div>
                                        </td>
                                        <td class="p-3">
                                            <div class="d-flex align-items-center">
                                                <span class="badge rounded-pill {{ $tache->statut->badgeClass() }}">
                                                    {{ $tache->statut->value }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="p-3">
                                            <div class="d-flex align-items-center">
                                                <span class="badge rounded-pill {{ $tache->prioritee->badgeClass() }}">
                                                    {{ $tache->prioritee->value }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <table>
                                                @can('update', $tache)
                                                    <td class="text-end p-1">
                                                        <a href="{{ route('tache.edit', $tache) }}"
                                                           class="btn btn-lg btn-icon btn-pills btn-info">
                                                            <i data-feather="edit" class="fea icon-lg icons"></i>
                                                        </a>
                                                    </td>
                                                @endcan

                                                {{--  @if ($tache->etat)
                                                      <td class="text-end p-1">
                                                          <a href="{{ route('tache.activer', $tache) }}"
                                                             title="Clicker pour désactivé"
                                                             class="btn btn-lg btn-icon btn-pills btn-success">
                                                              <i data-feather="thumbs-up" class="fea icon-lg icons"></i>
                                                          </a>
                                                      </td>
                                                  @else
                                                      <td class="text-end p-1">
                                                          <a href="{{ route('tache.activer', $tache) }}"
                                                             title="Clicker pour activé"
                                                             class="btn btn-icon btn-lg btn-pills btn-secondary">
                                                              <i data-feather="thumbs-down" class="fea icon-lg icons"></i>
                                                          </a>
                                                      </td>
                                                  @endif--}}

                                                @can('delete', $tache)
                                                    <td class="text-end p-1">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                           data-bs-target="#delete{{ $tache->id }}"
                                                           class="btn btn-icon btn-lg btn-pills btn-danger">
                                                            <i data-feather="trash-2" class="fea icon-lg icons"></i>
                                                        </a>
                                                    </td>
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
                </div>
            </div>

        </div><!--end col-->
    </div><!--end row-->
@endsection
