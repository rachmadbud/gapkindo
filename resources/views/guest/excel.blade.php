<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilkan Excel Otomatis</title>

    <!-- SheetJS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 25px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background: #2f3640;
            color: white;
        }

        tr:nth-child(even) {
            background: #f1f2f6;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>📊 Tabel Excel Otomatis</h2>
        <div id="output">Memuat data...</div>
    </div>

    <script>
        // Nama file Excel yang akan dibaca
        const filePath = "public/guest/assets/sp-aff.xls"; // ubah sesuai lokasi file kamu

        fetch(filePath)
            .then(response => {
                if (!response.ok) throw new Error("Gagal memuat file Excel");
                return response.arrayBuffer();
            })
            .then(data => {
                const workbook = XLSX.read(data, {
                    type: "array"
                });
                const firstSheet = workbook.Sheets[workbook.SheetNames[0]];
                const html = XLSX.utils.sheet_to_html(firstSheet);
                document.getElementById("output").innerHTML = html;
            })
            .catch(err => {
                document.getElementById("output").innerHTML = `<p style="color:red;">Error: ${err.message}</p>`;
            });
    </script>
</body>

</html>
