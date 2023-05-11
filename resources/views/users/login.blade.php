<x-layout>
    <x-card class="p-5 max-w-32r mx-lg-auto mx-3 mt-6r">
        <header class="text-center">
            <h2 class="fs-4 fw-bold text-uppercase mb-1">
                Logowanie użytkownika
            </h2>
            <p class="mb-3">Zaloguj się do swojego konta aby zarządzać ogłoszeniami</p>
        </header>

        <form method="POST" action="/users/authenticate">
            @csrf
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
                <input type="password" class="border border-1 border-gray-200 rounded-1 p-2 w-100" name="password"
                    value="{{old('password')}}" />
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-php text-white rounded-1 py-2 px-3 hover:bg-php-dark">
                    Zaloguj się
                </button>
            </div>

            <div class="mt-4">
                <p>
                    Nie posiadasz konta?
                    <a href="/register" class="text-red-500  hover:text-php">Zarejestruj się</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>