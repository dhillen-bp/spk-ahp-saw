@extends('layouts.app')

@section('content')
    <div class="relative h-96 w-full bg-cover bg-center py-32"
        style="background-image: url('{{ asset('images/background/karangwuni-bg.jpg') }}');">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-900 opacity-75"></div>
        <h1 class="relative text-center text-3xl font-bold text-white">Detail Pengaduan</h1>
    </div>

    <div class="-mb-16 p-4 md:px-6">

        <div class="relative -top-24 mx-2 rounded-lg bg-blue-100 p-8 sm:mx-4 md:mx-8">
            <a href="{{ route('pengaduan.index') }}"
                class="rounded-full bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</a>
            <h2 class="mb-2 mt-7 text-2xl font-bold text-gray-900">Data {{ $pengaduan->criteria->nama }} Salah</h2>
            <div class="mb-4"><strong class="text-gray-700"> Status:</strong>
                @if ($pengaduan->status == 'selesai')
                    <span class="badge-success">
                        {{ $pengaduan->status }}</span>
                @elseif($pengaduan->status == 'diproses')
                    <span class="badge-primary">
                        {{ $pengaduan->status }}</span>
                @else
                    <span class="badge-warning">
                        {{ $pengaduan->status }}</span>
                @endif
            </div>
            <p class="mb-2 text-gray-700"><strong>Data warga yang diminta perbarui:</strong>
                {{ $pengaduan->alternative->nama }}</p>
            <p class="mb-2 text-gray-700"><strong>Tanggal:</strong> {{ $pengaduan->created_at->format('d M Y') }}</p>
            <p class="text-gray-700"><strong>Deskripsi:</strong></p>
            <p class="mb-2 text-gray-700">{{ $pengaduan->deskripsi_aduan }}</p>
            <p class="text-gray-700"><strong>Balasan Pemerintah Desa:</strong></p>
            <p class="text-gray-700">{{ $pengaduan->keterangan_balasan }}</p>
        </div>
    </div>
@endsection
