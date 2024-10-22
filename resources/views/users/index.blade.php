<x-app-layout title="Users">
    <x-slot name="heading">
        Users
    </x-slot>
    <div class="sm:flex sm:items-center">
        <x-section-title>
            <x-slot name="title">
                Users
            </x-slot>
            <x-slot name="description">
                A list of all the users in your account including their name, title, email and role
            </x-slot>
        </x-section-title>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <x-button as="a" href="/users/create">
                Add user
            </x-button>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <x-table>
            <x-table.thead>
                <tr>
                    <x-table.th>No</x-table.th>
                    <x-table.th>Name</x-table.th>
                    <x-table.th>Email</x-table.th>
                    <x-table.th>Created At</x-table.th>
                    <x-table.th>Action</x-table.th>
                </tr>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ (new \Carbon\Carbon($user->published_at))->format('d F y') }}</td>
                        <td>
                            <a href="/users/{{ $user->id }}">
                                View
                            </a>
                            <a href="/users/{{ $user->id }}/edit">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table>
    </div>
</x-app-layout>
