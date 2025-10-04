<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;

class Admin extends BaseController
{
    public function manageAnggota()
    {
        // Inisialisasi Model Anggota
        $anggotaModel = new AnggotaModel();

        // Mengambil semua data anggota dari database
        $dataAnggota = $anggotaModel->findAll(); 

        $data = [
            'anggota' => $dataAnggota,
            'title'   => 'Kelola Data Anggota DPR'
        ];

        // Memuat View untuk menampilkan daftar anggota
        return view('admin/anggota/index', $data);
    }

    public function createAnggota()
    {
        // Menampilkan form untuk menambahkan anggota baru
        return view('admin/anggota/create');
    }

    public function storeAnggota()
    {
        $anggotaModel = new AnggotaModel();

        // Mendapatkan data dari form
        $data = [
            'gelar_depan'      => $this->request->getPost('gelar_depan'),
            'nama_depan'      => $this->request->getPost('nama_depan'),
            'nama_belakang'   => $this->request->getPost('nama_belakang'),
            'gelar_belakang'  => $this->request->getPost('gelar_belakang'),
            'jabatan'         => $this->request->getPost('jabatan'),
            'status_pernikahan' => $this->request->getPost('status_pernikahan')
        ];

        // Menyimpan data ke database
        $anggotaModel->insert($data);

        // Redirect ke halaman daftar anggota dengan pesan sukses
        return redirect()->to('/admin/anggota')->with('success', 'Data anggota berhasil ditambahkan.');
    }
}