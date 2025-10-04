<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\KomponenGajiModel;
use App\Models\PenggajianModel;

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

    public function managePenggajian()
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
        return view('admin/penggajian/index', $data);
    }
    
    public function viewPenggajian($idAnggota)
    {
        $model = new PenggajianModel();

        // Mengambil detail gaji untuk anggota tertentu
        $gajiDetail = $model->getGajiDetailByAnggota($idAnggota);

        if (empty($gajiDetail)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data penggajian tidak ditemukan untuk anggota ini.');
        }

        $data = [
            'gajiDetail' => $gajiDetail,
            'title'      => 'Detail Penggajian Anggota DPR'
        ];

        // Memuat View untuk menampilkan detail penggajian
        return view('admin/penggajian/view', $data);
    }

    public function createPenggajian()
    {
        helper(['form']);
        // Inisialisasi Model
        $anggotaModel = new AnggotaModel();
        $komponenGajiModel = new KomponenGajiModel();

        // Mengambil semua data anggota dari database untuk dropdown
        $dataAnggota = $anggotaModel->findAll();

        // Mengambil semua komponen gaji berdasarkan jabatan anggota
        $dataKomponenGaji = $komponenGajiModel->findAll();

        $data = [
            'anggota'      => $dataAnggota,
            'komponenGaji' => $dataKomponenGaji,
            'title'        => 'Hitung Take Home Pay Anggota DPR'
        ];

        // Menampilkan form untuk menghitung gaji baru
        return view('admin/penggajian/create', $data);
    }

    public function storePenggajian()
    {
        // Ambil ID Anggota dari form
        $idAnggota = $this->request->getPost('id_anggota'); 
        $idKomponenGajiPokok = $this->request->getPost('id_komponen_gaji');
        
        if (empty($idAnggota) || empty($idKomponenGaji)) {
            return redirect()->back()->with('error', 'Anggota dan Komponen Gaji wajib dipilih.')->withInput();
        }

        // Inisialisasi Model
        $anggotaModel = new AnggotaModel();
        $komponenModel = new KomponenGajiModel();
        $penggajianModel = new PenggajianModel();

         // Ambil data Anggota & Komponen Gaji Pokok
        $anggota = $anggotaModel->find($idAnggota);
        $komponenPokok = $komponenModel->find($idKomponenGajiPokok);

        if (!$anggota || !$komponenPokok) {
            return redirect()->back()->with('error', 'Data anggota atau komponen utama tidak ditemukan.')->withInput();
        }

        // Tentukan Jabatan dan Gaji Pokok
        $jabatanAnggota = $anggota['jabatan'];
        $gajiPokok = $komponenPokok['nominal'];
        $totalTunjangan = 0;

        // Ambil Komponen Gaji Lainya (Tunjangan Melekat/Lain) 
        // Ambil semua komponen yang berlaku untuk jabatan anggota ini
        
        $komponenLainnya = $komponenModel
                            ->where('jabatan', $jabatanAnggota)
                            ->orWhere('jabatan', 'Semua') 
                            ->where('kategori !=', 'Gaji Pokok') // Hindari double hitung Gaji Pokok
                            ->findAll();

        foreach ($komponenLainnya as $k) {
       
            // Kita hitung semua yang bukan Gaji Pokok
            if (strpos($k['kategori'], 'Tunjangan') !== false) {
                $totalTunjangan += $k['nominal'];
            } 
        }
        
        // Hitung Total Gaji dan THP
        $totalGajiBruto = $gajiPokok + $totalTunjangan;
        $takeHomePay = $totalGajiBruto; 

        // 5. Simpan Hasil Perhitungan ke Tabel Penggajian (Agregasi)
        $dataSimpan = [
            'id_anggota'        => $idAnggota,
            'id_komponen_gaji'  => $idKomponenGajiPokok,
            'jabatan'           => $jabatanAnggota,
            'tunjangan'         => $totalTunjangan,
            'total_gaji'       => $totalGajiBruto,
            'take_home_pay'    => $takeHomePay,
        ];

        try {
            // Menggunakan save() yang akan UPDATE jika id_anggota sudah ada (karena id_anggota adalah primary key)
            $penggajianModel->save($dataSimpan);
            return redirect()->to('/admin/penggajian')->with('success', 'Perhitungan gaji berhasil disimpan.');
        } catch (\Exception $e) {
            // Ini akan menangkap error jika ada kolom yang tidak cocok
            return redirect()->back()->with('error', 'Gagal menyimpan data: Pastikan semua kolom yang diperlukan (termasuk total_gaji, tunjangan) ada di tabel penggajian. Error: ' . $e->getMessage())->withInput();
        }
    }
}