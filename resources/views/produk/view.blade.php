<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View PDF</title>
    <style>
        .bg {
            background: yellow;
        }

        .bg th {
            padding: 10px 20px;
        }
        .table{
            border: 1px solid black;  
        }
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;    
        }
        .table-pdf td {
            text-align: center;
            padding: 20px
        }
    </style>
</head>
<body>
    <div class="table-container">
    <table class="table" id="tbl-pengajuan" rules="all">
    <thead>
        <tr class="bg">
            <th>No.</th>
            <th>Nama Produk</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produk as $p)
            <tr class="table-pdf">
                <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
                <td>{{ $p->nama_produk }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
    </div>
</body>
</html>
