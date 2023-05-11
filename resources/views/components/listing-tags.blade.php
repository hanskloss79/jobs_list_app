@props(['tagsCsv'])

@php
    // rozbijamy łańcuch $tagsCsv z bazy na tablicę - separatorem jest ','
    $tags = explode(',', $tagsCsv);
@endphp

<ul class="d-flex ps-0">
    @foreach ($tags as $tag)
        <li class="d-flex bg-black rounded rounded-4 py-1 px-3 me-2 text-xs">
            <a class="justify-content-center text-white hover:text-php" href="/?tag={{$tag}}">{{$tag}}</a>
        </li> 
    @endforeach  
</ul>