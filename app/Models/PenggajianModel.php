<?php namespace App\Models;

use CodeIgniter\Model;

class PenggajianModel extends Model
{
    protected $table      = 'penggajian'; 
    protected $primaryKey = 'id_anggota'; 
    protected $returnType     = 'array';

    protected $allowedFields = [
        'id_anggota',
        'id_komponen_gaji', 
        'total_gaji', 
        'take_home_pay'
    ]; 
    
    public function getGajiSummary()
    {
        $builder = $this->db->table($this->table . ' AS P');
        $builder->select('
            P.id_anggota,
            A.gelar_depan, 
            A.nama_depan, 
            A.nama_belakang, 
            A.gelar_belakang, 
            A.jabatan, 
            P.take_home_pay
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
            P.id_anggota, P.take_home_pay, 
            K.nama_komponen, K.kategori, K.nominal, K.satuan 
        ');

        $builder->join('komponen_gaji AS K', 'K.id_komponen_gaji = P.id_komponen_gaji', 'inner');
        $builder->where('P.id_anggota', $idAnggota);

        return $builder->get()->getResultArray();
    }
}