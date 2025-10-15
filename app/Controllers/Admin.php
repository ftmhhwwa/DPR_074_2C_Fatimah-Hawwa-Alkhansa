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
            'status_pernikahan' => $this->request->getPost('status_pernikahan'),
            'jumlah_anak' => $this->request->getPost('jumlah_anak')
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
            'status_pernikahan' => $this->request->getPost('status_pernikahan'),
            'jumlah_anak' => $this->request->getPost('jumlah_anak')
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
        $penggajianModel = new PenggajianModel();
        $gajiSummary = $penggajianModel->getGajiSummary();

        $data = [
            'penggajian' => $gajiSummary,
            'title'      => 'Ringkasan Take Home Pay Anggota DPR'
        ];

        return view('admin/penggajian/index', $data);
    }
    
    public function detailPenggajian($idAnggota)
    {
        $penggajianModel = new PenggajianModel();
        $anggotaModel = new AnggotaModel(); // Asumsi model ini ada

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

    public function createPenggajian()
    {
        $penggajianModel = new PenggajianModel();
        // Mengambil hanya anggota yang belum punya data gaji
        $data['anggota'] = $penggajianModel->getAnggotaTanpaPenggajian();
        $data['title'] = 'Tambah Data Penggajian';
        return view('admin/penggajian/create', $data);    
    }

    public function processCreatePenggajian()
    {
        $idAnggota = $this->request->getPost('id_anggota');

        // Validasi sederhana
        if (empty($idAnggota)) {
            return redirect()->to('admin/penggajian/create')->with('error', 'Silakan pilih anggota terlebih dahulu.');
        }

        // Langsung arahkan ke halaman edit untuk anggota yang dipilih
        return redirect()->to('admin/penggajian/edit/' . $idAnggota);
    }

    public function storePenggajian()
    {
        // Ambil ID Anggota dari form
        $idAnggota = $this->request->getPost('id_anggota'); 
        
        if (empty($idAnggota)) {
            return redirect()->back()->with('error', 'Anggota wajib dipilih.')->withInput();
        }

        // Inisialisasi Model
        $anggotaModel = new AnggotaModel();
        $komponenModel = new KomponenGajiModel();
        $penggajianModel = new PenggajianModel();

         // Ambil data Anggota 
        $anggota = $anggotaModel->find($idAnggota);
        
        if (!$anggota) {
            return redirect()->back()->with('error', 'Data anggota tidak ditemukan.')->withInput();
        }

        // Tentukan Jabatan 
        $jabatanAnggota = $anggota['jabatan'];
        $totalTunjangan = 0;

        $komponenPokok = $komponenModel
                            ->where('kategori', 'Gaji Pokok')
                            ->where('jabatan', $jabatanAnggota) // Cari Gaji Pokok spesifik jabatan
                            ->first();
                            
        if (!$komponenPokok) {
            // Jika tidak ada Gaji Pokok spesifik, coba cari yang berlaku untuk 'Semua'
            $komponenPokok = $komponenModel
                            ->where('kategori', 'Gaji Pokok')
                            ->where('jabatan', 'Semua')
                            ->first();
        }

        if (!$komponenPokok) {
            return redirect()->back()->with('error', 'Gaji Pokok untuk jabatan ini belum disetup di Komponen Gaji.')->withInput();
        }

        $idKomponenGajiPokok = $komponenPokok['id_komponen_gaji'];
        $gajiPokok = $komponenPokok['nominal'];

        // Ambil Komponen Gaji Lainya (Tunjangan Melekat/Lain) 
        $komponenLainnya = $komponenModel
                            ->whereIn('jabatan', [$jabatanAnggota, 'Semua']) 
                            ->where('kategori !=', 'Gaji Pokok') 
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

        // Simpan Hasil Perhitungan ke Tabel Penggajian (Agregasi)
        $dataSimpan = [
            'id_anggota'        => $idAnggota,
            'id_komponen_gaji'  => $idKomponenGajiPokok,
            'total_gaji'       => $totalGajiBruto,
            'take_home_pay'    => $takeHomePay,
        ];

        try {
            // Cek apakah data penggajian untuk anggota ini sudah ada
            $existingData = $penggajianModel->find($idAnggota);

            if ($existingData) {
                // Jika sudah ada, lakukan UPDATE (hanya data gaji yang diupdate)
                $updateResult = $penggajianModel->update($idAnggota, $dataSimpan);
                
                if ($updateResult === false) {
                     // Jika update gagal (bukan karena kolom, tapi masalah lain), tangkap error.
                     $errorMsg = 'Gagal melakukan update data penggajian. ';
                     if ($penggajianModel->errors()) {
                         $errorMsg .= 'Validasi Model: ' . json_encode($penggajianModel->errors());
                     }
                     return redirect()->to('/admin/penggajian')->with('error', $errorMsg);
                }

            } else {
                // Jika belum ada, lakukan INSERT
                $insertResult = $penggajianModel->insert($dataSimpan);

                if ($insertResult === false) {
                    // Jika insert gagal, tangkap error
                    $errorMsg = 'Gagal melakukan insert data penggajian. ';
                    if ($penggajianModel->errors()) {
                        $errorMsg .= 'Validasi Model: ' . json_encode($penggajianModel->errors());
                    }
                    return redirect()->to('/admin/penggajian')->with('error', $errorMsg);
                }
            }

            return redirect()->to('/admin/penggajian')->with('success', 'Perhitungan gaji berhasil disimpan/diperbarui.');
            
        } catch (\Exception $e) {
            // Tangkap error umum (termasuk error kolom)
            return redirect()->back()->with('error', 'Gagal menyimpan data (CATCH BLOK). Error: ' . $e->getMessage())->withInput();
        }
    }

    public function editPenggajian($idAnggota)
    {
        $penggajianModel = new PenggajianModel();
        $anggotaModel = new AnggotaModel();
        $komponenGajiModel = new KomponenGajiModel();

        $anggota = $anggotaModel->find($idAnggota);
        if (!$anggota) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anggota tidak ditemukan');
        }

        // --- LOGIKA UNTUK MENYIMPAN (METHOD POST) ---
        if ($this->request->getMethod() === 'post') {
            
            // Ambil semua komponen yang relevan untuk jabatan anggota dan yang berlaku untuk "Semua"
            $komponenTersedia = $komponenGajiModel
                                ->whereIn('jabatan', [$anggota['jabatan'], 'Semua'])
                                ->findAll();

            $idKomponenTerpilih = [];

            foreach ($komponenTersedia as $k) {
                // Aturan 1: Tambahkan Gaji Pokok & Tunjangan Melekat (selain tunjangan keluarga)
                if ($k['kategori'] === 'Gaji Pokok' || strpos($k['kategori'], 'Tunjangan Melekat') !== false) {
                    $idKomponenTerpilih[] = $k['id_komponen_gaji'];
                }

                // Aturan 2: Cek Tunjangan Istri/Suami (sesuai spesifikasi )
                if ($k['nama_komponen'] === 'Tunjangan Istri/Suami' && $anggota['status_pernikahan'] === 'Kawin') {
                    $idKomponenTerpilih[] = $k['id_komponen_gaji'];
                }

                // Aturan 3: Cek Tunjangan Anak (sesuai spesifikasi )
                if ($k['nama_komponen'] === 'Tunjangan Anak' && $anggota['jumlah_anak'] > 0) {
                    // Tambahkan komponen ini sebanyak jumlah anak, tetapi maksimal 2 kali
                    $jumlahAnakDihitung = min($anggota['jumlah_anak'], 2);
                    for ($i = 0; $i < $jumlahAnakDihitung; $i++) {
                        $idKomponenTerpilih[] = $k['id_komponen_gaji'];
                    }
                }
            }
            
            // Hapus duplikat ID jika ada
            $idKomponenFinal = array_unique($idKomponenTerpilih);

            // Panggil model untuk menyimpan data
            if ($penggajianModel->updateAnggotaGaji($idAnggota, $idKomponenFinal)) {
                // --> BARIS INI HANYA AKAN DIJALANKAN JIKA KONDISI 'IF' TERPENUHI (TRUE)
                return redirect()->to('/admin/penggajian')->with('success', 'Data gaji anggota berhasil dihitung dan disimpan.');
            } else {
                // --> JIKA KONDISI 'IF' GAGAL (FALSE), DIA AKAN KESINI
                return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data gaji.');
            }
        }

        // --- BAGIAN UNTUK MENAMPILKAN FORM (METHOD GET) ---
        // Logika ini sekarang hanya untuk menampilkan, bukan untuk memilih secara manual
        $idKomponenSaatIni = array_column($penggajianModel->getGajiDetailByAnggota($idAnggota), 'id_komponen_gaji');
        
        $data = [
            'title' => 'Kalkulasi & Simpan Gaji: ' . $anggota['nama_depan'],
            'anggota' => $anggota,
            // Kita tetap kirim komponen untuk ditampilkan di detail jika perlu
            'detailGaji' => $penggajianModel->getGajiDetailByAnggota($idAnggota), 
            'semuaKomponen' => $komponenGajiModel->findAll(),
            'idKomponenSaatIni' => $idKomponenSaatIni,
        ];

        // Kita bisa membuat view baru yang lebih simpel, atau memodifikasi view edit
        return view('admin/penggajian/edit', $data);
    }

    public function updatePenggajian($id)
    {
        $penggajianModel = new PenggajianModel();

        // Validasi input
        $this->validate([
            'id_anggota'       => 'required',
            'id_komponen_gaji' => 'required',
            'total_gaji'       => 'required',
            'take_home_pay'    => 'required',
        ]);

        // Ambil data dari form
        $data = [
            'id_anggota'        => $this->request->getPost('id_anggota'),
            'id_komponen_gaji'  => $this->request->getPost('id_komponen_gaji'),        
            'total_gaji'       => $this->request->getPost('total_gaji'),
            'take_home_pay'    => $this->request->getPost('take_home_pay'),
        ];

        // Update data
        $penggajianModel->update($id, $data);

        return redirect()->to('/admin/penggajian')->with('success', 'Data penggajian berhasil diperbarui.');
    }

    public function deletePenggajian($idAnggota)
    {
        $penggajianModel = new PenggajianModel();
        if ($penggajianModel->deleteGajiByAnggota($idAnggota)) {
            return redirect()->to('/admin/penggajian')->with('success', 'Data penggajian anggota berhasil dihapus.');
        } else {
            return redirect()->to('/admin/penggajian')->with('error', 'Gagal menghapus data penggajian.');
        }
    }
}