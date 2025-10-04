<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KomponenGajiModel;

class Client extends BaseController
{
    protected $anggotaModel;
    protected $komponenGajiModel;

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
        // Inisialisasi Model KomponenGaji
        $model = new KomponenGajiModel();

        // Mengambil semua data komponen gaji dari database
        $komponen = $model->findAll();

        $data = [
            'dataKomponenGaji' => $model->findAll(),
            'title'            => 'Kelola Data Komponen Gaji'
        ];

        // Memuat View untuk menampilkan daftar komponen gaji
        return view('client/komponengaji/index', $data);
    }
}
