<x-app-layout title="pelanggaran">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Data Pelanggaran Laporan</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                  <li class="breadcrumb-item active">Data Pelanggaran Laporan</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        @if ($errors->any())
        <div {{ $attributes }}>
            <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h2 class="card-title">Data Pelanggaran Laporan</h2>
                      {{-- <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div> --}}
                    </div>
                    <div class="container">
                      {{-- search --}}
                      <!-- <div class="row g-3 align-items-center mb-4">
                          <div class="col-auto">
                              <form action="/petugas" method="GET">
                                  <input type="text" id="search" name="search" class="form-control" placeholder="Search">
                              </form>
                          </div> -->
                          @if(Auth::guard('web')->user()->role === 'admin')
                          <div class="col-auto d-flex justify-content-end mt-2">
                              <a href="{{ route('pelanggaran.create') }}" class="btn btn-success">
                                  Tambah Data
                              </a>
                          </div>
                          @endif
                          @if(Auth::guard('web')->user()->role === 'supervisor')
                          <div class="col-auto d-flex justify-content-end mt-2">
                            <a href="{{ route('pelanggaran.create') }}" class="btn btn-success">
                                Tambah Data
                            </a>
                        </div>
                          @endif

                          @if(Auth::guard('web')->user()->role === 'staff')
                          <div class="col-auto d-flex justify-content-end mt-2">
                            <a href="{{ route('pelanggaran.create') }}" class="btn btn-success">
                                Tambah Data
                            </a>
                        </div>
                        @endif
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>No Surat</th>
                <th>Tanggal Surat Dibuat</th>
                <th>Tanggal Kejadian</th>
                <th>Pelaku</th>
                <th>Deskripsi Keterangan</th>
                <th>kategori</th>
                <th>Petugas Pemeriksa</th>
                {{-- <th>Status</th> --}}
              </tr>
            </thead>
            <tbody>
              @php
              $no=1;
              @endphp
              @foreach ($pelanggaran as $index => $item)
              <tr>
                  <th class="px-6 py-2">{{ $index + $pelanggaran->firstItem() }}</th>
                  <td class="px-6 py-2">{{ $item->nosurat }}</td>
                  <td class="px-6 py-2">{{ $item->tglsurat }}</td>
                  <td class="px-6 py-2">{{ $item->tglkejadian }}</td>
                  <td class="px-6 py-2">{{ $item->pelaku }}</td>
                  <td class="px-6 py-2">{{ $item->keterangan }}</td>
                  <td class="px-6 py-2">{{ $item->kategori }}</td>
                  <td class="px-6 py-2">{{ $item->petugas_lapangan->nama }}</td>
                  {{-- <td class="px-6 py-2">{{ $item->status }}</td> --}}
                  <td class="project-actions text-right">
                  <div class="btn-group btn-group-sm">{{--
                    <a href="#" class="btn btn-info btn-sm"><i class="fas fa-folder"></i></a> --}}
                    <a href="{{ route('pelanggaran.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                    <form action="{{ route('pelanggaran.destroy', $item->id) }}" method="POST" style="display: inline">
                              {!! method_field('delete') . csrf_field() !!}
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                  </div>
              </td>
              </tr>
              @endforeach
            </tbody>
            </table>
                <div class="text-center mt-5">
                  {{ $pelanggaran->withQueryString()->links() }}
                </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</x-app-layout>
