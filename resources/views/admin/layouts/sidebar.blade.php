<aside id="logo-sidebar"
    class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-gray-200 bg-blue-700 pt-20 transition-transform dark:border-gray-700 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full overflow-y-auto bg-blue-700 px-3 pb-4">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('admin.index') }}"
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
                <a href="{{ route('admin.kriteria.index') }}"
                    class="{{ Request::is('admin/kriteria*') ? 'text-gray-50' : 'text-gray-300' }} group flex items-center rounded-lg p-2 hover:bg-blue-500 hover:text-gray-50">
                    @include('partials.icons._kriteria-icon', [
                        'class' =>
                            'h-6 w-6 flex-shrink text-gray-300 transition duration-75 group-hover:text-gray-100 dark:text-gray-400 dark:group-hover:text-white',
                    ])
                    <span class="ms-3 flex-1 whitespace-nowrap">Data Kriteria</span>

                </a>
            </li>
            <li>
                <a href="{{ route('admin.alternative.index') }}"
                    class="{{ Request::is('admin/alternative*') && !Request::is('admin/alternative/penilaian*') ? 'text-gray-50' : 'text-gray-300' }} group flex items-center rounded-lg p-2 hover:bg-blue-500 hover:text-gray-50">
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
                    <span class="ms-3">Penilaian Data Warga</span>
                </a>
            </li>

            @if (Auth::guard('admin')->user()->role === 'pemerintah_desa')
                <li>
                    <a href="{{ route('admin.perbandingan.index') }}"
                        class="{{ Request::is('admin/perbandingan*') ? 'text-gray-50' : 'text-gray-300' }} group flex items-center rounded-lg p-2 hover:bg-blue-500 hover:text-gray-50">
                        @include('partials.icons._perbandingan-icon', [
                            'class' =>
                                'h-6 w-6 flex-shrink text-gray-300 transition duration-75 group-hover:text-gray-100 dark:text-gray-400 dark:group-hover:text-white',
                        ])

                        <span class="ms-3 flex-1 whitespace-nowrap">Perbandingan Kriteria</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.pemeringkatan.index') }}"
                        class="{{ Request::is('admin/pemeringkatan*') ? 'text-gray-50' : 'text-gray-300' }} group flex items-center rounded-lg p-2 text-gray-300 hover:bg-blue-500 hover:text-gray-50">
                        @include('partials.icons._pemeringkatan-icon', [
                            'class' =>
                                'h-6 w-6 flex-shrink text-gray-300 transition duration-75 group-hover:text-gray-100 dark:text-gray-400 dark:group-hover:text-white',
                        ])

                        <span class="ms-3 flex-1 whitespace-nowrap">Pemeringkatan</span>
                    </a>
                </li>
            @endif

            @if (Auth::guard('admin')->user()->role === 'pemerintah_desa')
                <div class="">
                    <span class="text-sm text-gray-400">Data</span>
                    <hr class="my-2 h-px border-0 bg-gray-400">
                </div>

                <li>
                    <a href="{{ route('admin.data_admin.index') }}"
                        class="{{ Request::is('admin/data-admin*') ? 'text-gray-50' : 'text-gray-300' }} group flex items-center rounded-lg p-2 text-gray-300 hover:bg-blue-500 hover:text-gray-50">
                        @include('partials.icons._admin-icon', [
                            'class' =>
                                'h-6 w-6 flex-shrink text-gray-300 transition duration-75 group-hover:text-gray-100 dark:text-gray-400 dark:group-hover:text-white',
                        ])
                        <span class="ms-3 flex-1 whitespace-nowrap">Data Admin</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.data_pengaduan.index') }}"
                        class="{{ Request::is('admin/data-pengaduan*') ? 'text-gray-50' : 'text-gray-300' }} group flex items-center rounded-lg p-2 hover:bg-blue-500 hover:text-gray-50">
                        @include('partials.icons._pengaduan-icon', [
                            'class' =>
                                'h-6 w-6 flex-shrink text-gray-300 transition duration-75 group-hover:text-gray-100 dark:text-gray-400 dark:group-hover:text-white',
                        ])
                        <span class="ms-3 flex-1 whitespace-nowrap">Data Pengaduan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.penerima.index') }}"
                        class="{{ Request::is('admin/data-penerima*') ? 'text-gray-50' : 'text-gray-300' }} group flex items-center rounded-lg p-2 hover:bg-blue-500 hover:text-gray-50">
                        @include('partials.icons.penerima-icon', [
                            'class' =>
                                'h-6 w-6 flex-shrink text-gray-300 transition duration-75 group-hover:text-gray-100 dark:text-gray-400 dark:group-hover:text-white',
                        ])
                        <span class="ms-3 flex-1 whitespace-nowrap">Data Penerima</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
