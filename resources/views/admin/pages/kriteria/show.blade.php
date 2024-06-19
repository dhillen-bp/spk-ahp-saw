@extends('admin.layouts.app')
@section('content')
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">DETAIL KRITERIA</h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.index') }}"
                        class="inline-flex items-center text-sm text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        @include('partials.icons._dashboard-icon', ['class' => 'me-0.5 h-3 w-3'])
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('admin.kriteria.index') }}"
                            class="ms-1 text-sm text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Data
                            Kriteria</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm text-gray-500 dark:text-gray-400 md:ms-2">Detail
                            Kriteria</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="my-3 flex justify-center">
        <a href="{{ route('admin.kriteria.sub.create', $criteria->id) }}"
            class="mb-2 me-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
            Sub Kriteria</a>
    </div>

    <div class="mx-auto w-full py-4 lg:w-[700px]">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-left rtl:text-right dark:text-gray-400">
                <thead class="text-sm text-gray-900 dark:text-gray-400">
                    <tr class="border-b">
                        <th scope="col" class="text-nowrap bg-gray-50 px-6 py-4 uppercase dark:bg-gray-800">
                            Nama Kriteria
                        </th>
                        <th scope="col" class="px-6 py-4">
                            {{ $criteria->nama }}
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row"
                            class="whitespace-nowrap bg-gray-50 px-6 py-4 uppercase text-gray-900 dark:bg-gray-800 dark:text-white">
                            Keterangan
                        </th>
                        <td class="px-6 py-4">
                            {{ $criteria->keterangan }}
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row"
                            class="whitespace-nowrap bg-gray-50 px-6 py-4 uppercase text-gray-900 dark:bg-gray-800 dark:text-white">
                            Atribut
                        </th>
                        <td class="px-6 py-4">
                            {{ $criteria->atribut }}
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row"
                            class="whitespace-nowrap bg-gray-50 px-6 py-4 uppercase text-gray-900 dark:bg-gray-800 dark:text-white">
                            Subkriteria
                        </th>
                        <td class="px-6 py-4">
                            <ol class="list-decimal">
                                @forelse ($criteria->subCriteria as $subcriteria)
                                    <div class="flex items-center justify-between">
                                        <li>{{ $subcriteria->nama }} -
                                            <span
                                                class="me-2 rounded bg-purple-100 px-2.5 py-0.5 text-xs font-medium text-purple-800 dark:bg-purple-900 dark:text-purple-300">{{ round($subcriteria->nilai) }}</span>
                                        </li>
                                        <div class="my-auto">
                                            <a href="{{ route('admin.kriteria.sub.edit', $subcriteria->id) }}"
                                                class="btn-warning rounded-lg px-2.5 py-1.5 text-xs">Edit</a>
                                            <button data-modal-target="delete-modal-{{ $loop->iteration }}"
                                                data-modal-toggle="delete-modal-{{ $loop->iteration }}"
                                                class="btn-danger rounded-lg px-2.5 py-1.5 text-xs">Hapus</button>
                                        </div>
                                    </div>
                                    <hr class="my-4 h-px border-0 bg-gray-200 dark:bg-gray-700">
                                    @component('admin.layouts.modal_delete', [
                                        'deleteMessage' => "Anda yakin menghapus data = $subcriteria->nama?",
                                        'loopId' => $loop->iteration,
                                        'deletedId' => $subcriteria->id,
                                        'routeName' => 'admin.kriteria.sub.destroy',
                                    ])
                                    @endcomponent
                                @empty
                                    <p>Tidak ada sub kriteria</p>
                                @endforelse
                            </ol>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
