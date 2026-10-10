<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SmartLib </title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: url('https://images.unsplash.com/photo-1507842217121-9eac63eebae4?q=80&w=2500&auto=format&fit=crop') no-repeat center center/cover;
            position: relative;
            overflow: hidden;
        }

        /* Overlay Gelap dengan Gradasi supaya tulisan terbaca */
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(30, 58, 138, 0.8) 100%);
            z-index: 1;
        }

        /* Kartu Kaca (Glassmorphism) */
        .glass-card {
            position: relative;
            z-index: 10;
            background: rgba(255, 255, 255, 0.1); /* Transparan */
            backdrop-filter: blur(20px); /* Efek Blur di belakangnya */
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 24px;
            padding: 3rem;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .brand-title {
            font-family: 'Poppins', sans-serif;
            letter-spacing: -0.5px;
        }

        /* Input Field Custom */
        .form-floating > .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            border-radius: 12px;
        }
        
        .form-floating > .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #60a5fa;
            box-shadow: 0 0 0 4px rgba(96, 165, 250, 0.1);
            color: #fff;
        }

        .form-floating > label {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-control::placeholder {
            color: transparent; /* Hilangkan placeholder default biar rapi */
        }

        /* Tombol Login Gradient */
        .btn-login {
            background: linear-gradient(to right, #3b82f6, #2563eb);
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.4);
            background: linear-gradient(to right, #2563eb, #1d4ed8);
        }

        /* Dekorasi Lingkaran Glowing di Background */
        .glow-circle {
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(59,130,246,0.4) 0%, rgba(0,0,0,0) 70%);
            border-radius: 50%;
            z-index: 2;
            animation: float 6s ease-in-out infinite;
        }
        .glow-1 { top: -50px; left: -50px; }
        .glow-2 { bottom: -50px; right: -50px; animation-delay: 1s; background: radial-gradient(circle, rgba(236, 72, 153, 0.3) 0%, rgba(0,0,0,0) 70%); }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(20px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body>

    <div class="glow-circle glow-1"></div>
    <div class="glow-circle glow-2"></div>

    <div class="glass-card animate__animated animate__zoomIn">
        
        <div class="text-center mb-5">
            <div class="d-inline-flex align-items-center justify-content-center bg-white bg-opacity-10 p-3 rounded-circle mb-3 shadow-sm border border-white border-opacity-10">
                <i class="bi bi-book-half fs-1 text-white"></i>
            </div>
            <h2 class="text-white fw-bold brand-title mb-0">SmartLib <span class="text-info"></span></h2>
            <p class="text-white text-opacity-75 small mt-2">Masuk untuk mengelola perpustakaan</p>
        </div>

        <form action="/login/auth" method="post">
            
            <div class="form-floating mb-3 animate__animated animate__fadeInUp animate__delay-0.5s">
                <input type="text" name="username" class="form-control" id="floatingUser" placeholder="Username" required autofocus>
                <label for="floatingUser"><i class="bi bi-person me-2"></i>Username</label>
            </div>

            <div class="form-floating mb-4 animate__animated animate__fadeInUp animate__delay-0.7s">
                <input type="password" name="password" class="form-control" id="floatingPass" placeholder="Password" required>
                <label for="floatingPass"><i class="bi bi-lock me-2"></i>Password</label>
            </div>

            <button type="submit" class="btn btn-primary btn-login w-100 text-white mb-4 animate__animated animate__fadeInUp animate__delay-0.9s">
                MASUK SEKARANG <i class="bi bi-arrow-right-short fs-5 align-middle ms-1"></i>
            </button>

        </form>

        <div class="text-center mt-3 border-top border-white border-opacity-10 pt-3">
            <small class="text-white text-opacity-50">© 2025 Kelompok hore hore</small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // --- TOAST ERROR NOTIFICATION ---
        // Desain Toast disesuaikan dengan tema Gelap
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 4000,
            background: '#1e293b', // Warna gelap
            color: '#fff', // Teks putih
            iconColor: '#f87171', // Ikon merah terang
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        // Tangkap Flashdata Error dari Controller
        <?php if (session()->getFlashdata('toast_error')) : ?>
            Toast.fire({
                icon: 'error',
                title: '<?= session()->getFlashdata('toast_error'); ?>'
            });
        <?php endif; ?>
    </script>

</body>
</html>