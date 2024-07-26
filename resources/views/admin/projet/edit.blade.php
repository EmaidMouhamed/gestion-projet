@extends('admin.index')
@section('content')
    <div class="d-md-flex justify-content-between align-items-center">
        <h5 class="mb-0">Modification</h5>

        <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
            <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                <li class="breadcrumb-item text-capitalize"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item text-capitalize active" aria-current="page">Modification d'un Projet</li>
            </ul>
        </nav>
    </div>
    <div class="mt-4">
        <div class="card border-0" style="padding: 40px">
            <div class="row">
                <div class="row">
                    <div class="col-md-12">
                        {{--  @if (session()->has('message'))
                              <div class="alert alert-success alert-dismissible fade show" projet="alert">
                                  {{ session('message') }}
                                  <button type="button" class="btn-close" data-bs-dismiss="alert"
                                          aria-label="Close"></button>
                              </div>
                          @endif --}}
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" projet="alert">
                                    {{ $error }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <form action="{{ route('projet.update', $projet) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="col-md-20">
                        <div class="mb-3">
                            <label class="form-label">Nom<span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="nom" id="name" type="text" class="form-control"
                                    placeholder="Nom du projet :" value="{{ $projet->nom }}" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label">Date Debut<span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <input name="date_debut" id="date_debut" type="date" class="form-control"
                                            placeholder="Date de bebut du projet :" value="{{ $projet->date_debut }}"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label">Date Fin<span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <input name="date_fin" id="date_fin" type="date" class="form-control"
                                            placeholder="Date de fin du projet :" value="{{ $projet->date_fin }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Statut<span class="text-danger">*</span></label>
                            <select class="form-select form-control" aria-label="Default select example">
                                <option value="nouveau">Nouveau</option>
                                <option value="en_cours">En cours</option>
                                <option value="termine">Terminé</option>
                                <option value="archive">Archivé</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <div class="form-icon position-relative">
                                    <textarea name="description" rows="4" class="form-control" placeholder="Votre description :">{{ $projet->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" id="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div><!--end row-->
        </div>
    </div>
@endsection
