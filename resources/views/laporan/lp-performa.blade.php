<x-app-layout title="Laporan">
    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Laporan Performa Petugas</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                  <li class="breadcrumb-item active">Laporan</li>
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
<div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">&nbsp;</h3>
      </div>
      <div class="card-body">
        <form method="GET" action="/get-data-pe">
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    <label for="dari">Dari</label>
                    <input type="date" name="dari" id="dari" class="form-control" required>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label for="sampai">Sampai</label>
                    <input type="date" name="sampai" id="sampai" class="form-control" required>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
        </div>
    </form>

  </div>
    </div>
    <!-- /.card -->

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">Laporan Data Performa Petugas</h2>
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
<!-- /.card-header -->
<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
  <tr>
    <th>No</th>
    <th>Nama Petugas</th>
    <th>Jabatan</th>
    <th>Performa</th>
    <th>Deskripsi</th>
    <th>Penilaian</th>
  </tr>
</thead>
<tbody>
  @php
        $no=1;
        @endphp
        @foreach ($performa as $index => $item)
        <tr>
          <td class="px-6 py-2">{{ $loop->iteration }}</td>
            <td class="px-6 py-2">{{ $item->petugas_lapangan->nama }}</td>
            <td class="px-6 py-2">{{ $item->petugas_lapangan->jabatan }}</td>
            <td class="px-6 py-2">{{ $item->performa }}</td>
            <td class="px-6 py-2">{{ $item->deskripsi }}</td>
            <td class="px-6 py-2">{{ $item->penilaian }}</td>
            {{--
            <td class="project-actions text-right">
              <div class="btn-group btn-group-sm">
              <a href="{{ route('surattugas.show', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                <a href="{{ route('surattugas.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                  <!-- <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                  <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a> -->
                  <form action="{{ route('surattugas.destroy', $item->id) }}" method="POST" style="display: inline">
                    {!! method_field('delete') . csrf_field() !!}
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
              </div>
          </td> --}}
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="text-center mt-5">
      {{ $performa->withQueryString()->links() }}
      </div>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<div class="row no-print">
  <div class="col-12 mb-3">
    <a href="{{ route('CtkPe', ['dari' => request()->input('dari'), 'sampai' => request()->input('sampai')]) }}" class="btn btn-danger float-right" style="margin-right: 5px;">
      <!-- <a href="javascript:window.print();" class="btn btn-danger btn-sm"> -->
          <i class="fa fa-file-pdf"></i> Export PDF
      </a>
  </div>
</div>
</div>
<!-- /.row -->
</div>
</x-app-layout>
