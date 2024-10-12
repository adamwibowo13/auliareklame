<?php
// Memulai session
session_start();

// Cek apakah form sudah disubmit
if (isset($_POST['submit'])) {
    include 'db.php'; // Pastikan file koneksi database sudah benar

    // Mengambil inputan user dari form login
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    // Query untuk cek user di database
    $query = "SELECT * FROM tb_admin WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $user, $pass);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Jika username dan password cocok
    if (mysqli_num_rows($result) > 0) {
        $d = mysqli_fetch_object($result);
        
        // Menyimpan informasi user di session
        $_SESSION['status_login'] = true;
        $_SESSION['a_global'] = $d;
        $_SESSION['id'] = $d->no;
        $_SESSION['nama'] = $d->nama; // Kolom nama di tb_admin

        // Redirect ke halaman home
        echo '<script>window.location="admin-dashboard.php"</script>';
    } else {
        echo '<script>alert("Username atau Password salah!")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login Page</title>

    <!-- Favicons -->
    <link href="assets/img/logo-qt1.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Nunito|Poppins" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="css/login/bootstrap.min.css" rel="stylesheet">
    <link href="css/login/style.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                <p class="text-center small">Enter your username & password to login</p>
                            </div>

                            <!-- Form Login -->
                            <form class="row g-3 needs-validation" method="POST" novalidate>
                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                                        <div class="invalid-feedback">Please enter your username.</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" name="submit" type="submit">Login</button>
                                </div>

                                <div class="col-12">
                                    <p class="small mb-0">Don't have an account? Contact Admin</p>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </main>
</body>
</html>
