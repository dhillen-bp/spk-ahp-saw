@extends('layouts.app')

@section('content')
    <div class="relative h-96 w-full bg-cover bg-center py-32"
        style="background-image: url('{{ asset('images/background/karangwuni-bg.jpg') }}');">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-900 opacity-75"></div>
        <h1 class="relative text-center text-3xl font-bold text-white">Form Pengaduan</h1>
    </div>


    <div class="-mb-16 p-4 md:px-6">
        <div class="relative -top-24 mx-2 rounded-lg bg-blue-100 p-8 sm:mx-4 md:mx-8">
            <div class="grid grid-cols-1 space-y-5 md:grid-cols-5 md:space-x-10 md:space-y-0">

                <form method="POST" action="{{ route('pengaduan.store') }}"
                    class="mx-auto w-full rounded-lg p-4 md:col-span-3">
                    @csrf
                    <div class="mb-5 flex items-end justify-between space-x-4">
                        <div class="w-full">
                            <label for="nik"
                                class="{{ $errors->has('nik') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                                Masukkan NIK anda: <span class="font-bold text-red-500">*</span></label>
                            <input type="text" id="nik" name="nik"
                                class="{{ $errors->has('nik') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                                value="{{ old('nik') }}" />
                            <p id="nikError" class="mt-2 text-sm text-red-600"></p>
                            @error('nik')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <button type="button" id="checkNikButton"
                                class="mt-2 rounded-lg bg-blue-500 px-4 py-2 text-xs font-bold text-white hover:bg-blue-600">
                                Periksa NIK
                            </button>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="nama" class="mb-2 block text-sm font-medium text-gray-900">
                            Nama Warga: </label>
                        <input type="text" id="nama"
                            class="block w-full cursor-not-allowed rounded-lg border border-gray-300 bg-gray-100 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            value="" disabled readonly>
                    </div>

                    <div class="mb-5">
                        <label for="criteria_values" data-target="#fieldPenilaianKriteria"
                            class="{{ $errors->has('criteria_values') ? 'text-red-900' : 'text-gray-900' }} toggle-table mb-2 block text-sm font-medium">
                            Penilaian Berdasarkan Kriteria:
                            <span class="toggle-sign float-right">-</span>
                        </label>

                        <div id="fieldPenilaianKriteria">
                            @foreach ($criterias as $criteria)
                                <div class="my-4 rounded-lg border border-blue-500 px-2 py-3 shadow-sm">
                                    <label for="nilai_{{ $criteria->id }}" class="text-sm">{{ $criteria->nama }}</label>
                                    @if ($criteria->subcriteria->isNotEmpty())
                                        <select disabled id="nilai_{{ $criteria->id }}"
                                            name="criteria_values[{{ $criteria->id }}]"
                                            class="mt-2 block w-full rounded-lg border p-2.5 text-sm">
                                            <option class="text-gray-200" value="" disabled selected>-Pilih-</option>
                                            @foreach ($criteria->subcriteria as $sub)
                                                <option value="{{ $sub->nilai }}">{{ $sub->nama }} -
                                                    {{ $sub->nilai }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="number" id="nilai_{{ $criteria->id }}" disabled
                                            name="criteria_values[{{ $criteria->id }}]" min="0"
                                            class="mt-2 block w-full rounded-lg border p-2.5 text-sm">
                                    @endif
                                </div>
                            @endforeach
                            @error('criteria_values')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="criteria_to_edit" class="mb-2 block text-sm font-medium text-gray-900">
                            Kriteria yang akan diubah: <span class="font-bold text-red-500">*</span>
                        </label>
                        <select id="criteria_to_edit" name="criteria_to_edit"
                            class="mt-2 block w-full rounded-lg border p-2.5 text-sm">
                            <option value="" disabled selected>-Pilih Kriteria-</option>
                            @foreach ($criterias as $criteria)
                                <option value="{{ $criteria->id }}">{{ $criteria->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-5">
                        <label for="new_value" class="mb-2 block text-sm font-medium text-gray-900">
                            Nilai Baru: <span class="font-bold text-red-500">*</span>
                        </label>
                        <div id="new_value_container">
                            <input type="number" id="new_value" name="new_value" min="0"
                                class="mt-2 block w-full cursor-not-allowed rounded-lg border p-2.5 text-sm" disabled>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="deskripsi_aduan"
                            class="{{ $errors->has('deskripsi_aduan') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                            Deskripsi Aduan</label>
                        <textarea id="deskripsi_aduan" rows="4" name="deskripsi_aduan"
                            class="{{ $errors->has('deskripsi_aduan') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm">{{ old('deskripsi_aduan') }}</textarea>
                        @error('deskripsi_aduan')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Simpan</button>
                </form>

                <div class="col-span-2 rounded-lg bg-blue-50 p-4">
                    <h3 class="text-center text-lg font-bold">Keterangan Form Pengaduan</h3>

                    <ol>
                        <li>1. Isi kolom "Masukkan NIK anda", kemudian tekan tombol Periksa NIK.</li>
                        <li> 2. Periksa data anda apakah sesuai.</li>
                        <li>3. Pilih Kriteria yang akan diubah jika ada data yang salah.</li>
                        <li>4. Isikan nilai baru berdasrkan kriteria.</li>
                        <li>5. Masukkan deskripsi aduan jika ada.</li>
                        <li>6. Tekan tombol simpan untuk mengirim aduan.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    {{-- CHECK NIK --}}
    <script type="module">
        document.getElementById('checkNikButton').addEventListener('click', function() {
            const nik = document.getElementById('nik').value;
            const nikError = document.getElementById('nikError');
            const namaInput = document.getElementById('nama');

            // Clear previous error message and name value
            nikError.textContent = '';
            namaInput.value = '';

            fetch('{{ route('pengaduan.checkNik') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        nik: nik
                    })
                })
                .then(response => {
                    // Check if the response is JSON
                    return response.json().catch(() => {
                        throw new Error('NIK tidak sesuai');
                    });
                })
                .then(data => {
                    if (data.status === 'success') {
                        namaInput.value = data.nama;

                        // Update criteria values
                        const criteriaValues = data.criteria_values;
                        for (const [criteriaId, value] of Object.entries(criteriaValues)) {
                            const inputElement = document.getElementById(`nilai_${criteriaId}`);
                            if (inputElement) {
                                inputElement.value = value;
                                // inputElement.disabled = false;
                            }
                        }
                    } else {
                        throw new Error(data.message || 'NIK tidak sesuai');
                    }
                })
                .catch(error => {
                    nikError.textContent = error.message;
                });
        });
    </script>

    {{-- TAMPIL KRITERIA YANG DIPILIH --}}
    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {
            const criteriaSelect = document.getElementById('criteria_to_edit');
            const newValueContainer = document.getElementById('new_value_container');

            criteriaSelect.addEventListener('change', function() {
                const selectedCriteriaId = this.value;

                // Reset the new value input or select
                newValueContainer.innerHTML = '';

                if (selectedCriteriaId) {
                    // Use Blade to generate the base route URL without selectedCriteriaId
                    const baseUrl = `{{ route('pengaduan.getDetails', ':id') }}`.replace(':id',
                        selectedCriteriaId);

                    fetch(baseUrl)
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                if (data.subcriteria.length > 0) {
                                    // Handle subcriteria
                                    const options = data.subcriteria.map(sub =>
                                        `<option value="${sub.nilai}">${sub.nama} (${sub.nilai})</option>`
                                    ).join('');

                                    // Create select element
                                    const select = document.createElement('select');
                                    select.id = 'new_value';
                                    select.name = 'new_value';
                                    select.className =
                                        'mt-2 block w-full rounded-lg border p-2.5 text-sm';
                                    select.innerHTML =
                                        `<option value="" disabled selected>-Pilih-</option>` + options;
                                    newValueContainer.appendChild(select);

                                    select.disabled = false;
                                    select.classList.remove('cursor-not-allowed');
                                } else {
                                    // Handle numeric criteria
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.id = 'new_value';
                                    input.name = 'new_value';
                                    input.min = '0';
                                    input.className =
                                        'mt-2 block w-full rounded-lg border p-2.5 text-sm';
                                    newValueContainer.appendChild(input);

                                    input.disabled = false;
                                    input.classList.remove('cursor-not-allowed');
                                }
                            } else {
                                // Handle failure
                                newValueContainer.innerHTML = '';
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching criteria details:', error);
                        });
                } else {
                    newValueContainer.innerHTML = '';
                }
            });
        });
    </script>


    <script type="module">
        $(document).ready(function() {
            $('.toggle-table').click(function() {
                var target = $(this).data('target');
                $(target).toggle();
                var sign = $(target).is(':visible') ? '-' : '+';
                $(this).find('.toggle-sign').text(sign);
            });
        });
    </script>
@endpush
