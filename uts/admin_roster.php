<?php
include 'koneksi.php';

// Ambil semua data roster
$query = "SELECT id, nama, role, gambar FROM roster_mlbb ORDER BY id ASC";
$result = pg_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Kelola Roster ONIC</title>
    <link rel="stylesheet" href="utsStyle.css"> </head>
<body>

    <header>
        <img src="logoOnic.jpg" alt="Logo ONIC" class="logo">
        <nav>
             <ul>
                <li><a href="revisi_uts.php">Kembali ke Beranda</a></li>
            </ul>
        </nav>
    </header>

    <main class="section active" style="padding: 20px 40px;">
        <h2>Kelola Roster ONIC MLBB</h2>
        
        <a href="tambah_roster.php" class="btn-tambah">Tambah Roster Baru</a>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (pg_num_rows($result) > 0) {
                    while ($row = pg_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><img src="<?php echo htmlspecialchars($row['gambar']); ?>" alt="<?php echo htmlspecialchars($row['nama']); ?>" class="admin-img-preview"></td>
                        <td><?php echo htmlspecialchars($row['nama']); ?></td>
                        <td><?php echo htmlspecialchars($row['role']); ?></td>
                        <td class="admin-aksi">
                            <a href="edit_roster.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                            <a href="proses_crud.php?action=delete&id=<?php echo $row['id']; ?>" class="btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data roster.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2025 ONIC Esports | All Rights Reserved</p>
    </footer>

</body>
</html>
<?php pg_close($conn); ?>