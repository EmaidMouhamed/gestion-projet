@props(['route'])

<a href="{{ route("$route.index") }}" {{ $attributes->class(['btn btn-md btn-outline-light']) }}>
    <i data-feather="arrow-left" class="fea icon-sm icons mb-1"></i>
    Retour
</a>
