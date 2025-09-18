@extends('admin.template')
@section('title', 'Admin | Galery')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Galery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Galery</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <div class="row">
                            <div class="col-">
                            </div>
                            <div class="col-">
                                <!-- /.modal -->
                                <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#modal-inputpcs">
                                    <i class="far fa-arrow-alt-to-bottom"></i> Input Galeri
                                </button>
                                <form action="{{ route('admin.galeryPost') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal fade" id="modal-inputpcs">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <!-- general form elements -->
                                                <!-- Horizontal Form -->
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Input Cabang</h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <!-- form start -->
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="inputContent"
                                                                class="col-sm-2 col-form-label">Judul</label>
                                                            <div class="col-sm-10">
                                                                <textarea type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                                                    placeholder="judul"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputContent"
                                                                class="col-sm-2 col-form-label">Tempat</label>
                                                            <div class="col-sm-10">
                                                                <textarea type="text" name="tempat" class="form-control @error('tempat') is-invalid @enderror" id="tempat"
                                                                    placeholder="judul"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputImage"
                                                                class="col-sm-2 col-form-label">Image</label>
                                                            <div class="col-sm-10">
                                                                <div class="custom-file">
                                                                    <input type="file" name="image"
                                                                        class="custom-file-input" id="exampleInputFile"
                                                                        accept="image/*">
                                                                    <label class="custom-file-label"
                                                                        for="exampleInputFile">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mt-3">
                                                                <center>
                                                                    <img id="previewImage" src="#"
                                                                        alt="Preview Gambar"
                                                                        class="img-fluid rounded shadow-sm"
                                                                        style="max-height: 500px; display: none;">
                                                                </center>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                <!-- /.card -->
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
                        </div>

                        <thead>
                            <tr>
                                <th>-</th>
                                <th>Judul</th>
                                <th>img</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataGalery as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td><a href="{{ url('guest/assets/img/galeri/' . $item->image) }}" target="_blank"><img
                                                src="{{ asset('guest/assets/img/galeri/' . $item->image) }}"
                                                style="width: 50px" alt="no image"></a></td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="badge badge-danger" data-toggle="modal"
                                            data-target="#Hapus{{ $item->id }}">Hapus
                                        </button> -
                                        <a href="{{ route('admin.detailGelery', app(\App\Helpers\Helper::class)->enkrip($item->id)) }}"
                                            class="badge badge-success">Detail
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="Hapus{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            <p class="text-muted">Yakin hapus..? <b></b> </p>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('admin.destroy', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <input type="text" name="id" value="" hidden>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Ya
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
                            {{-- enforeach --}}
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

    <script>
        document.getElementById("exampleInputFile").addEventListener("change", function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById("previewImage");
            const label = event.target.nextElementSibling; // ambil elemen <label class="custom-file-label">

            if (file) {
                // tampilkan nama file di label
                label.textContent = file.name;

                // preview gambar
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                };
                reader.readAsDataURL(file);
            } else {
                label.textContent = "Choose file";
                preview.src = "#";
                preview.style.display = "none";
            }
        });
    </script>
@endpush
