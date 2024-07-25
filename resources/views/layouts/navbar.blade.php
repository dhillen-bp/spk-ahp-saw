<nav id="topNavbar"
    class="fixed z-[999] w-full border-gray-200 bg-white opacity-70 shadow dark:border-gray-700 dark:bg-gray-900">
    <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo/logo_kab_sukoharjo.png') }}" class="h-8" alt="Flowbite Logo" />
            <span class="self-center whitespace-nowrap text-xl font-semibold dark:text-white">Desa Karangwuni</span>
        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button"
            class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <div class="flex items-center space-x-3 rtl:space-x-reverse md:order-2 md:space-x-0">
            <a href="{{ route('admin.login') }}"
                class="me-2 rounded-lg border border-blue-700 px-5 py-2.5 text-center text-sm font-medium text-blue-700 hover:bg-blue-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-blue-300 dark:border-blue-500 dark:text-blue-500 dark:hover:bg-blue-500 dark:hover:text-white dark:focus:ring-blue-800">Login
                Admin</a>

        </div>

        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul
                class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-gray-50 p-4 font-medium rtl:space-x-reverse dark:border-gray-700 dark:bg-gray-800 md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-white md:p-0 md:dark:bg-gray-900">
                <li>
                    <a href="/"
                        class="{{ Request::is('/') ? 'text-blue-700' : 'text-gray-900' }} block rounded px-3 py-2 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-blue-500">Home</a>
                </li>
                <li>
                    <a href="{{ route('pengumuman.penerima') }}"
                        class="{{ Request::is('pengumuman*') ? 'text-blue-700' : 'text-gray-900' }} block rounded px-3 py-2 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-blue-500">Pengumuman</a>
                </li>
                <li>
                    <a href="/pengaduan"
                        class="{{ Request::is('pengaduan*') ? 'text-blue-700' : 'text-gray-900' }} block rounded px-3 py-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-blue-500">Pengaduan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
