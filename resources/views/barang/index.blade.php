@extends('templates.layout')

@push('style')
    
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Barang</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active">Barang</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Barang</h3>
    
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
    
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormBarang">Tambah Barang</button>
            <div class="mt-3">
                @include('barang.data')
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Footer
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        @include('barang.form')
    </section>
  
@endsection

@push('script')
<script>
      $('#tbl-barang').DataTable()

        $('.alert-success').fadeTo(1000,500).slideUp(500, function(){
          $('alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(2000,500).slideUp(500, function(){
          $('alert-danger').slideUp(500)
        })

        // Sweet Alert
        $('#tbl-barang').on('click', '.delete-btn', function(e){
          e.preventDefault();
          let nama_barang = $(this).closest('tr').find('td:eq(2)').text();
          Swal.fire({
              title: `Apakah data <span style="color:red;"> ${nama_barang} </span> akan dihapus?`,
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
      $('#modalFormBarang').on('show.bs.modal', function(e){
        $('.modal-header .btn-close').attr('data-dismiss', 'modal');
        $('.modal-footer .close-btn').attr('data-dismiss', 'modal');
        const btn = $(e.relatedTarget);
        const modal = $(this);
        const mode = btn.data('mode');
        const id = btn.data('id');
        const kode_barang = btn.data('kode_barang');
        const nama_barang = btn.data('nama_barang');
        const satuan = btn.data('satuan');
        const harga_jual = btn.data('harga_jual');
        const stok = btn.data('stok');
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data Barang');
            modal.find('#kode_barang').val(kode_barang); // Memasukkan nilai nama_produk ke dalam input
            modal.find('#nama_barang').val(nama_barang); // Memasukkan nilai nama_produk ke dalam input
            modal.find('#satuan').val(satuan); // Memasukkan nilai nama_produk ke dalam input
            modal.find('#harga_jual').val(harga_jual); // Memasukkan nilai nama_produk ke dalam input
            modal.find('#stok').val(stok); // Memasukkan nilai nama_produk ke dalam input
            modal.find('#method').html('@method("PATCH")');
            modal.find('.modal-body form').attr('action', '{{url("barang")}}/' + id);
        } else {
            modal.find('.modal-title').text('Tambah Data Barang');
            modal.find('#kode_barang').val(''); // Mengosongkan input
            modal.find('#nama_barang').val(''); // Mengosongkan input
            modal.find('#satuan').val(''); // Mengosongkan input
            modal.find('#harga_jual').val(''); // Mengosongkan input
            modal.find('#stok').val(''); // Mengosongkan input
            modal.find('#method').html('');
            modal.find('.modal-body form').attr('action', '{{url("barang")}}');
        }
    });


    </script>    

@endpush