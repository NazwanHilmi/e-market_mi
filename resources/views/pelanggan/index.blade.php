@extends('templates.layout')

@push('style')
    
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Pelanggan</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active">Pelanggan</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Pelanggan</h3>
    
          </div>
          <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                    {{ session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
    
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error )
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
    
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormPelanggan">Tambah Pelanggan</button>
            <div class="mt-3">
                @include('pelanggan.data')
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Footer
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        @include('pelanggan.form')
    </section>
  
@endsection

@push('script')
<script>
      $('#tbl-pelanggan').DataTable()

        $('.alert-success').fadeTo(1000,500).slideUp(500, function(){
          $('alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(2000,500).slideUp(500, function(){
          $('alert-danger').slideUp(500)
        })

        // Sweet Alert
        $('#tbl-pelanggan').on('click', '.delete-btn', function(e){
          e.preventDefault();
          let nama = $(this).closest('tr').find('td:eq(2)').text();
          Swal.fire({
              title: `Apakah data <span style="color:red;"> ${nama} </span> akan dihapus?`,
              text: 'Data tidak bisa dikembalikan!',
              icon : 'warning',
              showCancelButton : true,
              confirmButtonColor : '#3085d6',
              cancelButtonColor : '#d33',
              confirmButtonText: 'Ya, hapus data ini!'
          }).then((result) => {
              if (result.isConfirmed) {
                  $(e.target).closest('form').submit();
              } else {
                  swal.close();
              }
          });
      });

      // Update Data
      $('#modalFormPelanggan').on('show.bs.modal', function(e){
        $('.modal-header .btn-close').attr('data-dismiss', 'modal');
        $('.modal-footer .close-btn').attr('data-dismiss', 'modal');
        const btn = $(e.relatedTarget);
        const modal = $(this);
        const mode = btn.data('mode');
        const id = btn.data('id');
        const kode_pelanggan = btn.data('kode_pelanggan');
        const nama = btn.data('nama');
        const alamat = btn.data('alamat');
        const no_telp = btn.data('no_telp');
        const email = btn.data('email');
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data Pelanggan');
            modal.find('#kode_pelanggan').val(kode_pelanggan); // Memasukkan nilai nama_produk ke dalam input
            modal.find('#nama').val(nama); // Memasukkan nilai nama_produk ke dalam input
            modal.find('#alamat').val(alamat); // Memasukkan nilai nama_produk ke dalam input
            modal.find('#no_telp').val(no_telp); // Memasukkan nilai nama_produk ke dalam input
            modal.find('#email').val(email); // Memasukkan nilai nama_produk ke dalam input
            modal.find('#method').html('@method("PATCH")');
            modal.find('.modal-body form').attr('action', '{{url("pelanggan")}}/' + id);
        } else {
            modal.find('.modal-title').text('Tambah Data Pelanggan');
            modal.find('#kode_barang').val(''); // Mengosongkan input
            modal.find('#nama').val(''); // Mengosongkan input
            modal.find('#alamat').val(''); // Mengosongkan input
            modal.find('#no_telp').val(''); // Mengosongkan input
            modal.find('#email').val(''); // Mengosongkan input
            modal.find('#method').html('');
            modal.find('.modal-body form').attr('action', '{{url("pelanggan")}}');
        }
    });


    </script>    

@endpush