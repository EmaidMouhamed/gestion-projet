@extends('admin.index')
@section('content')
    <div class="d-md-flex justify-content-between align-items-center">
        <h5 class="mb-0">Modification</h5>

        <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
            <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                <li class="breadcrumb-item text-capitalize"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item text-capitalize active" aria-current="page">Modification d'un role</li>
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

                <form action="{{ route('role.update', $role) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="col-md-20">
                        <div class="mb-3">
                            <label class="form-label">Nom<span class="text-danger">*</span></label>
                            <div class="form-icon position-relative">
                                <input name="nom" id="name" type="text" class="form-control"
                                       placeholder="Nom du role :" value="{{ $role->nom }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Assignée un role à (optionnel)</label>
                            <select multiple class="form-select form-control" name="user_ids[]"
                                    aria-label="Default select example">
                                @foreach ($users as $user)
                                    <option
                                        value="{{ $user->id }}" @selected($role->users->contains($user->id))>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <div class="form-icon position-relative">
                                    <textarea name="description" rows="4" class="form-control"
                                              placeholder="Votre description :">{{ $role->description }}</textarea>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="permissions" class="form-label">Permissions</label>
                            <div class="d-flex gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                    <label class="form-check-label" for="checkAll">Tous cocher</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="uncheckAll">
                                    <label class="form-check-label" for="uncheckAll">Tous décocher</label>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-md-3 my-2">
                                        <div class="form-check">
                                            <input class="form-check-input permission-checkbox" type="checkbox"
                                                   value="{{ $permission->id }}"
                                                   id="permission{{ $permission->id }}" name="permissions[]"
                                                @checked($role->permissions->contains($permission->id))>
                                            <label class="form-check-label" for="permission{{ $permission->id }}">
                                                {{ Str::title(Str::replace('_', ' ', $permission->name)) }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
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
