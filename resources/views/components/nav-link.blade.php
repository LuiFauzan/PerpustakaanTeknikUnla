
{{-- @props(['active'=> false])
<a {{ $attributes }} class="{{ $active ? 'bg-white text-green-600' : 'text-white border mx-4 border-white rounded-md hover:bg-white hover:text-green-600'}} px-4 duration-300 py-2 text-white border mx-4 border-white rounded-md hover:bg-white hover:text-green-600">{{ $slot }}</a> --}}

@props(['active'=> false])
<a {{ $attributes }} class="{{ $active ? 'bg-white text-green-600 hover:bg-white hover:text-green-600' : 'text-white '}} px-4 py-2 hover:bg-green-700 text-sm rounded-md">{{ $slot }}</a>
