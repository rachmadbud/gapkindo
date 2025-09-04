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
        Schema::create('tpp', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tpp')->nullable();
            $table->string('perusahaan')->nullable();
            $table->string('cabang')->nullable();
            $table->timestamps();
        });

        DB::table('tpp')->insert(['kode_tpp' => 'SFU', 'perusahaan' => 'PT ANUGRAH SIBOLGA LESTARI', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SBZ', 'perusahaan' => 'PT BAKRIE SUMATERA PLANTATIONS Tbk.', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SAU', 'perusahaan' => 'PT BRIDGESTONE SUMATRA RUBBER ESTATE', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT BUMI INDAWA NIAGA', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SBX', 'perusahaan' => 'PT DARMASINDO INTIKARET', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SEY', 'perusahaan' => 'PT KAPUAS BESAR', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SFF', 'perusahaan' => 'PT KIRANA SAPTA', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SBT-', 'perusahaan' => 'PT PP LONDON SUMATRA INDONESIA TBK', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SCR', 'perusahaan' => 'PT MADJIN CRUMB RUBBER FACTORY', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SAD', 'perusahaan' => 'PT NUSIRA', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SBV', 'perusahaan' => 'PT PANTJA SURYA', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SBM', 'perusahaan' => 'PT PERKEBUNAN NUSANTARA IV', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGY', 'perusahaan' => 'PT POLYKENCANA RAYA', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT POTENSI BUMI SAKTI', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SHX', 'perusahaan' => 'PT PRIMA INDO RUBBER', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SCM', 'perusahaan' => 'PT RUBBER HOCK LIE – RANTAU PRAPAT', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SDH', 'perusahaan' => 'PT RUBBER HOCK LIE - SUNGGAL', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SBU', 'perusahaan' => 'PT SOCFIN INDONESIA (SOCFINDO)', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT SRI SUMATERA SEJAHTERA', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SAH', 'perusahaan' => 'PT VIRGINIA INDONESIA RUBBER COMPANY', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => '(VIRCO)', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SBI', 'perusahaan' => 'PT WIPOLIMEX RAYA', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SES', 'perusahaan' => 'PT PERKEBUNAN NUSANTARA IV', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'REGIONAL 3', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGF', 'perusahaan' => 'PT POLY BANGKINANG RAYA', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SAR', 'perusahaan' => 'PT PULAU BINTAN DJAYA', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SCE', 'perusahaan' => 'PT TIRTA SARI SURYA', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SFB', 'perusahaan' => 'PT ABAISIAT RAYA', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SAZ', 'perusahaan' => 'PT FAMILI RAYA', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SCA', 'perusahaan' => 'PT KILANG LIMA GUNUNG', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SCB', 'perusahaan' => 'PT TELUK LUAS', 'cabang' => 'NORTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SFY', 'perusahaan' => 'PT ANEKA BUMI PRATAMA', 'cabang' => 'JAMBI BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGJ', 'perusahaan' => 'PT ANUGRAH BUNGO LESTARI', 'cabang' => 'JAMBI BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SAK', 'perusahaan' => 'PT DJAMBI WARAS', 'cabang' => 'JAMBI BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SEU', 'perusahaan' => 'PT DJAMBI WARAS', 'cabang' => 'JAMBI BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGB', 'perusahaan' => 'PT HEVEA GE', 'cabang' => 'JAMBI BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SCL', 'perusahaan' => 'PT HOK TONG', 'cabang' => 'JAMBI BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SHB', 'perusahaan' => 'PT KARET BATIN DELAPAN', 'cabang' => 'JAMBI BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SBG', 'perusahaan' => 'PT REMCO RUBBER INDONESIA', 'cabang' => 'JAMBI BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGW', 'perusahaan' => 'PT STAR RUBBER', 'cabang' => 'JAMBI BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SEK', 'perusahaan' => 'PT BUKIT ANGKASA MAKMUR', 'cabang' => 'BENGKULU BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SFL', 'perusahaan' => 'PT PAMOR GANDA', 'cabang' => 'BENGKULU BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SED', 'perusahaan' => 'PT ANEKA BUMI PRATAMA', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGZ', 'perusahaan' => 'PT ASA RUBBER', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGX', 'perusahaan' => 'PT BINTANG AGUNG PERSADA', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SFX', 'perusahaan' => 'PT BINTANG GASING PERSADA', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGG', 'perusahaan' => 'PT BUMI BELITI ABADI', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGK', 'perusahaan' => 'PT FAJAR BERSERI', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SBF', 'perusahaan' => 'PT GADJAH RUKU', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SDR', 'perusahaan' => 'PT HEVEA MK I', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SEA', 'perusahaan' => 'PT HEVEA MK II', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SCX', 'perusahaan' => 'PT HOK TONG', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGO', 'perusahaan' => 'PT HOK TONG', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SFN', 'perusahaan' => 'PT KIRANA MUSI PERSADA', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGP', 'perusahaan' => 'PT KIRANA PERMATA', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SFW', 'perusahaan' => 'PT KIRANA WINDU', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SFA', 'perusahaan' => 'PT KARINI UTAMA', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SEE', 'perusahaan' => 'PT LINGGA DJAJA', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGD', 'perusahaan' => 'PT PP LONDON SUMATRA INDONESIA, Tbk', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SFQ', 'perusahaan' => 'PT MARDEC MUSI LESTARI', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SDO', 'perusahaan' => 'PT PANCASAMUDERA SIMPATI', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SFK', 'perusahaan' => 'PT PINAGO UTAMA Tbk', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SAQ', 'perusahaan' => 'PT PRASIDHA ANEKA NIAGA Tbk', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SEQ', 'perusahaan' => 'PT PRASIDHA ANEKA NIAGA Tbk Unit II', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SDQ', 'perusahaan' => 'PT REMCO RUBBER INDONESIA', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SFZ', 'perusahaan' => 'PT SRITRANG LINGGA INDONESIA', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SCY', 'perusahaan' => 'PT SUNAN RUBBER', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SHA', 'perusahaan' => 'PT WARNA AGUNG SELATAN', 'cabang' => 'SOUTH SUMATRA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT HUMA INDAH MEKAR', 'cabang' => 'LAMPUNG BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGM', 'perusahaan' => 'PT INDOLATEX JAYA ABADI', 'cabang' => 'LAMPUNG BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGH', 'perusahaan' => 'PT KOMERING JAYA PERDANA', 'cabang' => 'LAMPUNG BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGI', 'perusahaan' => 'PT MARDEC SIGER WAY KANAN', 'cabang' => 'LAMPUNG BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGV', 'perusahaan' => 'PT MENGGALA BERSERI', 'cabang' => 'LAMPUNG BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT PERKEBUNAN NUSANTARA I REGIOLNAL 7', 'cabang' => 'LAMPUNG BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGN', 'perusahaan' => 'PT RUBBER JAYA LAMPUNG', 'cabang' => 'LAMPUNG BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'SGS', 'perusahaan' => 'PT SILVA INHUTANI LAMPUNG', 'cabang' => 'LAMPUNG BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT WAYKANDIS', 'cabang' => 'LAMPUNG BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KCA', 'perusahaan' => 'PT BINTANG BORNEO PERSADA', 'cabang' => 'WEST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KBM', 'perusahaan' => 'PT GMG SENTOSA', 'cabang' => 'WEST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KAZ', 'perusahaan' => 'PT HOK TONG', 'cabang' => 'WEST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KBO', 'perusahaan' => 'PT KOTA NIAGA RAYA', 'cabang' => 'WEST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KBT', 'perusahaan' => 'PT STAR RUBBER', 'cabang' => 'WEST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KBD', 'perusahaan' => 'PT SUMBER ALAM', 'cabang' => 'WEST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KAB', 'perusahaan' => 'PT SUMBER DJANTIN', 'cabang' => 'WEST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KBE', 'perusahaan' => 'PT SUMBER DJANTIN unit SAMBAS', 'cabang' => 'WEST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KBP', 'perusahaan' => 'PT SUMBER DJANTIN unit SANGGAU', 'cabang' => 'WEST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KBS', 'perusahaan' => 'PT BORNEO MAKMUR LESTARI', 'cabang' => 'SOUTH-CENTRAL-EAST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT BRIDGESTONE KALIMANTAN PLANTATION', 'cabang' => 'SOUTH-CENTRAL-EAST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KBK', 'perusahaan' => 'PT BUMI ASRI PASAMAN', 'cabang' => 'SOUTH-CENTRAL-EAST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT BUMI BORNEO ABADI', 'cabang' => 'SOUTH-CENTRAL-EAST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KBQ', 'perusahaan' => 'PT BUMI JAYA', 'cabang' => 'SOUTH-CENTRAL-EAST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KBG', 'perusahaan' => 'PT DARMA KALIMANTAN JAYA', 'cabang' => 'SOUTH-CENTRAL-EAST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KAV', 'perusahaan' => 'PT INSAN BONAFIDE', 'cabang' => 'SOUTH-CENTRAL-EAST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KCB', 'perusahaan' => 'PT JHONLIN AGRO MANDIRI', 'cabang' => 'SOUTH-CENTRAL-EAST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KCC', 'perusahaan' => 'PT KAHAYAN BERSERI', 'cabang' => 'SOUTH-CENTRAL-EAST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KAY', 'perusahaan' => 'PT KARIAS TABING KENCANA', 'cabang' => 'SOUTH-CENTRAL-EAST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KBB', 'perusahaan' => 'PT KARYA SEJATI', 'cabang' => 'SOUTH-CENTRAL-EAST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KBX', 'perusahaan' => 'PT KINTAP JAYA WATTINDO', 'cabang' => 'SOUTH-CENTRAL-EAST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KCD', 'perusahaan' => 'PT MULTI KUSUMA CEMERLANG', 'cabang' => 'SOUTH-CENTRAL-EAST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KBY', 'perusahaan' => 'PT NUSANTARA BATULICIN', 'cabang' => 'SOUTH-CENTRAL-EAST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KBF', 'perusahaan' => 'PT SAMPIT INTERNATIONAL', 'cabang' => 'SOUTH-CENTRAL-EAST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'KAU', 'perusahaan' => 'PT WILSON LAUTAN KARET', 'cabang' => 'SOUTH-CENTRAL-EAST KALIMANTAN BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT AGRO LINO SEJAHTERA', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT PP BAJABANG INDONESIA', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'DAN', 'perusahaan' => 'PT BITUNG GUNASEJAHTERA', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'DAO', 'perusahaan' => 'PT INDO JAVA RUBBER PLANTING', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'DAU', 'perusahaan' => 'CV JADI JAYA MAKMUR', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT JAYA ASRI NIAGA', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'DAR', 'perusahaan' => 'PT KALIDUREN ESTATES', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT MERIDIAN JATI INDONESIA', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT NASIONAL BHIRAWA TAMA', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'DAY', 'perusahaan' => 'PT NUSA ALAM RUBBER', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'DAJ', 'perusahaan' => 'PT PERKEBUNAN NUSANTARA I', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT PERKEBUNAN NUSANTARA I', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT PERKEBUNAN NUSANTARA I', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'DAQ', 'perusahaan' => 'PT RABERINDO PRATAMA', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'DAW', 'perusahaan' => 'CV SEMESTA JAYA LESTARIE', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => 'DAX', 'perusahaan' => 'CV SINAR JAYA', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT TRIKARYA SEMESTA', 'cabang' => 'JAVA BRANCH']);
        DB::table('tpp')->insert(['kode_tpp' => '', 'perusahaan' => 'PT WILSON TUNGGAL PERKASA', 'cabang' => 'JAVA BRANCH']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tpp');
    }
};
