<?php
include 'db.php';
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

// Check if 'no' is set in session
if (!isset($_SESSION['id'])) {
    echo '<script>alert("Session expired. Please log in again.")</script>';
    echo '<script>window.location="login.php"</script>';
    exit();
}

// Fetch the admin data from the database
$admin_id = $_SESSION['id']; // Assuming admin ID is stored in session as 'id'
$query = mysqli_query($conn, "SELECT nama, username FROM tb_admin WHERE no = '$admin_id'");

if (!$query) {
    die("Query failed: " . mysqli_error($conn)); // Error handling for the query
}

$userData = mysqli_fetch_assoc($query);
if (!$userData) {
    die("No user found with this ID."); // Handle case where no user is found
}

// Handle form submission for editing profile
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Optionally hash the password before updating
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Update the database
    $update = mysqli_query($conn, "UPDATE tb_admin SET nama='$name', username='$username', password='$hashed_password' WHERE no='$admin_id'");

    if ($update) {
        echo '<script>alert("Profile updated successfully!"); window.location="admin-profil.php";</script>';
        // Optionally, you can redirect or refresh the page
    } else {
        echo '<script>alert("Failed to update profile: ' . mysqli_error($conn) . '")</script>';
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
                <a href="admin-katalog.php" class="nav-item nav-link">Katalog</a>
                <a href="admin-profil.php" class="nav-item nav-link active">Profil</a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar & Hero End -->

<section class="section profile">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body pt-3">
                    <!-- Profile Edit Form -->
                    <h5 class="card-title">Edit Profile</h5>
                    <form method="POST">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="name" type="text" class="form-control" id="name" value="<?php echo htmlspecialchars($userData['nama']); ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="username" type="text" class="form-control" id="username" value="<?php echo htmlspecialchars($userData['username']); ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-lg-3 col-form-label">Password</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="password" type="password" class="form-control" id="password" placeholder="Enter new password">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form><!-- End Profile Edit Form -->
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
