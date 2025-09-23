@extends('guest.layouts.master')

@section('title', 'Anggota | GAPKINDO')

@section('content')
    <style>
        :root {
            --hover-color: #dbeafe;
            /* biru muda; ubah ke #dcfce7 untuk hijau */
            --header-bg: #f1f5f9;
            --zebra: #f9fafb;
            --border: #e5e7eb;
        }

        .tab-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .tab-buttons button {
            padding: 8px 16px;
            border: 1px solid #ccc;
            background: #f5f5f5;
            cursor: pointer;
            font-weight: 600;
            /* bikin agak tebal */
        }

        .tab-buttons button.active {
            background: #008000;
            color: white;
        }

        .tab-content {
            display: none;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .tab-content.active {
            display: block;
        }


        /* tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            /* penting supaya bg menutupi sel rapi */
            border-spacing: 0;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
        }

        thead th {
            background: #067402;
            /* abu-abu tua */
            color: #ffffff;
            /* teks putih */
            font-weight: 600;
            padding: 10px 12px;
            text-align: left;
        }

        th,
        td {
            padding: 10px 12px;
            border-bottom: 1px solid var(--border);
            /* hanya bottom agar hover rapi */
        }

        tbody tr:nth-child(even) td {
            background: var(--zebra);
        }

        /* TRANSISI HALUS pada tiap sel */
        tbody td {
            transition: background-color 0.0s ease;
        }

        /* SUPAYA SELURUH BARIS BERUBAH WARNA PENUH saat hover:
                                                                                                                                                                                                                                                                                                                                                                             apply background color ke setiap <td> pada tr:hover */
        tbody tr:hover td,
        tbody tr:focus td {
            background-color: var(--hover-color);
        }

        /* pointer & aksesibilitas */
        tbody tr {
            cursor: pointer;
        }

        tbody tr:focus {
            outline: 2px solid rgba(0, 123, 255, 0.12);
            outline-offset: -2px;
        }

        .pagination {
            margin-top: 15px;
            text-align: center;
        }

        .pagination-btn {
            background: #007bff;
            /* biru */
            color: white;
            border: none;
            margin: 2px;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
            transition: 0.2s;
        }

        .pagination-btn:hover {
            background: #9ef01a;
        }

        .pagination-btn.active {
            background: #28a745;
            /* hijau utk halaman aktif */
            font-weight: bold;
        }
    </style>

    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">{{ __('global.anggota') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <!-- property area -->
    <div class="content-area recent-property padding-top-40 parallax-bg">
        <div class="container">
            <div class="row">
                <div class="blog-lst col-md-9 p0">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="post-header single">
                                <div class="">
                                    <div class="title-line wow fadeInRight animated"></div>
                                </div>
                            </div>

                            {{-- TAB --}}
                            <!-- Menu Tabs -->
                            <div class="tab-buttons">
                                <button class="tab-btn active text-black" data-target="tab1">ESTATE</button>
                                <button class="tab-btn text-black" data-target="tab2">CENTRIFUGED LATEX PRODUCERS</button>
                                <button class="tab-btn text-black" data-target="tab3">RSS PRODUCERS</button>
                                <button class="tab-btn text-black" data-target="tab4">TSR PRODUCERS</button>
                                <button class="tab-btn text-black" data-target="tab5">BROWN CREPE PRODUCER</button>
                                <button class="tab-btn text-black" data-target="tab6">TRADERS /BROKER/BUYER
                                    REPRESENTATIVES</button>
                            </div>

                            <div id="tab1" class="tab-content active">
                                <table border="1" cellpadding="5" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Branch</th>
                                            <th>Company</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body-dataEstate">
                                        <!-- Data akan diisi JS -->
                                    </tbody>
                                </table>

                                {{-- <div id="pagination" style="margin-top: 20px; text-align: center;">
                                    
                                </div> --}}
                                <div class="pagination" id="pagination-dataEstate"></div>
                            </div>
                            <div id="tab2" class="tab-content">
                                <table border="1" cellpadding="5" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Branch</th>
                                            <th>Company</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body-centrifuged">
                                        <!-- Data akan diisi JS -->
                                    </tbody>
                                </table>

                                {{-- <div id="pagination" style="margin-top: 20px; text-align: center;">
                                    
                                </div> --}}
                                <div class="pagination" id="pagination-centrifuged"></div>
                            </div>
                            <div id="tab3" class="tab-content">
                                <table border="1" cellpadding="5" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Branch</th>
                                            <th>Company</th>
                                            <th>RSS Product</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body-RssProducers">
                                        <!-- Data akan diisi JS -->
                                    </tbody>
                                </table>

                                {{-- <div id="pagination" style="margin-top: 20px; text-align: center;">
                                    
                                </div> --}}
                                <div class="pagination" id="pagination-RssProducers"></div>
                            </div>
                            <div id="tab4" class="tab-content">
                                <table border="1" cellpadding="5" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Branch</th>
                                            <th>Company</th>
                                            <th>TRS Product</th>
                                            <th>Product COde</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body-TsrProducers">
                                        <!-- Data akan diisi JS -->
                                    </tbody>
                                </table>
                                <div class="pagination" id="pagination-TsrProducers"></div>
                            </div>
                            <div id="tab5" class="tab-content">
                                <table border="1" cellpadding="5" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Branch</th>
                                            <th>Company</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body-brownCrapeProducer">
                                        <!-- Data akan diisi JS -->
                                    </tbody>
                                </table>
                                <div class="pagination" id="pagination-brownCrapeProducer"></div>
                            </div>
                            <div id="tab6" class="tab-content">
                                <table border="1" cellpadding="5" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Branch</th>
                                            <th>Company</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body-traders">
                                        <!-- Data akan diisi JS -->
                                    </tbody>
                                </table>
                                <div class="pagination" id="pagination-traders"></div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- <div class="blog-asside-right col-md-3">

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

                </div> --}}
            </div>
        </div>
    </div>



@endsection

@push('scripts')
    <script>
        function setupPagination(config) {
            const {
                tableBodyId,
                paginationId,
                url,
                rowRenderer
            } = config;
            let currentPage = 1;

            function fetchData(page = 1) {
                fetch(`${url}?page=${page}`)
                    .then(res => res.json())
                    .then(data => {
                        currentPage = data.current_page;

                        // render tabel
                        const tbody = document.getElementById(tableBodyId);
                        tbody.innerHTML = '';
                        data.data.forEach((item, index) => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = rowRenderer(item, index, currentPage, data.per_page);
                            tbody.appendChild(tr);
                        });

                        // render pagination custom
                        const pagination = document.getElementById(paginationId);
                        pagination.innerHTML = '';

                        if (data.current_page > 1) {
                            const prev = document.createElement('button');
                            prev.textContent = '« Prev';
                            prev.className = 'pagination-btn';
                            prev.onclick = () => fetchData(currentPage - 1);
                            pagination.appendChild(prev);
                        }

                        for (let i = 1; i <= data.last_page; i++) {
                            const btn = document.createElement('button');
                            btn.textContent = i;
                            btn.className = 'pagination-btn';
                            if (i === currentPage) btn.classList.add('active');
                            btn.onclick = () => fetchData(i);
                            pagination.appendChild(btn);
                        }

                        if (data.current_page < data.last_page) {
                            const next = document.createElement('button');
                            next.textContent = 'Next »';
                            next.className = 'pagination-btn';
                            next.onclick = () => fetchData(currentPage + 1);
                            pagination.appendChild(next);
                        }
                    });
            }

            fetchData(); // pertama kali load
        }

        // estate table
        setupPagination({
            tableBodyId: 'table-body-dataEstate',
            paginationId: 'pagination-dataEstate',
            url: '/estate',
            rowRenderer: (item, index, currentPage, perPage) => `
        <td>${(currentPage-1)*perPage + index + 1}</td>
        <td>${item.prov}</td>
        <td>${item.company}</td>
        <td><a href="mailto:${item.email}">${item.email}</a></td> `
        });

        // centrifuged table
        setupPagination({
            tableBodyId: 'table-body-centrifuged',
            paginationId: 'pagination-centrifuged',
            url: '/centrifuged',
            rowRenderer: (item, index, currentPage, perPage) => `
        <td>${(currentPage-1)*perPage + index + 1}</td>
        <td>${item.prov}</td>
        <td>${item.company}</td>
        <td><a href="mailto:${item.email}">${item.email}</a></td> `
        });

        // RssProducers table
        setupPagination({
            tableBodyId: 'table-body-RssProducers',
            paginationId: 'pagination-RssProducers',
            url: '/rss-producers',
            rowRenderer: (item, index, currentPage, perPage) => `
        <td>${(currentPage-1)*perPage + index + 1}</td>
        <td>${item.prov}</td>
        <td>${item.company}</td>
        <td>${item.rss_product}</td>
        <td><a href="mailto:${item.email}">${item.email}</a></td> `
        });

        // TsrProducers table
        setupPagination({
            tableBodyId: 'table-body-TsrProducers',
            paginationId: 'pagination-TsrProducers',
            url: '/tsr-producers',
            rowRenderer: (item, index, currentPage, perPage) => `
        <td>${(currentPage-1)*perPage + index + 1}</td>
        <td>${item.prov}</td>
        <td>${item.company}</td>
        <td>${item.tsr_product}</td>
        <td>${item.product_code}</td>
        <td><a href="mailto:${item.email}">${item.email}</a></td> `
        });

        // brownCrapeProducer table
        setupPagination({
            tableBodyId: 'table-body-traders',
            paginationId: 'pagination-traders',
            url: '/traders',
            rowRenderer: (item, index, currentPage, perPage) => `
        <td>${(currentPage-1)*perPage + index + 1}</td>
        <td>${item.prov}</td>
        <td>${item.company}</td>
        <td><a href="mailto:${item.email}">${item.email}</a></td> `
        });

        // traders table
        setupPagination({
            tableBodyId: 'table-body-brownCrapeProducer',
            paginationId: 'pagination-brownCrapeProducer',
            url: '/brownCrapeProducer',
            rowRenderer: (item, index, currentPage, perPage) => `
        <td>${(currentPage-1)*perPage + index + 1}</td>
        <td>${item.prov}</td>
        <td>${item.company}</td>
        <td><a href="mailto:${item.email}">${item.email}</a></td> `
        });
    </script>

    <script>
        const buttons = document.querySelectorAll('.tab-btn');
        const contents = document.querySelectorAll('.tab-content');

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                // reset
                buttons.forEach(b => b.classList.remove('active'));
                contents.forEach(c => c.classList.remove('active'));
                // aktifkan yang dipilih
                btn.classList.add('active');
                document.getElementById(btn.dataset.target).classList.add('active');
            });
        });
    </script>
@endpush
