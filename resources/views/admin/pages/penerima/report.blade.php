<!DOCTYPE html>
<html>

<head>
    <title>Desa Karangwuni-Laporan Data Penerima</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-size: 12px;
            /* Mengatur ukuran font keseluruhan */
        }
    </style>
</head>

<body>
    <h1>{{ $title . ' Tahun ' . $date }}</h1>

    <br>

    <table class="table-bordered table">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Nama
                </th>
                @foreach ($rankingResults->first()->alternative->alternativeValues as $value)
                    <th>
                        {{ $value->criteria->nama }}
                    </th>
                @endforeach
                <th>
                    Skor
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($rankingResults as $data)
                <tr>
                    <th>
                        {{ $loop->iteration }}
                    </th>
                    <td>
                        {{ $data->alternative->nama }}
                    </td>
                    @foreach ($data->alternative->alternativeValues as $value)
                        @if ($value->criteria->subCriteria->isNotEmpty())
                            @foreach ($value->criteria->subCriteria as $subCriteria)
                                @if ($value->nilai === $subCriteria->nilai)
                                    <td>{{ $subCriteria->nama }}</td>
                                @endif
                            @endforeach
                        @else
                            @php
                                $isDecimalColumn = in_array($value->criteria->nama, ['Jumlah Tanggungan', 'Usia']);
                            @endphp

                            <td class="px-6 py-4">
                                @if ($isDecimalColumn)
                                    {{ number_format($value->nilai, 0, '.', ',') }}
                                @else
                                    {{ $value->nilai }}
                                @endif
                        @endif
                    @endforeach
                    <td>
                        {{ $data->skor_total }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
