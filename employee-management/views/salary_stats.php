<?php
include 'views/header.php';
?>

<h2>Statistik Gaji per Departemen</h2>
<p style="color:#666;">Menampilkan rata-rata, gaji tertinggi, dan gaji terendah di setiap departemen.</p>

<table class="data-table">
    <thead>
        <tr>
            <th>Departemen</th>
            <th>Rata-rata Gaji</th>
            <th>Gaji Tertinggi</th>
            <th>Gaji Terendah</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $salary_stats->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><strong><?= htmlspecialchars($row['department']) ?></strong></td>
            <td>Rp <?= number_format($row['avg_salary'], 0, ',', '.') ?></td>
            <td>Rp <?= number_format($row['max_salary'], 0, ',', '.') ?></td>
            <td>Rp <?= number_format($row['min_salary'], 0, ',', '.') ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include 'views/footer.php'; ?>
