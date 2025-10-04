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

    public function editPenggajian($id)
    {
        $penggajianModel = new PenggajianModel();
        $query = $penggajianModel->select('
                                        penggajian.id_anggota, 
                                        penggajian.id_komponen_gaji,
                                        A.nama_depan, A.nama_belakang, 
                                        A.jabatan,  
                                        penggajian.total_gaji, 
                                        penggajian.take_home_pay
                                        ')
                                ->join('anggota AS A', 'A.id_anggota = penggajian.id_anggota', 'inner')
                                ->join('komponen_gaji AS K', 'K.id_komponen_gaji = penggajian.id_komponen_gaji', 'inner')
                                ->where('penggajian.id_anggota', $id);
                                
        $data = $query->first();

        if (!$data) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'       => 'Edit Penggajian',
            'penggajian'  => $data
        ];
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

    public function deletePenggajian($id)
    {
        $model = new PenggajianModel();

        // Menghapus data komponen gaji berdasarkan ID
        $model->delete($id);

        // Redirect ke halaman daftar komponen gaji dengan pesan sukses
        return redirect()->to('/admin/penggajian')->with('success', 'Data komponen gaji berhasil dihapus.');
    }
}