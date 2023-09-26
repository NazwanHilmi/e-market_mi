<div class="modal fade" id="modalFormPelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pelanggan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="pelanggan">
                @csrf
            <div id="method"></div>

              <div class=" form-group row">
                <label for="kode_pelanggan" class="col-sm-4 col-form-label">Kode Pelanggan</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="kode_pelanggan"  name="kode_pelanggan" placeholder="Kode Pelanggan">
                </div>
              </div>

              <div class=" form-group row">
                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nama"  name="nama" placeholder="Nama">
                </div>
              </div>

              <div class=" form-group row">
                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="alamat"  name="alamat" placeholder="Alamat">
                </div>
              </div>

              <div class=" form-group row">
                <label for="no_telp" class="col-sm-4 col-form-label">No Telepon</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="no_telp"  name="no_telp" placeholder="No Telepon">
                </div>
              </div>

              <div class=" form-group row">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="email"  name="email" placeholder="Email">
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
    