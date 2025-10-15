<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KomponenGajiModel;
use App\Models\PenggajianModel;
use App\Models\AnggotaModel;

class Client extends BaseController
{
    protected $anggotaModel;
    protected $komponenGajiModel;
    protected $penggajianModel;

    public function __construct()
    {
        // Inisialisasi Model Anggota
        $this->anggotaModel = new \App\Models\AnggotaModel();
        $this->komponenGajiModel = new \App\Models\KomponenGajiModel();
        $this->penggajianModel = new \App\Models\PenggajianModel();
    }

    public function viewAnggota()
    {
        // Mengambil semua data anggota dari database
        $dataAnggota = $this->anggotaModel->findAll(); 

        $data = [
            'anggota' => $dataAnggota,
            'title'   => 'Daftar Anggota DPR'
        ];

        // Memuat View untuk menampilkan daftar anggota
        return view('client/anggota/index', $data);
    }

    public function viewKomponenGaji()
    {
        // Inisialisasi Model KomponenGaji
        $model = new KomponenGajiModel();

        // Mengambil semua data komponen gaji dari database
        $komponen = $model->findAll();

        $data = [
            'dataKomponenGaji' => $model->findAll(),
            'title'            => 'Daftar Data Komponen Gaji'
        ];

        // Memuat View untuk menampilkan daftar komponen gaji
        return view('client/komponengaji/index', $data);
    }

    public function indexPenggajian()
    {
        // Inisialisasi Model Penggajian
        $model = new PenggajianModel();

        // Mengambil ringkasan gaji (termasuk JOIN dan GROUPING)
        $gajiSummary = $model->getGajiSummary();

        $data = [
            'penggajian' => $gajiSummary,
            'title'    => 'Ringkasan Take Home Pay Anggota DPR'
        ];

        // Memuat View untuk menampilkan daftar penggajian
        return view('client/penggajian/index', $data);
    }
    
    public function detailPenggajian($idAnggota)
    {
        $penggajianModel = new PenggajianModel();
        $anggotaModel = new AnggotaModel(); 

        $anggota = $anggotaModel->find($idAnggota);
        $detailGaji = $penggajianModel->getGajiDetailByAnggota($idAnggota);

        if (!$anggota) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anggota tidak ditemukan.');
        }

        $data = [
            'title'      => 'Detail Gaji: ' . $anggota['nama_depan'] . ' ' . $anggota['nama_belakang'],
            'anggota'    => $anggota,
            'detailGaji' => $detailGaji
        ];

        return view('admin/penggajian/detail', $data);
    }
}
