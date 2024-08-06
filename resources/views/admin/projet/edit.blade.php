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
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  {{ session('message') }}
                                  <button type="button" class="btn-close" data-bs-dismiss="alert"
                                          aria-label="Close"></button>
                              </div>
                          @endif --}}
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                                <input name="nom" id="nom" type="text" class="form-control"
                                       placeholder="Nom du projet :" value="{{ old('nom', $projet->nom) }}" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <div class="col">
                                <label class="form-label">Date Debut<span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <input name="date_debut" id="date_debut" type="date" class="form-control"
                                           placeholder="Date de début du projet :"
                                           value="{{ $projet->date_debut->format('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3 ms-3">
                                    <label class="form-label">Date Fin<span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <input name="date_fin" id="date_fin" type="date" class="form-control"
                                               placeholder="Date de fin du projet :"
                                               value="{{ $projet->date_fin->format('Y-m-d') }}"
                                               required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mb-3">

                        <div class="col">
                            <label class="form-label" for="budget">Budget</label>
                            <div class="form-icon position-relative">
                                <input name="budget" id="budget" type="text" class="form-control"
                                       placeholder="200000" value="{{ old('budget', $projet) }}">
                            </div>
                        </div>

                        <div class="col ms-3">
                            <label class="form-label">Statut<span class="text-danger">*</span></label>
                            <select name="statut" class="form-select form-control"
                                    aria-label="Default select example">

                                @foreach (\App\Enums\Statut::getLabels() as $value => $label)
                                    <option value="{{ $value }}" @selected($projet->statut->value === $value)
                                    >{{ $label  }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Chef de projet<span class="text-danger">*</span></label>
                        <select class="form-select form-control" name="user_id"
                                aria-label="Default select example">

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"  @selected($user->id === $projet->user_id)>
                                    {{ $user->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Description<span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                    <textarea name="description" rows="4" class="form-control"
                                              placeholder="Votre description :">{{ $projet->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" id="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </div><!--end col-->
                </form>
            </div><!--end row-->
        </div><!--end row-->
    </div>
@endsection
