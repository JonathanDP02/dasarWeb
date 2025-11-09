<?php include 'views/header.php'; ?>

<h2>Cari Karyawan Berdasarkan Rentang Gaji</h2>
<p style="color:#666;">Gunakan form di bawah untuk mencari karyawan dengan gaji tertentu.</p>

<form method="POST" style="margin-bottom: 2rem;">
    <div class="form-group">
        <label for="min_salary" class="form-label">Gaji Minimum (Rp)</label>
        <input type="number" name="min_salary" id="min_salary" class="form-input" required placeholder="Contoh: 6000000">
    </div>

    <div class="form-group">
        <label for="max_salary" class="form-label">Gaji Maksimum (Rp)</label>
        <input type="number" name="max_salary" id="max_salary" class="form-input" required placeholder="Contoh: 9000000">
    </div>

    <button type="submit" class="btn btn-primary">Tampilkan</button>
</form>

<?php if (isset($results)): ?>
    <h3>Hasil Pencarian</h3>
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Departemen</th>
                <th>Posisi</th>
                <th>Gaji</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($results->rowCount() > 0): ?>
                <?php while ($row = $results->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= htmlspecialchars($row['full_name']); ?></td>
                        <td><?= htmlspecialchars($row['department']); ?></td>
                        <td><?= htmlspecialchars($row['job_position']); ?></td>
                        <td>Rp <?= number_format($row['salary'], 0, ',', '.'); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5" style="text-align:center;">Tidak ada data ditemukan.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php include 'views/footer.php'; ?>
