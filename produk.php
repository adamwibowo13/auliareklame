<?php
    // Include the database connection file
    include 'db.php';
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
                        <a href="home.php" class="nav-item nav-link">Beranda</a>
                        <a href="produk.php" class="nav-item nav-link active">Produk Kami</a>
                        <a href="aboutus.php" class="nav-item nav-link">Tentang Kami</a>
                        <a href="kontak.php" class="nav-item nav-link">Kontak</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Produk Layanan Kami</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="home.php">Beranda</a></li>
                    <li class="breadcrumb-item active text-secondary">Produk Layanan Kami</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

    

        <!-- Services Start -->
<div class="container-fluid service bg-light pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <p class="text-uppercase text-secondary fs-5 mb-0"> <br></p>
            <h2 class="display-4 text-capitalize mb-3"></h2>
        </div>
        <div class="row g-4">
            <?php
            // Fetch services where status = 1
            $sql = "SELECT nama_jasa, gambar, keterangan FROM katalog WHERE status = 1";
            $result = mysqli_query($conn, $sql);

            // Check if there are results
            if (mysqli_num_rows($result) > 0) {
                // Output data for each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s">';
                    echo '    <div class="service-item">';
                    echo '        <div class="service-img">';
                    // Mengubah path gambar sesuai dengan lokasi file
                    echo '            <img src="img/data/' . htmlspecialchars($row['gambar']) . '" class="img-fluid w-100" alt="Image">';
                    echo '        </div>';
                    echo '        <div class="service-content text-center p-4">';
                    echo '            <div class="bg-secondary btn-xl-square mx-auto" style="width: 120px; height: 120px;">';
                    echo '                <i class="fa fa-shopping-cart text-primary fa-4x"></i>'; // Ganti icon sesuai kebutuhan
                    echo '            </div>';
                    echo '            <a href="#" class="d-block fs-4 my-4">' . htmlspecialchars($row['nama_jasa']) . '</a>';
                    echo '            <p class="text-white mb-4">' . htmlspecialchars($row['keterangan']) . '</p>';
                    echo '            <a class="btn btn-secondary py-2 px-4" href="#">Read More</a>';
                    echo '        </div>';
                    echo '        <div class="service-tytle">'; // Ubah 'service-tytle' menjadi 'service-title' jika itu kesalahan pengetikan
                    echo '            <div class="d-flex align-items-center justify-content-start ps-4 w-100">';
                    echo '                <h4>' . htmlspecialchars($row['nama_jasa']) . '</h4>';
                    echo '            </div>';
                    echo '            <div class="btn-xl-square bg-secondary p-4" style="width: 80px; height: 80px;">';
                    echo '                <i class="fa fa-shopping-cart text-primary fa-2x"></i>'; // Ganti icon sesuai kebutuhan
                    echo '            </div>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
            } else {
                // Display message when no services are found
                echo '<div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">';
                echo '    <p class="text-danger fs-5">Belum ada layanan.</p>';
                echo '</div>';
            }

            // Close connection
            mysqli_close($conn);
            ?>
            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                <a class="btn btn-secondary py-3 px-5 mt-4" href="#">More Services</a>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->



        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column align-items-center">
                            <img src="img/img/logo_aulia.jpeg" alt="Aulia Reklame Logo" class="footer-logo mb-3" style="max-height: 200px; border-radius:50%;">
                            <h4 class="text-white mb-4">Aulia Reklame</h4>
                            <p class="text-white text-center mb-3">Membuat merek Anda bersinar!</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Explore</h4>
                            <a href="home.php"><i class="fas fa-angle-right me-2"></i> Beranda</a>
                            <a href="produk.php"><i class="fas fa-angle-right me-2"></i> Produk Kami</a>
                            <a href="aboutus.php"><i class="fas fa-angle-right me-2"></i> Tentang Kami</a>
                            <a href="kontak.php"><i class="fas fa-angle-right me-2"></i> Kontak</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Katalog Produk Kami</h4>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Stempel Kilat</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Neon Box</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Papan Nama</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Spanduk</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Stiker Label</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Cutting Stiker</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Rambu-Rambu</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Name Tag</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Kontak Info</h4>
                            <a href=""><i class="fas fa-phone me-2"></i> 0823 4331 3646</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> auliareklame20@gmaail</a>
                            <a href="" class="mb-3"><i class="fab fa-facebook me-2"></i> aulia reklame</a>
                            <a href=""><i class="fa fa-map-marker-alt me-2"></i> Jl. Mulawarman, simpang 4 bengalon sepaso, barat kutim </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        
        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-body"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>Aulia Reklame</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-body">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom text-white" href="#">Prodigy Digital Solution</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-secondary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
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