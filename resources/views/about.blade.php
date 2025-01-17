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
            const query = this.value.trim(); // Hapus spasi di awal/akhir teks input.
            const suggestionsBox = document.getElementById('suggestions'); // Ambil elemen kotak saran.

            if (query.length > 0) { // Jika input tidak kosong.
                fetch(`/autocomplete-fruits?query=${query}`) // Kirim permintaan ke endpoint dengan query.
                    .then(response => response.json()) // Konversi respons menjadi JSON.
                    .then(data => {
                        // Buat daftar item saran dari data hasil fetch.
                        suggestionsBox.innerHTML = data.map(fruit =>
                            `<li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">${fruit}</li>`).join('');
                        suggestionsBox.classList.remove('hidden'); // Tampilkan kotak saran.
                    })
                    .catch(error => console.error('Error:', error)); // Tangani kesalahan jika ada.
            } else {
                suggestionsBox.classList.add('hidden'); // Sembunyikan kotak saran jika input kosong.
            }
        });

        // Tambahkan event listener untuk mendeteksi klik pada elemen dengan id 'suggestions'.
        document.getElementById('suggestions').addEventListener('click', function(e) {
            if (e.target.tagName === 'LI') { // Jika elemen yang diklik adalah item daftar (LI).
                const selectedValue = e.target.textContent
            .trim(); // Ambil teks dari item yang diklik dan hapus spasi.
                document.getElementById('search').value = selectedValue; // Setel teks pada input pencarian.

                // Kirim permintaan untuk mendapatkan deskripsi berdasarkan nama buah yang dipilih.
                fetch(`/get-fruit-description?name=${encodeURIComponent(selectedValue)}`)
                    .then(response => response.json()) // Konversi respons menjadi JSON.
                    .then(data => {
                        document.getElementById('description').value = data
                        .description; // Tampilkan deskripsi pada textarea.
                    })
                    .catch(error => console.error('Error:', error)); // Tangani kesalahan jika ada.

                this.classList.add('hidden'); // Sembunyikan kotak saran setelah item dipilih.
            }
        });
    </script>
</x-app-layout>
