@extends('admin.template')
@section('title', 'Data Inventory Barang')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>News</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">News</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">News</h3>
                </div>


                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <div class="row">
                            <div class="col-">
                                {{-- <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#modal-inputPack">
                                    <i class="far fa-arrow-alt-to-bottom"></i> Input
                                    Pack
                                </button>
                                <form action="{{ route('admin.inputBarangPackPost') }}" method="post">
                                    @csrf
                                    <div class="modal fade" id="modal-inputPack">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Input Pack</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <label for="namaBarang" class="col-form-label">Nama
                                                                Barang</label>
                                                            <input type="text" id="nama_barang" name="nama_barang"
                                                                class="form-control @error('nama_barang') is-invalid @enderror"
                                                                placeholder=".col-3">
                                                            @error('nama_barang')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-3">
                                                            <label for="namaBarang" class="col-form-label">Satuan</label>
                                                            <input type="text" id="satuan" name="satuan"
                                                                class="form-control @error('satuan') is-invalid @enderror"
                                                                placeholder=".col-3" value="Pack" readonly>

                                                        </div>
                                                        <div class="col-3">
                                                            <label for="jmlhPack" class="col-form-label">Jumlah Pack</label>
                                                            <input type="number" placeholder="Jumlah Pack" id="jmlhpack"
                                                                name="jmlhpack"
                                                                class="form-control my-1 @error('jmlhpack') is-invalid @enderror"
                                                                oninput="hitungTotal()">
                                                            @error('jmlhpack')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-3">
                                                            <label for="pcsDariPack" class="col-form-label">Jumlah Pcs per
                                                                Pack</label>
                                                            <input type="number" placeholder="Jumlah Pcs per Pack"
                                                                class="form-control my-1 @error('jmlhpack') is-invalid @enderror"
                                                                id="jmlhpcspack" name="jmlhpcspack" oninput="hitungTotal()">
                                                            @error('jmlhpcspack')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                        </div>
                                                        <div class="col-6">
                                                        </div>
                                                        <div class="col">
                                                            <br>
                                                            <label for="namaBarang" class="col-form-label">Total</label>
                                                            <input type="text" placeholder="Total Pcs"
                                                                class="form-control my-1" id="totalPcs" name="totalPcs"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <!-- textarea -->
                                                            <div class="form-group">
                                                                <label>Keterangan</label>
                                                                <textarea class="form-control" rows="3" name="keterangan" placeholder="Enter ..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </form> --}}
                                <!-- /.modal -->
                            </div>
                            <div class="col-">
                                <!-- /.modal -->
                                <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#modal-inputpcs">
                                    <i class="far fa-arrow-alt-to-bottom"></i> Input Item
                                </button>
                                <form action="" method="post">
                                    @csrf
                                    <div class="modal fade" id="modal-inputpcs">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Input Pcs</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="namaBarang" class="col-form-label">Kode
                                                                Barang</label>
                                                            <input type="text" id="kode_barang" name="kode_barang"
                                                                class="form-control " placeholder="contoh: K001">

                                                            <span class="invalid-feedback" role="alert">
                                                                <strong></strong>
                                                            </span>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="satuan" class="col-form-label">Nama Barang</label>
                                                            <input type="text" id="nama_barang" name="nama_barang"
                                                                class="form-control " placeholder="contoh: Item A">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </form>
                                <!-- /.modal -->
                            </div>
                            <div class="col-3">
                                <a href="" class="btn btn-default"> <i class="far fa-file-export"></i> Rekap Data
                                    Barang
                                </a>
                            </div>
                        </div>

                        <thead>
                            <tr>
                                <th>-</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Content</th>
                                <th>Source</th>
                                <th>time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataNews as $news)
                                <tr>
                                    <td> {{ date('d-m-Y', strtotime($news->created_at)) }}</td>
                                    <td>{{ $news->title }}</td>
                                    <td><img src="{{ asset('images/news/' . $news->image) }}" alt=""
                                            style="width: 150px"></td>
                                    <td>{{ $news->content }}</td>
                                    <td>{{ $news->source }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="badge badge-danger" data-toggle="modal"
                                            data-target="#edit{{ $news->id }}">Hapus
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="edit{{ $news->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            <p class="text-muted">Edit: <b></b> </p>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="text" name="id_barang" value="" hidden>
                                                            <label for="jumlah" class="col-form-label">Jumlah</label>
                                                            <input type="number" id="jumlah_barang" name="jumlah_barang"
                                                                class="form-control " placeholder="contoh: 12">
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong></strong>
                                                            </span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="hapus12" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            <p class="text-muted">Hapus Data: <b>as</b></p>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6 class="font-weight-bolder">Yakin hapus..?? <br>
                                                            <span class="text-danger">Data yang dihapus tidak dapat
                                                                dikembalikan (PERMANEN)</span>
                                                        </h6>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="" class="btn btn-primary">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
@endsection

@push('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('LTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('LTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('LTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('LTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('LTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('LTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('LTE/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('LTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('LTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('LTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('LTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('LTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('LTE/plugins/toastr/toastr.min.js') }}"></script>


    <script>
        $(function() {
            $("#example1")
                .DataTable({
                    responsive: true,
                    lengthChange: false,
                    autoWidth: false,
                    // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                })
                .buttons()
                .container()
                .appendTo("#example1_wrapper .col-md-6:eq(0)");
            $("#example2").DataTable({
                paging: true,
                lengthChange: false,
                searching: false,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
            });
        });
    </script>

    <script>
        function tampilkanForm(select) {
            var pilihan = select.value;
            var formContainers = document.querySelectorAll('.form-container');

            // Sembunyikan semua form
            formContainers.forEach(function(formContainer) {
                formContainer.style.display = 'none';
            });

            // Tampilkan form yang sesuai
            if (pilihan) {
                document.getElementById(pilihan).style.display = 'block';
            }
        }

        function hitungTotal() {
            var jmlhPack = parseFloat(document.getElementById('jmlhpack').value) || 0;
            var jmlhPcsPack = parseFloat(document.getElementById('jmlhpcspack').value) || 0;
            var totalPcs = jmlhPack * jmlhPcsPack;

            document.getElementById('totalPcs').value = totalPcs;
        }

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        $(document).ready(function() {
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            @if (session('error'))
                toastr.error("{{ session('error') }}");
            @endif
        });
    </script>
@endpush
