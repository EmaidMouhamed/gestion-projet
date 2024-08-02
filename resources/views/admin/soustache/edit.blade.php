@extends('admin.index')
@section('content')
    <div class="d-md-flex justify-content-between align-items-center">
        <h5 class="mb-0">Modification</h5>

        <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
            <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                <li class="breadcrumb-item text-capitalize"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item text-capitalize active" aria-current="page">Modification d'une Sous Tache</li>
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

                <form action="{{ route('sousTache.update', $sousTache) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="col-md-20">
                        <div class="mb-3">
                            <label class="form-label">Nom<span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="nom" id="name" type="text" class="form-control"
                                    placeholder="Nom de la Sous tache :" value="{{ $sousTache->nom }}" required>
                            </div>
                        </div>



                        <div class="d-flex justify-content-between mb-3">
                            <div class="col">
                                <label class="form-label">Date limite<span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <input name="date_limite" id="date_limit" type="date" class="form-control"
                                        placeholder="Date limite de la tâche :"
                                        value="{{ $sousTache->date_limite->format('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="col ms-3">
                                <label class="form-label">Statut<span class="text-danger">*</span></label>
                                <select name="statut" class="form-select form-control" aria-label="Default select example">

                                    @foreach (\App\Enums\Statut::getLabels() as $value => $label)
                                        <option value="{{ $value }}" @selected($sousTache->statut->value === $value)>{{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col ms-3">
                                <label class="form-label">Proprietée<span class="text-danger">*</span></label>
                                <select name="prioritee" class="form-select form-control"
                                    aria-label="Default select example">

                                    @foreach (\App\Enums\Prioritee::getLabels() as $value => $label)
                                        <option value="{{ $value }}" @selected($sousTache->prioritee->value === $value)>{{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Projet
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-select form-control" name="projet_id"
                            aria-label="Default select
                        example">

                            @foreach ($taches as $tache)
                                <option value="{{ $tache->id }}" @selected($tache->id === $sousTache->tache_id )>
                                    {{ $tache->nom }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Assignée à
                        </label>
                        <select multiple class="form-select form-control" name="user_id[]"
                            aria-label="Default select
                        example">

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    @selected($sousTache->users->contains($user->id))>{{ $user->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Description<span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <textarea name="description" rows="4" class="form-control" placeholder="Votre description :">{{ $sousTache->description }}</textarea>
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
