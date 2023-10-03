<table class="table table-compact table-stripped" id="tbl-barang">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Produk</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barang as $b)
            <tr>
                <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
                <td>{{ $b->kode_barang }}</td>
                <td>{{ $b->nama_barang }}</td>
                <td>{{ $b->satuan }}</td>
                <td>{{ $b->harga_jual }}</td>
                <td>{{ $b->stok }}</td>
                <td>{{ $b->produk->nama_produk}}</td>
                <td>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalFormBarang" data-mode = "edit" data-id = "{{ $b->id }}" data-kode_barang = "{{ $b->kode_barang }}" data-nama_barang = "{{ $b->nama_barang }}" data-satuan = "{{ $b->satuan }}" data-harga_jual = "{{ $b->harga_jual }}" data-stok = "{{ $b->stok }}"><i class="fas fa-edit"></i>
                    </button>
                    <form method="post"
                    action="{{ route('barang.destroy', $b->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn delete-data delete-btn"
                    data-nama_barang = "{{ $b->nama_barang }}" ><i class="fas fa-trash"></i>
                    </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
