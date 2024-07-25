<nav class="fixed top-0 z-50 w-full border-b border-gray-200 bg-blue-700 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center rounded-lg p-2 text-sm text-gray-100 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 sm:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="https://flowbite.com" class="ms-2 flex md:me-24">
                    <img src="{{ asset('images/logo/logo_kab_sukoharjo.png') }}" class="me-3 h-8" alt="FlowBite Logo" />
                    <span class="self-center whitespace-nowrap text-xl font-semibold text-white">Desa
                        Karangwuni</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="ms-3 flex items-center">
                    <div>
                        <button type="button"
                            class="flex rounded-full bg-gray-800 text-sm focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <div class="flex items-center gap-2">
                                <img class="h-8 w-8 rounded-full" src="{{ asset('images/logo/profile_icon.png') }}"
                                    alt="user photo">
                                <p class="mr-4 text-white">{{ Auth::guard('admin')->user()->username }}</p>
                            </div>
                        </button>
                    </div>
                    <div class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded bg-white text-base shadow dark:divide-gray-600 dark:bg-gray-700"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-center text-sm text-gray-900 dark:text-white" role="none">
                                {{ Auth::guard('admin')->user()->nama }}
                            </p>
                            <span
                                class="me-2 rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                {{ Auth::guard('admin')->user()->role == 'pemerintah_desa' ? 'Pemerintah Desa' : 'RT/RW' }}
                            </span>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="{{ route('admin.profil.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem"><span class="flex gap-2">Profil
                                        @include('partials.icons._profil-icon')</span>
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem"><span class="flex gap-2">Keluar
                                            @include('partials.icons._logout_icon')</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
