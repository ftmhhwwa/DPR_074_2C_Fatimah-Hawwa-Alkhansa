<?php namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\PenggajianModel;
use App\Models\AnggotaModel;
use App\Models\KomponenGajiModel;

class Penggajian extends BaseController
{
    protected $penggajianModel;
    protected $anggotaModel;
    protected $komponenGajiModel;

    public function __construct()
    {
        // Inisialisasi Model Penggajian
        $this->penggajianModel = new PenggajianModel();
        // Inisialisasi Model Anggota
        $this->anggotaModel = new AnggotaModel();
        // Inisialisasi Model Komponen Gaji
        $this->komponenGajiModel = new KomponenGajiModel();
    }

    public function index()
    {
        $model = new PenggajianModel();
        // Mengambil semua data penggajian dari database
        $dataPenggajian = $model->getGajiSummary();

        return $this->response->setJSON($dataPenggajian);
    }

    public function hitungTakeHomePay($idAnggota)
    {
        // Validasi input
        if (empty($idAnggota)) {
            return false; // Atau lempar exception sesuai kebutuhan
        }

        // Ambil data anggota
        $anggota = $this->anggotaModel->find($idAnggota);
        if (!$anggota) {
            return false; // Anggota tidak ditemukan
        }

        // Ambil komponen gaji yang relevan berdasarkan jabatan anggota
        $komponenGaji = $this->komponenGajiModel->where('kategori', $anggota['jabatan'])->findAll();
        if (empty($komponenGaji)) {
            return false; // Tidak ada komponen gaji untuk jabatan ini
        }

        // Logika perhitungan gaji (sederhana)
        $tunjangan = 0;
        foreach ($komponenGaji as $komponen) {
            if ($komponen['satuan'] === 'fixed') {
                $tunjangan += $komponen['nominal'];
            } elseif ($komponen['satuan'] === 'percentage') {
                // Misal persentase dari gaji pokok tetap (contoh: 10000000)
                $tunjangan += (10000000 * $komponen['nominal'] / 100);
            }
            // Tambahkan logika lain sesuai kebutuhan
        }

        $totalGaji = 10000000 + $tunjangan; // Gaji pokok + tunjangan
        $takeHomePay = $totalGaji - ($totalGaji * 0.1); // Misal potongan 10%   
        return [
            'jabatan'       => $anggota['jabatan'],
            'tunjangan'     => $tunjangan,
            'total_gaji'    => $totalGaji,
            'take_home_pay' => $takeHomePay,
            'id_komponen_gaji' => $komponenGaji[0]['id_komponen_gaji'] // Contoh ambil komponen pertama
        ];
    }
}