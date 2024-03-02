<x-app-layout title="staff">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Staff</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Data Staff</li>
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
                <h2 class="card-title">Data Staff</h2>
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
                        <form action="/staf" method="GET">
                            <input type="text" id="search" name="search" class="form-control" placeholder="Search">
                        </form>
                    </div> --}}
                    <div class="col-auto d-flex justify-content-end  mt-2">
                        <a href="{{ route('staf.create') }}" class="btn btn-success">
                            Tambah Data
                        </a>
                    </div>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Instansi</th>
                    <th>Departemen Bagian</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($datastaf as $index => $item)
                    <tr>
                        <th class="px-6 py-2">{{ $index + $datastaf->firstItem() }}</th>
                        <td class="px-6 py-2">{{ $item->nama }}</td>
                        <td class="px-6 py-2">{{ $item->jabatan }}</td>
                        <td class="px-6 py-2">{{ $item->instansi }}</td>
                        <td class="px-6 py-2">{{ $item->dpt_bagian }}</td>
                        <td>
                            <a href="{{ route('staf.edit', $item->id) }}" class="btn btn-primary">
                              Edit
                          </a>
                              <form action="{{ route('staf.destroy', $item->id) }}" method="POST" style="display: inline">
                                  {!! method_field('delete') . csrf_field() !!}
                                  <button type="submit" class="btn btn-danger">Hapus</button>
                              </form>
                      </td>                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $datastaf->links() }}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('sweetalert::alert')
</x-app-layout>