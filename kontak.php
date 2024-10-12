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
                        <a href="produk.php" class="nav-item nav-link">Produk Kami</a>
                        <a href="aboutus.php" class="nav-item nav-link">Tentang Kami</a>
                        <a href="kontak.php" class="nav-item nav-link active">Kontak</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Kontak</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="home.php">Beranda</a></li>
                    <li class="breadcrumb-item active text-secondary">Kontak</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Contact Start -->
        <div class="container-fluid contact bg-light py-5">
            <div class="container py-5">
                <div class="row g-5 mb-5">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                            <p class="text-uppercase text-secondary fs-5 mb-0">Let’s Connect</p>
                            <h2 class="display-4 text-capitalize mb-3">Kirim Pesan Kamu</h2>
                            <p class="mb-0"> Silahkan hubungi tim kami untuk diskusi mengenai produk layanan. Terimakasih Telah menghubungi kami.</p>
                        </div>
                        <form id="contactForm" onsubmit="sendWhatsApp(); return false;">
                        <div class="row g-3">
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating border border-secondary">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating border border-secondary">
                                    <input type="text" class="form-control" id="address" placeholder="Your Address" required>
                                    <label for="address">Your Address</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating border border-secondary">
                                    <input type="tel" class="form-control" id="phone" placeholder="Phone" required>
                                    <label for="phone">Your Phone</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating border border-secondary">
                                    <input type="text" class="form-control" id="project" placeholder="Project" required>
                                    <label for="project">Your Project</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating border border-secondary">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject" required>
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating border border-secondary">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 160px" required></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100 py-3">Send Message</button>
                            </div>
                        </div>
                    </form>

                    <script>
                        function sendWhatsApp() {
                            const name = document.getElementById('name').value;
                            const address = document.getElementById('address').value;
                            const phone = document.getElementById('phone').value;
                            const project = document.getElementById('project').value;
                            const subject = document.getElementById('subject').value;
                            const message = document.getElementById('message').value;

                            const formattedMessage = `
                                *Hallo kak, saya berminat*
                                *Nama:* ${name}
                                *Address:* ${address}
                                *Phone:* ${phone}
                                *Project:* ${project}
                                *Subject:* ${subject}
                                *Message:* ${message}
                            `.trim();

                            const whatsappUrl = `https://wa.me/6282343313646/?text=${encodeURIComponent(formattedMessage)}`;
                            window.open(whatsappUrl, '_blank');
                        }
                    </script>

                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                        <div class="contact-map h-100 w-100">
                            <iframe class="h-100 w-100" 
                            style="height: 500px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.4929531552443!2d117.54231107417387!3d0.731730063252492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x320bc73df513d6ef%3A0xd050e135b0f0f5cc!2sAULIA%20REKLAME!5e0!3m2!1sid!2sid!4v1728666991774!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" 
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="d-inline-flex bg-white w-100 border border-secondary p-4">
                            <i class="fas fa-map-marker-alt fa-2x text-secondary me-4"></i>
                            <div>
                                <h4>Address</h4>
                                <p class="mb-0">Jl. Mulawarman, simpang 4 bengalon sepaso, barat kutim</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="d-inline-flex bg-white w-100 border border-secondary p-4">
                            <i class="fas fa-envelope fa-2x text-secondary me-4"></i>
                            <div>
                                <h4>Mail Us</h4>
                                <p class="mb-0">auliareklame20@gmaail</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="d-inline-flex bg-white w-100 border border-secondary p-4">
                            <i class="fa fa-phone-alt fa-2x text-secondary me-4"></i>
                            <div>
                                <h4>Telephone</h4>
                                <p class="mb-0">0823 4331 3646</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

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