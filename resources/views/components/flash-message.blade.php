@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" 
    class="position-fixed top-0 left-1/2 -translate-x-50 bg-php 
            text-white px-8r py-3">
    <p>
        {{session('message')}}
    </p>
</div>
@endif