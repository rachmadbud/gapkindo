<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image');
            $table->string('source')->nullable();
            $table->timestamps();
        });

        DB::table('news')->insert([
            [
                'id' => 17,
                'title' => 'Permintaan karet alam mulai melambat pemulihannya, dan realisasi ekspor bulan Januari naik 11,7% namun masih dibayangi oleh penyakit gugur daun Pestalotiopsis.',
                'content' => "Realisasi ekspor karet alam asal Sumatera Utara untuk pengiriman Januari 2023 naik signifikan sebesar 11,7% menjadi 29.585 ton dibandingkan Desember 2022.\r\n\r\nHanya saja, peningkatan tersebut, menurut Sekretaris Eksekutif Gabungan Pengusaha Karet Indonesia (GAPKINDO) Cabang Sumut, Edy Irwansyah, realisasinya belum mampu mencapai rata-rata ekspor normal per bulan sekitar 38.000-40.000 ton.\r\n\r\nSecara tahunan (year-on-year/YoY), pada periode Februari 2022-Januari 2023, terjadi peningkatan sebesar 8,96% menjadi 347.124 ton dibandingkan periode Februari 2021-Januari 2022. Edy mengatakan peningkatan ekspor pada Januari 2023 didorong oleh membaiknya permintaan dari negara-negara konsumen utama untuk meningkatkan stok.\r\n\r\nMenurut Edy, telah terjadi perubahan posisi tujuan ekspor karet Sumatera Utara. Biasanya, Jepang selalu berada di peringkat pertama, tetapi Amerika Serikat (AS) justru menempati peringkat pertama pada pengiriman bulan Januari. Perubahan posisi ini disebabkan oleh peningkatan permintaan dari AS. Januari lalu, terdapat 28 negara tujuan ekspor, dengan lima negara tujuan utama ekspor karet Sumatera Utara. Kelima negara tersebut adalah AS (31,6%), Jepang (25,2%), Tiongkok (9,5%), Brasil (4,9%), dan Turki (4,4%).\r\n\r\nUntuk pengiriman pada Februari 2023, Edy berharap kondisinya akan membaik seiring dengan membaiknya harga dan permintaan. Namun, peningkatan permintaan diperkirakan tidak akan terlalu signifikan karena produksi dari perkebunan karet di Sumatera Utara sebagian masih dalam fase gugur daun, sehingga produksinya rendah.\r\nHarga TSR20 di bursa berjangka Singapura (SGX) pada 20 Januari adalah 139,3 sen AS/kg, naik 0,3 sen AS dibandingkan harga rata-rata bulan Januari.",
                'image' => '1756341008.jpg',
                'source' => 'SuaraTani.com',
                'created_at' => '2025-08-27 17:30:08',
                'updated_at' => null,
            ],
            [
                'id' => 19,
                'title' => 'Kinerja Industri Karet Beralih dari Status Kontraksi ke Ekspansi',
                'content' => "Industri karet, barang plastik, dan furnitur mengalami peningkatan dan beralih dari kontraksi menjadi ekspansi pada April 2023. Industri karet dan barang plastik meningkatkan pesanan baru, tidak seperti bulan lalu ketika distributor mengurangi pesanan untuk menghabiskan stok yang tersedia.\r\n\r\nJuru bicara Kementerian Perindustrian (Kemenperin), Febri Hendri Antoni Arif, mengatakan dalam rilis IKI April 2023 di Jakarta, Jumat (28/4), kondisi yang hampir sama dialami oleh industri furnitur, yang menunjukkan peningkatan pesanan dan produksi serta berkurangnya stok produk. Dampak persiapan Hari Raya (Idul Fitri), pesanan dari luar negeri meningkat.\r\n\r\nFebri menjelaskan bahwa Indeks Keyakinan Industri (IKI) April 2023 mengalami perlambatan dibandingkan bulan sebelumnya. Namun, pada bulan April, terdapat peningkatan pada industri yang melakukan kegiatan ekspansi. IKI pada April 2023 mencapai 51,38 atau melambat 0,49 poin dibandingkan Maret 2023.\r\n\r\nMeskipun mengalami perlambatan, pada bulan April 2023 terdapat peningkatan jumlah subsektor industri yang mengalami ekspansi yaitu sebanyak 15 subsektor industri, dibandingkan dengan bulan Maret 2023 dimana hanya 14 subsektor industri dengan kontribusi terhadap PDB Industri Pengolahan Nonmigas tahun 2022 mencapai 80,2%. ...",
                'image' => '1756341613.jpg',
                'source' => 'Gemabisnis.com',
                'created_at' => '2025-08-27 17:40:13',
                'updated_at' => null,
            ],
            [
                'id' => 20,
                'title' => 'Sekumpulan Regulasi untuk Menghambat Sawit-Karet, Indonesia-Malaysia Sepakat Agenda Misi Bersama ke Uni Eropa',
                'content' => "Indonesia dan Malaysia sepakat untuk mengunjungi Uni Eropa (UE) dalam misi gabungan ke Brussels, Belgia, pada 30-31 Mei 2023. ...",
                'image' => '1756341686.jpg',
                'source' => 'cnbcindonesia.com',
                'created_at' => '2025-08-27 17:41:26',
                'updated_at' => null,
            ],
            [
                'id' => 21,
                'title' => 'Pemerintah Indonesia Berkomitmen Terus Stabilkan Harga Karet dan Inisiatif Bursa Karet Regional',
                'content' => "Indonesia, Thailand, dan Malaysia, yang tergabung dalam Dewan Tripartit Karet Internasional atau ITRC, berkomitmen untuk menjaga harga karet alam internasional. ...",
                'image' => '1756341755.jpg',
                'source' => 'Kompas',
                'created_at' => '2025-08-27 17:42:35',
                'updated_at' => null,
            ],
            [
                'id' => 22,
                'title' => 'Produksi Karet Alam Indonesia Turun, Industri Karet Terpaksa Impor',
                'content' => "Sektor Industri Karet Alam mengalami penurunan pasokan produksi karet alam dalam negeri sejak tahun 2017. ...",
                'image' => '1756341819.jpg',
                'source' => 'Okezone.com',
                'created_at' => '2025-08-27 17:43:39',
                'updated_at' => null,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
