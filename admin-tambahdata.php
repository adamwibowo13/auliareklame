<?php
include 'db.php';
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

if (isset($_POST['submit'])) {
    // Menampung inputan dari form
    $nama_jasa = mysqli_real_escape_string($conn, $_POST['nama']);
    $keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
    $status = ($_POST['status'] == 'aktif') ? 1 : 0; // Aktif = 1, Tidak Aktif = 0

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
        // Proses upload file sekaligus insert ke database
        if (move_uploaded_file($tmp_name, './img/data/' . $newname)) {
            // Insert data ke database
            $insert = mysqli_query($conn, "INSERT INTO katalog (nama_jasa, gambar, keterangan, status) VALUES (
                '$nama_jasa',
                '$newname',
                '$keterangan',
                '$status'
            )");

            if ($insert) {
                echo '<script>alert("Data berhasil disimpan!")</script>';
                echo '<script>window.location="admin-katalog.php"</script>';
            } else {
                echo 'Data Gagal Ditambahkan, Ulang Proses Tambah: ' . mysqli_error($conn);
            }
        } else {
            echo '<script>alert("Gagal mengupload file")</script>';
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
        <meta content="" name="keywords">
        <meta content="" name="description">
        <link rel="icon" href="img/img/logo_aulia.jpeg" type="image/x-icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid sticky-top px-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-light py-3 px-4">
                <a href="#" class="navbar-brand p-0">
                    <h1 class="text-secondary display-6"><img src="img/img/logo_aulia.jpeg" style="max-width: 50px; border-radius: 50%;"> Aulia Reklame</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto pt-2 pt-lg-0">
                        <a href="#" class="nav-item nav-link">Dashboard</a>
                        <a href="admin-katalog.php" class="nav-item nav-link  active">Katalog</a>
                        <a href="admin-profil.php" class="nav-item nav-link">Profil</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->

         <!-- General Form Elements -->
    <div class="form-container">
        <h3 class="text-center mb-4">Tambah Data</h3>
        <form method="POST" enctype="multipart/form-data"> <!-- Tambahkan enctype untuk upload file -->
            <div class="row mb-3">
                <label for="namaJasa" class="col-sm-2 col-form-label form-label">Nama Jasa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="gambar" class="col-sm-2 col-form-label form-label">Gambar</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="gambar" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="keterangan" class="col-sm-2 col-form-label form-label">Keterangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="keterangan" required>
                </div>
            </div>

            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0 form-label">Status</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="aktif" checked>
                        <label class="form-check-label" for="gridRadios1">Aktif</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="tidak_aktif">
                        <label class="form-check-label" for="gridRadios2">Tidak Aktif</label>
                    </div>
                </div>
            </fieldset>

            <div class="row mb-3">
                <div class="col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Submit Data</button>
                </div>
            </div>
        </form>
    </div>
    <!-- End General Form Elements -->

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
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>