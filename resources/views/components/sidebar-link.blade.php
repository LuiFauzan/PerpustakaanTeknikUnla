@props(['active'=>false])
<a {{ $attributes }} class="{{ $active ? 'bg-green-600 text-white' : 'text-white hover:bg-green-600' }} ace rounded-lg py-3 pl-4 pr-4 text-lg  font-semibold ">{{ $slot }}</a>
