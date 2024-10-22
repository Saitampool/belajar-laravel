<x-app-layout title="{{ $page_meta['title'] }}">
    <x-slot name="heading">
        {{ $page_meta['title'] }}
    </x-slot>
    <form action="{{ $page_meta['url'] }}" method="post" class="space-y-5">
        @method($page_meta['method'])
        @csrf
        <div>
            <label for="name">Name</label>
            <input class="border px-4 py-2 rounded block mt-1" value="{{ old('name', $user->name) }}" type="text"
                id="name" name="name">
            @error('name')
                <p class="text-red-500 test-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input class="border px-4 py-2 rounded block mt-1" value="{{ old('email', $user->email) }}" type="text"
                id="email" name="email">
            @error('email')
                <p class="text-red-500 test-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input class="border px-4 py-2 rounded block mt-1" type="password" id="password" name="password">
            @error('password')
                <p class="text-red-500 test-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <x-button>
            {{ $page_meta['submit_text'] }}
        </x-button>
    </form>
</x-app-layout>
