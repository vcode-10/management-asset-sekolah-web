<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipeAset;
use App\Models\Aset;
use App\Models\Permintaan;
use App\Models\ItemPinjam;
use App\Models\Pemeliharaan;
use App\Models\Kondisi;
use App\Models\Disposisi;
use App\Models\Peminjam;
use App\Models\Lokasi;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tambahkan beberapa data tipe aset
        $tipe1 = TipeAset::create([
            'nama' => 'Komputer',
            'keterangan' => 'Tipe aset komputer'
        ]);

        $tipe2 = TipeAset::create([
            'nama' => 'Proyektor',
            'keterangan' => 'Tipe aset proyektor'
        ]);

        // Tambahkan beberapa data lokasi
        $lokasi1 = Lokasi::create([
            'nama' => 'Ruangan 101',
            'keterangan' => 'Lokasi ruangan 101'
        ]);

        $lokasi2 = Lokasi::create([
            'nama' => 'Ruangan 102',
            'keterangan' => 'Lokasi ruangan 102'
        ]);

        // Tambahkan beberapa data kondisi
        $kondisi1 = Kondisi::create([
            'nama' => 'Baik',
            'keterangan' => 'Kondisi aset baik'
        ]);

        $kondisi2 = Kondisi::create([
            'nama' => 'Rusak',
            'keterangan' => 'Kondisi aset rusak'
        ]);

        // Tambahkan beberapa data aset
        $aset1 = Aset::create([
            'nama' => 'Komputer 1',
            'tipe_aset_id' => $tipe1->id,
            'lokasi_id' => $lokasi1->id,
            'kondisi_id' => $kondisi1->id,
            'keterangan' => 'Komputer untuk keperluan perkuliahan',
            'status' => 'Tersedia'
        ]);

        $aset2 = Aset::create([
            'nama' => 'Proyektor 1',
            'tipe_aset_id' => $tipe2->id,
            'lokasi_id' => $lokasi2->id,
            'kondisi_id' => $kondisi1->id,
            'keterangan' => 'Proyektor untuk presentasi',
            'status' => 'Tersedia'
        ]);

        // Tambahkan beberapa data permintaan
        $permintaan1 = Permintaan::create([
            'tipe_aset_id' => $tipe1->id,
            'diminta_oleh' => 'John Doe',
            'tanggal_diminta' => '2022-03-20',
            'keterangan' => 'Permintaan komputer untuk tugas akhir',
            'jumlah' => 1,
            'status' => 'Pending'
        ]);

        Pemeliharaan::create([
            'aset_id' => 1,
            'tanggal_minta' => '2022-01-01',
            'tanggal_selesai' => '2022-01-05',
            'biaya' => 500000,
            'keterangan' => 'Pemeliharaan rutin',
        ]);

        Pemeliharaan::create([
            'aset_id' => 2,
            'tanggal_minta' => '2022-02-01',
            'tanggal_selesai' => '2022-02-05',
            'biaya' => 750000,
            'keterangan' => 'Pemeliharaan besar',
        ]);

        Disposisi::create([
            'aset_id' => 1,
            'tanggal_disposisi' => '2022-01-01',
            'disposisi_oleh' => 'John Doe',
            'alasan_disposisi' => 'Tidak terpakai lagi',
            'biaya' => 2500000,
        ]);

        Disposisi::create([
            'aset_id' => 2,
            'tanggal_disposisi' => '2022-02-01',
            'disposisi_oleh' => 'Jane Doe',
            'alasan_disposisi' => 'Aset sudah tua',
            'biaya' => 500000,
        ]);

        Peminjam::create([
            'nama' => 'John Doe',
            'alamat' => 'Jl. Sudirman No. 123',
            'telepon' => '081234567890',
        ]);

        Peminjam::create([
            'nama' => 'Jane Doe',
            'alamat' => 'Jl. Gatot Subroto No. 456',
            'telepon' => '082345678901',
        ]);

        ItemPinjam::create([
            'aset_id' => 1,
            'peminjam_id' => 1,
            'tanggal_pinjam' => '2022-01-01',
            'tanggal_jatuh_tempo' => '2022-01-08',
        ]);

        ItemPinjam::create([
            'aset_id' => 2,
            'peminjam_id' => 2,
            'tanggal_pinjam' => '2022-02-01',
            'tanggal_jatuh_tempo' => '2022-02-08',
        ]);
    }
}
