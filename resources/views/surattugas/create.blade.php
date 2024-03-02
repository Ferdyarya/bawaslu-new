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
                            <li class="breadcrumb-item"><a href="/surattugas">Surat Tugas</a></li>
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
                                <h3 class="card-title">Surat Tugas</h3>
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
                            <form action="{{ route('surattugas.store') }}" class="w-full" method="POST"
                    enctype="multipart/form-data">
                                @csrf
                                <div class="card-body mb-3">
                                    <div class="form-group">
                                        <label>Tanggal Tugas</label>
                                        <input value="{{ old('tgltugas') }}" name="tgltugas[]" class="form-control"
                                        id="tgltugas" type="date" placeholder="Tanggal" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pelaksanaan</label>
                                        <input value="{{ old('tglpelaksana') }}" name="tglpelaksana[]" class="form-control"
                                        id="tglpelaksana" type="date" placeholder="Tanggal" required>
                                    </div>
                                    <div class="form-group">
                                            <label for="tujuan">Tujuan Lokasi</label>
                                            <input value="{{ old('tujuan') }}" name="tujuan[]" type="text" class="form-control" id="tujuan" placeholder="Tujuan" required>
                                        </div>
                                        <div class="form-group">
                                          <label>Deskripsi</label>
                                          <textarea name="deskripsi[]" class="form-control" rows="4" placeholder="Deskripsi..." required>{{ old('deskripsi') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                          <label for="id_staf">Staff</label>
                                            <div class="row">
                                              <div class="col">
                                                <div id="selected_staf" class="form-control" readonly required>
                                                </div>
                                              </div>
                                              <div class="col-auto">
                                                <a class="btn btn-default" data-toggle="modal" data-target="#ref-table-staf" href="#"><span class="fas fa-search"></span></a>
                                              </div>
                                            </div>
                                            <input type="hidden" name="id_staf[]" id="id_staf">
                                          </div>
                                          <div class="form-group">
                                              <label>Tanggal Mulai</label>
                                                    <input value="{{ old('tglmulai') }}" name="tglmulai[]" class="form-control"
                                                    id="tglmulai" type="date" placeholder="Tanggal" required>
                                          </div>
                                          <div class="form-group">
                                              <label>Tanggal Selesai</label>
                                              <input value="{{ old('tglselesai') }}" name="tglselesai[]" class="form-control"
                                              id="tglselesai" type="date" placeholder="Tanggal" required>
                                          </div>
                                          <div class="form-group">
                                              <label for="status">Status</label>
                                              <select name="status[]" class="custom-select form-control-border" id="status" required>
                                                <option>Berhasil</option>
                                                <option>Pending</option>
                                                <option>Gagal</option>
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
<div class="modal fade" id="ref-table-staf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Tabel staf -->
        <table class="table">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Instansi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Looping staf -->
            @foreach ($staf as $item)
            <tr>
              <td>{{ $item->nama }}</td>
              <td>{{ $item->jabatan }}</td>
              <td>{{ $item->instansi }}</td>
              <td><a href="#" class="btn btn-sm btn-primary" onclick="addStaff('{{ $item->id }}', '{{ $item->nama }}')">Pilih</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript untuk menambahkan staf yang dipilih ke kolom staf -->
<script>
function addStaff(staffId, staffName) {
  var selectedStafDiv = document.getElementById('selected_staf');

  // Hapus semua elemen anak dari div yang menampilkan staf yang dipilih sebelumnya
  while (selectedStafDiv.firstChild) {
      selectedStafDiv.removeChild(selectedStafDiv.firstChild);
  }

  // Tambahkan staf yang baru dipilih
  var p = document.createElement('p');
  p.textContent = staffName;
  selectedStafDiv.appendChild(p);

  // Simpan ID staf yang dipilih dalam input tersembunyi
  var selectedStafInput = document.getElementById('id_staf');
  selectedStafInput.value = staffId;

  $('#ref-table-staf').modal('hide');
}

</script>

</x-app-layout>
