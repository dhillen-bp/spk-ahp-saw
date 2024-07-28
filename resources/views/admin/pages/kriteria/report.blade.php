<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1>{{ $title . ' Tahun ' . $date }}</h1>

    <table class="table-bordered table">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Atribut</th>
        </tr>
        @foreach ($criteria as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->atribut }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
