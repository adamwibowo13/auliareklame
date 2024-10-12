<?php
include 'db.php';

if (isset($_GET['no'])) {
    $id = $_GET['no']; // Ambil nilai id dari parameter URL

    // Ambil data gambar sebelum menghapus
    $query = mysqli_query($conn, "SELECT gambar FROM katalog WHERE no = '".$id."'");
    $data = mysqli_fetch_assoc($query);

    // Hapus gambar dari direktori jika ada
    if ($data && file_exists('./img/data/' . $data['gambar'])) {
        unlink('./img/data/' . $data['gambar']);
    }

    // Lakukan proses penghapusan data berdasarkan id
    $delete = mysqli_query($conn, "DELETE FROM katalog WHERE no = '".$id."' ");

    // Redirect kembali ke halaman admin-katalog.php setelah penghapusan selesai
    if ($delete) {
        echo '<script>alert("Data berhasil dihapus"); window.location="admin-katalog.php";</script>';
    } else {
        echo '<script>alert("Gagal menghapus data"); window.location="admin-katalog.php";</script>';
    }
} else {
    // Jika tidak ada parameter id yang diterima, redirect kembali ke halaman admin-katalog.php
    echo '<script>window.location="admin-katalog.php"</script>';
}
?>
