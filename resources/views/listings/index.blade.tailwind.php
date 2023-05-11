<x-layout>

    {{-- @extends('layout')
    @section('content') --}}

    {{-- wyświetlenie komponentu hero na stronie z ogłoszeniami --}}
    @include('parts._heroBS5')
    {{-- @include('parts._hero') --}}
    @include('parts._searchBS5')
    {{-- @include('parts._search') --}}

    {{-- wyświetlanie listy ogłoszeń --}}
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @if(count($listings) == 0)
        <p>Nie ma żadnych ogłoszeń</p>
        @endif

        @foreach($listings as $listing)
        <x-listing-card :listing="$listing" />
        @endforeach

    </div>

    <div class="mt-6 p-4">
        {{$listings->links()}}
    </div>
    {{-- @endsection --}}
</x-layout>