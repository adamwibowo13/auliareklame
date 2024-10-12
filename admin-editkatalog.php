<?php
include 'db.php';
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

// Cek apakah ada ID yang dikirimkan
if (isset($_GET['no'])) {
    $id = intval($_GET['no']);
    
    // Ambil data dari database
    $query = mysqli_query($conn, "SELECT * FROM katalog WHERE no = $id");
    $data = mysqli_fetch_assoc($query);

    // Jika data tidak ditemukan
    if (!$data) {
        echo '<script>alert("Data tidak ditemukan!")</script>';
        echo '<script>window.location="admin-katalog.php"</script>';
        exit;
    }
}

// Proses update data
if (isset($_POST['submit'])) {
    $nama_jasa = mysqli_real_escape_string($conn, $_POST['nama']);
    $keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
    $status = ($_POST['status'] == 'aktif') ? 1 : 0; // Aktif = 1, Tidak Aktif = 0

    // Ambil nama gambar lama
    $gambar_lama = $data['gambar'];

    // Cek apakah ada file gambar yang diupload
    if (!empty($_FILES['gambar']['name'])) {
        // Menampung data file yang diupload
        $filename = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];

        // Mendapatkan ekstensi file
        $type1 = explode('.', $filename);
        $type2 = strtolower(end($type1));

        // Menyusun nama file baru
        $newname = 'img_' . time() . '.' . $type2;

        // Menampung data format file yang diinginkan
        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

        // Validasi format file
        if (!in_array($type2, $tipe_diizinkan)) {
            echo '<script>alert("Format file tidak diizinkan")</script>';
        } else {
            // Proses upload file
            if (move_uploaded_file($tmp_name, './img/data/' . $newname)) {
                // Hapus gambar lama dari direktori
                if (file_exists('./img/data/' . $gambar_lama)) {
                    unlink('./img/data/' . $gambar_lama);
                }

                // Update data ke database
                $update = mysqli_query($conn, "UPDATE katalog SET 
                    nama_jasa = '$nama_jasa',
                    gambar = '$newname',
                    keterangan = '$keterangan',
                    status = '$status'
                    WHERE no = $id
                ");

                if ($update) {
                    echo '<script>alert("Data berhasil diperbarui!")</script>';
                    echo '<script>window.location="admin-katalog.php"</script>';
                } else {
                    echo 'Data Gagal Diperbarui: ' . mysqli_error($conn);
                }
            } else {
                echo '<script>alert("Gagal mengupload file")</script>';
            }
        }
    } else {
        // Update data tanpa mengubah gambar
        $update = mysqli_query($conn, "UPDATE katalog SET 
            nama_jasa = '$nama_jasa',
            keterangan = '$keterangan',
            status = '$status'
            WHERE no = $id
        ");

        if ($update) {
            echo '<script>alert("Data berhasil diperbarui!")</script>';
            echo '<script>window.location="admin-katalog.php"</script>';
        } else {
            echo 'Data Gagal Diperbarui: ' . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Aulia Reklame</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="img/img/logo_aulia.jpeg" type="image/x-icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<!-- Navbar & Hero Start -->
<div class="container-fluid sticky-top px-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-light py-3 px-4">
        <a href="#" class="navbar-brand p-0">
            <h1 class="text-secondary display-6"><img src="img/img/logo_aulia.jpeg" style="max-width: 50px; border-radius: 50%;"> Aulia Reklame</h1>
        </a>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav ms-auto pt-2 pt-lg-0">
                <a href="#" class="nav-item nav-link">Dashboard</a>
                <a href="admin-katalog.php" class="nav-item nav-link active">Katalog</a>
                <a href="admin-profil.php" class="nav-item nav-link">Profil</a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar & Hero End -->

<!-- Edit Form -->
<div class="form-container">
    <h3 class="text-center mb-4">Edit Data</h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="namaJasa" class="col-sm-2 col-form-label form-label">Nama Jasa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" value="<?php echo htmlspecialchars($data['nama_jasa']); ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="gambar" class="col-sm-2 col-form-label form-label">Gambar (biarkan kosong jika tidak diubah)</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile" name="gambar">
                <img src="./img/data/<?php echo htmlspecialchars($data['gambar']); ?>" alt="Current Image" style="width: 100px; margin-top: 10px;">
            </div>
        </div>

        <div class="row mb-3">
            <label for="keterangan" class="col-sm-2 col-form-label form-label">Keterangan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="keterangan" value="<?php echo htmlspecialchars($data['keterangan']); ?>" required>
            </div>
        </div>

        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0 form-label">Status</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="aktif" <?php echo ($data['status'] == 1) ? 'checked' : ''; ?>>
                    <label class="form-check-label">Aktif</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="tidak_aktif" <?php echo ($data['status'] == 0) ? 'checked' : ''; ?>>
                    <label class="form-check-label">Tidak Aktif</label>
                </div>
            </div>
        </fieldset>

        <div class="row mb-3">
            <div class="col-sm-10">
                <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
            </div>
        </div>
    </form>
</div>
<!-- End Edit Form -->

<!-- Copyright Start -->
<div class="container-fluid copyrightadmin py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-6 text-center text-md-start mb-md-0">
                <span class="text-body"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>Aulia Reklame</a>, All right reserved.</span>
            </div>
            <div class="col-md-6 text-center text-md-end text-body">
                Designed By <a class="border-bottom text-white" href="#">Prodigy Digital Solution</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->

<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>