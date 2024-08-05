@extends('admin.index')
@section('content')
    <div class="d-md-flex justify-content-between align-items-center">
        <h5 class="mb-0">Modification</h5>

        <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
            <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                <li class="breadcrumb-item text-capitalize"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item text-capitalize active" aria-current="page">Modifier Utilisateur</li>
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

                <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-20">
                        <div class="mb-3">
                            <label class="form-label">Nom<span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="name" id="name" type="text" class="form-control"
                                    placeholder="Nom de l'utilisateur :" value="{{ $user->name }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Prenom<span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="firstname" id="name" type="text" class="form-control"
                                    placeholder="prenom de l'utilisateur :" value="{{ $user->firstname }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Telephone<span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="tel" id="tel" type="number" class="form-control"
                                    placeholder="Telephone de l'utilisateur :" value="{{ $user->tel }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email<span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="email" id="email" type="email" class="form-control"
                                    placeholder="email de l'utilisateur :" value="{{ $user->email }}" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Roles
                            </label>
                            <select multiple class="form-select form-control" name="role_id[]"
                                aria-label="Default select
                            example">

                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" @selected($user->roles->contains($role->id))>{{ $role->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mot de passe<span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="password" id="password" type="password" class="form-control"
                                    placeholder="Mot de passe:" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirmer mot de passe<span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="confim_password" id="confirm_password" type="password" class="form-control"
                                    placeholder="confirmer le Mot de passe" required>
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
