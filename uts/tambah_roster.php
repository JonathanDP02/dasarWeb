<!DOCTYPE html>
<html>
<head>
    <title>Tambah Roster Baru</title>
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
        <h2>Tambah Roster Baru</h2>
        
        <form action="proses_crud.php" method="POST" enctype="multipart/form-data" class="admin-form">
            <input type="hidden" name="action" value="create">
            
            <div class="form-group">
                <label for="nama">Nama Pemain:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            
            <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" id="role" name="role" required>
            </div>
            
            <div class="form-group">
                <label for="gambar">Upload Gambar:</label>
                <input type="file" id="gambar" name="gambar" accept="image/*" required>
            </div>
            
            <button type="submit" class="btn-tambah">Simpan</button>
        </form>
    </main>

</body>
</html>