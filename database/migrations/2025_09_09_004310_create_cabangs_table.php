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
        Schema::create('cabangs', function (Blueprint $table) {
            $table->id();
            $table->string('propinsi');
            $table->string('alamat')->nullable();
            $table->string('tlpn')->nullable();
            $table->string('email')->nullable();
            $table->string('img')->nullable();
            $table->string('ketua')->nullable();
            $table->string('sekertaris')->nullable();
            $table->timestamps();
        });

        DB::table('cabangs')->insert([
            ['propinsi' => 'Jawa', 'alamat' => 'Gedung Graha Pena, Suite No.109 Jl. Raya Kebayoran Lama No.12 Jakarta Selatan 12210 – Indonesia', 'tlpn' => '(62-21) 53699614, 0821 2596 7697', 'email' => 'gapkindo_jawa@yahoo.com', 'img' => '1757399085.jpg', 'ketua' => 'TIMMIE MELVIN', 'sekertaris' => 'I.G.M. MERTHA', 'created_at' => now(), 'updated_at' => now()],
            ['propinsi' => 'Kalimantan Selatan-Tengah-Timur', 'alamat' => 'Jl. Dr. HJ Djok Mentaya No.1B Kav. 2, Banjarmasin 70112, Kalimantan Selatan – Indonesia', 'tlpn' => '(62-511) 3354673, Fax (62-511) 3351116', 'email' => 'gapkindokst@yahoo.com', 'img' => '1757399006.png', 'ketua' => 'ANDREAS WINATA', 'sekertaris' => 'HASAN YUNIAR', 'created_at' => now(), 'updated_at' => now()],
            ['propinsi' => 'Kalimantan Barat', 'alamat' => 'Jl. Sulawesi No.33 Pontianak Selatan 78121 Kalimantan Barat – Indonesia', 'tlpn' => 'Telp: (62-561) 741054 Faks. (62-561) 741054', 'email' => 'gapkin_ptk@yahoo.co.id', 'img' => '1757397938.jpg', 'ketua' => 'ARIF', 'sekertaris' => 'NIKODEMUS, S.Sos', 'created_at' => now(), 'updated_at' => now()],
            ['propinsi' => 'Lampung', 'alamat' => 'Jl. Wan Abdurrahman, Batu Putuk, Kec. Teluk Betung Utara, Kota Bandar Lampung 35239', 'tlpn' => '0812 7355 6671 / 0895 2171 7084', 'email' => 'karetlampung@yahoo.com', 'img' => '1757398817.jpg', 'ketua' => 'TEDI NOVIANDI', 'sekertaris' => 'SUCI NATASIA PUTRI', 'created_at' => now(), 'updated_at' => now()],
            ['propinsi' => 'Sumatera Selatan', 'alamat' => 'Jl. Hang Tuah No.10, Palembang 30135, Palembang – Indonesia', 'tlpn' => '(62-711) 352095, (62-711) 352095', 'email' => 'gapkindo.palembang@gmail.com', 'img' => '1757398617.jpg', 'ketua' => 'ALEX KURNIAWAN EDY', 'sekertaris' => 'DR. IR. H.NURAHMADI, M.S', 'created_at' => now(), 'updated_at' => now()],
            ['propinsi' => 'Bengkulu', 'alamat' => 'Jl. Semeru No. 14, Kota Bengkulu, 38225 - indonesia', 'tlpn' => '(62-736) 345010', 'email' => 'rusbandibandot@yahoo.co.id', 'img' => '1757398747.png', 'ketua' => 'BUDIMAN SUTANTO', 'sekertaris' => 'RUSBANDI', 'created_at' => now(), 'updated_at' => now()],
            ['propinsi' => 'Jambi', 'alamat' => 'Jl. Bhayangkara No.40 Talang Banjar 36142 Jambi – Indonesia', 'tlpn' => '(62-741) 3061742', 'email' => 'gapkindo.jambi@gmail.com', 'img' => '1757398273.jpg', 'ketua' => 'GUSNAR SUNARDI', 'sekertaris' => 'ANDRI FAIZAL', 'created_at' => now(), 'updated_at' => now()],
            ['propinsi' => 'Sumatera Utara', 'alamat' => 'Komplek Taman Tomang Elok Blok I No.41/156, Jl. Jend. Gatot Subroto, Sei Sikambing, Medan 20122 – Indonesia', 'tlpn' => '(62-61) 8468819', 'email' => 'gapkindosu.office@gmail.com', 'img' => '1757398024.gif', 'ketua' => 'ISHAK LEONO', 'sekertaris' => 'DR. IR. EDY IRWANSYAH, M.SI', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabangs');
    }
};
