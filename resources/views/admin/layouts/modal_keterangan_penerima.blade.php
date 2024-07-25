@props(['loopId'])

<!-- Large Modal -->
<div id="keterangan-modal-{{ $loopId }}" tabindex="-1"
    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
    <div class="relative max-h-full w-full max-w-md">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Keterangan Calon Penerima
                </h3>
                <button type="button"
                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="keterangan-modal-{{ $loopId }}">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="space-y-4 p-4 md:p-5">
                <div class="space-y-4 text-sm">
                    <div><strong>Nama:</strong> {{ $data->alternative->nama }} </div>
                    <div class="flex"><strong>Verifikasi:</strong>
                        <div>{{ $data->is_verified ? 'Terverifikasi' : 'Tidak Memenuhi Verifikasi' }}</div>
                    </div>
                    <div><strong>Verifikasi Deskripsi:</strong>
                        {{ $data->is_verified_desc ? $data->is_verified_desc : '-' }}</div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center rounded-b border-t border-gray-200 p-4 dark:border-gray-600 md:p-5">
                {{-- <button data-modal-hide="keterangan-modal-{{ $loopId }}" type="button"
                    class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                    accept</button>
                <button data-modal-hide="keterangan-modal-{{ $loopId }}" type="button"
                    class="ms-3 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Decline</button> --}}
            </div>
        </div>
    </div>
</div>
