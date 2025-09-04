@extends('guest.layouts.master')

@section('title', 'Anggota TPP | GAPKINDO')

@section('content')
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">{{ __('global.anggotaTpp') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <!-- property area -->
    <div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
        <div class="container">
            <div class="row">
                <div class="blog-lst col-md-9 p0">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="post-header single">
                                <div class="">
                                    <h2 class="wow fadeInLeft animated">{{ trans('global.anggotaTpp') }}</h2>
                                    <div class="title-line wow fadeInRight animated"></div>
                                </div>
                            </div>
                            <!-- Input Pencarian -->
                            <!-- Tabel -->
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th>{{ __('global.KodeTpp') }}</th>
                                        <th>{{ __('global.NamaPerusahaan') }}</th>
                                        <th>{{ __('global.Cabang') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    {{-- Data akan di-render dengan JavaScript --}}
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <div class="d-flex justify-content-between">
                                <button id="prevBtn" class="btn btn-primary">Previous</button>
                                <span id="pageInfo"></span>
                                <button id="nextBtn" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="blog-asside-right col-md-3">

                    <div class="panel panel-default sidebar-menu wow  fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ __('global.Search') }}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="input-group">
                                <input class="form-control" placeholder="Search" type="text" id="searchInput">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-smal">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="proerty-th">

                </div>
            </div>
        </div>
    </div>



@endsection

@push('scripts')
    <script>
        let rawData = @json($dataTpp);
        // kalau ada property data (paginator), ambil itu. Kalau tidak, langsung rawData
        let data = rawData.data ? rawData.data : rawData;

        // console.log("DEBUG DATA:", data);

        let currentPage = 1;
        let rowsPerPage = 10;

        function renderTable(filteredData) {
            if (!Array.isArray(filteredData)) {
                console.error("filteredData bukan array:", filteredData);
                return;
            }

            let tableBody = document.getElementById("tableBody");
            tableBody.innerHTML = "";

            let start = (currentPage - 1) * rowsPerPage;
            let end = start + rowsPerPage;
            let paginatedItems = filteredData.slice(start, end);

            paginatedItems.forEach(item => {
                let row = `<tr>
                <td>${item.kode_tpp}</td>
                <td>${item.perusahaan}</td>
                <td>${item.cabang}</td>
            </tr>`;
                tableBody.innerHTML += row;
            });

            document.getElementById("pageInfo").innerText =
                `Page ${currentPage} of ${Math.ceil(filteredData.length / rowsPerPage)}`;
        }

        function setupPagination(filteredData) {
            document.getElementById("prevBtn").onclick = function() {
                if (currentPage > 1) {
                    currentPage--;
                    renderTable(filteredData);
                }
            };

            document.getElementById("nextBtn").onclick = function() {
                if (currentPage < Math.ceil(filteredData.length / rowsPerPage)) {
                    currentPage++;
                    renderTable(filteredData);
                }
            };
        }

        document.getElementById("searchInput").addEventListener("keyup", function() {
            let keyword = this.value.toLowerCase();
            let filteredData = data.filter(item =>
                item.kode_tpp.toLowerCase().includes(keyword) ||
                item.perusahaan.toLowerCase().includes(keyword) ||
                item.cabang.toLowerCase().includes(keyword)
            );
            currentPage = 1;
            renderTable(filteredData);
            setupPagination(filteredData);
        });

        renderTable(data);
        setupPagination(data);
    </script>
@endpush
