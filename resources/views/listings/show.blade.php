<x-layout>
  <a href="/" class="d-block text-black max-w-32r mx-lg-auto mx-md-auto
    mb-2 mx-2 hover:text-php"><i class="fa-solid fa-arrow-left"></i> Powrót do listy
    ogłoszeń
  </a>
  <x-card class="p-5 max-w-32r mx-lg-auto mx-md-auto mx-2">
    <div class="d-flex flex-column items-center justify-content-center text-center">
      <img class="w-12r me-4 mb-4"
        src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt="" />

      <h3 class="fs-4 mb-2">
        {{$listing->title}}
      </h3>
      <div class="text-xl fw-bold mb-3">{{$listing->company}}</div>

      <x-listing-tags :tagsCsv="$listing->tags" />

      <div class="text-lg my-3">
        <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
      </div>
      <div class="border border-1 border-gray-300 w-100 mb-4"></div>
      <div>
        <h3 class="text-3xl fw-bold mb-3">Opis pracy</h3>
        <div class="text-lg space-y-6">
          {{$listing->description}}

          <a href="mailto:{{$listing->email}}"
            class="d-block bg-php text-white mt-4 py-2 rounded-4 hover:bg-php-dark"><i
              class="fa-solid fa-envelope"></i>
            Kontakt z pracodawcą</a>

          <a href="{{$listing->website}}" target="_blank"
            class="d-block bg-black text-white mt-4 py-2 rounded-4 hover:text-php"><i class="fa-solid fa-globe"></i>
            Strona pracodawcy</a>
        </div>
      </div>
    </div>
  </x-card>

  {{-- <x-card class="mt-4 p-2 flex space-x-6">
    <a href="/listings/{{$listing->id}}/edit">
      <i class="fa-solid fa-pencil"></i> Edit
    </a>

    <form method="POST" action="/listings/{{$listing->id}}">
      @csrf
      @method('DELETE')
      <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
    </form>
  </x-card> --}}
</x-layout>