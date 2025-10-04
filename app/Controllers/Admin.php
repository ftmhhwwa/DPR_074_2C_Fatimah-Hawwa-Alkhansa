<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\KomponenGajiModel;

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

    public function editAnggota($id)
    {
        $anggotaModel = new AnggotaModel();

        // Mengambil data anggota berdasarkan ID
        $anggota = $anggotaModel->find($id);

        if (!$anggota) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data anggota tidak ditemukan.');
        }

        $data = [
            'anggota' => $anggota,
            'title'   => 'Ubah Data Anggota DPR'
        ];

        // Menampilkan form untuk mengedit anggota
        return view('admin/anggota/edit', $data);
    }

    public function updateAnggota($id)
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

        // Memperbarui data di database
        $anggotaModel->update($id, $data);

        // Redirect ke halaman daftar anggota dengan pesan sukses
        return redirect()->to('/admin/anggota')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function deleteAnggota($id)
    {
        $anggotaModel = new AnggotaModel();

        // Menghapus data anggota berdasarkan ID
        $anggotaModel->delete($id);

        // Redirect ke halaman daftar anggota dengan pesan sukses
        return redirect()->to('/admin/anggota')->with('success', 'Data anggota berhasil dihapus.');
    }

    public function manageKomponenGaji()
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
        return view('admin/komponengaji/index', $data);
    }

    public function createKomponenGaji()
    {
        // Menampilkan form untuk menambahkan komponen gaji baru
        return view('admin/komponengaji/create');
    }

    public function storeKomponenGaji()
    {
        $model = new KomponenGajiModel();

        // Mendapatkan data dari form
        $data = [
            'nama_komponen' => $this->request->getPost('nama_komponen'),
            'kategori'      => $this->request->getPost('kategori'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'nominal'       => $this->request->getPost('nominal'),
            'satuan'        => $this->request->getPost('satuan')
        ];

        // Menyimpan data ke database
        $model->insert($data);

        // Redirect ke halaman daftar komponen gaji dengan pesan sukses
        return redirect()->to('/admin/gaji')->with('success', 'Data komponen gaji berhasil ditambahkan.');
    }

    public function editKomponenGaji($id)
    {
        $model = new KomponenGajiModel();

        // Mengambil data komponen gaji berdasarkan ID
        $komponen = $model->find($id);

        if (!$komponen) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data komponen gaji tidak ditemukan.');
        }

        $data = [
            'komponen' => $komponen,
            'title'    => 'Ubah Data Komponen Gaji'
        ];

        // Menampilkan form untuk mengedit komponen gaji
        return view('admin/komponengaji/edit', $data);
    }

    public function updateKomponenGaji($id)
    {
        $model = new KomponenGajiModel();

        // Mendapatkan data dari form
        $data = [
            'nama_komponen' => $this->request->getPost('nama_komponen'),
            'kategori'      => $this->request->getPost('kategori'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'nominal'       => $this->request->getPost('nominal'),
            'satuan'        => $this->request->getPost('satuan')
        ];

        // Memperbarui data di database
        $model->update($id, $data);

        // Redirect ke halaman daftar komponen gaji dengan pesan sukses
        return redirect()->to('/admin/gaji')->with('success', 'Data komponen gaji berhasil diperbarui.');
    }

    public function deleteKomponenGaji($id)
    {
        $model = new KomponenGajiModel();

        // Menghapus data komponen gaji berdasarkan ID
        $model->delete($id);

        // Redirect ke halaman daftar komponen gaji dengan pesan sukses
        return redirect()->to('/admin/gaji')->with('success', 'Data komponen gaji berhasil dihapus.');
    }
}