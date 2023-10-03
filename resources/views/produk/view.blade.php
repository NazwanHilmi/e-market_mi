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
            padding: 10
            px 20px;
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
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produk as $p)
            <tr class="table-pdf">
                <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalFormProduk" data-mode = "edit" data-id = "{{ $p->id }}" data-nama_produk = "{{ $p->nama_produk }}"><i class="fas fa-edit"></i>
                    </button>
                    <form method="post"
                    action="{{ route('produk.destroy', $p->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn delete-data delete-btn"
                    data-nama_produk = "{{ $p->nama_produk }}" ><i class="fas fa-trash"></i>
                    </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
    </div>
</body>
</html>
