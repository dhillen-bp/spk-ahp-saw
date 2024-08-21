<?php

namespace Database\Seeders;

use App\Models\Alternative;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nik' => '3311066811760001', 'nama' => 'SRI SAPARWI', 'alamat' => 'BATURAN RT 001 RW 001', 'kontak' => null],
            ['nik' => '3311073112720154', 'nama' => 'PARNO', 'alamat' => 'BATURAN RT 001 RW 001', 'kontak' => null],
            ['nik' => '3311072809750004', 'nama' => 'SUWANDI', 'alamat' => 'BATURAN RT 002 RW 001', 'kontak' => null],
            ['nik' => '3311070212110010', 'nama' => 'SARI TRI HASTUTIK', 'alamat' => 'BATURAN RT 003 RW 001', 'kontak' => null],
            ['nik' => '3311076805920003', 'nama' => 'LISA AGUNG RETNOSARI', 'alamat' => 'KARANGWUNI RT 001 RW 002', 'kontak' => null],
            ['nik' => '3311072803830002', 'nama' => 'JOKO SUPRIYADI', 'alamat' => 'KARANGWUNI RT 002 RW 002', 'kontak' => null],
            ['nik' => '3311077112450047', 'nama' => 'PARJIYEM', 'alamat' => 'KARANGWUNI RT 002 RW 002', 'kontak' => null],
            ['nik' => '3311072211710004', 'nama' => 'SRI AGUNG MAHMUDI', 'alamat' => 'GEMBLUNG RT 002 RW 003', 'kontak' => null],
            ['nik' => '3311072402690001', 'nama' => 'SUDIRMAN', 'alamat' => 'GEMBLUNG RT 004 RW 003', 'kontak' => null],
            ['nik' => '3311104703900001', 'nama' => 'FIDANING', 'alamat' => 'GEMBLUNG RT 004 RW 003', 'kontak' => null],
            ['nik' => '3311071908930003', 'nama' => 'DWI AGUS HARYANTO', 'alamat' => 'NGLINDUK RT 002 RW 004', 'kontak' => null],
            ['nik' => '3311071707740001', 'nama' => 'TEGUH KIRNADI', 'alamat' => 'NGLINDUK RT 002 RW 004', 'kontak' => null],
            ['nik' => '3311073112510010', 'nama' => 'YAMTO MULYONO', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'kontak' => null],
            ['nik' => '3311073112600260', 'nama' => 'LOSO NARSO WIYANTO', 'alamat' => 'NGLINDUK RT 003 RW 004', 'kontak' => null],
            ['nik' => '3311074803050001', 'nama' => 'CLEOFATLA MARSHA BRENDA S. ', 'alamat' => 'NGLINDUK RT 002 RW 004', 'kontak' => null],
            ['nik' => '3311077112450058', 'nama' => 'DALIYEM', 'alamat' => 'GEMBLUNG RT 001 RW 003', 'kontak' => null],
            ['nik' => '3311071404750002', 'nama' => 'MULYONO', 'alamat' => 'BATURAN RT 001 RW 001', 'kontak' => null],
            ['nik' => '3311077112520053', 'nama' => 'MARDINAH', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'kontak' => null],
            ['nik' => '3311071105056618', 'nama' => 'PARINEM', 'alamat' => 'BATURAN RT 001 RW 001', 'kontak' => null],
            ['nik' => '3311075209800002', 'nama' => 'WARSINI', 'alamat' => 'KARANGWUNI RT 002 RW 002', 'kontak' => null],
            ['nik' => '3311070701980001', 'nama' => 'MUHAMAD EKO NOR ROMADHON', 'alamat' => 'NGLINDUK RT 003 RW 004', 'kontak' => null],
            ['nik' => '3311074312670004', 'nama' => 'TUKINEM', 'alamat' => 'NGLINDUK RT 002 RW 004', 'kontak' => null],
            ['nik' => '3311072412070005', 'nama' => 'RAVADITYA SADEWO', 'alamat' => 'BATURAN RT 001 RW 001', 'kontak' => null],
            ['nik' => '3311077112490034', 'nama' => 'SUTARTI HADI WIYONO. ', 'alamat' => 'BATURAN RT 003 RW 001', 'kontak' => null],
            ['nik' => '3311077112580082', 'nama' => 'SURANI', 'alamat' => 'BATURAN RT 002 RW 001', 'kontak' => null],
            ['nik' => '3311077112480166', 'nama' => 'LASIYEM', 'alamat' => 'KARANGWUNI RT 001 RW 002', 'kontak' => null],
            ['nik' => '3311075303530001', 'nama' => 'PARINEM ', 'alamat' => 'BATURAN RT 001 RW 001', 'kontak' => null],
            ['nik' => '3311074107420109', 'nama' => 'SUMADIYEM', 'alamat' => 'KARANGWUNI RT 002 RW 002', 'kontak' => null],
            ['nik' => '3311077112620402', 'nama' => 'SIYAM', 'alamat' => 'NGLINDUK RT 001 RW 004', 'kontak' => null],
            ['nik' => '3311073112290048', 'nama' => 'NARSO DIKROMO', 'alamat' => 'NGLINDUK RT 003 RW 004', 'kontak' => null],
            ['nik' => '3311074107370075', 'nama' => 'MARTOWIYONO KATINEM', 'alamat' => 'BATURAN RT 003 RW 001', 'kontak' => null],
            ['nik' => '3604052710550001', 'nama' => 'PAIMAN', 'alamat' => 'BATURAN RT 001 RW 001', 'kontak' => null],
            ['nik' => '333110011', 'nama' => 'SRI WAHYUNI', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'kontak' => null],
            ['nik' => '3311071405880001', 'nama' => 'FAJAR ADI KUSUMA', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'kontak' => null],
            ['nik' => '3311070912810002', 'nama' => 'HISYAM ASHURI', 'alamat' => 'GEMBLUNG RT 001 RW 003', 'kontak' => null],
            ['nik' => '3311072304710001', 'nama' => 'SUPARDI', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'kontak' => null],
            ['nik' => '3311077112600059', 'nama' => 'SUMIYATI', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'kontak' => null],
            ['nik' => '3311072212650001', 'nama' => 'MUH. SYAEBANI', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'kontak' => null],
            ['nik' => '3311077112470341', 'nama' => 'KATINEM', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'kontak' => null],
            ['nik' => '3311063008830003', 'nama' => 'ROHMADI', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'kontak' => null],
        ];

        foreach ($data as $item) {
            Alternative::create($item);
        }
    }
}
