<x-app-layout>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Data</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/staf">Staff</a></li>
                            <li class="breadcrumb-item active">Edit Data</li>
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
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data</h3>
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
                            <form action="{{ route('staf.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input value="{{ $item->nama }}" name="nama" class="form-control"
                                        id="nama" type="text" placeholder="Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input value="{{ $item->jabatan }}" name="jabatan" type="text" class="form-control" id="jabatan" placeholder="Jabatan">
                                    </div>
                                    <div class="form-group">
                                            <label for="instansi">Instansi</label>
                                            <input value="{{ $item->instansi }}" name="instansi" type="text" class="form-control" id="instansi" placeholder="Instansi">
                                        </div>
                                        <div class="form-group">
                                            <label for="dpt_bagian">Departemen Bagian</label>
                                            <input value="{{ $item->dpt_bagian }}" name="dpt_bagian" type="text" class="form-control" id="dpt_bagian" placeholder="">
                                        </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</x-app-layout>