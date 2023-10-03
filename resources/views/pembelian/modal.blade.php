<div class="modal fade" id="tblBarangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Data Barang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          <table id="tblBarang2" class="table table-stripped table-compact">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($barang as $b)
                  <tr class="fs-5">
                    <td>{{ $i = (!isset($i)?1:++$i) }}</td>
                    <input type="hidden" class="idBarang" name="idBarang" value="{{ $b->id }}">
                    <td>{{ $b->kode_barang }}</td>
                    <td>{{ $b->nama_barang }}</td>
                    <td>{{ $b->harga_jual }}</td>
                    <td><button class="pilihBarangBtn btn btn-primary rounded">+</button></td>
                  </tr>
              @endforeach
            </tbody>
          </table>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
          </div>
            </div>
        </div>
    </div>
</form>
    