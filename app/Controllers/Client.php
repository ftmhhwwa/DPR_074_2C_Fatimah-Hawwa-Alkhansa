<?php namespace App\Controllers;

use App\Controllers\BaseController;

class Client extends BaseController
{
    protected $anggotaModel;

    public function __construct()
    {
        // Inisialisasi Model Anggota
        $this->anggotaModel = new \App\Models\AnggotaModel();
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
        // Mengambil semua data komponen gaji dari database
        $komponenGajiModel = new \App\Models\KomponenGajiModel();
        $dataKomponenGaji = $komponenGajiModel->findAll();

        $data = [
            'komponen_gaji' => $dataKomponenGaji,
            'title'         => 'Daftar Komponen Gaji DPR'
        ];

        // Memuat View untuk menampilkan daftar komponen gaji
        return view('client/komponengaji/index', $data);
    }
}
