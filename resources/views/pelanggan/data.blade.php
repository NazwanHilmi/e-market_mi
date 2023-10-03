<table class="table table-compact table-stripped" id="tbl-pelanggan">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Pelanggan</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Email</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pelanggan as $pe)
            <tr>
                <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
                <td>{{ $pe->kode_pelanggan }}</td>
                <td>{{ $pe->nama }}</td>
                <td>{{ $pe->alamat }}</td>
                <td>{{ $pe->no_telp }}</td>
                <td>{{ $pe->email }}</td>
                <td>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalFormPelanggan" data-mode = "edit" data-id = "{{ $pe->id }}" data-kode_pelanggan = "{{ $pe->kode_pelanggan }}" data-nama = "{{ $pe->nama }}" data-alamat = "{{ $pe->alamat }}" data-no_telp = "{{ $pe->no_telp }}" data-email = "{{ $pe->email }}"><i class="fas fa-edit"></i>
                    </button>
                    <form method="post"
                    action="{{ route('pelanggan.destroy', $pe->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn delete-data delete-btn"
                    data-nama = "{{ $pe->nama }}" ><i class="fas fa-trash"></i>
                    </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
