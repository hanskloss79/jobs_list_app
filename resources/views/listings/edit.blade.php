<x-layout>
    <x-card class="!p-5 max-w-32r mx-auto mt-6r">
        <header class="text-center">
            <h2 class="fs-4 fw-bold text-uppercase mb-1">
                Edytuj ogłoszenie
            </h2>
            <p class="mb-3">Edycja ogłoszenia: {{$listing->title}}</p>
        </header>

        <form method="POST" action="/listings/{{$listing->id}}" 
                enctype="multipart/form-data"> 
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="company" class="d-inline-block text-lg mb-2">Nazwa pracodawcy</label>
                <input type="text" class="border border-gray-200 rounded-1 p-2 w-100" 
                name="company" value="{{$listing->company}}"/>

                @error('company')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="title" class="d-inline-block text-lg mb-2">Tytuł ogłoszenia</label>
                <input type="text" class="border border-gray-200 rounded-1 p-2 w-100" name="title"
                    placeholder="Example: Senior Laravel Developer" 
                    value="{{$listing->title}}"/>

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="location" class="d-inline-block text-lg mb-2">Lokalizacja</label>
                <input type="text" class="border border-gray-200 rounded-1 p-2 w-100" 
                    name="location" placeholder="Przykład: Zdalnie, Kraków, itd." 
                    value="{{$listing->location}}"/>
                
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-4">
                <label for="email" class="d-inline-block text-lg mb-2">Email kontaktowy</label>
                <input type="text" class="border border-gray-200 rounded-1 p-2 w-100" 
                    name="email" value="{{$listing->email}}" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="website" class="d-inline-block text-lg mb-2">
                    Strona internetowa pracodawcy / strona projektu
                </label>
                <input type="text" class="border border-gray-200 rounded-1 p-2 w-100" 
                    name="website" value="{{$listing->website}}"/>
                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tags" class="d-inline-block text-lg mb-2">
                    Tagi (oddzielone przecinkami)
                </label>
                <input type="text" class="border border-gray-200 rounded-1 p-2 w-100" 
                        name="tags" placeholder="Przykład: Laravel, Backend, Postgres, itd." 
                        value="{{$listing->tags}}"/>
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror 
            </div>

            <div class="mb-4">
                <label for="logo" class="d-inline-block text-lg mb-2">
                    Logo firmy - pracodawcy
                </label>
                <input type="file" class="border border-gray-200 rounded-1 p-2 w-100" 
                    name="logo" />
                    <img class="w-12r me-4 mb-4" 
                    src="{{$listing->logo ? asset('storage/' . $listing->logo) : 
                    asset('images/no-image.png')}}" alt="" />
                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="d-inline-block text-lg mb-2">
                    Dokładny opis oferty pracy
                </label>
                <textarea class="border border-gray-200 rounded-1 p-2 w-100" name="description" rows="10"
                    placeholder="Uwzględnij zadania, wymagania, wynagrodzenie itp">{{$listing->description}}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <button class="bg-php text-white rounded-1 py-2 px-3 hover:bg-php-dark">
                    Uaktualnij ogłoszenie
                </button>

                <a href="/" class="text-black ms-3"> Powrót </a>
            </div>
        </form>
    </x-card>
</x-layout>