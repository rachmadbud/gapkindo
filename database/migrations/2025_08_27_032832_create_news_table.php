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
                'content' => "Industri karet, barang plastik, dan furnitur mengalami peningkatan dan beralih dari kontraksi menjadi ekspansi pada April 2023. Industri karet dan barang plastik meningkatkan pesanan baru, tidak seperti bulan lalu ketika distributor mengurangi pesanan untuk menghabiskan stok yang tersedia.\r\n\r\n

                Juru bicara Kementerian Perindustrian (Kemenperin), Febri Hendri Antoni Arif, mengatakan dalam rilis IKI April 2023 di Jakarta, Jumat (28/4), kondisi yang hampir sama dialami oleh industri furnitur, yang menunjukkan peningkatan pesanan dan produksi serta berkurangnya stok produk. Dampak persiapan Hari Raya (Idul Fitri), pesanan dari luar negeri meningkat.\r\n\r\n

                Febri menjelaskan bahwa Indeks Keyakinan Industri (IKI) April 2023 mengalami perlambatan dibandingkan bulan sebelumnya. Namun, pada bulan April, terdapat peningkatan pada industri yang melakukan kegiatan ekspansi. IKI pada April 2023 mencapai 51,38 atau melambat 0,49 poin dibandingkan Maret 2023.\r\n\r\n

                Meskipun mengalami perlambatan, pada bulan April 2023 terdapat peningkatan jumlah subsektor industri yang mengalami ekspansi yaitu sebanyak 15 subsektor industri, dibandingkan dengan bulan Maret 2023 dimana hanya 14 subsektor industri dengan kontribusi terhadap PDB Industri Pengolahan Nonmigas tahun 2022 mencapai 80,2%.\r\n\r\n

                Subsektor yang menopang kontribusi tersebut dengan kontribusi yang cukup besar, seperti Industri Makanan, Industri Bahan Kimia dan Barang dari Bahan Kimia, serta Industri Kendaraan Bermotor, Trailer, dan Semi Trailer. Dilihat dari variabel pembentuknya, seluruh indeks variabel pembentuk IKI pada bulan April 2023 akan mengalami ekspansi. Namun jika ditelusuri lebih lanjut, penurunan nilai IKI disebabkan oleh penurunan nilai variabel Persediaan Produk sebesar 2,67 poin menjadi 52,33 yang mengindikasikan adanya peningkatan stok persediaan, dan variabel Pesanan Baru mengalami penurunan sebesar 0,76 poin menjadi 50,57 yang mengindikasikan adanya penurunan pesanan baru. Di sisi lain, nilai variabel Produksi mengalami peningkatan dari 50,69 pada bulan Maret 2023 menjadi 52,08 pada bulan April 2023. Pesanan Domestik masih menjadi faktor dominan yang mempengaruhi indeks variabel Pesanan Baru.\r\n\r\n

                Febri menjelaskan penurunan IKI disebabkan oleh beberapa subsektor dengan pangsa PDB yang besar mengalami kontraksi setelah sebelumnya mengalami ekspansi. Kedua, sebagai variabel pembentuk nilai IKI yang paling signifikan, variabel pesanan mengalami penurunan pada bulan April ini. Hal ini disebabkan oleh tingginya permintaan rumah tangga selama Ramadan dan Hari Raya yang menyebabkan harga produk manufaktur meningkat. Di sisi lain, belanja produksi dan belanja pemerintah menurun secara signifikan.
                Selain faktor harga yang tinggi, terbatasnya jam kerja selama Ramadan dan hari libur menjadi penyebab penurunan pesanan. Pesanan domestik diperkirakan akan meningkat bulan depan seiring industri mulai berproduksi normal. Ini merupakan pola musiman yang tidak perlu Anda khawatirkan.\r\n\r\n

                Febri menambahkan bahwa sebagian besar pelaku usaha menyatakan kondisi usaha secara umum pada April 2023 stabil, yaitu sebesar 45,2%, dan 28,7% menjawab bahwa kegiatan usaha mereka membaik dibandingkan Maret 2023.\r\n\r\n

                Demikian pula, terkait prospek kondisi usaha enam bulan ke depan, 64,7% pelaku usaha lebih optimis. Angka ini meningkat dibandingkan bulan sebelumnya, yaitu sebesar 63,5%, dan merupakan angka tertinggi sejak IKI diluncurkan.\r\n\r\n

                Mayoritas responden yang menjawab optimis menyatakan keyakinan mereka bahwa kondisi pasar akan membaik dan keyakinan mereka didorong oleh kebijakan pemerintah pusat yang lebih baik. Meskipun 9,9% pelaku usaha masih pesimis terhadap kondisi bisnis untuk enam bulan ke depan, angka ini juga merupakan nilai terendah sejak IKI diluncurkan.",
                'image' => '1756341613.jpg',
                'source' => 'Gemabisnis.com',
                'created_at' => '2025-08-27 17:40:13',
                'updated_at' => null,
            ],
            [
                'id' => 20,
                'title' => 'Sekumpulan Regulasi untuk Menghambat Sawit-Karet, Indonesia-Malaysia Sepakat Agenda Misi Bersama ke Uni Eropa',
                'content' => "Indonesia dan Malaysia sepakat untuk mengunjungi Uni Eropa (UE) dalam misi gabungan ke Brussels, Belgia, pada 30-31 Mei 2023. Misi ini akan membahas beberapa isu terkait regulasi UE yang dapat mengancam keberlanjutan beberapa komoditas Indonesia dan Malaysia (dari kelapa sawit hingga karet).

                Mulai dari regulasi anti-deforestasi, yang juga akan mengancam ekspor kopi, kakao, sapi, kayu, karet, dan kedelai, serta cokelat dan konsumsi hilir produk turunan minyak sawit. Hingga rencana regulasi yang mencegah praktik greenwashing atau klaim pemenuhan industri hijau, hingga isu kerja paksa.

                Kepala Bidang Luar Negeri Gabungan Pengusaha Kelapa Sawit Indonesia (GAPKI) Fadhil Hasan, Jumat (26/5/2023), mengatakan misi gabungan pemerintah Indonesia dan Malaysia menyampaikan sikap kedua negara melalui Dewan Negara-Negara Produsen Minyak Sawit (CPOPC) terkait EUDR (Peraturan/Undang-Undang Deforestasi Uni Eropa).

                Sebagaimana diketahui, Indonesia merupakan produsen minyak sawit terbesar di dunia, diikuti oleh Malaysia di posisi kedua. Menurut Fadhil, beberapa isu akan disampaikan melalui CPOPC terkait sikap Indonesia dan Malaysia terkait EUDR. Melalui CPOPC, kedua negara meminta agar beberapa isu terkait pengkategorian negara berisiko tinggi, berisiko rendah, dan netral tidak diterapkan secara sepihak, serta agar Indonesia dan Malaysia dimasukkan ke dalam kategori berisiko rendah.

                Selain itu, ujarnya, CPOPC meminta Uni Eropa untuk mengakui sistem sertifikasi dan ketertelusuran keberlanjutan Indonesia dan Malaysia. Selain itu, kedua negara juga meminta agar petani kecil dikecualikan dan Uni Eropa akan mengakui Minyak Sawit Berkelanjutan Indonesia (ISPO), Minyak Sawit Berkelanjutan Malaysia (MSPO), serta sistem sertifikasi dan ketertelusuran keberlanjutan nasional untuk komoditas lainnya.

                Fadhil mengatakan bahwa Uni Eropa juga berencana untuk mengeluarkan peraturan kerja paksa. Langkah-langkah Uni Eropa tersebut dapat dikategorikan sebagai pembatasan atau hambatan perdagangan.

                Agenda Misi Bersama

                Menteri Koordinator Bidang Perekonomian Airlangga Hartarto akan memimpin delegasi Indonesia. Sementara itu, delegasi Malaysia akan dipimpin oleh Wakil Perdana Menteri/Menteri Perkebunan dan Komoditas Malaysia, Dato' Sri Haji Fadillah Bin Haji Yusof.

                CPOPC, dalam pernyataan tertulis yang dimuat di situs resminya, Jumat (26/5/2023), menyatakan bahwa mengingat perkembangan terkini Peraturan Deforestasi Uni Eropa (EUDR), yang akan berdampak negatif pada industri minyak sawit dan mengecualikan petani kecil dari rantai pasokan, CPOPC menyelenggarakan Misi Bersama negara-negara produsen ke Brussel, 30-31 Mei 2023.

                Selain bertemu dengan pejabat Komisi dan Legislator Parlemen Eropa, misi gabungan ini juga akan bertemu dengan para pelaku kunci di industri minyak sawit Uni Eropa dan organisasi masyarakat sipil. Menurut pernyataan CPOPC, pertemuan ini juga akan membahas rencana Uni Eropa terkait topik tersebut untuk mengembangkan rancangan undang-undang lain yang memerlukan perhatian para pemangku kepentingan di industri minyak sawit, seperti Peraturan Kerja Paksa (kerja paksa) dan Arahan Klaim Hijau (klaim hijau). , dan Arahan Energi Terbarukan (RED/arahan energi terbarukan) III.",
                'image' => '1756341686.jpg',
                'source' => 'cnbcindonesia.com',
                'created_at' => '2025-08-27 17:41:26',
                'updated_at' => null,
            ],
            [
                'id' => 21,
                'title' => 'Pemerintah Indonesia Berkomitmen Terus Stabilkan Harga Karet dan Inisiatif Bursa Karet Regional',
                'content' => "Sektor Industri Karet Alam mengalami penurunan pasokan produksi karet alam dalam negeri sejak tahun 2017. Akibatnya, total ekspor produk karet alam mengalami penurunan.

                Direktur Eksekutif Gabungan Perusahaan Karet Indonesia (GAPKINDO), Erwin Tunas, mengatakan penurunan ekspor rata-rata tahunan mencapai 10%. Penurunan ini diprediksi akan berlanjut tahun ini.

                Ekspor karet memang telah menurun, sehingga rata-rata hampir mencapai 10% setiap tahun sejak 2017. Untuk pertama kalinya pada tahun 2017, Indonesia mengekspor sekitar 3,3 juta ton; pada tahun 2022, angkanya akan turun menjadi sekitar 2,1 juta ton, yang diprediksi akan sulit dipertahankan dan bahkan menurun.  Mungkin penurunannya bisa 10 % lagi atau sekitar 1,
                8 juta ton,
                ujar Erwin saat ditemui MNC Portal di Hotel Borobudur, Jakarta Pusat, Rabu (21/6/2023).

                Lebih lanjut dikatakannya, karena Indonesia tidak mampu memenuhi perjanjian kontrak ekspor dengan kondisi pasokan dalam negeri saat ini, maka mau tidak mau harus mengimpor karet dari negara lain agar kebutuhan industri dalam negeri tetap terpenuhi dan perjanjian kontrak dapat dilanjutkan.

                Jumlah karet yang diimpor setiap tahun mencapai 100 ribu ton. Erwin menjelaskan bahwa posisi kontrak tidak sesuai karena sistem kontraknya jangka panjang, sehingga perusahaan selalu membuat kontrak jangka panjang, yang berarti kami sudah terikat dengan pembeli; misalnya, kami harus memenuhi kontrak ekspor pada bulan Juli, Agustus, dan September yang telah disepakati.

                Menurutnya, penandatanganan kontrak harus dilakukan pada bulan April agar bisa sampai Desember. Ketika kami melihat ternyata di bulan Oktober, apa yang kami pikir bisa kami penuhi ternyata tidak ada, kami otomatis mencari kontrak atau impor lain.

                Erwin menambahkan bahwa negara-negara pemasok karet untuk Indonesia beragam, tetapi sebagian besar berasal dari Afrika. Meskipun demikian, ia menilai ketergantungan Indonesia terhadap Afrika hanya dapat diharapkan untuk waktu yang singkat karena banyak industri dari Tiongkok telah berinvestasi di Afrika, sehingga produksi karet di Afrika secara tidak langsung akan dipasok ke Tiongkok. Namun, di masa mendatang, hal ini tidak dapat diharapkan untuk pasokan jangka panjang karena banyak industri di Tiongkok juga berinvestasi langsung di sana (Afrika) untuk mengolahnya menjadi produk industri untuk tujuan ekspor, pungkasnya.",
                'image' => '1756341755.jpg',
                'source' => 'Kompas',
                'created_at' => '2025-08-27 17:42:35',
                'updated_at' => null,
            ],
            [
                'id' => 22,
                'title' => 'Produksi Karet Alam Indonesia Turun, Industri Karet Terpaksa Impor',
                'content' => "Sektor Industri Karet Alam mengalami penurunan pasokan produksi karet alam dalam negeri sejak tahun 2017. Akibatnya, total ekspor produk karet alam mengalami penurunan.

                Direktur Eksekutif Gabungan Perusahaan Karet Indonesia (GAPKINDO), Erwin Tunas, mengatakan penurunan ekspor rata-rata tahunan mencapai 10%. Penurunan ini diprediksi akan berlanjut tahun ini.

                Ekspor karet memang telah menurun, sehingga rata-rata hampir mencapai 10% setiap tahun sejak 2017. Untuk pertama kalinya pada tahun 2017, Indonesia mengekspor sekitar 3,3 juta ton; pada tahun 2022, angkanya akan turun menjadi sekitar 2,1 juta ton, yang diprediksi akan sulit dipertahankan dan bahkan menurun.  Mungkin penurunannya bisa 10 % lagi atau sekitar 1 8 juta ton,ujar Erwin saat ditemui MNC Portal di Hotel Borobudur, Jakarta Pusat, Rabu (21/6/2023).

                Lebih lanjut dikatakannya, karena Indonesia tidak mampu memenuhi perjanjian kontrak ekspor dengan kondisi pasokan dalam negeri saat ini, maka mau tidak mau harus mengimpor karet dari negara lain agar kebutuhan industri dalam negeri tetap terpenuhi dan perjanjian kontrak dapat dilanjutkan.

                Jumlah karet yang diimpor setiap tahun mencapai 100 ribu ton. Erwin menjelaskan bahwa posisi kontrak tidak sesuai karena sistem kontraknya jangka panjang, sehingga perusahaan selalu membuat kontrak jangka panjang, yang berarti kami sudah terikat dengan pembeli; misalnya, kami harus memenuhi kontrak ekspor pada bulan Juli, Agustus, dan September yang telah disepakati.

                Menurutnya, penandatanganan kontrak harus dilakukan pada bulan April agar bisa sampai Desember. Ketika kami melihat ternyata di bulan Oktober, apa yang kami pikir bisa kami penuhi ternyata tidak ada, kami otomatis mencari kontrak atau impor lain.

                Erwin menambahkan bahwa negara-negara pemasok karet untuk Indonesia beragam, tetapi sebagian besar berasal dari Afrika. Meskipun demikian, ia menilai ketergantungan Indonesia terhadap Afrika hanya dapat diharapkan untuk waktu yang singkat karena banyak industri dari Tiongkok telah berinvestasi di Afrika, sehingga produksi karet di Afrika secara tidak langsung akan dipasok ke Tiongkok. Namun, di masa mendatang, hal ini tidak dapat diharapkan untuk pasokan jangka panjang karena banyak industri di Tiongkok juga berinvestasi langsung di sana (Afrika) untuk mengolahnya menjadi produk industri untuk tujuan ekspor, pungkasnya.",
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
