<x-app-layout title="surattugas">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Surat Penugasan Lapangan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Surat Penugasan Lapangan</li>
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
                    <h2 class="card-title">Data Surat Penugasan Lapangan</h2>
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
                    {{-- <div class="row g-3 align-items-center mb-4">
                        <div class="col-auto">
                            <form action="/petugas" method="GET">
                                <input type="text" id="search" name="search" class="form-control" placeholder="Search">
                            </form>
                        </div> --}}
                        @if(Auth::guard('web')->user()->role === 'admin')
                        <div class="col-auto d-flex justify-content-end mt-2">
                            <a href="{{ route('suratpenugasan.create') }}" class="btn btn-success">
                                Tambah Data
                            </a>
                        </div>
                        @endif
                        @if(Auth::guard('web')->user()->role === 'supervisor')
                        <div class="col-auto d-flex justify-content-end mt-2">
                          <a href="{{ route('suratpenugasan.create') }}" class="btn btn-success">
                              Tambah Data
                          </a>
                      </div>
                        @endif

                        @if(Auth::guard('web')->user()->role === 'staff')
                        <div class="col-auto d-flex justify-content-end mt-2">
                          <a href="{{ route('suratpenugasan.create') }}" class="btn btn-success">
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
              <th>Tanggal Tugas</th>
              <th>Tanggal Pelaksanaan</th>
              <th>Tujuan Lokasi</th>
              <th>Deskripsi</th>
              <th>Petugas Lapangan</th>
            </tr>
          </thead>
          <tbody>
            @php
                  $no=1;
                  @endphp
                  @foreach ($suratpenugasan as $index => $item)
                  <tr>
                      <th class="px-6 py-2">{{ $index + $suratpenugasan->firstItem() }}</th>
                      <td class="px-6 py-2">{{ $item->nosurat }}</td>
                      <td class="px-6 py-2">{{ $item->tgltugas }}</td>
                      <td class="px-6 py-2">{{ $item->tglpelaksana }}</td>
                      <td class="px-6 py-2">{{ $item->tujuan }}</td>
                      <td class="px-6 py-2">{{ $item->deskripsi }}</td>
                      <td class="px-6 py-2">{{ $item->petugas_lapangan->nama }}</td>
                      @if(Auth::guard('web')->user()->role === 'staff')
                      <td class="project-actions text-right">
                        <div class="btn-group btn-group-sm">
                        <a href="{{ route('suratpenugasan.show', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                          <a href="{{ route('suratpenugasan.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                          <form action="{{ route('suratpenugasan.destroy', $item->id) }}" method="POST" style="display: inline">
                            {!! method_field('delete') . csrf_field() !!}
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                          </form>
                            <!-- <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a> -->
                        </div>
                    </td>
                    @endif
                    @if(Auth::guard('web')->user()->role === 'supervisor')
                    <td class="project-actions text-right">
                      <div class="btn-group btn-group-sm">
                      <a href="{{ route('suratpenugasan.show', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('suratpenugasan.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('suratpenugasan.destroy', $item->id) }}" method="POST" style="display: inline">
                          {!! method_field('delete') . csrf_field() !!}
                          <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                          <!-- <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                          <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a> -->
                      </div>
                  </td>
                  @endif
                  @if(Auth::guard('web')->user()->role === 'admin')
                  <td class="project-actions text-right">
                    <div class="btn-group btn-group-sm">
                    <a href="{{ route('suratpenugasan.show', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                      <a href="{{ route('suratpenugasan.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                      <form action="{{ route('suratpenugasan.destroy', $item->id) }}" method="POST" style="display: inline">
                        {!! method_field('delete') . csrf_field() !!}
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                      </form>
                        <!-- <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a> -->
                    </div>
                </td>
                @endif
                @if(Auth::guard('web')->user()->role === 'user')
                <td class="project-actions text-right">
                  <div class="btn-group btn-group-sm">
                  <a href="{{ route('suratpenugasan.show', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                  </div>
              </td>
              @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="text-center mt-5">
                {{ $suratpenugasan->withQueryString()->links() }}
                </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
<!-- /.row -->
</div>
<div class="row">
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Petugas Lapangan</h3>

      <div class="card-tools">
        {{-- <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div> --}}
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 300px;">
      <table class="table table-head-fixed text-nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @php
                  $no=1;
                  @endphp
                  @foreach ($suratpenugasan as $index => $item)
                  <tr>
                      <th class="px-6 py-2">{{ $index + $suratpenugasan->firstItem() }}</th>
                      <td class="px-6 py-2">{{ $item->petugas_lapangan->nama }}</td>
                      <td class="px-6 py-2">{{ $item->petugas_lapangan->jabatan }}</td>
                      <td class="px-6 py-2">{{ $item->tglmulai }}</td>
                      <td class="px-6 py-2">{{ $item->tglselesai }}</td>
                      <td class="px-6 py-2">{{ $item->status }}</td>
                      <!-- <td>
                          <a href="{{ route('surattugas.edit', $item->id) }}" class="btn btn-primary">
                            Edit
                        </a>
                            <form action="{{ route('surattugas.destroy', $item->id) }}" method="POST" style="display: inline">
                                {!! method_field('delete') . csrf_field() !!}
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                    </td> -->
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="text-center mt-5">
                {{ $suratpenugasan->withQueryString()->links() }}
                </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
</div>
<!-- /.row -->
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</x-app-layout>
