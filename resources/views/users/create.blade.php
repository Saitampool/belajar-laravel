<x-app-layout title="Create User">
    <x-slot name="heading">
        Create User
    </x-slot>
    <form action="/users" method="post" class="space-y-5">
        @csrf
        <div>
            <label for="name">Name</label>
            <input class="border px-4 py-2 rounded block mt-1" type="text" id="name" name="name">
        </div>
        <div>
            <label for="email">Email</label>
            <input class="border px-4 py-2 rounded block mt-1" type="text" id="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input class="border px-4 py-2 rounded block mt-1" type="password" id="password" name="password">
        </div>
        <x-button>
            Save
        </x-button>
    </form>
</x-app-layout>
