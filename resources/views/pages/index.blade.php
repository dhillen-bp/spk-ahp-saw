 @extends('layouts.app')

 @section('content')
     {{-- JUMBOTRON --}}
     <section class="bg-gray-700 bg-cover bg-center bg-no-repeat bg-blend-multiply"
         style="background-image: url('{{ asset('images/background/karangwuni-bg.jpg') }}');">
         <div class="mx-auto max-w-screen-xl px-4 py-24 text-center lg:py-56">
             <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-white md:text-5xl lg:text-6xl">
                 Website Desa Karangwuni</h1>
             <p class="mb-8 text-lg font-normal text-gray-300 sm:px-16 lg:px-48 lg:text-xl">Selamat datang di website
                 informasi Penerima Bantuan Langsung Tunai Dana Desa Pemerintah Desa Karangwuni. Kunjungi informasi dan
                 pelayanan yang kami sediakan.
             </p>
             <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                 <a href="#"
                     class="inline-flex items-center justify-center rounded-lg bg-blue-700 px-5 py-3 text-center text-base font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                     Get started
                     <svg class="ms-2 h-3.5 w-3.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 14 10">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M1 5h12m0 0L9 1m4 4L9 9" />
                     </svg>
                 </a>
                 <a href="#"
                     class="inline-flex items-center justify-center rounded-lg border border-white px-5 py-3 text-center text-base font-medium text-white hover:bg-gray-100 hover:text-gray-900 focus:ring-4 focus:ring-gray-400 sm:ms-4">
                     Learn more
                 </a>
             </div>
         </div>
     </section>

     {{-- SERVICE CARD --}}
     <section class="bg-slate-100 p-4 py-8">
         <div class="mx-auto my-4 flex justify-center">
             <h2 class="inline-block rounded-full bg-white p-2 px-4 text-2xl font-bold">Cek Penerima Bantuan</h2>
         </div>

         <form id="searchForm" class="mx-auto mb-4 mt-8 flex max-w-md items-center">
             <label for="simple-search" class="sr-only">Search</label>
             <div class="relative w-full">
                 <input type="text" id="simple-search" name="query"
                     class="block w-full rounded-full border border-gray-300 bg-gray-50 p-2.5 py-3 ps-5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                     placeholder="Masukkan NIK atau Nama Anda" required />
             </div>
             <button type="submit" data-modal-target="searchModal" data-modal-toggle="searchModal"
                 class="ms-2 rounded-full border border-blue-700 bg-blue-700 p-3 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                 <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 20 20">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                 </svg>
                 <span class="sr-only">Search</span>
             </button>
         </form>

         {{-- MODAL --}}
         <div id="searchModal" tabindex="-1" aria-hidden="true"
             class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
             <div class="relative max-h-full w-full max-w-2xl p-4">
                 <!-- Modal content -->
                 <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                     <!-- Modal header -->
                     <div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
                         <h3 id="modalTitle" class="text-xl font-semibold text-gray-900 dark:text-white">
                             Cek Data Penerima
                         </h3>
                         <button type="button"
                             class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                             data-modal-hide="searchModal">
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
                         <p id="modalBody" class="text-base leading-relaxed text-gray-500 dark:text-gray-400">

                         </p>

                     </div>
                 </div>
             </div>
         </div>
     </section>


     <section class="bg-blue-700 p-6">
         <div class="mx-auto my-4 flex justify-center">
             <h2 class="inline-block rounded-full bg-white p-2 px-4 text-2xl font-bold text-blue-700">Data Terkait Penerima
                 BLT Dana Desa {{ now()->year }}</h2>
         </div>

         <dl class="mx-auto grid max-w-screen-xl grid-cols-2 gap-8 p-4 text-gray-900 dark:text-white sm:grid-cols-3 sm:p-8">
             <div class="flex flex-col items-center justify-center">
                 <dt class="mb-2 text-3xl font-extrabold">{{ $countCriteria }}</dt>
                 <dd class="text-white">Jumlah Krieria</dd>
             </div>
             <div class="flex flex-col items-center justify-center">
                 <dt class="mb-2 text-3xl font-extrabold">{{ $countPenerima }}</dt>
                 <dd class="text-white">Jumlah Penerima</dd>
             </div>
             <div class="flex flex-col items-center justify-center">
                 <dt class="mb-2 text-3xl font-extrabold">Rp {{ $availableBudget }}</dt>
                 <dd class="text-white">Anggaran Tersedia</dd>
             </div>
         </dl>

     </section>

     {{-- GALERI --}}
     <section class="bg-slate-100 p-6">
         <div class="mx-auto my-4 flex justify-center">
             <h2 class="inline-block rounded-full bg-white p-2 px-4 text-2xl font-bold">GALERI
             </h2>
         </div>

         <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-2 md:grid-cols-3 md:p-6">
             <div>
                 <img class="h-auto max-w-full rounded-lg" src="{{ asset('images/galeri/penyaluran_2023.jpeg') }}"
                     alt="">
             </div>
             <div>
                 <img class="h-auto max-w-full rounded-lg" src="{{ asset('images/galeri/penyaluran2_2023.jpeg') }}"
                     alt="">
             </div>
         </div>
     </section>
 @endsection

 @push('after-script')
     <script type="module">
         $(document).ready(function() {
             $('#searchForm').on('submit', function(e) {
                 e.preventDefault();
                 const query = $('#simple-search').val();

                 $.ajax({
                     url: '{{ route('search') }}',
                     type: 'GET',
                     data: {
                         query: query,
                     },
                     success: function(response) {
                         // Menangkap dan menggunakan data yang dikirim dari server
                         console.log(response.html);
                         $('#modalBody').html(response.html);
                         $('#searchModal').removeClass('hidden');
                         $('#searchModal').addClass('flex');
                     },
                     error: function(xhr, status, error) {
                         console.log(error);
                         $('#modalBody').text('Data yang anda cari tidak ditemukan!');
                         $('#searchModal').addClass('flex');
                         $('#searchModal').removeClass('hidden');
                     }
                 });
             });

             $('#closeModal').on('click', function() {
                 $('#searchModal').addClass('hidden');
             });
         });
     </script>
 @endpush
