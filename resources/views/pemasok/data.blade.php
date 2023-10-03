<table class="table table-compact table-stripped" id="tbl-pemasok">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Pemasok</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemasok as $pmsk)
            <tr>
                <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
                <td>{{ $pmsk->nama_pemasok }}</td>
                <td>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalFormPemasok" data-mode = "edit" data-id = "{{ $pmsk->id }}" data-nama_pemasok = "{{ $pmsk->nama_pemasok }}"><i class="fas fa-edit"></i>
                    </button>
                    <form method="post"
                    action="{{ route('pemasok.destroy', $pmsk->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn delete-data delete-btn"
                    data-nama_pemasok = "{{ $pmsk->nama_pemasok }}" ><i class="fas fa-trash"></i>
                    </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
