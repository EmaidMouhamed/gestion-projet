@extends('admin.index')
@section('content')
    <div class="d-md-flex justify-content-between align-items-center">
        <h5 class="mb-0">Liste</h5>

        <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
            <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                <li class="breadcrumb-item text-capitalize"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item text-capitalize active" aria-current="page">Liste des taches</li>
            </ul>
        </nav>
    </div>

    <div class="mt-4">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- @if($errors->any())
                     @foreach($errors->all() as $error)
                         <div class="alert alert-danger alert-dismissible fade show" tache="alert">
                             {{ $error }}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                     @endforeach
                 @endif--}}
            </div>
        </div>
        <div class="card border-0">
            <div class="d-flex justify-content-between p-4 shadow rounded-top">
                <h6 class="fw-bold mb-0">Listes</h6>
                <div>
                    <a href="{{ route('tache.create') }}" class="btn btn-md btn-pills btn-primary">
                        Ajouter une tache
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
                        <th class="border-bottom p-3" style="min-width: 150px;">Proprietée</th>
                        <th class="border-bottom p-3" style="min-width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($taches as $tache)
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
                                    <td class="text-end p-1">
                                        <a href="{{ route('tache.edit', $tache) }}"
                                           class="btn btn-lg btn-icon btn-pills btn-info">
                                            <i data-feather="edit" class="fea icon-lg icons"></i>
                                        </a>
                                    </td>

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

                                    @unless($tache->etat)
                                        <td class="text-end p-1">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                               data-bs-target="#delete{{ $tache->id }}"
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
        {{ $taches->links() }}
    </div>

    <!-- Delete modal Start -->
    @foreach($taches as $tache)
        <x-modal-delete :model="$tache" route="tache"/>
    @endforeach
    <!-- Delete modal End -->
@endsection
