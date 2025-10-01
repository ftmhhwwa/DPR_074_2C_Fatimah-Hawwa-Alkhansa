<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'pengguna';
    protected $primaryKey = 'id_pengguna';

    // Kolom-kolom yang diperbolehkan diisi
    protected $allowedFields = ['username', 'password', 'email', 'nama_depan', 'nama_belakang', 'role'];

    // Method untuk mencari pengguna berdasarkan username
    public function findUserByUsername($username)
    {
        // Cari pengguna berdasarkan username
        return $this->where(['username' => $username])->first();
    }
}