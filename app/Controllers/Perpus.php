<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;

class Perpus extends BaseController
{
    protected $peminjamanModel;

    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        
        // Query untuk menghitung total data (Widget Statistik)
        $total_anggota = $db->table('anggota')->countAll();
        $total_buku    = $db->table('buku')->countAll();
        // Hitung yang statusnya masih 'Dipinjam'
        $sedang_dipinjam = $db->table('peminjaman')->where('status', 'Dipinjam')->countAllResults();

        $data = [
            'peminjaman'      => $this->peminjamanModel->getLengkap(),
            'rekap'           => $this->peminjamanModel->getRekapPeminjam(),
            'anggota'         => $db->query("SELECT * FROM anggota")->getResultArray(),
            'buku'            => $db->query("SELECT * FROM buku")->getResultArray(),
            
            // Data baru untuk Widget Dashboard
            'total_anggota'   => $total_anggota,
            'total_buku'      => $total_buku,
            'sedang_dipinjam' => $sedang_dipinjam
        ];

        return view('tampilan_perpus', $data);
    }

    // Fitur CREATE (Insert)
    public function simpan()
    {
        $this->peminjamanModel->save([
            'id_anggota' => $this->request->getPost('id_anggota'),
            'id_buku'    => $this->request->getPost('id_buku'),
            'tgl_pinjam' => date('Y-m-d'),
            'status'     => 'Dipinjam'
        ]);
        // Tambah baris ini untuk notifikasi
        session()->setFlashdata('pesan', 'Data berhasil disimpan!'); 
        return redirect()->to('/perpus');
    }

    // Fitur UPDATE (Kembalikan Buku)
    public function kembali($id)
    {
        // 1. Update status di database
        $this->peminjamanModel->update($id, ['status' => 'Kembali']);
        
        // 2. KIRIM PESAN NOTIFIKASI (Ini yang bikin muncul)
        session()->setFlashdata('toast_success', 'Buku berhasil dikembalikan ke rak! 📚');
        
        // 3. Kembali ke dashboard
        return redirect()->to('/perpus');
    }

    // Fitur DELETE (Hapus)
    public function hapus($id)
    {
        $this->peminjamanModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.'); // Notifikasi
        return redirect()->to('/perpus');
    }
}