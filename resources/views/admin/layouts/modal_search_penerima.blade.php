<div class="result-item border-b p-3">
    <p><strong>Nama:</strong> {{ $result->alternative->nama }}</p>
    <p><strong>NIK:</strong> {{ $result->alternative->nik }}</p>
    <p><strong>Alamat:</strong> {{ $result->alternative->alamat }}</p>
    <hr class="mb-3 mt-3">
    <p class="text-green-700">Anda adalah <b>Penerima </b> BLT Dana Desa Tahun {{ $selectedYear }}
        <a href="{{ route('pengumuman.penerima') }}" target="_blank"
            class="ml2 mb-2 me-2 rounded-lg bg-green-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Lihat
            Pengumuman</a>

    </p>
</div>
