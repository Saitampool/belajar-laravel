<x-app-layout title="About">
    <x-slot name="heading">
        About
    </x-slot>
    <div class="w-full flex">
        <input id="search" type="text" class="w-[300px] py-2 px-4 rounded-l-xl outline-none" placeholder="search"
            autocomplete="off">
        <button type="submit" class="bg-blue-800 hover:bg-blue-600 flex items-center py-2 px-3 rounded-r-xl">
            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
            </svg>
        </button>
    </div>
    <ul id="suggestions" class="bg-white border rounded-lg mt-2 w-[300px] hidden"></ul>
    <script>
        document.getElementById('search').addEventListener('input', function() {
            const query = this.value;
            const suggestionsBox = document.getElementById('suggestions');

            if (query.length > 0) {
                fetch(`/autocomplete-fruits?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        suggestionsBox.innerHTML = data.map(fruit =>
                            `<li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">${fruit}</li>`).join('');
                        suggestionsBox.classList.remove('hidden');
                    });
            } else {
                suggestionsBox.classList.add('hidden');
            }
        });

        document.getElementById('suggestions').addEventListener('click', function(e) {
            if (e.target.tagName === 'LI') {
                document.getElementById('search').value = e.target.textContent;
                this.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>
