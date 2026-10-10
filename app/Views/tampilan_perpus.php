<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SmartLib </title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.65);
            --glass-border: 1px solid rgba(255, 255, 255, 0.5);
            --glass-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
            --primary-gradient: linear-gradient(135deg, #2563eb 0%, #4f46e5 100%);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%);
            background-attachment: fixed; /* Supaya background diam saat scroll */
            color: #1e293b;
            min-height: 100vh;
        }

        /* Navbar Kaca */
        .navbar-glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: var(--glass-border);
            box-shadow: var(--glass-shadow);
        }

        /* Kartu Kaca (Glass Card) */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: var(--glass-border);
            border-radius: 20px;
            box-shadow: var(--glass-shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px 0 rgba(31, 38, 135, 0.15);
        }

        /* Widget Statistik */
        .stat-icon-box {
            width: 50px; height: 50px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem;
        }

        /* Tabel Modern */
        .table-custom {
            border-collapse: separate;
            border-spacing: 0 8px; /* Jarak antar baris */
        }
        .table-custom thead th {
            border: none;
            background: transparent;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            padding-bottom: 10px;
        }
        .table-custom tbody tr {
            background: rgba(255, 255, 255, 0.5);
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
            transition: all 0.2s;
        }
        .table-custom tbody tr:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: scale(1.01);
        }
        .table-custom td {
            border: none;
            padding: 15px 20px;
            vertical-align: middle;
        }
        .table-custom td:first-child { border-radius: 12px 0 0 12px; }
        .table-custom td:last-child { border-radius: 0 12px 12px 0; }

        /* Form Elements */
        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(255,255,255,0.8);
            border-radius: 10px;
            padding: 10px 15px;
        }
        .form-control:focus, .form-select:focus {
            background: #fff;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
            border-color: #6366f1;
        }

        /* Tombol */
        .btn-primary-glass {
            background: var(--primary-gradient);
            color: white; border: none;
            padding: 10px 20px; border-radius: 10px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
            transition: all 0.3s;
        }
        .btn-primary-glass:hover {
            background: linear-gradient(135deg, #1d4ed8 0%, #4338ca 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
        }

        .avatar {
            width: 40px; height: 40px;
            background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
            color: #4338ca;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-glass fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="#">
                <div class="bg-primary text-white rounded p-1 me-2"><i class="bi bi-book-half"></i></div>
                SmartLib <span class="badge bg-primary bg-opacity-10 text-primary ms-2 rounded-pill" style="font-size: 0.7em;"></span>
            </a>
            
            <div class="d-flex align-items-center gap-3">
                <div class="d-none d-md-block text-end">
                    <small class="d-block text-muted" style="font-size: 0.7rem; line-height: 1;">Login sebagai</small>
                    <span class="fw-bold small text-dark"><?= session()->get('username'); ?></span>
                </div>
                <a href="/logout" class="btn btn-sm btn-danger bg-gradient border-0 rounded-pill px-3 shadow-sm" onclick="return confirm('Keluar dari sistem?');">
                    <i class="bi bi-power"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 100px; padding-bottom: 50px;">

        <div class="row g-4 mb-4 animate__animated animate__fadeInDown">
            <div class="col-md-4">
                <div class="glass-card p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <p class="text-muted mb-1 small fw-bold text-uppercase">Total Koleksi</p>
                        <h2 class="mb-0 fw-bold display-6"><?= $total_buku ?></h2>
                    </div>
                    <div class="stat-icon-box bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-journal-bookmark-fill"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-card p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <p class="text-muted mb-1 small fw-bold text-uppercase">Anggota Aktif</p>
                        <h2 class="mb-0 fw-bold display-6"><?= $total_anggota ?></h2>
                    </div>
                    <div class="stat-icon-box bg-success bg-opacity-10 text-success">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-card p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <p class="text-muted mb-1 small fw-bold text-uppercase">Sedang Dipinjam</p>
                        <h2 class="mb-0 fw-bold display-6"><?= $sedang_dipinjam ?></h2>
                    </div>
                    <div class="stat-icon-box bg-warning bg-opacity-10 text-warning">
                        <i class="bi bi-clock-history"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8 animate__animated animate__fadeInLeft animate__delay-0.5s">
                <div class="glass-card h-100">
                    <div class="p-4 border-bottom border-light border-opacity-50">
                        <h5 class="fw-bold m-0"><i class="bi bi-plus-circle-dotted text-primary me-2"></i>Transaksi Baru</h5>
                    </div>
                    <div class="p-4">
                        <form action="/perpus/simpan" method="post">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold text-muted">TANGGAL</label>
                                    <input type="date" name="tgl_pinjam" class="form-control" value="<?= date('Y-m-d') ?>" required>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label small fw-bold text-muted">PEMINJAM</label>
                                    <select name="id_anggota" class="form-select" required>
                                        <option value="">-- Pilih Anggota --</option>
                                        <?php foreach($anggota as $a): ?>
                                            <option value="<?= $a['id_anggota'] ?>"><?= $a['nama'] ?> (<?= $a['jurusan'] ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label small fw-bold text-muted">BUKU</label>
                                    <select name="id_buku" class="form-select" required>
                                        <option value="">-- Pilih Buku --</option>
                                        <?php foreach($buku as $b): ?>
                                            <option value="<?= $b['id_buku'] ?>"><?= $b['judul'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary-glass w-100">
                                        <i class="bi bi-save me-2"></i>Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 animate__animated animate__fadeInRight animate__delay-0.5s">
                <div class="glass-card h-100 text-white" style="background: linear-gradient(145deg, #1e293b 0%, #0f172a 100%); border:none;">
                    <div class="p-4">
                        <h6 class="fw-bold mb-4 text-uppercase text-white-50 small"><i class="bi bi-trophy me-2"></i>Top Readers</h6>
                        
                        <?php 
                        $top3 = array_slice($rekap, 0, 4); 
                        if(empty($top3)): 
                        ?>
                            <div class="text-white-50 text-center py-3">Belum ada data</div>
                        <?php else: ?>
                            <div class="d-flex flex-column gap-3">
                                <?php foreach($top3 as $r): ?>
                                <div class="d-flex align-items-center justify-content-between p-2 rounded" style="background: rgba(255,255,255,0.05);">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar bg-white text-dark me-3" style="font-size: 0.9rem;">
                                            <?= substr($r['nama'], 0, 1) ?>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-white small"><?= $r['nama'] ?></div>
                                            <div class="text-white-50" style="font-size: 0.7rem;">Mahasiswa</div>
                                        </div>
                                    </div>
                                    <span class="badge bg-primary bg-gradient rounded-pill"><?= $r['jumlah'] ?></span>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="mt-4 pt-3 border-top border-secondary border-opacity-25 text-center">
                            <small class="text-white-50" style="font-size: 0.7rem;">*Data Realtime SQL GROUP BY</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass-card mt-4 animate__animated animate__fadeInUp animate__delay-0.8s">
            <div class="p-4 d-flex flex-wrap justify-content-between align-items-center border-bottom border-light border-opacity-50">
                <h5 class="fw-bold m-0"><i class="bi bi-table text-primary me-2"></i>Riwayat Peminjaman</h5>
                <div class="input-group w-auto mt-2 mt-md-0 shadow-sm" style="border-radius: 10px; overflow: hidden;">
                    <span class="input-group-text bg-white border-0"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" id="searchInput" class="form-control border-0" placeholder="Cari data..." style="min-width: 250px;">
                </div>
            </div>
            
            <div class="p-4">
                <div class="table-responsive">
                    <table class="table table-custom w-100" id="tabelPeminjaman">
                        <thead>
                            <tr>
                                <th class="ps-4">Peminjam</th>
                                <th>Buku Pinjaman</th>
                                <th>Tanggal</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($peminjaman)): ?>
                                <tr><td colspan="5" class="text-center py-5 text-muted fst-italic">Belum ada data transaksi</td></tr>
                            <?php else: ?>
                                <?php foreach($peminjaman as $row): ?>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-3 shadow-sm text-primary bg-white">
                                                <?= substr($row['nama'], 0, 1) ?>
                                            </div>
                                            <div>
                                                <div class="fw-bold text-dark"><?= $row['nama'] ?></div>
                                                <small class="text-muted" style="font-size: 0.75rem;">ID: #<?= $row['id_pinjam'] ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center text-secondary">
                                            <i class="bi bi-book me-2"></i> <?= $row['judul'] ?>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border fw-normal">
                                            <?= date('d M Y', strtotime($row['tgl_pinjam'])) ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <?php if($row['status'] == 'Dipinjam'): ?>
                                            <span class="badge bg-warning bg-opacity-25 text-warning border border-warning px-3 py-2 rounded-pill fw-bold" style="letter-spacing: 0.5px;">
                                                <i class="bi bi-hourglass-split me-1"></i> Dipinjam
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-success bg-opacity-25 text-success border border-success px-3 py-2 rounded-pill fw-bold" style="letter-spacing: 0.5px;">
                                                <i class="bi bi-check-circle me-1"></i> Kembali
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($row['status'] == 'Dipinjam'): ?>
                                            <a href="/perpus/kembali/<?= $row['id_pinjam'] ?>" class="btn btn-sm btn-success bg-gradient border-0 shadow-sm rounded-circle me-1" title="Kembalikan Buku" style="width: 32px; height: 32px; line-height: 32px; padding: 0;">
                                                <i class="bi bi-check-lg"></i>
                                            </a>
                                        <?php endif; ?>
                                        <button onclick="konfirmasiHapus(<?= $row['id_pinjam'] ?>)" class="btn btn-sm btn-danger bg-gradient border-0 shadow-sm rounded-circle" title="Hapus Data" style="width: 32px; height: 32px; line-height: 32px; padding: 0;">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="px-4 pb-4 text-end">
                <span class="badge bg-primary bg-opacity-10 text-primary">SQL JOIN Active</span>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Konfigurasi Toast (Pojok Kanan Atas)
        const Toast = Swal.mixin({
            toast: true, position: 'top-end', showConfirmButton: false, timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        // Tampilkan Notifikasi Sukses dari Controller
        <?php if (session()->getFlashdata('toast_success')) : ?>
            Toast.fire({ icon: 'success', title: '<?= session()->getFlashdata('toast_success'); ?>' });
        <?php endif; ?>

        // Fitur Pencarian Cepat
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let val = this.value.toLowerCase();
            document.querySelectorAll('#tabelPeminjaman tbody tr').forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(val) ? '' : 'none';
            });
        });

        // Konfirmasi Hapus
        function konfirmasiHapus(id) {
            Swal.fire({
                title: 'Hapus Data?', text: "Data akan hilang permanen!", icon: 'warning',
                showCancelButton: true, confirmButtonColor: '#ef4444', cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus', cancelButtonText: 'Batal',
                background: '#fff', color: '#1e293b',
                customClass: { popup: 'rounded-4 shadow-lg' }
            }).then((result) => {
                if (result.isConfirmed) { window.location.href = "/perpus/hapus/" + id; }
            })
        }
    </script>
</body>
</html>