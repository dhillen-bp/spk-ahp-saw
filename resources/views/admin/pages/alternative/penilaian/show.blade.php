@extends('admin.layouts.app')
@section('content')
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">DETAIL PENILAIAN ALTERNATIVE</h1>
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
                        <a href="{{ route('admin.alternative.penilaian.index') }}"
                            class="ms-1 text-sm text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Data
                            Penilaian Aternative</a>
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
                            Penilaian Aternative</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="mx-auto w-full py-4 lg:w-[700px]">
        @if (Auth::guard('admin')->user()->role === 'pemerintah_desa')
            <div class="flex justify-between">
                <a href="{{ route('admin.alternative.penilaian.edit', $alternative->id) }}"
                    class="btn-warning rounded-lg px-2.5 py-2 text-sm">Edit</a>
                <button data-modal-target="delete-modal-{{ $alternative->id }}"
                    data-modal-toggle="delete-modal-{{ $alternative->id }}"
                    class="btn-danger rounded-lg px-2.5 py-2 text-sm">Hapus</button>

                @component('admin.layouts.modal_delete', [
                    'deleteMessage' => "Anda yakin menghapus data = $alternative->nama?",
                    'loopId' => $alternative->id,
                    'deletedId' => $alternative->id,
                    'routeName' => 'admin.alternative.penilaian.destroy',
                ])
                @endcomponent
            </div>
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-left rtl:text-right dark:text-gray-400">
                <thead class="text-sm text-gray-900 dark:text-gray-400">
                    <tr class="border-b">
                        <th scope="col" class="text-nowrap bg-gray-50 px-6 py-4 uppercase dark:bg-gray-800">
                            Nama Alternative
                        </th>
                        <th scope="col" class="px-6 py-4">
                            {{ $alternative->nama }}
                        </th>
                    </tr>
                    <tr class="border-b">
                        <th scope="col" class="text-nowrap bg-gray-50 px-6 py-4 uppercase dark:bg-gray-800">
                            NIK
                        </th>
                        <th scope="col" class="px-6 py-4 font-normal">
                            {{ $alternative->nik }}
                        </th>
                    </tr>
                    <tr class="border-b">
                        <th scope="col" class="text-nowrap bg-gray-50 px-6 py-4 uppercase dark:bg-gray-800">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-4 font-normal">
                            {{ $alternative->alamat }}
                        </th>
                    </tr>
                    <tr class="border-b">
                        <th scope="col" class="text-nowrap bg-gray-50 px-6 py-4 uppercase dark:bg-gray-800">
                            Kontak
                        </th>
                        <th scope="col" class="px-6 py-4 font-normal">
                            {{ $alternative->kontak ?? '-' }}
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse ($alternative->alternativeValues as $alternativeValue)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row"
                                class="whitespace-nowrap bg-gray-50 px-6 py-4 uppercase text-gray-900 dark:bg-gray-800 dark:text-white">
                                {{ $alternativeValue->criteria->nama }}
                            </th>
                            <td class="px-6 py-4">
                                @if ($alternativeValue->criteria->subCriteria->isNotEmpty())
                                    @php
                                        $subCriteriaName =
                                            $alternativeValue->criteria->subCriteria->firstWhere(
                                                'nilai',
                                                $alternativeValue->nilai,
                                            )->nama ?? 'N/A';
                                    @endphp
                                    {{ $subCriteriaName . ' (' . $alternativeValue->nilai . ')' }}
                                @else
                                    {{ number_format($alternativeValue->nilai, 0, '.', '.') ?? 'N/A' }}
                                @endif
                            </td>
                        </tr>
                    @empty
                        <p>N/A</p>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
