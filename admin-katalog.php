<?php
include 'db.php';
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Aulia Reklame</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="img/img/logo_aulia.jpeg" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

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

    <!-- Navbar Start -->
    <div class="container-fluid sticky-top px-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-light py-3 px-4">
            <a href="#" class="navbar-brand p-0">
                <h1 class="text-secondary display-6"><img src="img/img/logo_aulia.jpeg" style="max-width: 50px; border-radius: 50%;"> Aulia Reklame</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto pt-2 pt-lg-0">
                    <a href="admin-dashboard.php" class="nav-item nav-link">Dashboard</a>
                    <a href="#" class="nav-item nav-link active">Katalog</a>
                    <a href="admin-profil.php" class="nav-item nav-link">Profil</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Katalog</h5>
                        <button type="button" class="btn btn-primary" onclick="window.location.href='admin-tambahdata.php';">
                            <i class="bx bxs-duplicate"></i> Tambahkan Data
                        </button>

                        <p>Data berikut adalah data katalog yang muncul di halaman website, rubah atau hapus dengan bijak.</p>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><b>Nama Jasa</b></th>
                                    <th>Gambar</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Ambil data dari database
                                $result = mysqli_query($conn, "SELECT * FROM katalog");
                                while ($data = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars($data['nama_jasa']) . '</td>';
                                    echo '<td><img src="img/data/' . htmlspecialchars($data['gambar']) . '" alt="Gambar" style="max-width: 100px;"></td>';
                                    echo '<td>' . htmlspecialchars($data['keterangan']) . '</td>';
                                    echo '<td>' . ($data['status'] == 1 ? 'Aktif' : 'Tidak Aktif') . '</td>';
                                    echo '<td>
                                            <button type="button" class="btn btn-warning" onclick="window.location.href=\'admin-editkatalog.php?no=' . $data['no'] . '\';"><i class="bi bi-exclamation-triangle"></i> Edit</button>
                                            <button type="button" class="btn btn-danger" onclick="window.location.href=\'admin-hapuskatalog.php?no=' . $data['no'] . '\';"><i class="bi bi-exclamation-octagon"></i> Hapus</button>
                                          </td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

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
