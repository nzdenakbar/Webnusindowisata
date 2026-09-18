<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hubungi Kami - Nusindo Wisata</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #f8f9fa;
    }

    .intro-info {
      text-align: center;
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 60px 40px;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .intro-info h2 {
      font-size: 56px;
      color: #333;
      margin-bottom: 20px;
    }

    .intro-info h2 span {
      color: #007bff;
    }

    .btn-get-started {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 16px 32px;
      border-radius: 6px;
      text-transform: uppercase;
      font-weight: 600;
      transition: all 0.3s ease-in-out;
      text-decoration: none;
    }

    .btn-get-started:hover {
      background-color: #0056b3;
    }

    .intro-gambar2 {
      text-align: center;
      margin-top: 20px;
    }

    .intro-gambar2 img {
      max-width: 80%;
      height: auto;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    @media (min-width: 992px) {
      .intro-info,
      .intro-gambar2 {
        flex: 1;
      }

      .intro-info {
        padding: 60px 50px;
      }

      .intro-gambar2 img {
        max-width: 100%;
      }
    }

    .alert {
      padding: 20px;
      background-color: #f44336;
      color: white;
      margin-bottom: 15px;
    }

    .alert.success {
      background-color: #4CAF50;
    }

    .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }

    .closebtn:hover {
      color: black;
    }
  </style>
</head>

<body>
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.html">Nusindo Wisata</a></h1>
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

  <section id="hero" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center" data-aos="fade-up">
        <div class="col-lg-8 intro-info order-lg-first order-last" data-aos="zoom-in" data-aos-delay="100">
          <h2>Hubungi Kami</h2>
          <p>Jika Anda memiliki pertanyaan atau ingin mendapatkan informasi lebih lanjut, jangan ragu untuk menghubungi kami melalui formulir di bawah ini:</p>
          <?php
    if (isset($_GET['success'])) {
        if ($_GET['success'] == 'true') {
            echo '<div class="alert success">
                      <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                      Pesan Anda Berhasil Dikirim!
                  </div>';
        } else {
            echo '<div class="alert error">
                      <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                      Terjadi Kesalahan!
                  </div>';
        }
    }
    ?>
          <form action="kontak.php" method="post" role="form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="text-center mt-3"><button type="submit">Send Message</button></div>
          </form>
        </div>
        <div class="col-lg-4 intro-gambar2 order-lg-last order-first" data-aos="zoom-out" data-aos-delay="200">
          <img src="gambar.oi/logofix.png" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <footer id="footer">
    <div class="container d-md-flex py-4">
      <div class="me-md-auto text-center text-md-start">
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">Nusindo Wisata</a>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>
