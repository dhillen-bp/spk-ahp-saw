<aside id="logo-sidebar"
    class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-gray-200 bg-blue-700 pt-20 transition-transform dark:border-gray-700 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full overflow-y-auto bg-blue-700 px-3 pb-4">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/admin"
                    class="{{ Request::is('admin') ? 'text-gray-50' : 'text-gray-300' }} group flex items-center rounded-lg p-2 hover:bg-blue-500 hover:text-gray-50 dark:hover:bg-gray-700">
                    @include('partials.icons._dashboard-icon', [
                        'class' =>
                            'h-5 w-5 text-gray-300 transition duration-75 group-hover:text-gray-100 dark:text-gray-400 dark:group-hover:text-white',
                    ])
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <div class="">
                <span class="text-sm text-gray-400">Menu Perhitungan</span>
                <hr class="my-2 h-px border-0 bg-gray-400">
            </div>
            <li>
                <a href="/admin/kriteria"
                    class="{{ Request::is('admin/kriteria*') ? 'text-gray-50' : 'text-gray-300' }} group flex items-center rounded-lg p-2 hover:bg-blue-500 hover:text-gray-50">
                    @include('partials.icons._kriteria-icon', [
                        'class' =>
                            'h-6 w-6 flex-shrink text-gray-300 transition duration-75 group-hover:text-gray-100 dark:text-gray-400 dark:group-hover:text-white',
                    ])
                    <span class="ms-3 flex-1 whitespace-nowrap">Data Kriteria</span>
                    <span
                        class="ms-3 inline-flex items-center justify-center rounded-full bg-gray-100 px-2 text-sm font-medium text-gray-800 dark:bg-gray-700 dark:text-gray-300">5</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.alternative.index') }}"
                    class="{{ Request::is('admin/alternative*') ? 'text-gray-50' : 'text-gray-300' }} group flex items-center rounded-lg p-2 hover:bg-blue-500 hover:text-gray-50">
                    @include('partials.icons._warga-icon', [
                        'class' =>
                            'h-6 w-6 flex-shrink text-gray-300 transition duration-75 group-hover:text-gray-100 dark:text-gray-400 dark:group-hover:text-white',
                    ])
                    <span class="ms-3 flex-1 whitespace-nowrap">Data Warga</span>

                </a>
            </li>
            <li>
                <a href="{{ route('admin.alternative.penilaian.index') }}"
                    class="{{ Request::is('admin/alternative/penilaian*') ? 'text-gray-50' : 'text-gray-300' }} group flex items-center rounded-lg p-2 hover:bg-blue-500 hover:text-gray-50">
                    @include('partials.icons._nilai-alternatif-icon', [
                        'class' =>
                            'h-6 w-6 flex-shrink text-gray-300 transition duration-75 group-hover:text-gray-100 dark:text-gray-400 dark:group-hover:text-white',
                    ])
                    <span class="ms-3">Nilai Alternatif</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.perbandingan.index') }}"
                    class="{{ Request::is('admin/perbandingan*') ? 'text-gray-50' : 'text-gray-300' }} group flex items-center rounded-lg p-2 hover:bg-blue-500 hover:text-gray-50">
                    @include('partials.icons._perbandingan-icon', [
                        'class' =>
                            'h-6 w-6 flex-shrink text-gray-300 transition duration-75 group-hover:text-gray-100 dark:text-gray-400 dark:group-hover:text-white',
                    ])

                    <span class="ms-3 flex-1 whitespace-nowrap">Perbandingan</span>
                </a>
            </li>
            <li>
                <a href="/admin/pemeringkatan"
                    class="group flex items-center rounded-lg p-2 text-gray-300 hover:bg-blue-500 hover:text-gray-50">
                    @include('partials.icons._pemeringkatan-icon', [
                        'class' =>
                            'h-6 w-6 flex-shrink text-gray-300 transition duration-75 group-hover:text-gray-100 dark:text-gray-400 dark:group-hover:text-white',
                    ])

                    <span class="ms-3 flex-1 whitespace-nowrap">Pemeringkatan</span>
                </a>
            </li>
            <div class="">
                <span class="text-sm text-gray-400">Data</span>
                <hr class="my-2 h-px border-0 bg-gray-400">
            </div>
            <li>
                <a href="/admin/data-admin"
                    class="group flex items-center rounded-lg p-2 text-gray-300 hover:bg-blue-500 hover:text-gray-50">
                    @include('partials.icons._admin-icon', [
                        'class' =>
                            'h-6 w-6 flex-shrink text-gray-300 transition duration-75 group-hover:text-gray-100 dark:text-gray-400 dark:group-hover:text-white',
                    ])
                    <span class="ms-3 flex-1 whitespace-nowrap">Data Admin</span>
                </a>
            </li>
            <li>
                <a href="/admin/data-pengguna"
                    class="group flex items-center rounded-lg p-2 text-gray-300 hover:bg-blue-500 hover:text-gray-50">
                    @include('partials.icons._pengguna-icon', [
                        'class' =>
                            'h-6 w-6 flex-shrink text-gray-300 transition duration-75 group-hover:text-gray-100 dark:text-gray-400 dark:group-hover:text-white',
                    ])
                    <span class="ms-3 flex-1 whitespace-nowrap">Data Pengguna</span>
                </a>
            </li>
            <li>
                <a href="/admin/data-penerima"
                    class="group flex items-center rounded-lg p-2 text-gray-300 hover:bg-blue-500 hover:text-gray-50">
                    @include('partials.icons.penerima-icon', [
                        'class' =>
                            'h-6 w-6 flex-shrink text-gray-300 transition duration-75 group-hover:text-gray-100 dark:text-gray-400 dark:group-hover:text-white',
                    ])
                    <span class="ms-3 flex-1 whitespace-nowrap">Data Penerima</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
