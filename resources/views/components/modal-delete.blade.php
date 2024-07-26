@props(['model', 'route'])

<div class="modal fade" id="delete{{ $model->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded shadow border-0">
            <div class="modal-body py-5">
                <div class="text-center">
                    <div
                        class="icon d-flex align-items-center justify-content-center bg-soft-danger rounded-circle mx-auto"
                        style="height: 95px; width:95px;">
                        <h1 class="mb-0"><i class="uil uil-heart-break align-middle"></i></h1>
                    </div>
                    <div class="mt-4">
                        <h4>Êtes vous sûr de vouloir le supprimer</h4>
                        <p class="text-muted">
                            Il vous sera impossible de revenir en arriére
                        </p>
                        <div class="mt-4">
                            <form action="{{ route("$route.destroy", $model)}}"
                                  method="POST" style="display:inline-block;">
                                @csrf
                                @method("DELETE")

                                <a onclick="event.preventDefault();this.closest('form').submit();"
                                   class="btn btn-pills btn-danger">
                                    Supprimer
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
