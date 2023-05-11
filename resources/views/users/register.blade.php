<x-layout>
    <x-card class="p-5 max-w-32r mx-lg-auto mx-3 mt-6r">
        <header class="text-center">
            <h2 class="fs-4 fw-bold text-uppercase mb-1">
                Rejstracja użytkowników
            </h2>
            <p class="mb-3">Utwórz konto aby publikować ogłoszenia</p>
        </header>

        <form method="POST" action="/users">
            @csrf
            <div class="mb-4">
                <label for="name" class="d-inline-block text-lg mb-2">
                    Nazwa konta
                </label>
                <input type="text" class="border border-1 border-gray-300 rounded-1 p-2 w-100" name="name"
                    value="{{old('name')}}" />

                @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="d-inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-1 border-gray-300 rounded-1 p-2 w-100" name="email"
                    value="{{old('email')}}" />

                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="d-inline-block text-lg mb-2">
                    Hasło
                </label>
                <input type="password" class="border border-1 border-gray-300 rounded-1 p-2 w-100" name="password"
                    value="{{old('password')}}" />
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="d-inline-block text-lg mb-2">
                    Potwierdź hasło
                </label>
                <input type="password" class="border border-1 border-gray-300 rounded-1 p-2 w-100" name="password_confirmation"
                    value="{{old('password_confirmation')}}" />
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-php text-white rounded-1 py-2 px-3 hover:bg-php-dark">
                    Zarejestruj się
                </button>
            </div>

            <div class="mt-4">
                <p>
                    Posiadasz już konto?
                    <a href="/login" class="text-red-500">Zaloguj się</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>