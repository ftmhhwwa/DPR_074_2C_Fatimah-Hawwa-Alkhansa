<?php namespace App\Models;

use CodeIgniter\Model;

class PenggajianModel extends Model
{
    protected $table      = 'penggajian'; 
    protected $primaryKey = 'id_anggota'; 
    protected $returnType     = 'array';

    protected $allowedFields = [
        'id_komponen_gaji', 'jabatan', 'tunjangan', 'total_gaji', 'take_home_pay'
    ]; 
    
    public function getGajiSummary()
    {
        $builder = $this->db->table($this->table . ' AS P');
        $builder->select('
            P.*,
            A.gelar_depan, A.nama_depan, A.nama_belakang, A.gelar_belakang, A.jabatan, A.status_pernikahan, A.jumlah_anak
        ');
        
        $builder->join('anggota AS A', 'A.id_anggota = P.id_anggota', 'inner');
        return $builder->get()->getResultArray();
    }
    
    /**
     * Mengambil semua komponen gaji untuk satu anggota (untuk halaman Detail).
     */
    public function getGajiDetailByAnggota($idAnggota)
    {
        $builder = $this->db->table($this->table . ' AS P');
        $builder->select('
            P.id_anggota, P.tunjangan, P.total_gaji, P.take_home_pay, 
            K.nama_komponen, K.kategori, K.nominal, K.satuan 
        ');

        $builder->join('komponen_gaji AS K', 'K.id_komponen_gaji = P.id_komponen_gaji', 'inner');
        $builder->where('P.id_anggota', $idAnggota);

        return $builder->get()->getResultArray();
    }
}