<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggajianModel extends Model
{
    protected $table = 'penggajian';
    protected $allowedFields = ['id_komponen_gaji', 'id_anggota'];

    /**
     * Mengambil ringkasan take home pay untuk semua anggota.
     */
    public function getGajiSummary()
    {
        $builder = $this->db->table('anggota AS A');
        $builder->select("
            A.id_anggota, 
            A.gelar_depan,
            A.nama_depan, 
            A.nama_belakang, 
            A.gelar_belakang, 
            A.jabatan, 
            SUM(KG.nominal) as take_home_pay
        ");
        $builder->join('penggajian AS P', 'A.id_anggota = P.id_anggota', 'left');
        $builder->join('komponen_gaji AS KG', 'P.id_komponen_gaji = KG.id_komponen_gaji', 'left');
        $builder->groupBy('A.id_anggota, A.gelar_depan, A.nama_depan, A.nama_belakang, A.gelar_belakang, A.jabatan');
        $builder->orderBy('A.id_anggota', 'ASC');
        return $builder->get()->getResultArray();
    }
    
    /**
     * Mengambil rincian semua komponen gaji untuk satu anggota.
     */
    public function getGajiDetailByAnggota($idAnggota)
    {
        $builder = $this->db->table('penggajian AS P');
        $builder->select('KG.id_komponen_gaji, KG.nama_komponen, KG.kategori, KG.nominal');
        $builder->join('komponen_gaji AS KG', 'KG.id_komponen_gaji = P.id_komponen_gaji', 'inner');
        $builder->where('P.id_anggota', $idAnggota);
        return $builder->get()->getResultArray();
    }

    /**
     * Mengupdate komponen gaji untuk seorang anggota.
     * Logika: Hapus semua yang lama, lalu masukkan semua yang baru.
     */
    public function updateAnggotaGaji($idAnggota, array $komponenIds)
    {
        // Mulai transaksi database untuk memastikan semua operasi berhasil
        $this->db->transStart();

        // Hapus semua data penggajian lama untuk anggota ini
        $this->where('id_anggota', $idAnggota)->delete();

        if (!empty($komponenIds)) {
            $dataToInsert = [];
            foreach ($komponenIds as $komponenId) {
                $dataToInsert[] = ['id_anggota' => $idAnggota, 'id_komponen_gaji' => $komponenId];
            }
            $this->insertBatch($dataToInsert);
        }

        // Selesaikan transaksi
        $this->db->transComplete();

        return $this->db->transStatus();
    }

    /* Menghapus semua data penggajian milik seorang anggota.  */
    public function deleteGajiByAnggota($idAnggota)
    {
        return $this->where('id_anggota', $idAnggota)->delete();
    }

    public function getAnggotaTanpaPenggajian()
    {
        $subquery = $this->db->table('penggajian')->select('id_anggota')->getCompiledSelect();
        
        $builder = $this->db->table('anggota');
        $builder->where("id_anggota NOT IN ({$subquery})", null, false);
        return $builder->get()->getResultArray();
    }
}

