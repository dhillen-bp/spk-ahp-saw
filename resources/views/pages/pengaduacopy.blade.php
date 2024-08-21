@extends('layouts.app')

@section('content')
    <section class="bg-slate-100">
        <div class="relative h-96 w-full bg-cover bg-center py-32"
            style="background-image: url('{{ asset('images/background/karangwuni-bg.jpg') }}');">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-900 opacity-75"></div>
            <h1 class="relative text-center text-3xl font-bold text-white">Pengaduan</h1>
        </div>

        <div class="-mb-16 p-4 md:px-6">
            <div class="relative -top-24 mx-2 rounded-lg bg-blue-100 p-8 sm:mx-4 md:mx-8">
                <div class="rounded-lg bg-blue-700 p-4 text-white">
                    <h3 class="text-center text-xl font-bold">Tata Cara Pengaduan</h3>
                    <div class="my-4">
                        <ol class="list-inside list-decimal space-y-2">
                            <li>Masuk ke halaman pengaduan.</li>
                            <li>Tekan tombol Buat Aduan berwarna biru.</li>
                            <li>Isikan form pengaduan sesuai yang ingin anda laporkan.</li>
                        </ol>
                    </div>
                </div>

                <div class="mt-8 space-y-4">
                    <a href="{{ route('pengaduan.create') }}"
                        class="mb-2 me-2 inline-block w-full rounded-full bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buat
                        Aduan</a>
                    <h3 class="text-center text-xl font-bold">Daftar Aduan</h3>
                    <div class="grid grid-cols-1 gap-4 p-4 md:grid-cols-3 md:p-6">
                        @foreach ($pengaduan as $data)
                            <div
                                class="block max-w-sm rounded-lg border border-gray-200 bg-white p-6 shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">

                                <div class="flex items-center justify-between gap-1">
                                    <h5 class="mb-4 text-lg font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $data->judul }}
                                    </h5>
                                    @if ($data->status == 'selesai')
                                        <span class="badge-success">
                                            {{ $data->status }}</span>
                                    @elseif($data->status == 'diproses')
                                        <span class="badge-primary">
                                            {{ $data->status }}</span>
                                    @else
                                        <span class="badge-warning">
                                            {{ $data->status }}</span>
                                    @endif
                                </div>

                                <div class="mb-2 font-light text-gray-700 dark:text-gray-400">
                                    <div class="flex gap-4">
                                        <div class="flex items-center">
                                            <svg class="h-4 w-4 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                                            </svg>
                                            <span class="text-sm">{{ $data->created_at->format('d M Y') }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="h-4 w-4 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="text-sm">{{ $data->pengirim }}</span>
                                        </div>
                                    </div>
                                </div>

                                <p class="font-normal text-gray-700 dark:text-gray-400">
                                    {{ strlen($data->deskripsi) > 20 ? substr($data->deskripsi, 0, 20) . '...' : $data->deskripsi }}
                                    <a href="{{ route('pengaduan.show', $data->id) }}"
                                        class="inline-flex items-center font-medium text-blue-600 hover:underline">
                                        Selengkapnya</a>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
