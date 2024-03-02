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
                            <li class="breadcrumb-item"><a href="/evaluasi">Evaluasi Pelaksanaan</a></li>
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
                                <h3 class="card-title">Evaluasi Pelaksanaan</h3>
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
                            <form action="{{ route('evaluasi.store') }}" class="w-full" method="POST"
                    enctype="multipart/form-data">
                                @csrf
                                <div class="card-body mb-3">
                                    <div class="form-group">
                                        <label for="id_laporan">No Surat</label>
                                          <div class="row">
                                            <div class="col">
                                              <div id="selected_laporan" class="form-control" readonly required>
                                              </div>
                                            </div>
                                            <div class="col-auto">
                                              <a class="btn btn-default" data-toggle="modal" data-target="#ref-table-laporan" href="#"><span class="fas fa-search"></span></a>
                                            </div>
                                          </div>
                                          <input type="hidden" name="id_laporan[]" id="id_laporan">
                                        </div>
                                    <div class="form-group">
                                            <label for="performa">Performa</label>
                                            <input value="{{ old('performa') }}" name="performa[]" type="text" class="form-control" id="performa" required>
                                        </div>
                                        <div class="form-group">
                                          <label>Deskripsi</label>
                                          <textarea name="deskripsi[]" class="form-control" rows="4" placeholder="Deskripsi..." required>{{ old('deskripsi') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                          <label for="id_petugas">Petugas</label>
                                            <div class="row">
                                              <div class="col">
                                                <div id="selected_petugas" class="form-control" readonly required>
                                                </div>
                                              </div>
                                              <div class="col-auto">
                                                <a class="btn btn-default" data-toggle="modal" data-target="#ref-table-petugas" href="#"><span class="fas fa-search"></span></a>
                                              </div>
                                            </div>
                                            <input type="hidden" name="id_petugas[]" id="id_petugas">
                                          </div>
                                          <div class="form-group">
                                              <label for="penilaian">Penilaian</label>
                                              <select name="penilaian[]" class="custom-select form-control-border" id="penilaian" required>
                                                <option selected disabled>Pilih Penilaian</option>
                                                  <option value="A">A</option>
                                                  <option value="B">B</option>
                                                  <option value="C">C</option>
                                                  <option value="D">D</option>
                                                  <option value="E">E</option>
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


<div class="modal fade" id="ref-table-laporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih laporan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Tabel laporan -->
          <table class="table">
            <thead>
              <tr>
                <th>No Surat</th>
                <th>Total Anggaran</th>
                <th>Petugas Lapangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!-- Looping laporan -->
              @foreach ($laporan as $item)
              <tr>
                <td>{{ $item->nosurat }}</td>
                <td>Rp. {{ number_format($item->total_anggaran) }}</td>
                <td>{{ $item->petugas_lapangan->nama }}</td>
                <td><a href="#" class="btn btn-sm btn-primary" onclick="addlaporan('{{ $item->id }}', '{{ $item->nosurat }}')">Pilih</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
  <!-- JavaScript untuk menambahkan laporan yang dipilih ke kolom laporan -->
  <script>
  function addlaporan(laporanId, laporanName) {
    var selectedlaporanDiv = document.getElementById('selected_laporan');
  
    // Hapus semua elemen anak dari div yang menampilkan laporan yang dipilih sebelumnya
    while (selectedlaporanDiv.firstChild) {
        selectedlaporanDiv.removeChild(selectedlaporanDiv.firstChild);
    }
  
    // Tambahkan laporan yang baru dipilih
    var p = document.createElement('p');
    p.textContent = laporanName;
    selectedlaporanDiv.appendChild(p);
  
    // Simpan ID laporan yang dipilih dalam input tersembunyi
    var selectedlaporanInput = document.getElementById('id_laporan');
    selectedlaporanInput.value = laporanId;
  
    $('#ref-table-laporan').modal('hide');
  }
  
  </script>
</x-app-layout>
