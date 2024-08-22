<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Laporan Calon Penerima');

// Set header
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'NIK');
$sheet->setCellValue('C1', 'Nama');
$sheet->setCellValue('D1', 'Alamat');

$column = 'E';
foreach ($rankingResults->first()->alternative->alternativeValues as $value) {
    $sheet->setCellValue($column . '1', $value->criteria->nama);
    $column++;
}

$sheet->setCellValue($column . '1', 'Skor');
$sheet->setCellValue($column . '1', 'Verifikasi');
$sheet->setCellValue($column . '1', 'Keterangan Verifikasi');

// Set data
$row = 2;
foreach ($rankingResults as $data) {
    $sheet->setCellValue('A' . $row, $row - 1);
    $sheet->setCellValue('B' . $row, "'" . $data->alternative->nik);
    $sheet->setCellValue('C' . $row, $data->alternative->nama);
    $sheet->setCellValue('D' . $row, $data->alternative->alamat);

    $column = 'E';
    foreach ($data->alternative->alternativeValues as $value) {
        if ($value->criteria->subCriteria->isNotEmpty()) {
            foreach ($value->criteria->subCriteria as $subCriteria) {
                if ($value->nilai === $subCriteria->nilai) {
                    $sheet->setCellValue($column . $row, $subCriteria->nama);
                }
            }
        } else {
            $isDecimalColumn = in_array($value->criteria->nama, ['Jumlah Tanggungan', 'Usia']);
            $isMoney = in_array($value->criteria->nama, ['Pendapatan']);
            $valueToDisplay = '';

            if ($isDecimalColumn) {
                $valueToDisplay = number_format($value->nilai, 0, '.', ',');
            } elseif ($isMoney) {
                $valueToDisplay = 'Rp ' . number_format($value->nilai, 0, ',', '.');
            } else {
                $valueToDisplay = $value->nilai;
            }

            $sheet->setCellValue($column . $row, $valueToDisplay);
        }
        $column++;
    }

    $isVerifiedText = $data->is_verified == 1 ? 'Memenuhi Syarat' : 'Tidak Memenuhi Syarat';

    $sheet->setCellValue($column . $row, $data->skor_total);
    $sheet->setCellValue($column . $row, $isVerifiedText);
    $sheet->setCellValue($column . $row, $data->is_verified_desc);

    $row++;
}

// Set header styles (optional)
$sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1')->applyFromArray([
    'font' => ['bold' => true],
    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
]);

// Set border styles (optional)
$sheet->getStyle('A1:' . $sheet->getHighestColumn() . ($row - 1))->applyFromArray([
    'borders' => [
        'allBorders' => ['borderStyle' => Border::BORDER_THIN],
    ],
]);

// Output Excel file
$writer = new Xlsx($spreadsheet);
$fileName = 'Laporan_Calon_Penerima_BLT_DDana_Desa.xlsx';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=\"$fileName\"");
$writer->save('php://output');
exit();
