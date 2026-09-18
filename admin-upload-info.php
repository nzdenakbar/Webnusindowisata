<?php
// Aktifkan error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$jsonFile = 'data/info.json';

// Fungsi untuk ambil data JSON
function getData($jsonFile) {
    if (file_exists($jsonFile)) {
        $json = file_get_contents($jsonFile);
        return json_decode($json, true);
    }
    return [];
}

// Fungsi untuk simpan data ke JSON
function saveData($jsonFile, $data) {
    file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));
}

// Handle upload info
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_info'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $targetDir = "gambar.oi/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Buat folder jika belum ada
    }

    $fileName = basename($_FILES["gambar"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Validasi gambar
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check === false) {
        $message = "File bukan gambar.";
        $uploadOk = 0;
    }

    // Cek ekstensi file
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedTypes)) {
        $message = "Hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.";
        $uploadOk = 0;
    }

    if ($uploadOk && move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFilePath)) {
        $data = getData($jsonFile);
        $data[] = ["gambar" => $fileName, "judul" => $judul, "deskripsi" => $deskripsi];
        saveData($jsonFile, $data);
        $message = "Info berhasil ditambahkan!";
    } else {
        if (empty($message)) {
            $message = "Gagal upload gambar.";
        }
    }
}

// Handle hapus data
if (isset($_GET['hapus'])) {
    $index = intval($_GET['hapus']);
    $data = getData($jsonFile);

    if (isset($data[$index])) {
        $gambar = $data[$index]['gambar'];
        if (file_exists("gambar.oi/" . $gambar)) {
            unlink("gambar.oi/" . $gambar);
        }
        array_splice($data, $index, 1);
        saveData($jsonFile, $data);
        $message = "Info berhasil dihapus!";
    }
}

$data = getData($jsonFile);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Info & Promo</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 40px;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .info-card {
            display: flex;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 15px;
            background: #fff;
            overflow: hidden;
        }

        .info-card img {
            width: 150px;
            height: 100%;
            object-fit: cover;
        }

        .info-details {
            flex: 1;
            padding: 15px;
        }

        .info-details h5 {
            margin-bottom: 5px;
        }

        .info-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        .btn-danger {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>Upload Info / Promo Baru</h2>

        <?php if (!empty($message)): ?>
            <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="submit_info" value="1">
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control" name="judul" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Gambar</label>
                <input class="form-control" type="file" name="gambar" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Info</button>
        </form>
    </div>

    <h4>Daftar Info / Promo</h4>
    <?php if (empty($data)): ?>
        <p>Tidak ada info tersedia.</p>
    <?php endif; ?>
    
    <?php foreach ($data as $i => $item): ?>
        <div class="info-card">
            <img src="gambar.oi/<?= htmlspecialchars($item['gambar']) ?>" alt="Promo">
            <div class="info-details">
                <h5><?= htmlspecialchars($item['judul']) ?></h5>
                <p><?= htmlspecialchars($item['deskripsi']) ?></p>
            </div>
            <div class="info-actions">
                <a href="?hapus=<?= $i ?>" onclick="return confirm('Yakin ingin menghapus info ini?')" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
