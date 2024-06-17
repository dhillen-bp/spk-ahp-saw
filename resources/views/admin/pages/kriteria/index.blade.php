@extends('admin.layouts.app')

@section('content')
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">DATA KRITERIA</h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="me-0.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Data Kriteria</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="mt-8 pb-4">
        <div class="mb-2 flex justify-between">
            <h3 class="mb-2 text-xl font-bold">Tabel Data Kriteria</h3>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <div class="flex-column flex flex-wrap items-center justify-between space-y-4 pb-4 sm:flex-row sm:space-y-0">

                <a href="{{ route('admin.kriteria.create') }}"
                    class="text- mb-2 me-2 flex items-center justify-center rounded-lg bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                    <span>
                        @include('partials.icons._plus-icons', [
                            'class' => 'h-5 w-5 text-white',
                        ])
                    </span>
                    Tambah Kriteria</a>

                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div
                        class="rtl:inset-r-0 pointer-events-none absolute inset-y-0 left-0 flex items-center ps-3 rtl:right-0">
                        <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search"
                        class="block w-80 rounded-lg border border-gray-300 bg-white p-2 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Search for items">
                </div>
                <div>
                    <button type="button"
                        class="hover:text-primary-700 flex flex-shrink-0 items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                        <svg class="mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                        </svg>
                        Export
                    </button>
                </div>
            </div>
            <table class="w-full text-left text-sm text-gray-500 rtl:text-right">
                <thead class="bg-blue-50 text-center text-xs font-bold uppercase text-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Atribut
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bobot
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($kriteria as $data)
                        <tr class="text-gray-900 odd:bg-white even:bg-blue-50 hover:bg-gray-50 even:hover:bg-blue-100">
                            <th class="px-6 py-4">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $data->nama }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="{{ $data->atribut == 'benefit' ? 'badge-benefit' : 'badge-cost' }}">
                                    {{ ucfirst($data->atribut) }}</span>
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->bobot == null ? '-' : $data->bobot }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="" class="btn-primary rounded-lg px-2.5 py-1.5 text-xs">Detail</a>
                                <a href="{{ route('admin.kriteria.edit', $data->id) }}"
                                    class="btn-warning rounded-lg px-2.5 py-1.5 text-xs">Edit</a>
                                <button data-modal-target="delete-modal-{{ $loop->iteration }}"
                                    data-modal-toggle="delete-modal-{{ $loop->iteration }}"
                                    class="btn-danger rounded-lg px-2.5 py-1.5 text-xs">Hapus</button>
                            </td>
                        </tr>

                        @component('admin.layouts.modal_delete', [
                            'deleteMessage' => "Anda yakin menghapus data = $data->nama?",
                            'loopId' => $loop->iteration,
                            'deletedId' => $data->id,
                            'routeName' => 'admin.kriteria.destroy',
                        ])
                        @endcomponent
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- PAGINATION --}}
        <div>
            {{ $kriteria->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection

@push('after-script')
@endpush
