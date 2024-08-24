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
            ['nik' => '3311066811760001', 'no_kk' => '3311071105055516', 'nama' => 'SRI SAPARWI', 'alamat' => 'BATURAN RT 001 RW 001', 'jenis_kelamin' => 'P'],
            ['nik' => '3311073112720154', 'no_kk' => '3311073112720154', 'nama' => 'PARNO', 'alamat' => 'BATURAN RT 001 RW 001', 'jenis_kelamin' => 'L'],
            ['nik' => '3311072809750004', 'no_kk' => '3311071202130003', 'nama' => 'SUWANDI', 'alamat' => 'BATURAN RT 002 RW 001', 'jenis_kelamin' => 'L'],
            ['nik' => '3311070212110010', 'no_kk' => '3311070212110010', 'nama' => 'SARI TRI HASTUTIK', 'alamat' => 'BATURAN RT 003 RW 001', 'jenis_kelamin' => 'L'],
            ['nik' => '3311076805920003', 'no_kk' => '3311071409200013', 'nama' => 'LISA AGUNG RETNOSARI', 'alamat' => 'KARANGWUNI RT 001 RW 002', 'jenis_kelamin' => 'P'],
            ['nik' => '3311072803830002', 'no_kk' => '3311070303170002', 'nama' => 'JOKO SUPRIYADI', 'alamat' => 'KARANGWUNI RT 002 RW 002', 'jenis_kelamin' => 'L'],
            ['nik' => '3311077112450047', 'no_kk' => '3311070812140007', 'nama' => 'PARJIYEM', 'alamat' => 'KARANGWUNI RT 002 RW 002', 'jenis_kelamin' => 'P'],
            ['nik' => '3311072211710004', 'no_kk' => '3311072307120033', 'nama' => 'SRI AGUNG MAHMUDI', 'alamat' => 'GEMBLUNG RT 002 RW 003', 'jenis_kelamin' => 'L'],
            ['nik' => '3311072402690001', 'no_kk' => '3311071105053261', 'nama' => 'SUDIRMAN', 'alamat' => 'GEMBLUNG RT 004 RW 003', 'jenis_kelamin' => 'L'],
            ['nik' => '3311104703900001', 'no_kk' => '3311071105053292', 'nama' => 'FIDANING', 'alamat' => 'GEMBLUNG RT 004 RW 003', 'jenis_kelamin' => 'P'],
            ['nik' => '3311071908930003', 'no_kk' => '3311072805080002', 'nama' => 'DWI AGUS HARYANTO', 'alamat' => 'NGLINDUK RT 002 RW 004', 'jenis_kelamin' => 'L'],
            ['nik' => '3311071707740001', 'no_kk' => '3311071105051109', 'nama' => 'TEGUH KIRNADI', 'alamat' => 'NGLINDUK RT 002 RW 004', 'jenis_kelamin' => 'L'],
            ['nik' => '3311073112510010', 'no_kk' => '3311070402080008', 'nama' => 'YAMTO MULYONO', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'jenis_kelamin' => 'L'],
            ['nik' => '3311073112600260', 'no_kk' => '3311071105051079', 'nama' => 'LOSO NARSO WIYANTO', 'alamat' => 'NGLINDUK RT 003 RW 004', 'jenis_kelamin' => 'L'],
            ['nik' => '3311074803050001', 'no_kk' => '3311072711170006', 'nama' => 'CLEOFATLA MARSHA BRENDA S. ', 'alamat' => 'NGLINDUK RT 002 RW 004', 'jenis_kelamin' => 'P'],
            ['nik' => '3311077112450058', 'no_kk' => '3311071105053253', 'nama' => 'DALIYEM', 'alamat' => 'GEMBLUNG RT 001 RW 003', 'jenis_kelamin' => 'P'],
            ['nik' => '3311071404750002', 'no_kk' => '3311071404090003', 'nama' => 'MULYONO', 'alamat' => 'BATURAN RT 001 RW 001', 'jenis_kelamin' => 'L'],
            ['nik' => '3311077112520053', 'no_kk' => '3311071105053187', 'nama' => 'MARDINAH', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'jenis_kelamin' => 'P'],
            ['nik' => '3311071105056618', 'no_kk' => '3311071105053187', 'nama' => 'PARINEM', 'alamat' => 'BATURAN RT 001 RW 001', 'jenis_kelamin' => 'P'],
            ['nik' => '3311075209800002', 'no_kk' => '3311070108180002', 'nama' => 'WARSINI', 'alamat' => 'KARANGWUNI RT 002 RW 002', 'jenis_kelamin' => 'P'],
            ['nik' => '3311070701980001', 'no_kk' => '3311072108180005', 'nama' => 'MUHAMAD EKO NOR ROMADHON', 'alamat' => 'NGLINDUK RT 003 RW 004', 'jenis_kelamin' => 'L'],
            ['nik' => '3311074312670004', 'no_kk' => '3311072909160001', 'nama' => 'TUKINEM', 'alamat' => 'NGLINDUK RT 002 RW 004', 'jenis_kelamin' => 'P'],
            ['nik' => '3311072412070005', 'no_kk' => '3311071011200008', 'nama' => 'RAVADITYA SADEWO', 'alamat' => 'BATURAN RT 001 RW 001', 'jenis_kelamin' => 'L'],
            ['nik' => '3311077112490034', 'no_kk' => '3311071105055443', 'nama' => 'SUTARTI HADI WIYONO. ', 'alamat' => 'BATURAN RT 003 RW 001', 'jenis_kelamin' => 'P'],
            ['nik' => '3311077112580082', 'no_kk' => '3311071202130003', 'nama' => 'SURANI', 'alamat' => 'BATURAN RT 002 RW 001', 'jenis_kelamin' => 'P'],
            ['nik' => '3311077112480166', 'no_kk' => '3311071402170001', 'nama' => 'LASIYEM', 'alamat' => 'KARANGWUNI RT 001 RW 002', 'jenis_kelamin' => 'P'],
            ['nik' => '3311075303530001', 'no_kk' => '3311071105055516', 'nama' => 'PARINEM ', 'alamat' => 'BATURAN RT 001 RW 001', 'jenis_kelamin' => 'P'],
            ['nik' => '3311074107420109', 'no_kk' => '3311072405180006', 'nama' => 'SUMADIYEM', 'alamat' => 'KARANGWUNI RT 002 RW 002', 'jenis_kelamin' => 'P'],
            ['nik' => '3311077112620402', 'no_kk' => '3311071410190001', 'nama' => 'SIYAM', 'alamat' => 'NGLINDUK RT 001 RW 004', 'jenis_kelamin' => 'P'],
            ['nik' => '3311073112290048', 'no_kk' => '3311071608210001', 'nama' => 'NARSO DIKROMO', 'alamat' => 'NGLINDUK RT 003 RW 004', 'jenis_kelamin' => 'L'],
            ['nik' => '3311074107370075', 'no_kk' => '3311071105054350', 'nama' => 'MARTOWIYONO KATINEM', 'alamat' => 'BATURAN RT 003 RW 001', 'jenis_kelamin' => 'P'],
            ['nik' => '3604052710550001', 'no_kk' => '3311070103210001', 'nama' => 'PAIMAN', 'alamat' => 'BATURAN RT 001 RW 001', 'jenis_kelamin' => 'L'],
            ['nik' => '-', 'no_kk' => '-', 'nama' => 'SRI WAHYUNI', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'jenis_kelamin' => 'P'],
            ['nik' => '3311071405880001', 'no_kk' => '-', 'nama' => 'FAJAR ADI KUSUMA', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'jenis_kelamin' => 'L'],
            ['nik' => '3311070912810002', 'no_kk' => '-', 'nama' => 'HISYAM ASHURI', 'alamat' => 'GEMBLUNG RT 001 RW 003', 'jenis_kelamin' => 'L'],
            ['nik' => '3311072304710001', 'no_kk' => '-', 'nama' => 'SUPARDI', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'jenis_kelamin' => 'L'],
            ['nik' => '3311077112600059', 'no_kk' => '-', 'nama' => 'SUMIYATI', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'jenis_kelamin' => 'P'],
            ['nik' => '3311072212650001', 'no_kk' => '-', 'nama' => 'MUH. SYAEBANI', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'jenis_kelamin' => 'L'],
            ['nik' => '3311077112470341', 'no_kk' => '-', 'nama' => 'KATINEM', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'jenis_kelamin' => 'P'],
            ['nik' => '3311063008830003', 'no_kk' => '-', 'nama' => 'ROHMADI', 'alamat' => 'GEMBLUNG RT 003 RW 003', 'jenis_kelamin' => 'L'],
        ];

        foreach ($data as $item) {
            Alternative::create($item);
        }
    }
}
