<div class="result-item border-b p-3">
    <p><strong>Nama:</strong> {{ $result->alternative->nama }}</p>
    <p><strong>NIK:</strong> {{ $result->alternative->nik }}</p>
    <p><strong>No KK:</strong> {{ $result->alternative->no_kk }}</p>
    <p><strong>Alamat:</strong> {{ $result->alternative->alamat }}</p>
    <hr class="mb-3 mt-3">
    <p class="text-green-700">Anda adalah <b>Penerima </b> BLT Dana Desa Tahun {{ $selectedYear }}
    </p>
</div>
