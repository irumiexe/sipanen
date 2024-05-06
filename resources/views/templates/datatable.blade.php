@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h1>{{ $title }}</h1>
@endsection

@section('content')
    
    @if (session('success'))
        <div class="row mt-3">
            <div class="col-md">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif
  
    <div class="row mb-3">
        <div class="col-md">
            {!! $buttons !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="card card-lime card-outline">
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
    
{{-- Tambah Kecamatan --}}
    <!-- Modal -->
    {{-- @include('templates.modal') --}}
    <div class="modal fade" id="tambahKelurahan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.kelurahan.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kelurahan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md">
                                <label for="Nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control mb-3" placeholder="Nama Kelurahan" required>

                                <label for="Kecamatan">Kecamatan</label>
                                <select name="kecamatan_id" id="kecamatan_id" class="form-control mb-3" required>
                                    <option value="" disabled selected>-- Pilih Kecamatan --</option>
                                    @foreach (\App\Models\Kecamatan::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{-- Tambah Kelurahan --}}

    <div class="modal fade" id="tambahKecamatan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.kecamatan.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kecamatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md">
                                <label for="Nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control mb-3" placeholder="Nama Kecamatan" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Kelurahan --}}

    <div class="modal fade" id="editKelurahanModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" id="editKelurahanModalForm" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Kelurahan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md">
                                <label for="Nama">Nama</label>
                                <input type="text" name="nama" id="editNamaKelurahan" class="form-control mb-3" placeholder="Nama Kelurahan" required>

                                <label for="Kecamatan">Kecamatan</label>
                                <select name="kecamatan_id" id="editNamaKecamatanId" class="form-control mb-3" required>
                                    <option value="" disabled selected>-- Pilih Kecamatan --</option>
                                    @foreach (\App\Models\Kecamatan::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

  {{-- Edit Kecamatan --}}

    <div class="modal fade" id="editKecamatanModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" id="editKecamatanModalForm" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Kecamatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md">
                                <label for="Nama">Nama</label>
                                <input type="text" name="nama" id="editNamaKecamatan" class="form-control mb-3" placeholder="Nama Kecamatan" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

  {{-- Tambah Kelurahan --}}

    <div class="modal fade" id="tambahUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.user-config.store') }}" id="tambahUserModalForm" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md">
                                <label>Nama</label>
                                <input type="text" name="name" class="form-control mb-3" placeholder="Nama" required>
                                <label>Username</label>
                                <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
                                <label>Email</label>
                                <input type="email" name="username" class="form-control mb-3" placeholder="Email" required>
                                <label>No. Telepon</label>
                                <input type="number" name="telp" class="form-control mb-3" placeholder="No. Telepon" required>
                                <label>Roles</label>
                                <select name="roles" id="roles" class="form-control mb-3" required>
                                    <option disabled selected>-- Pilih Roles --</option>
                                    <option value="admin">Admin</option>
                                    <option value="penyuluh">Penyuluh</option>
                                    <option value="petani">Petani</option>
                                    <option value="kebid">Kepala Bidang</option>
                                </select>
                                <label>Password</label>
                                <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                                <label>Ketik Ulang Password</label>
                                <input type="password" name="password_2" class="form-control mb-3" placeholder="Ketik Ulang Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

  {{-- Hapus Data --}}
  
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" id="hapusModalForm" method="POST">
                    @csrf
                    @method("DELETE")
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    {{ $dataTable->scripts() }}
@endsection