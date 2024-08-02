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
    <div class="col-md-12">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endforeach
        @endif --}}
    </div>
    <div class="row mt-4">
        <div class="col">
            <div class="card shadow rounded border-0">
                <div class="card-body">
                    <div>
                        <x-back-btn route="tache"/>
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
                                        <a href="{{ route('projet.show', $tache->projet) }}"
                                        >{{ $tache->projet->nom }}</a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0">
                        <div class="d-flex justify-content-between p-4 shadow rounded-top">
                            <h6 class="fw-bold mb-0">Listes</h6>
                            <div>
                                <a href="{{ route('tache.sousTache.create', $tache) }}"
                                   class="btn btn-md btn-pills btn-primary">
                                    Ajouter une sous tache
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive shadow rounded-bottom" data-simplebar style="height: 545px;">
                            <table class="table table-center bg-white mb-0">
                                <thead>
                                <tr>
                                    <th class="border-bottom p-3">No.</th>
                                    <th class="border-bottom p-3" style="min-width: 220px;">Nom</th>
                                    <th class="border-bottom p-3" style="min-width: 140px;">Date Limit</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">Statut</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">Propritée</th>
                                    <th class="border-bottom p-3" style="min-width: 100px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($tache->sousTaches as $sousTache)
                                    <!-- Start -->
                                    <tr>
                                        <th class="p-3">#{{ $sousTache->id }}</th>
                                        <td class="p-3">
                                            <a href="{{ route('sousTache.show', $sousTache) }}" class="text-primary">
                                                <div class="d-flex align-items-center">
                                                    <span>{{ $sousTache->nom }}</span>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="p-3">
                                            <div class="d-flex align-items-center">
                                                <span>{{ $sousTache->date_limite->format('d M Y') }}</span>
                                            </div>
                                        </td>
                                        <td class="p-3">
                                            <div class="d-flex align-items-center">
                                                    <span
                                                            class="badge rounded-pill {{ $sousTache->statut->badgeClass() }}">
                                                        {{ $sousTache->statut->value }}
                                                    </span>
                                            </div>
                                        </td>
                                        <td class="p-3">
                                            <div class="d-flex align-items-center">
                                                    <span
                                                            class="badge rounded-pill {{ $sousTache->prioritee->badgeClass() }}">
                                                        {{ $sousTache->prioritee->value }}
                                                    </span>
                                            </div>
                                        </td>
                                        <td>
                                            <table>
                                                <td class="text-end p-1">
                                                    <a href="{{ route('sousTache.edit', $sousTache) }}"
                                                       class="btn btn-lg btn-icon btn-pills btn-info">
                                                        <i data-feather="edit" class="fea icon-lg icons"></i>
                                                    </a>
                                                </td>

                                                {{--  @if ($sousTache->etat)
                                                  <td class="text-end p-1">
                                                      <a href="{{ route('sousTache.activer', $sousTache) }}"
                                                         title="Clicker pour désactivé"
                                                         class="btn btn-lg btn-icon btn-pills btn-success">
                                                          <i data-feather="thumbs-up" class="fea icon-lg icons"></i>
                                                      </a>
                                                  </td>
                                              @else
                                                  <td class="text-end p-1">
                                                      <a href="{{ route('sousTache.activer', $sousTache) }}"
                                                         title="Clicker pour activé"
                                                         class="btn btn-icon btn-lg btn-pills btn-secondary">
                                                          <i data-feather="thumbs-down" class="fea icon-lg icons"></i>
                                                      </a>
                                                  </td>
                                              @endif --}}
                                                <td class="text-end p-1">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                       data-bs-target="#delete{{ $sousTache->id }}"
                                                       class="btn btn-icon btn-lg btn-pills btn-danger">
                                                        <i data-feather="trash-2" class="fea icon-lg icons"></i>
                                                    </a>
                                                </td>
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
