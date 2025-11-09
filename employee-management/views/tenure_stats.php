<?php
include 'views/header.php';
?>

<h2>Statistik Masa Kerja Karyawan</h2>
<p style="color:#666;">Klasifikasi karyawan berdasarkan masa kerja (Junior, Middle, Senior).</p>

<table class="data-table">
    <thead>
        <tr>
            <th>Kategori</th>
            <th>Jumlah Karyawan</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $tenure_stats->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= htmlspecialchars($row['level']) ?></td>
            <td><?= $row['total_employees'] ?> orang</td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include 'views/footer.php'; ?>
