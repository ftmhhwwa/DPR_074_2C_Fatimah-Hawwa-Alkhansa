<?php namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\KomponenGajiModel;

class KomponenGaji extends BaseController
{
    protected $komponenGajiModel;

    public function __construct()
    {
        // Inisialisasi Model Komponen Gaji
        $this->komponenGajiModel = new KomponenGajiModel();
    }

    public function index()
    {
        $model = new KomponenGajiModel();
        // Mengambil semua data komponen gaji dari database
        $dataKomponenGaji = $model->findAll();

        return $this->response->setJSON($dataKomponenGaji);
    }
}