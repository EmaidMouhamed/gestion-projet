@extends('admin.index')
@section('content')
<div class="d-md-flex justify-content-between align-items-center">
    <h5 class="mb-0">Ajout de Roles</h5>

    <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
        <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
            <li class="breadcrumb-item text-capitalize"><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item text-capitalize active" aria-current="page"><a href="{{ route('role.index')}}">Liste des Roles</a></li>
        </ul>
    </nav>
</div>
<div class="mt-4">
    <div class="card border-0" style="padding: 40px">
        <div class="row" >
                <div class="col-md-12">
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endforeach
                    @endif
                </div>
            
            <form action="{{ route('role.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-20">
                    <div class="mb-3">
                        <label class="form-label">Nom<span class="text-danger">*</span></label>
                        <div class="form-icon position-relative">
                            {{-- <i data-feather="user" class="fea icon-sm icons"></i> --}}
                            <input name="nom" id="name" type="text" class="form-control ps-5" placeholder="Nom du role:">
                        </div>
                    </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <div class="form-icon position-relative">
                            <i data-feather="message-circle" class="fea icon-sm icons"></i>
                            <textarea name="description" rows="4" class="form-control ps-5" placeholder="Votre description :"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="submit" id="submit" name="send" class="btn btn-primary" value="Enregistrer">
                    </div><!--end col-->
                </div><!--end row-->
            </form>
        </div><!--end row-->
    </div>
</div>
@endsection