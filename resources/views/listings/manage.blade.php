<x-layout>
    <x-card class="p-lg-5 p-2 mx-lg-2 mx-2">
        <header>
            <h1 class="text-3xl text-center fw-bold my-4 text-uppercase">
                Zarządzaj ogłoszeniami
            </h1>
        </header>

        <table class="w-100 table-auto">
            <tbody>
                @unless($listings->isEmpty())
                @foreach($listings as $listing)
                <tr class="border-gray-300">
                    <td class="m-0 px-3 py-2r border-1 border-top border-bottom border-gray-300 text-lg">
                        <a class="hover:text-php" href="/listings/{{$listing->id}}"> {{$listing->title}} </a>
                    </td>
                    <td class="m-0 px-3 py-2r border-1 border-top border-bottom border-gray-300 text-lg">
                        <a href="/listings/{{$listing->id}}/edit" class="hover:text-php text-blue-400 px-4 py-2"><i
                                class="fa-solid fa-pen-to-square"></i>
                            Edytuj</a>
                    </td>
                    <td class="m-0 px-3 py-2r border-1 border-top border-bottom border-gray-300 text-lg">
                        <form method="POST" action="/listings/{{$listing->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 bg-gray-100 hover:text-php"><i class="fa-solid fa-trash"></i> Usuń</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td class="px-3 py-2r border-1 border-top border-bottom border-gray-300 text-lg">
                        <p class="text-center">Brak ogłoszeń</p>
                    </td>
                </tr>
                @endunless

            </tbody>
        </table>
    </x-card>
</x-layout>