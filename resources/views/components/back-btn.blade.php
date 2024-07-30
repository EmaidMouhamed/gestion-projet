@props(['route'])

<a href="{{ route("$route.index") }}" {{ $attributes->class(['btn btn-md btn-outline-light']) }}>
    Retour
</a>
