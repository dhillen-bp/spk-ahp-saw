<?php

namespace App\Helpers;

class Helper
{
    public static function statusPengaduan($status)
    {
        switch ($status) {
            case 'menunggu':
                return '<span class="badge-warning">Menunggu</span>';
            case 'diproses':
                return '<span class="badge-primary">Diproses</span>';
            case 'selesai':
                return '<span class="badge-success">Selesai</span>';
            default:
                return '<span class="me-2 self-start rounded bg-gray-100 px-2.5 py-0.5 text-sm font-medium text-gray-800 dark:bg-gray-900 dark:text-gray-300">Tidak Diketahui</span>';
        }
    }
}
