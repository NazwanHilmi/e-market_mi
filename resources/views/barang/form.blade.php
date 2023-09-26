<div class="modal fade" id="modalFormBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Barang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="barang">
                @csrf
            <div id="method"></div>
            <div class=" form-group row">
                <label for="kode_barang" class="col-sm-4 col-form-label">Kode Barang</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="kode_barang"  name="kode_barang" placeholder="Kode Barang">
                </div>
              </div>

              <div class=" form-group row">
                <label for="nama_barang" class="col-sm-4 col-form-label">Nama Barang</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nama_barang"  name="nama_barang" placeholder="Nama Barang">
                </div>
              </div>

              <div class=" form-group row">
                <label for="satuan" class="col-sm-4 col-form-label">Satuan</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="satuan"  name="satuan" placeholder="Satuan">
                </div>
              </div>

              <div class=" form-group row">
                <label for="harga_jual" class="col-sm-4 col-form-label">Harga Jual</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="harga_jual"  name="harga_jual" placeholder="Harga">
                </div>
              </div>

              <div class=" form-group row">
                <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="stok"  name="stok" placeholder="Stok">
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
    