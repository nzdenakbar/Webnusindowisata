<?php
// Data paket wisata dan halaman tujuan
$paket_wisata = [
    'Paket Wisata Lombok' => 'paketwisatalombok.html',
    'Paket Wisata Bali' => 'paketwisatabali.html',
    'Paket Wisata Yogyakarta' => 'paketwisatayogyakarta.html'
];

// Ambil kata kunci pencarian
$search = $_GET['search'] ?? '';

if ($search !== '') {
    foreach ($paket_wisata as $nama_paket => $halaman) {
        if (stripos($nama_paket, $search) !== false) {
            header("Location: $halaman");
            exit();
        }
    }
    // Jika tidak ada hasil yang sesuai, arahkan ke halaman tidak ditemukan atau tampilkan pesan kesalahan
    $not_found = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Hasil Pencarian - Nusindo Wisata</title>
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-container input[type=text] {
            padding: 10px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
            border-bottom: 2px solid #007bff;
        }
        .search-container input[type=text]:focus {
            outline: none;
        }
        .search-container button {
            padding: 10px 20px;
            margin-top: 8px;
            background: #007bff;
            font-size: 17px;
            border: none;
            cursor: pointer;
            color: white;
        }
        .search-container button:hover {
            background: #0056b3;
        }
        #hero {
            background: url('gambar.oi/sssssssss.JPG') center center no-repeat;
            background-size: cover;
            padding: 200px 0;
            text-align: center;
        }
        #hero h2 {
            color: #fff;
        }
        .back-button {
            padding: 10px 20px;
            margin-top: 20px;
            background: #28a745;
            font-size: 17px;
            border: none;
            cursor: pointer;
            color: white;
            text-decoration: none;
        }
        .back-button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="index.html">Object Wisata</a></h1>
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="index.html">Home</a></li>
                    <li><a class="nav-link scrollto" href="tentangkami.html">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto" href="paketwisata.html">Paket Wisata</a></li>
                    <li><a class="nav-link active" href="info.html">informasi</a></li>
                    <li class="dropdown">
                        <a href="objectwisata.html"><span>Object Wisata</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="paketwisatalombok.html">Paket Wisata Lombok</a></li>
                            <li><a href="paketwisatabali.html">Paket Wisata Bali</a></li>
                            <li><a href="paketwisatayogyakarta.html">Paket Wisata Yogyakarta</a></li>
                            <li><a href="paketwisatabandung.html">Paket Wisata Bandung</a></li>
                            <li><a href="paketwisatajakarta.html">Paket Wisata Jakarta</a></li>
                            <li><a href="paketwisatabromo.html">Paket Wisata Tour Bromo</a></li>
                            <li><a href="paketwisatabromomalang.html">Paket Wisata Bromo-Malang</a></li>
                            <li><a href="paketwisatamalang.html">Paket Wisata Tour Malang</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="formkontak.php">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>

    <section id="hero">
        <div class="container" data-aos="fade-up">
            <div class="search-container">
                <form action="search.php" method="get">
                    <input type="text" placeholder="Cari Paket Wisata..." name="search" value="<?php echo htmlspecialchars($search); ?>">
                    <button type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <div class="row justify-content-center align-self-center" data-aos="fade-up">
                <div class="col-lg-6 intro-info order-lg-first order-last" data-aos="zoom-in" data-aos-delay="100">
                    <h2>Hasil Pencarian</h2>
                    <?php
                    if (isset($not_found) && $not_found) {
                        echo "<p>Tidak ada hasil untuk pencarian Anda.</p>";
                        echo '<a href="objectwisata.html" class="back-button">Kembali ke Object Wisata</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
