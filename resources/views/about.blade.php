<x-app-layout title="About">
    <x-slot name="heading">
        About
    </x-slot>
    <div class="w-full flex flex-col">
        <div class="flex">
            <input id="search" type="text" class="w-[300px] py-2 px-4 rounded-xl outline-none border"
                placeholder="search" autocomplete="off">
        </div>
        <ul id="suggestions" class="bg-white border rounded-lg mt-12 w-[300px] hidden absolute z-10"></ul>
        <textarea id="description" class="w-[300px] bg-white mt-4 p-2 border rounded-lg resize-none" rows="5"
            placeholder="Deskripsi akan tampil di sini" disabled></textarea>
    </div>
    <script>
        document.getElementById('search').addEventListener('input', function() {
            const query = this.value.trim(); // Hapus spasi berlebih
            const suggestionsBox = document.getElementById('suggestions');

            if (query.length > 0) {
                fetch(`/autocomplete-fruits?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        suggestionsBox.innerHTML = data.map(fruit =>
                            `<li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">${fruit}</li>`).join('');
                        suggestionsBox.classList.remove('hidden');
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                suggestionsBox.classList.add('hidden'); // Sembunyikan suggestions ketika input kosong
            }
        });

        document.getElementById('suggestions').addEventListener('click', function(e) {
            if (e.target.tagName === 'LI') {
                const selectedValue = e.target.textContent.trim(); // Hapus spasi di awal/akhir teks
                document.getElementById('search').value = selectedValue;

                // Ambil deskripsi buah berdasarkan nama
                fetch(`/get-fruit-description?name=${encodeURIComponent(selectedValue)}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('description').value = data.description;
                    })
                    .catch(error => console.error('Error:', error));

                this.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>
