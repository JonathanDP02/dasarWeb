<?php
include 'koneksi.php';

$upload_dir = 'uploads/'; // Folder tempat menyimpan gambar

// Fungsi untuk menangani upload gambar
function uploadGambar($file) {
    global $upload_dir;
    
    // Periksa apakah ada file yang di-upload
    if (empty($file['name'])) {
        return null; // Tidak ada file baru
    }

    $target_name = uniqid() . '-' . basename($file["name"]);
    $target_file = $upload_dir . $target_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file adalah gambar
    $check = @getimagesize($file["tmp_name"]);
    if($check === false) {
        die("Error: File bukan gambar.");
    }

    // Cek ekstensi file (opsional tapi bagus)
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        die("Error: Maaf, hanya file JPG, JPEG, & PNG yang diizinkan.");
    }

    // Pindahkan file
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return $target_file; // Kembalikan path file yang berhasil di-upload
    } else {
        die("Error: Terjadi kesalahan saat meng-upload file.");
    }
}

// Fungsi untuk menghapus file gambar
function hapusGambar($filepath) {
    if (file_exists($filepath) && is_file($filepath)) {
        unlink($filepath);
    }
}


// ROUTING LOGIC (CREATE, UPDATE, DELETE)

// CREATE
if (isset($_POST['action']) && $_POST['action'] == 'create') {
    $nama = $_POST['nama'];
    $role = $_POST['role'];
    
    // Panggil fungsi upload gambar
    $gambar_path = uploadGambar($_FILES['gambar']);
    
    if ($gambar_path === null) {
        die("Error: Gambar wajib di-upload untuk roster baru.");
    }

    // Gunakan pg_query_params untuk keamanan
    $query = "INSERT INTO roster_mlbb (nama, role, gambar) VALUES ($1, $2, $3)";
    $result = pg_query_params($conn, $query, array($nama, $role, $gambar_path));

    if ($result) {
        header('Location: admin_roster.php');
    } else {
        echo "Gagal menambah data: " . pg_last_error($conn);
    }
}

// UPDATE
else if (isset($_POST['action']) && $_POST['action'] == 'update') {
    $id_roster = $_POST['id'];
    $nama = $_POST['nama'];
    $role = $_POST['role'];
    $gambar_lama = $_POST['gambar_lama'];

    $gambar_path = $gambar_lama; // Default pakai gambar lama

    // Cek apakah ada gambar baru di-upload
    if (!empty($_FILES['gambar']['name'])) {
        $gambar_path_baru = uploadGambar($_FILES['gambar']);
        if ($gambar_path_baru) {
            hapusGambar($gambar_lama); // Hapus gambar lama
            $gambar_path = $gambar_path_baru; // Gunakan path gambar baru
        }
    }

    $query = "UPDATE roster_mlbb SET nama = $1, role = $2, gambar = $3 WHERE id = $4";
    $result = pg_query_params($conn, $query, array($nama, $role, $gambar_path, $id_roster));

    if ($result) {
        header('Location: admin_roster.php');
    } else {
        echo "Gagal meng-update data: " . pg_last_error($conn);
    }
}

// DELETE
else if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id_roster = $_GET['id'];

    // 1. Ambil path gambar sebelum dihapus dari DB
    $query_select = "SELECT gambar FROM roster_mlbb WHERE id = $1";
    $res_select = pg_query_params($conn, $query_select, array($id_roster));
    $row = pg_fetch_assoc($res_select);
    
    if ($row) {
        // 2. Hapus file gambar dari server
        hapusGambar($row['gambar']);
    }

    // 3. Hapus data dari database
    $query_delete = "DELETE FROM roster_mlbb WHERE id = $1";
    $result = pg_query_params($conn, $query_delete, array($id_roster));

    if ($result) {
        header('Location: admin_roster.php');
    } else {
        echo "Gagal menghapus data: " . pg_last_error($conn);
    }
}

pg_close($conn);
?>