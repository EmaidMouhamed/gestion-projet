@extends('admin.index')
@section('content')
    <div class="d-md-flex justify-content-between align-items-center">
        <h5 class="mb-0">Ajout</h5>

        <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
            <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                <li class="breadcrumb-item text-capitalize"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item text-capitalize active" aria-current="page">Ajout d'un Utilisateur</li>
            </ul>
        </nav>
    </div>
    <div class="mt-4">
        <div class="card border-0" style="padding: 40px">
            <div class="row">
                <div class="col-md-12">
                    {{--     @if (session()->has('message'))
                             <div class="alert alert-success alert-dismissible fade show" role="alert">
                                 {{ session('message') }}
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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

                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-20">
                        <div class="mb-3">
                            <label class="form-label">Nom<span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="name" id="name" type="text" class="form-control"
                                    placeholder="Nom de l'utilisateur :" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Prenom<span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="firstname" id="name" type="text" class="form-control"
                                    placeholder="prenom de l'utilisateur :" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <div class="col">
                                <label class="form-label">Telephone<span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <input name="tel" id="tel" type="number" class="form-control"
                                        placeholder="Telephone de l'utilisateur :" required>
                                </div>
                            </div>

                            <div class="col ms-3">
                                <label class="form-label">Email<span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <input name="email" id="email" type="email" class="form-control"
                                        placeholder="email de l'utilisateur :" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Roles<span class="text-danger">*</span></label>
                            <select multiple class="form-select form-control" name="role_id[]"
                                aria-label="Default select example">

                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" @selected(in_array($role->id, old('role_id', []), true))>
                                        {{ $role->nom }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <div class="col">
                                <label class="form-label">Mot de passe<span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <input name="password" id="password" type="password" class="form-control"
                                        placeholder="Mot de passe:" required>
                                </div>
                            </div>

                            <div class="col ms-3">
                                <label class="form-label">Confirmer mot de passe<span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <input name="confirm_password" id="confirm_password" type="password"
                                        class="form-control" placeholder="confirmer le Mot de passe" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" id="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div><!--end row-->
        </div>
    </div>
@endsection
