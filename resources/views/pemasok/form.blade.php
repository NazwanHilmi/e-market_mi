<div class="modal fade" id="modalFormPemasok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pemasok</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="pemasok">
                @csrf
            <div id="method"></div>
            <div class=" form-group row">
                <label for="nama_pemasok" class="col-sm-4 col-form-label">Nama Pemasok</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nama_pemasok"  name="nama_pemasok" placeholder="Nama Pemasok">
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
    