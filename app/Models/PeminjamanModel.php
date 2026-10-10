<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table      = 'peminjaman';
    protected $primaryKey = 'id_pinjam';
    protected $allowedFields = ['id_anggota', 'id_buku', 'tgl_pinjam', 'status'];

    // --- FITUR 1: QUERY JOIN (Untuk Tabel Utama) ---
    public function getLengkap()
    {
        // "Pak, ini query SELECT dengan JOIN 3 tabel"
        return $this->db->table('peminjaman')
            ->select('peminjaman.*, anggota.nama, buku.judul')
            ->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota')
            ->join('buku', 'buku.id_buku = peminjaman.id_buku')
            ->orderBy('peminjaman.id_pinjam', 'DESC') // Order By terbaru
            ->get()
            ->getResultArray();
    }

    // --- FITUR 2: QUERY AGREGAT (Untuk Laporan Statistik) ---
    public function getRekapPeminjam()
    {
        // "Pak, ini query GROUP BY dan COUNT untuk menghitung jumlah pinjam"
        return $this->db->table('peminjaman')
            ->select('anggota.nama, COUNT(peminjaman.id_pinjam) as jumlah')
            ->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota')
            ->groupBy('anggota.nama') // Group By Nama
            ->get()
            ->getResultArray();
    }
}