<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi UKM Polman Bandung</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #004aad;
            color: white;
            min-height: 100vh;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /* Gambar parallax */
        .parallax-img {
            max-width: 550px; /* ✅ lebih besar */
            width: 100%;
            transition: transform 0.2s ease-out;
            will-change: transform;
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-outline-light:hover {
            color: #004aad;
            background-color: #fff;
        }
    </style>
</head>
<body>

<section class="hero-section">
    <div class="container hero-content py-5">
        <div class="row align-items-center">
            {{-- Kolom kiri --}}
            <div class="col-lg-6 col-md-12 text-start text-lg-start mb-5 mb-lg-0">
                <h1 class="fw-bold mb-3 display-5">Aplikasi UKM Polman Bandung</h1>
                <p class="lead mb-4">
                    Platform manajemen Unit Kegiatan Mahasiswa di Politeknik Manufaktur Bandung.
                    Kelola data anggota, kegiatan, dan informasi UKM dengan mudah.
                </p>
                <div class="d-flex gap-3">
                    <a href="{{ route('login') }}" class="btn btn-warning btn-lg rounded-pill px-4 fw-semibold">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg rounded-pill px-4 fw-semibold">
                        Daftar
                    </a>
                </div>
            </div>

            {{-- Kolom kanan --}}
            <div class="col-lg-6 col-md-12 text-center position-relative">
                <img src="{{ asset('images/ukm-hero.png') }}" alt="Ilustrasi UKM"
                     class="img-fluid parallax-img" id="heroImage">
            </div>
        </div>
    </div>
</section>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

{{-- Parallax movement (seperti Polman) --}}
<script>
document.addEventListener("DOMContentLoaded", () => {
    const img = document.getElementById("heroImage");
    let targetX = 0, targetY = 0, currentX = 0, currentY = 0;

    document.addEventListener("mousemove", (e) => {
        const centerX = window.innerWidth / 2;
        const centerY = window.innerHeight / 2;
        targetX = (e.clientX - centerX) * 0.05;
        targetY = (e.clientY - centerY) * 0.05;
    });

    function animate() {
        currentX += (targetX - currentX) * 0.08;
        currentY += (targetY - currentY) * 0.08;
        img.style.transform = `translate(${currentX}px, ${currentY}px)`;
        requestAnimationFrame(animate);
    }
    animate();
});
</script>

</body>
</html>