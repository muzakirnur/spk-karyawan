<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekap Data Buku Besar Biaya - {{ config('app.name') }}</title>
    <style>
        table, th, td {
        border: 1px solid;
        padding: 2px
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Ranking</th>
                <th>Nama</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)    
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->pelamar->nama }}</td>
                <td>{{ $row->nilai }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>