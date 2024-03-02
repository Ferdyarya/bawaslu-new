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
                            <li class="breadcrumb-item"><a href="/suratpenugasan">Surat Penugasan</a></li>
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
                                <h3 class="card-title">Surat Penugasan</h3>
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
                            <form action="{{ route('suratpenugasan.update', $item->id) }}" class="w-full" method="POST"
                    enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body mb-3">
                                    <div class="form-group">
                                        <label>Tanggal Tugas</label>
                                        <input value="{{ $item->tgltugas }}" name="tgltugas" class="form-control"
                                        id="tgltugas" type="date" placeholder="Tanggal">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pelaksanaan</label>
                                        <input value="{{ $item->tglpelaksana }}" name="tglpelaksana" class="form-control"
                                        id="tglpelaksana" type="date" placeholder="Tanggal">
                                    </div>
                                    <div class="form-group">
                                            <label for="tujuan">Tujuan Lokasi</label>
                                            <input value="{{ $item->tujuan }}" name="tujuan" type="text" class="form-control" id="tujuan" placeholder="Tujuan">
                                        </div>
                                        <div class="form-group">
                                          <label>Deskripsi</label>
                                          <textarea name="deskripsi" class="form-control" rows="4" placeholder="Deskripsi...">{{ $item->deskripsi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                         <label for="id_petugas">Petugas</label>
                                         <div class="row">
                                             <div class="col">
                                                 <!-- Div untuk menampilkan nama petugas yang dipilih sebelumnya -->
                                                 <div id="selected_petugas" class="form-control" readonly>
                                                     {{ $item->petugas_lapangan->nama }} <!-- mungkin perlu menyesuaikan dengan cara mengakses nama petugas dalam model -->
                                                 </div>
                                             </div>
                                             <div class="col-auto">
                                                 <a class="btn btn-default" data-toggle="modal" data-target="#ref-table-petugas" href="#"><span class="fas fa-search"></span></a>
                                             </div>
                                         </div>
                                         <!-- Input field tersembunyi untuk menyimpan ID petugas yang dipilih sebelumnya -->
                                         <input type="hidden" name="id_petugas" id="id_petugas" value="{{ $item->id_petugas }}">
                                     </div>                                    
                                          <div class="form-group">
                                              <label>Tanggal Mulai</label>
                                                    <input value="{{ $item->tglmulai }}" name="tglmulai" class="form-control"
                                                    id="tglmulai" type="date" placeholder="Tanggal">
                                          </div>
                                          <div class="form-group">
                                              <label>Tanggal Selesai</label>
                                              <input value="{{ $item->tglselesai }}" name="tglselesai" class="form-control"
                                              id="tglselesai" type="date" placeholder="Tanggal">
                                          </div>
                                          <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="custom-select form-control-border" id="status">
                                                <option value="Berhasil" {{ $item->status == 'Berhasil' ? 'selected' : '' }}>Berhasil</option>
                                                <option value="Pending" {{ $item->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="Gagal" {{ $item->status == 'Gagal' ? 'selected' : '' }}>Gagal</option>
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
              <td><a href="#" class="btn btn-sm btn-primary" onclick="addPetugas('{{ $item->id }}', '{{ $item->nama }}')">Pilih</a></td>
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
 function addPetugas(petugasId, petugasName) {
  var selectedPetugasDiv = document.getElementById('selected_petugas');
 
  // Hapus semua elemen anak dari div yang menampilkan petugas yang dipilih sebelumnya
  while (selectedPetugasDiv.firstChild) {
      selectedPetugasDiv.removeChild(selectedPetugasDiv.firstChild);
  }
 
  // Tambahkan petugas yang baru dipilih
  var p = document.createElement('p');
  p.textContent = petugasName;
  selectedPetugasDiv.appendChild(p);
 
  // Simpan ID Petugas yang dipilih dalam input tersembunyi
  var selectedPetugasInput = document.getElementById('id_petugas');
  selectedPetugasInput.value = petugasId;
 
  $('#ref-table-petugas').modal('hide');
 }
 
 </script>
 
 </x-app-layout>
 