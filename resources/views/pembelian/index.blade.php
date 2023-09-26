@extends('templates.layout')

@push('style')

@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Daftar Pembelian</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active">Pembelian</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Pembelian</h3>

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

            <form action="pembelian" method="POST" id="formTransaksi">
              @csrf
              <div class="row">
                <div class="col-6">
                  <label for="kode-pembelian" class="col-4 col-form-label col-form-label-sm">Kode Pembelian</label>
                  <div class="col-8">
                    <input type="text" class="form-control form-control-sm" id="kode-pembelian" placeholder="" readonly value="{{ $kode }}" name="kode_masuk">
                  </div>
                </div>
                <div class="col-6">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Tanggal Pembelian</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="date" class="date-picker form-control col-md-7 col-xs-12" required="required" value="{{ date('Y-m-d') }}" name="tanggal_masuk">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-sm 6 col-xs-12 form-group">
                  <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">&nbsp;</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <button type="button" class="btn btn-primary" id="tambahBarangBtn" data-toggle="modal" data-target="#tblBarangModal">Tambah Barang</button>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <label for="" class="control-label col-md-6 col-sm-6 col-xs-12">Distributor</label>
                  <div class="col-md-6 col-sm-9 col-xs-12">
                    <select class="form-control col-md-10 col-xs-12" required="required" name="pemasok_id">
                      @foreach ($pemasok as $p)
                          <option value="{{ $p->id }}">{{ $p->nama_pemasok }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              @include('pembelian.data')
            </form>
          <!-- /.card-body -->
          <div class="card-footer">
            Footer
          </div>
          <!-- /.card-footer-->
        @include('pembelian.modal')
    </section>

@endsection

@push('script')
<script>

$(function() {
    // $('#tblBarang2').DataTable()

    // Pemilihan Barang
    $('#tblBarangModal').on('click', '.pilihBarangBtn', function() {
      tambahBarang(this);
    });

    // Change qty
    $('#tblTransaksi').on('change', '.qty', function() {
      calcSubTotal(this);
    });
  })

  function calcSubTotal(a) {
    let qty = parseInt($(a).closest('tr').find('.qty').val());
    let hargaBarang = parseFloat($(a).closest('tr').find('td:eq(2)').text());
    let subTotalAwal = parseFloat($(a).closest('tr').find('.subTotal').val());
    let subTotal = qty * hargaBarang;
    totalHarga += subTotal - subTotalAwal;
    $(a).closest('tr').find('.subTotal').val(subTotal);
    $('#totalHarga').val(totalHarga);
  }

  // Remove Barang
  $('#tblTransaksi').on('click', '.btnRemoveBarang', function(){
    let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').val());
    totalHarga -= subTotalAwal;

    $currentRow = $(this).closest('tr').remove();
    $('#totalHarga').val(totalHarga);

    let deleteBarang = Number($('tbody').text());
    if(deleteBarang == 0)
      $('#tblTransaksi tbody').append('<tr><td colspan="6" style="text-align:center; font-style=italic">Belum Ada Data</td></tr>')
  })

  // Tambah Barang
  let totalHarga = 0;
  function tambahBarang(a) {
    let d = $(a).closest('tr');
    let kodeBarang = d.find('td:eq(1)').text();
    let namaBarang = d.find('td:eq(2)').text();
    let hargaBarang = d.find('td:eq(3)').text();
    let idBarang = d.find('.idBarang').val();
    let data = '';
    let tbody = $('#tblTransaksi tbody tr td').text();
    data += '<tr>';
    data += '<td>'+kodeBarang+'</td>';
    data += '<td>'+namaBarang+'</td>';
    data += '<td>'+hargaBarang+'</td>';
    data += '<input type="hidden" name="barang_id[]" value="'+idBarang+'">';
    data += '<input type="hidden" name="harga_beli[]" value="'+hargaBarang+'">';
    data += '<td><input type="number" value="1" min="1" class="qty" name="jumlah[]"></td>';
    data += '<td><input type="text" readonly name="sub_total[]" class="subTotal" value="'+hargaBarang+'"></td>';
    data += '<td><button type="button" class="btnRemoveBarang btn btn-danger"><span class="fas fa-times"></span></button></td>'  ;
    data += '</tr>';

      if(tbody == 'Belum Ada Data') $('#tblTransaksi tbody tr').remove()
        $('#tblTransaksi tbody').append(data);
        totalHarga += parseFloat(hargaBarang);
        $('#totalHarga').val(totalHarga);
        $('#tblBarangModal').modal('hide');

  }


</script>

@endpush
