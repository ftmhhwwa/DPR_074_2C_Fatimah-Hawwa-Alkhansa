<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    protected $anggotaModel;

    public function __construct()
    {
        // Inisialisasi Model Anggota
        $this->anggotaModel = new AnggotaModel();
    }

    public function index()
    {
        $model = new AnggotaModel();
        // Mengambil semua data anggota dari database
        $dataAnggota = $model->findAll(); 

        return $this->response->setJSON($dataAnggota);
    }
}