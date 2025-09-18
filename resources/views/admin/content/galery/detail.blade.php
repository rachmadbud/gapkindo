@extends('admin.template')
@section('title', 'Admin | Galery')
@section('content')

    <style>
        .image-container {
            position: relative;
            display: inline-block;
        }

        .overlay-icons {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* background transparan */
            opacity: 0;
            /* sembunyi default */
            transition: opacity 0.3s ease;
        }

        .image-container:hover .overlay-icons {
            opacity: 1;
            /* muncul saat hover */
        }
    </style>

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
                    <h1>Gallery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Galery</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="{{ asset('guest/assets/img/galeri/' . $dataGaleri->image) }}" target="_blank"
                                        data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                        <img src="{{ asset('guest/assets/img/galeri/' . $dataGaleri->image) }}"
                                            class="img-fluid mb-2" alt="white sample" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Input Gambar</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <input type="text" name="id_galery" value="{{ $dataGaleri->id }}" hidden>
                                            <label for="inputImage" class="col-sm-2 col-form-label text-dark"
                                                style="color: #000 !important;">img</label>
                                            <div class="col-sm-10">
                                                <div class="custom-file">
                                                    <input type="file" name="foto" class="custom-file-input"
                                                        id="exampleInputFile" accept="image/*">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <center>
                                                <img id="previewImage" src="#" alt="Preview Gambar"
                                                    class="img-fluid rounded shadow-sm"
                                                    style="max-height: 500px; display: none;">
                                            </center>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card card-primary">
                        <div class="card-header ">
                            <h4 class="card-title my-2">Koleksi</h4>
                            {{-- float-sm-right --}}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if ($dataDetail->whereNotNull('id_detail')->whereNotNull('foto_detail')->count() > 0)
                                    @foreach ($dataDetail as $item)
                                        <div class="col-sm-4">
                                            <div class="position-relative image-container">
                                                <!-- Thumbnail -->
                                                <a href="{{ asset('guest/assets/img/galeri/' . $item->foto_detail) }}"
                                                    data-toggle="lightbox" data-title="Preview" data-gallery="gallery">
                                                    <img src="{{ asset('guest/assets/img/galeri/' . $item->foto_detail) }}"
                                                        class="img-fluid mb-2" alt="galeri" />
                                                </a>

                                                <!-- Overlay Icons -->
                                                <div class="overlay-icons d-flex justify-content-center align-items-center">
                                                    <!-- Eye -->
                                                    <a href="{{ asset('guest/assets/img/galeri/' . $item->foto_detail) }}"
                                                        target="_blank" data-toggle="lightbox" data-title="Preview"
                                                        data-gallery="gallery" class="btn btn-sm btn-light mx-1">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    <!-- Trash -->
                                                    <button class="btn btn-sm btn-danger mx-1"
                                                        onclick="hapusGambar({{ $item->id_detail }})">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12 text-center">
                                        <p class="text-muted">Belum ada gambar di galeri.</p>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('script')
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
    <script>
        function hapusGambar(id_detail) {
            if (confirm("Yakin hapus gambar ?")) {
                // Arahkan langsung ke route controller
                let url = "{{ route('admin.destroyDetail', ':id') }}";
                url = url.replace(':id', id_detail);

                window.location.href = url;

            }
        }
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
