@props(['listing'])

<div class="col col-lg-6">
    <div class="d-flex bg-gray-50 border border-1 border-gray-200 rounded-1 p-4">
        <img class="d-none w-12r me-4 d-block"
            src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png')}}" alt="" />
        <div>
            <h3 class="fs-4">
                <a class="text-black" href="/listings/{{$listing->id}}">{{ $listing->title }}</a>
            </h3>
            <div class="text-xl fw-bold mb-3">{{$listing->company}}</div>

            <x-listing-tags :tagsCsv="$listing->tags" />

            <div class="text-lg mt-3">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
        </div>
    </div>
</div>