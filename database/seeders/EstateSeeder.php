<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert initial data
        DB::table('estate')->insert([
            [
                'prov' => 'North Sumatra',
                'company' => 'BAKRIE SUMATERA PLANTATIONS Tbk, PT',
                'email' => 'windy@bakriesumatera.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'North Sumatra',
                'company' => 'BRIDGESTONE SUMATRA RUBBER ESTATE, PT',
                'email' => 'shuhei-yamagata@bridgestone@com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'North Sumatra',
                'company' => 'LONDON SUMATRA INDONESIA, PP PT',
                'email' => 'http://www.londonsumatra.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'North Sumatra',
                'company' => 'PERKEBUNAN NUSANTARA IV REGIONAL 1, PT',
                'email' => 'pengolahan@ptpn3.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'North Sumatra',
                'company' => 'PERKEBUNAN NUSANTARA IV REGIONAL 3, PT',
                'email' => 'pemasaran.ptpn5@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Bengkulu',
                'company' => 'PAMOR GANDA, PT',
                'email' => 'pamorganda_bengkulu@yahoo.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South Sumatra',
                'company' => 'LONDON SUMATRA INDONESIA, Tbk, PT',
                'email' => '(62-711) 351035',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South Sumatra',
                'company' => 'PINAGO UTAMA Tbk, PT',
                'email' => 'hasan.tantri@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Lampung',
                'company' => 'HUMA INDAH MEKAR, PT',
                'email' => 'itsupport.him@bakriesumatera.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Lampung',
                'company' => 'PERKEBUNAN NUSANTARA I  REGIONAL 7, PT',
                'email' => 'sekretariat@ptpn7.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Lampung',
                'company' => 'SILVA INHUTANI LAMPUNG, PT',
                'email' => 'silva.jakarta@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South-Central-East Kalimantan',
                'company' => 'BRIDGESTONE KALIMANTAN PLANTATIONS, PT',
                'email' => 't.sakoda@bskp.co.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South-Central-East Kalimantan',
                'company' => 'JOHNLIN AGRO MANDIRI, PT',
                'email' => 'khairnas0399"gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South-Central-East Kalimantan',
                'company' => 'MULTI KUSUMA CEMERLANG, PT',
                'email' => '(62-21) 29353610',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'BAJABANG INDONESIA, PT PP',
                'email' => 'dadangkurnia@bajabang.co.id, rozakyes@gmail.com, sulaiman@bajabang.co.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'INDO JAVA RUBBER PLANTING Co, PT',
                'email' => 'marketing@jawattie.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'KALIDUREN ESTATES, PT',
                'email' => 'marketing@jawattie.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'PERKEBUNAN NUSANTARA I  REGIONAL 2, PT',
                'email' => 'pemasarannt8@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'PERKEBUNAN NUSANTARA I  REGIONAL 3, PT',
                'email' => 'skrh_reg3@ptpn1.co.id, pemasaran@ptpn09.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'PERKEBUNAN NUSANTARA I  REGIONAL 5, PT',
                'email' => 'skrh_reg@ptpn1.co.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
