<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];
if (empty($id) || !is_numeric($id)) {
    header('Location: admin_roster.php');
    exit;
}

// Ambil data roster berdasarkan ID
// Kita gunakan pg_query_params untuk keamanan dari SQL Injection
$query = "SELECT id, nama, role, gambar FROM roster_mlbb WHERE id = $1";
$result = pg_query_params($conn, $query, array($id));
$row = pg_fetch_assoc($result);

if (!$row) {
    echo "Data tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Roster</title>
    <link rel="stylesheet" href="utsStyle.css">
</head>
<body>

    <header>
        <img src="logoOnic.jpg" alt="Logo ONIC" class="logo">
        <nav>
             <ul>
                <li><a href="admin_roster.php">Kembali ke Admin</a></li>
            </ul>
        </nav>
    </header>

    <main class="section active" style="padding: 20px 40px;">
        <h2>Edit Roster: <?php echo htmlspecialchars($row['nama']); ?></h2>
        
        <form action="proses_crud.php" method="POST" enctype="multipart/form-data" class="admin-form">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="gambar_lama" value="<?php echo $row['gambar']; ?>">
            
            <div class="form-group">
                <label for="nama">Nama Pemain:</label>
                <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" id="role" name="role" value="<?php echo htmlspecialchars($row['role']); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Gambar Saat Ini:</label>
                <img src="<?php echo htmlspecialchars($row['gambar']); ?>" alt="" class="admin-img-preview">
            </div>

            <div class="form-group">
                <label for="gambar">Upload Gambar Baru (Kosongkan jika tidak ingin ganti):</label>
                <input type="file" id="gambar" name="gambar" accept="image/*">
            </div>
            
            <button type="submit" class="btn-edit">Update</button>
        </form>
    </main>

</body>
</html>
<?php pg_close($conn); ?>