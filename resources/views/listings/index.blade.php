<x-layout>

    {{-- @extends('layout')
    @section('content') --}}

    {{-- wyświetlenie komponentu hero na stronie z ogłoszeniami --}}
    @include('parts._heroBS5')
    {{-- @include('parts._hero') --}}
    @include('parts._searchBS5')
    {{-- @include('parts._search') --}}

    {{-- wyświetlanie listy ogłoszeń --}}

        
            <div class="mx-4 row g-3">

                @if(count($listings) == 0)
                <p>Nie ma żadnych ogłoszeń</p>
                @endif

                @foreach($listings as $listing)
                <x-listing-card :listing="$listing" />
                @endforeach

            </div>


        <div class="mt-4 p-4">
            {{$listings->links()}}
        </div>
        {{-- @endsection --}}
</x-layout>