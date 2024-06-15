@extends('layouts.app')

@section('content')
    <section class="bg-slate-100">
        <div class="relative h-96 w-full bg-cover bg-center py-32"
            style="background-image: url('{{ asset('images/background/karangwuni-bg.jpg') }}');">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-900 opacity-75"></div>
            <h1 class="relative text-center text-3xl font-bold text-white">Berita</h1>
        </div>

        <div class="grid grid-cols-1 gap-3 md:grid-cols-6">
            <div class="col-span-4">
                <div class="relative m-8 overflow-hidden md:m-16">
                    <img src="https://images.unsplash.com/photo-1508921340878-ba53e1f016ec"
                        class="h-96 w-full rounded-lg object-cover" alt="Berita Hangat">
                    <div class="absolute bottom-0 left-0 right-0 space-y-4 rounded-lg bg-black bg-opacity-70 p-4">
                        <p class="text-lg font-light text-white underline">Berita Terkini</p>
                        <h3 class="text-2xl font-bold text-white">Judul Berita</h3>
                        <div class="flex gap-4 text-white">
                            <div class="flex items-center">
                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                                </svg>
                                <span class="text-sm">21 Mei 2024</span>
                            </div>
                            |
                            <div class="flex items-center">
                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="text-sm">Anonim</span>
                            </div>
                        </div>
                        <a href="#"
                            class="inline-flex items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Baca Selengkapnya
                            <svg class="ms-2 h-3.5 w-3.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="m-8 md:m-16">
                    <h3 class="text-lg">Berita Terkait</h3>
                    <hr class="border-blue-700" />
                    @for ($i = 0; $i < 3; $i++)
                        <a href="#" class="my-8 flex items-center gap-4 rounded-lg hover:bg-blue-100">
                            <div class="flex-3">
                                <img src="https://images.unsplash.com/photo-1508921340878-ba53e1f016ec"
                                    class="h-20 rounded-lg shadow md:h-36" alt="">
                            </div>
                            <div class="flex-1 space-y-2">
                                <h3 class="text-sm font-bold text-blue-500 md:text-lg">Judul Selanjutnya</h3>
                                <p class="hidden font-thin md:text-sm lg:block lg:text-base">Lorem ipsum dolor sit, amet
                                    consectetur adipisicing
                                    elit. Laudantium
                                    rerum
                                    maiores nemo ipsa, nesciunt tenetur ea iste, inventore dolorum velitvel...</p>
                                <div class="flex gap-4 text-slate-500">
                                    <div class="flex items-center md:text-sm lg:text-base">
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                                        </svg>
                                        <span class="text-xs md:text-sm">21 Mei 2024</span>
                                    </div>
                                    |
                                    <div class="flex items-center">
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        <span class="text-xs md:text-sm">Anonim</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endfor
                </div>
            </div>

            <div class="col-span-2 mb-8 ml-8 md:my-16 md:ml-0 md:mr-16">
                <h3 class="text-lg">Berita Terbaru</h3>
                <hr class="border-blue-700" />
                @for ($i = 0; $i < 3; $i++)
                    <a href="#" class="my-4 flex items-center gap-4 rounded-lg hover:bg-blue-100">
                        <div class="flex-3">
                            <img src="https://images.unsplash.com/photo-1508921340878-ba53e1f016ec"
                                class="h-20 w-20 rounded-lg bg-cover shadow" alt="">
                        </div>
                        <div class="flex-1 space-y-2">
                            <h3 class="font-thin text-blue-500 md:text-sm lg:text-base">Judul Selanjutnya lorem ipsum dolor
                                sit amet
                                {{ $i }}</h3>
                            <div class="flex font-thin text-slate-500 lg:gap-2">
                                <div class="flex items-center">
                                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                                    </svg>
                                    <span class="text-xs md:text-sm">21 Mei 2024</span>
                                </div>
                                |
                                <div class="flex items-center">
                                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    <span class="text-xs md:text-sm">Anonim</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endfor
            </div>
        </div>
    </section>
@endsection
