<x-app-layout>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Data</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/penerimaan">Data Penerimaan Laporan</a></li>
                            <li class="breadcrumb-item active">Tambah Data</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data Penerimaan Laporan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="">
                                {{-- handling error --}}
                                @if ($errors->any())
                                <div class="mb-5" role="alert">
                                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                        There's something wrong
                                    </div>
                                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                        <p>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        </p>
                                    </div>
                                </div>
                                @endif
                            <!-- form start -->
                            <form action="{{ route('penerimaan.store') }}" class="w-full" method="POST"
                    enctype="multipart/form-data">
                                @csrf
                                <div class="card-body mb-3">
                                    <div class="form-group">
                                        <label>Tanggal Tugas</label>
                                        <input value="{{ old('tgltugas') }}" name="tgltugas[]" class="form-control"
                                        id="tgltugas" type="date" placeholder="Tanggal" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Kembali</label>
                                        <input value="{{ old('tglkembali') }}" name="tglkembali[]" class="form-control"
                                        id="tglkembali" type="date" placeholder="Tanggal"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="total_anggaran">Total Anggaran</label>
                                        <input value="{{ old('total_anggaran') }}" name="total_anggaran[]" type="number" class="form-control" id="total_anggaran" placeholder="Total anggaran"  required>
                                    </div>
                                        <div class="form-group">
                                          <label>Deskripsi</label>
                                          <textarea name="deskripsi[]" class="form-control" rows="4" placeholder="Deskripsi..."  required>{{ old('deskripsi') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                          <label for="id_petugas">Petugas</label>
                                            <div class="row">
                                              <div class="col">
                                                <div id="selected_petugas" class="form-control" readonly  required>
                                                </div>
                                              </div>
                                              <div class="col-auto">
                                                <a class="btn btn-default" data-toggle="modal" data-target="#ref-table-petugas" href="#"><span class="fas fa-search"></span></a>
                                              </div>
                                            </div>
                                            <input type="hidden" name="id_petugas[]" id="id_petugas">
                                          </div>
                                          <div class="form-group">
                                              <label for="status">Status</label>
                                              <select name="status[]" class="custom-select form-control-border" id="status"  required>
                                                <option>Selesai</option>
                                                <option>Belum Selesai</option>
                                              </select>
                                            </div>
                                </div>
                                <!-- /.card-body -->
                                <!-- <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div> -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- Modal -->
<div class="modal fade" id="ref-table-petugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Tabel petugas -->
        <table class="table">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Looping petugas -->
            @foreach ($petugas as $item)
            <tr>
              <td>{{ $item->nama }}</td>
              <td>{{ $item->jabatan }}</td>
              <td><a href="#" class="btn btn-sm btn-primary" onclick="addpetugas('{{ $item->id }}', '{{ $item->nama }}')">Pilih</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript untuk menambahkan petugas yang dipilih ke kolom petugas -->
<script>
function addpetugas(petugasId, petugasName) {
  var selectedpetugasDiv = document.getElementById('selected_petugas');

  // Hapus semua elemen anak dari div yang menampilkan petugas yang dipilih sebelumnya
  while (selectedpetugasDiv.firstChild) {
      selectedpetugasDiv.removeChild(selectedpetugasDiv.firstChild);
  }

  // Tambahkan petugas yang baru dipilih
  var p = document.createElement('p');
  p.textContent = petugasName;
  selectedpetugasDiv.appendChild(p);

  // Simpan ID petugas yang dipilih dalam input tersembunyi
  var selectedpetugasInput = document.getElementById('id_petugas');
  selectedpetugasInput.value = petugasId;

  $('#ref-table-petugas').modal('hide');
}

</script>

</x-app-layout>
